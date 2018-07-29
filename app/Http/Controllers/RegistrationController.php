<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use DB;
class RegistrationController extends Controller
{
    public function create (){
    	return view('register');
    }
     public function store (Request $request){
    	//create user
    	$user = new User;
    	//$post->title =Request('title');
    	$user -> name=$request->name;
    	$user -> email=$request->email;
    	$user -> password=bcrypt($request->password);
    	$user->save();
    	
    	//login
    	auth()->login($user);
    	//redirect
    	return redirect('/posts');
    }
}
