<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
class PetugasController extends Controller
{
    public function index(){
        $pengaduan = Pengaduan::all();
        return view('petugas.home', compact('pengaduan'));
    }
}
