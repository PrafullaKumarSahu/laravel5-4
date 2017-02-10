<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\User;
// use App\Mail\Welcome;

use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function create()
    {
    	return view('registration.create');
    }

    public function store(RegistrationRequest $request)
    {
    	// //validate the form data
    	// $this->validate(request(), [
    	// 	'name' => 'required|min:5',
    	// 	'email' => 'required|email', 
    	// 	'password' => 'required|min:6|confirmed'
    	// 	]);

    	//create a new user

    	// $user = User::create([
    	// 	'name' => request('name'),
    	// 	'email' => request('email'),
    	// 	'password' => bcrypt(request('password'))
    	// 	]);

    	//signed them in

    	// auth()->login($user);

     //    //send them an email
     //    \Mail::to($user)->send(new Welcome($user));

    	
    	//redirect the user to home page

    	// return redirect('/');
    	// return redirect()->route('home');

    	$request->persist();
        
        // request()->session();
        session()->flash("message", "Thanks so much for signing up!");

    	return redirect()->home();
    }
}
