<?php 
namespace App\Services\Implementation;

use App\Services\Interfaces\IConsultaServiceInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class ConsultaServiceImpl implements IConsultaServiceInterface
{
	function postConsulta(string $an_o,string $cop)
	{
		return $consulta=DB::connection('comments')->select('CALL sp_verificar_pago(?,?)',array($an_o,$cop));

	}
}
?>
