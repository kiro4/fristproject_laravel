<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm(){
        return view("auth.register");
    }
    public function register(Request $request){

        $data = $request->validate([
            "name"=>"required|string|max:30",
            "email"=> "required|email|unique:users,email|max:100",
            "password"=> "required|string|min:6|confirmed"
        ]);
        $data['password']= bcrypt($data['password']);
        User::create($data);
        return redirect(route("login"));

    }
    public function loginForm(){
        return view("auth.login");
    }

    public function login(Request $request){

        $data = $request->validate([
            "email"=> "required|email|max:100",
            "password"=> "required|string|min:6"
        ]);
        Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);
        return redirect(route('categories'));

    }

    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }
}
