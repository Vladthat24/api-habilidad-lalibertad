<?php
namespace App\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserValidator
{
		/*
		 *@var Request
		 */	
	
	private $request;

	public function __construct(Request $request)
	{
		$this->request=$request;
	}

	public function validate()
	{
		return Validator::make($this->request->all(),$this->rules(),$this->messages());
	}

	private function rules()
	{
		return[
		 "fisname"=>"required",
		 "lastname"=>"required",
		 "documents_number"=>"required",
		 "documents_type"=>"required|unique:users,documents_number,".$this->request->id,
	"email"=>"required|email|unique:users,email".$this->request->id,	 
	"password"=>"required",
	"confirm_password"=>"required|same:password",
	"phone"=>"required"
		];

	}

	public function messages()
	{
		return [];
	}
}
?>
