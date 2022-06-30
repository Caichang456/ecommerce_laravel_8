<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepository;

class UserController extends Controller
{
    protected $user;

    function __construct()
    {
        $this->user = new UserRepository();
    }

    public function getUsers(){
        $users = $this->user->getUsersWtihPagination();
        return view('user.profile.index', compact('users'));
    }

    public function addUser(){
        return view('user.profile.add');
    }

    public function createUser(Request $request){
        $userValidation = $request->validate([
            'name' => 'required',
            'mobile_phone' => 'required|regex:/[0-9]/',
            'address' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'password' => 'required',
            'email' => 'required|email'
        ]);
        $userValidation['password'] = bcrypt($userValidation['password']);
        $this->user->createUser($userValidation);
        return redirect()->route('getUsers');
    }

    public function editUser($id){
        $user = $this->user->getUser($id);
        return view('user.profile.edit', compact('user'));
    }

    public function updateUser(Request $request){
        $userValidation = $request->validate([
            'name' => 'required',
            'mobile_phone' => 'required|regex:/[0-9]/',
            'address' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'email' => 'required|email'
        ]);
        $id = $request->id;
        $this->user->updateUser($userValidation, $id);
        return redirect()->route('getUsers');
    }

    public function deleteUser($id){
        $this->user->deleteUser($id);
        return redirect()->route('getUsers');
    }
}
