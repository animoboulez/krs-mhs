<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PenawaranKrsController;
use App\Http\Controllers\KrsMahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('penawaran-krs', PenawaranKrsController::class);
Route::get('/krs/pilih', [KrsMahasiswaController::class, 'pilih'])->name('krs.mahasiswa.pilih');
Route::post('/krs/simpan', [KrsMahasiswaController::class, 'simpan'])->name('krs.mahasiswa.simpan');
Route::get('/krs/{npm}/hasil', [KrsMahasiswaController::class, 'hasil'])->name('krs.mahasiswa.hasil');
