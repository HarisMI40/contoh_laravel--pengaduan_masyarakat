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

       $dataLogin = $request->only("username", "password"); // buat ambil data input
        if(Auth::attempt($dataLogin)){ // proses login
            return redirect("/home");
        }else{
            return redirect("/login")->with("error", "username atau password salah");
        }

    }

    function logout(){
        // Session::flush();
        Auth::logout();

        return redirect('/login');
    }
}
