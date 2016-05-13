<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UsersCtrl extends Controller
{
    public function index() {
    	$users = User::all();
    	return view('users.index', ['users' => $users]);
    }
    public function view(User $user) {
    	return view('users.view', ['user' => $user]);
    }
    public function new() {
    	return view('users.new');
    }
    public function create(Request $request) {
    	$this->validate($request, [
    		'username' => 'required|alpha_num',
    		'password' => 'required|alpha_dash',
    		'type' => 'in:admin,manager,accountant,salesperson,stockkeeper',
    	]);
    	$user = new User;
    	$user->create($request->all());
    	return redirect('/users/' . $user->id);
    }
    public function edit(User $user) {
    	return view('users.edit', ['user' => $user]);
    }
    public function update(Request $request, User $user) {
    	$user->update($request->all());
    	return redirect('/users/' . $user->id);
    }
    public function delete(User $user) {
    	$user->delete();
    	return redirect('/users/');
    }
}
