<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginPetugasController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\AuthController;


Route::get('/hapus-pengaduan/{id}', [PengaduanController::class, 'hapus']);

Route::get('/detail-pengaduan/{id}', [PengaduanController::class, "detail_pengaduan"]);
Route::post('/update-pengaduan/{id}', [PengaduanController::class, "update"]);
Route::get('/update-pengaduan/{id}', [PengaduanController::class, "edit"]);


Route::get('/about/{id}', [pengaduanController::class, 'tampil_about']);

Route::get('/pengaduan/{id}', [pengaduanController::class, 'detail_pengaduan']);


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get("/register", [AuthController::class, 'register']);
Route::post("/register", [AuthController::class, 'store']);

Route::get('petugas/login', [LoginPetugasController::class, 'index']);
Route::post('petugas/login', [LoginPetugasController::class, 'login']);








Route::middleware(['auth'])->group(function () {
    Route::get('/home', [PengaduanController::class, 'index']);
    Route::get('/isi-pengaduan', [PengaduanController::class, 'tampil_pengaduan']);
    Route::post('/isi-pengaduan', [PengaduanController::class, 'proses_tambah_pengaduan']);

    Route::get('/logout', [LoginController::class, 'logout']);
});

Route::middleware(['cek_petugas'])->group(function () {
    Route::get('/petugas/home', [PetugasController::class, "index"]);

  
    Route::get('petugas/logout', [LoginPetugasController::class, "logout"]);
});