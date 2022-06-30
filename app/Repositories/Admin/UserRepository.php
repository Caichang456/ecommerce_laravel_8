<?php

namespace App\Repositories\Admin;

use App\Models\User;

class UserRepository{
	function getUsersWithoutPagination(){
		return User::get();
	}
}