<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
    	return view('registration.create');
    }

    public function store()
    {
    	//validate the form data
    	$this->validate(request(), [
    		'name' => 'required|min:5',
    		'email' => 'required|email', 
    		'password' => 'required|min:6|confirmed'
    		]);

    	//create a new user

    	$user = User::create([
    		'name' => request('name'),
    		'email' => request('email'),
    		'password' => bcrypt(request('password'))
    		]);

    	//signed them in

    	auth()->login($user);

    	//redirect the user to home page

    	// return redirect('/');
    	// return redirect()->route('home');
    	return redirect()->home();
    }
}
