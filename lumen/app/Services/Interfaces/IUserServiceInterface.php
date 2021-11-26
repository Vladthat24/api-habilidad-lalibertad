<?php

namespace App\Services\Interfaces;

interface IUserServiceInterface
{
	
	function getUser();
	
	function getUserById(int $id);

	function postUserDni(string $dni,string $fecha);

	function postUser(array $user);
	
	function putUser(array $user,int $id);
	
	function delUser(int $id);
	
	function restoreUser(int $id);
}


