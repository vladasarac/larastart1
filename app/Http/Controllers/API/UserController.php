<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
//
public function index(){
  return User::latest()->paginate(10);//vadi po 10 najnovijih usera iz users tabele
}

//
public function store(Request $request){
  // return ['message' => 'I have your data'];
  // return $request->all();
  //validacija
  $this->validate($request, [
    'name' => 'required|string|max:191',
    'email' => 'required|string|email|max:191|unique:users',
    'password' => 'required|string|min:6',
  ]);
  //upis novog usera u 'users' tabelu
  return User::create([
    'name' => $request['name'],
    'email' => $request['email'],
    'type' => $request['type'],
    'bio' => $request['bio'],
    'photo' => $request['photo'],
    'password' => Hash::make($request['password']),
  ]);
}

//
public function show($id){

}

//
public function update(Request $request, $id){
        
}

//
public function destroy($id){
        
}


}
