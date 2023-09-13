<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
   function index(){

    $judul = "Selamat Datang";
    $pengaduan = DB::table('pengaduan')->get();
 

    return view('home', ['judul' => $judul, 'pengaduan' => $pengaduan]);
   }

  function tampil_pengaduan(){
    return view('isi-pengaduan');
  }

  function proses_tambah_pengaduan(Request $request){
    // vaidasi
    $request->validate([
      'isi_laporan' => 'required|min:2'
    ]);


      // $isi_pengaduan = $_POST['isi_laporan'];
      $isi_pengaduan = $request->isi_laporan;

      DB::table('pengaduan')->insert([
        'tgl_pengaduan' => date('Y-m-d'),
        'nik' => '123',
        'isi_laporan' => $isi_pengaduan,
        'foto' => '',
        'status' => '0'
    ]);

    return redirect('/home');
  }
}
