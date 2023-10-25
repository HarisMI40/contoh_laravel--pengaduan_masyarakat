<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginPetugasController extends Controller
{
    public function index(){
        return view('auth.login_petugas');
    }

    public function login(Request $request){

        $data = $request->only('username', 'password');
       if(Auth::guard("petugas")->attempt($data)){
            return redirect("/petugas/home");
       }else{
        echo redirect("/petugas/login")->with("error", "username atau password salah");
       }
    }

    function logout(){
        Auth::guard("petugas")->logout();
        return redirect("/petugas/login");
    }

    public function home(){
        return view('petugas.home');
    }
}
