<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Masyarakat;
use App\Models\Pengaduan;


class PengaduanController extends Controller
{
    function index(){
        $data = Pengaduan::all();


        return view('home', ['data' => $data]);
    }

    function tampil_isi_pengaduan(){

        return view('isi-pengaduan');
    }

    function proses_isi_pengaduan(Request $request){

        // validasi
        $validated = $request->validate([
            'isi_laporan' => 'required|string',
            'foto' => 'required',
        ]);


        $nama = "";
        // Jika File Foto Ada
        if ($request->hasFile('foto')) {
             $nama = time() . $request->foto->getClientOriginalName();
             $request->foto->storeAs('public/images', $nama);
        }

        // data yang akan dimasukan
        $data = [
            'tgl_pengaduan' => date('Y-m-d'),
            'nik' => '123',
            'isi_laporan' => $request->isi_laporan,
            'foto' => $nama,
            'status' => '0'
        ];

        // Masukan Data Ke Table Pengaduan
        $simpan = Pengaduan::create($data);

        // redirect ke url Home
        return redirect('home');
    }
}
