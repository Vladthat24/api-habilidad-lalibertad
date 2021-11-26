<?php

namespace App\Http\Controllers;
use App\Services\Implementation\UserServiceImpl;
use Illuminate\Http\Request;
use App\Validator\UserValidator;

class UserController extends Controller
{
    //Logica del Sistema
    private $userService;

    //Capturar la data que son enviadas
    private $request;

    /*
     *@var UserValidator
     * */

    private $validator;

    public function __construct(UserServiceImpl $userService, Request $request, UserValidator $userValidator){
        $this->userService=$userService;
        $this->request=$request;
        $this->validator=$userValidator;
    }

    function createUser()
    {

        $response = response("",201);

        $validator=$this->validator->validate();
        
        if($validator->fails()){
            $response= response([
                "status"=>422,
                "messages"=>"Error",
                "errors"=>$validator->errors()
            ],422);
        }else{

            $this->userService->postUser($this->request->all());
        
        }
        return $response;
    }
    function getListUser()
    {
        return response($this->userService->getUser());
    }
    function putUser(int $id){
        $response=response("",202);
        $this->userService->putUser($this->request->all(),$id);
        return $response;
    }
    function getUserById(int $id){
    
       return response($this->userService->getUserById($id));

    }
    function deleteUser(int $id){

        $this->userService->delUser($id);
        return response("",204);

    }
    function restoreUser(int $id)
    {
        $this->userService->restoreUser($id);
        return response("",204);
    }
    function postUserDni()
    {   
        $dni=$this->request->dni;
        $fecha=$this->request->fecha;    

        return $this->userService->postUserDni($dni,$fecha);
        
    }
}
