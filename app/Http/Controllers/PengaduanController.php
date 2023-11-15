<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class PengaduanController extends Controller
{

   function index(){
    // return Auth::user();
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
        'nik' => Auth::user()->nik,
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

    $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();
    // $tanggapan = Tanggapan::where('id_pengaduan', $id)->get();
    $tanggapan = DB::table('tanggapan')
    ->join('petugas', 'petugas.id', '=', 'tanggapan.id_petugas')
    ->where('tanggapan.id_pengaduan', $id)
    ->get();

    // return $tanggapan;
    // Select .... from tanggapan JOIN petugas

    return view("detail_pengaduan", ["data" => $pengaduan, 'tanggapan' => $tanggapan]);

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

  function update_status(Request $request, $id){

    Pengaduan::where('id_pengaduan', $id)->update([
        'status' => $request->status_pengaduan
    ]);

    return redirect()->back()->with("success", "Pengaduan Berhasil DI Update");
    // echo "update status id : $id";
  }
}
