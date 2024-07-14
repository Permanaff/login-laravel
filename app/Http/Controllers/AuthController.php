<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function index ()
    {
        return view('Auth/login');
    }
    
    function login(Request $request) 
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($infologin)) {
            return redirect('home')->with('email', $request->email);
        } else {
            return redirect('/')->with('message', 'Username dan password yang dimasukkan tidak sesuai');
        }
    }

    function logout() 
    {
        Auth::logout();
        return redirect('/');
    }
}
