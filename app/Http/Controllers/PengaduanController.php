<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
    function tampil_about($id){
        echo "ini halaman about di Controller Pengaduan id : $id";
    }


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

  function hapus($id){
    DB::table('pengaduan')->where('id_pengaduan', '=', $id)->delete();

    return redirect()->back();
  }

  function detail_pengaduan($id){
    $pengaduan = DB::table('pengaduan')
                ->where('id_pengaduan', '=', $id)
                ->first();
    return view("detail_pengaduan", ["data" => $pengaduan]);

  }
}
