<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('login.login');
    }
    public function signup(){
        return view('login.signup');
    }


    public function signupPage(Request $request)
{
    // Validate input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'shopname' => 'required|string|max:255',
    ]);

    // Insert data into the database
    $user = new User();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = bcrypt($request->input('password'));
    $user->shopname = $request->input('shopname');
    $user->save();

    // Redirect or return a response
    return redirect()->route('loginpage')->with('message', 'Account created successfully!');
}




}
