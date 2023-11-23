<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function handleRegister(Request $request)
    {
        $email =  $request->email;
        $pass = bcrypt($request->pass);
        $username = $request->username;
        $address = $request->address;
        $phone = $request->phone;
        $request->validate([
            'email' => 'required|email',
            'pass' => 'required',
            'username' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        User::insert(
            [
                'email' => $email,
                'password' => $pass,
                'username' => $username,
                'address' => $address,
                'phone' => $phone
            ]
        );
        return Redirect()->Route('home');
    }
    public function showLogin()
    {
        return view('login');
    }
    public function handleLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->pass;

        Auth::attempt(['email' => $email, 'password' => $password]);
        return Redirect()->Route('home');
    }
    public function logout()
    {
        Auth::logout();
        return Redirect()->Route('home');
    }
}
