<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository{
	function getUsersWtihPagination(){
		return User::paginate(10);
	}

	function createUser($userValidation){
		return User::create($userValidation);
	}

	function getUser($id){
		return User::where('id', $id)->first();
	}

	function deleteUser($id){
		return User::where('id', $id)->delete();
	}

	function updateUser($userValidation, $id){
		return User::where('id', $id)->update($userValidation);
	}

	function getUsersWithoutPagination(){
		return User::get();
	}
}