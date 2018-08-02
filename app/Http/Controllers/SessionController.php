<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(){
    	return view('login');
    }

    public function store(){
    	
    	if(! auth()->attempt(request(['email','password']))){
    		return back()->withErrors(['message' =>'Email or passwoed not correct']);
    	}

    	return redirect('/posts');
    }

    public function destroy(){
    	auth()-> logout();
    	return redirect('/posts');
    }
}

