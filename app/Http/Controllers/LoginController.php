<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    function index(){
        return view("auth.login");
    }
    function login(Request $request){
        // return $request->only("username", "password");
        if(Auth::attempt($request->only("username", "password"))){
            return redirect("/");
        }

        return "gagal Login";
    }

    function logout(){
        Session::flush();
        Auth::logout();

        return redirect('/login');
    }
}
