<?php

namespace App\Services\Implementation;

use App\Services\Interfaces\IUserServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl implements IUserServiceInterface
{
    private $model;

    function __construct()
    {
        $this->model = new User();
    }

    function getUser()
    {
        //Comando para traer a los registro eliminados
        //return $this->withTrashed()->get();
        return $this->model->get();
    }
    function getUserById(int $id)
    {
        return $this->model->where('id', $id)->get();
    }

    /*
	 *@var Function para consumir dni
	 */
    function postUserDni(string $dni, string $fecha)
    {

        $ch = curl_init("http://app17.susalud.gob.pe:8081/webservices/ws_procesos/obtenerDatosReniecFeNacimiento?numero=$dni&feNacimiento=$fecha");
        //a true, obtendremos una respuesta de la url, en otro caso,
        //true si es correcto, false si no lo es
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //establecemos el verbo http que queremos utilizar para la petición
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        //enviamos el array data
        /*         curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); */
        //obtenemos la respuesta
        $response = curl_exec($ch);
        // Se cierra el recurso CURL y se liberan los recursos del sistema
        curl_close($ch);
        if (!$response) {
            return false;
        } else {
            echo $response;
        }
    }
    /*
	 *Crear un nuevo usuario en el sistema
	 */
    function postUser(array $user)
    {

        $user['password'] = Hash::make($user['password']);
        $this->model->create($user);
    }
    function putUser(array $user, int $id)
    {
        $user['password'] = Hash::make($user['password']);
        $this->model->where('id', $id)->first()->fill($user)->save();
    }
    function delUser(int $id)
    {
        $user = $this->model->find($id);
        if ($user != null) {
            $user->delete();
        }
    }

    function restoreUser(int $id)
    {
        $user = $this->model->withTrashed()->find($id);

        if ($user != null) {
            $user->restore();
        }
    }
}
