<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersCtrl extends Controller
{
    //
    public function liste(){
    	$users = User::all();
    	return view('home.users',compact('users'));
    }

    public function user($id){
    	$users = User::find($id);
    	return $users;
    }

    public function delete($id){
    	$users = User::find($id);
    	$users->delete();
    	return back();
    }

    public function store(Request $request){
    	$users = new User;
    	$users->name = $request->input('name');
    	$users->email = $request->input('email');
    	$users->password = bcrypt($request->input('pass'));
    	$users->role = $request->input('role');
    	$users->etat = $request->input('etat');
    	$users->save();
    	return back();
    }

     public function update(Request $request,$id){
    	$users = User::find($id);
    	$users->name = $request->input('name');
    	$users->email = $request->input('email');
    	$users->password = bcrypt($request->input('pass'));
    	$users->role = $request->input('role');
    	$users->etat = $request->input('etat');
    	$users->save();
    	return back();
    }
}
