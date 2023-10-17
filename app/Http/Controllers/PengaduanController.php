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
   function index(){
    $judul = "Selamat Datang";
    // Query Builder
    //  $pengaduan = DB::table('pengaduan')->get();
    // Elloquent ORM
    $pengaduan = Pengaduan::all();



    return view('home', ['judul' => $judul, 'pengaduan' => $pengaduan]);
   }

  function tampil_pengaduan(){
    return view('isi-pengaduan');
  }


  function proses_tambah_pengaduan(Request $request){
    // vaidasi
    $nama_foto =  $request->foto->getClientOriginalName();

    $request->validate([
      'isi_laporan' => 'required|min:2'
    ]);

    // Nyimpan Foto / Mindahin File
    $request->foto->storeAs('public/image', $nama_foto);

      // $isi_pengaduan = $_POST['isi_laporan'];
      $isi_pengaduan = $request->isi_laporan;

      Pengaduan::create([
        'tgl_pengaduan' => date('Y-m-d'),
        'nik' => '123',
        'isi_laporan' => $isi_pengaduan,
        'foto' => $request->foto->getClientOriginalName(), // mendapatkan nama foto
        'status' => '0'
    ]);

    return redirect('/home');
  }

  function hapus($id){
    DB::table('pengaduan')->where('id_pengaduan', '=', $id)->delete();


    return redirect()->back();
  }

  function detail_pengaduan($id){
    // $pengaduan = DB::table('pengaduan')
    //             ->where('id_pengaduan', '=', $id)
    //             ->first();

    $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();
    return view("detail_pengaduan", ["data" => $pengaduan]);

  }

  function edit($id){
    $pengaduan = DB::table('pengaduan')
                    ->where('id_pengaduan', '=', $id)
                    ->first();
    return view('edit_pengaduan', ['pengaduan' => $pengaduan]);
  }


  function update($id, Request $request){
    DB::table('pengaduan')
              ->where('id_pengaduan', $id)
               ->update(['isi_laporan' => $request->isi_laporan]);

    return redirect('/home');
  }
}
