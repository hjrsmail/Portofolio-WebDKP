<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


/*
| -----------------------------------------------------------------
|   Web Routes
|------------------------------------------------------------------
*/


// Rute untuk halaman utama (jika ada)
Route::get('/', function () {
    return view('index');
});



Route::get('/', [HomeController::class, 'show']);

Route::get('/halamanbidang', [HomeController::class, 'showV']);

// Halaman Bidang
Route::get('/halamanbidang', [HomeController::class, 'indexS'])->name('master.halamanbidang');


// Rute untuk Informasi Publik
Route::prefix('infopublik')->group(function () {
    Route::view('/sejarah', 'infopublik.sejarah')->name('infopublik.sejarah');
    Route::view('/visimisi', 'infopublik.visimisi')->name('infopublik.visimisi');
    Route::view('/tugasfungsi', 'infopublik.tugasfungsi')->name('infopublik.tugasfungsi');
    Route::get('/logo', [HomeController::class, 'showL'])->name('infopublik.logo');
    Route::get('/struktur-organisasi', [HomeController::class, 'showS'])->name('infopublik.struktur-organisasi');
    Route::view('/registrasipsat', 'infopublik.reg-psat')->name('infopublik.reg-psat');
});


Route::get('/infopublik/{slug}', [HomeController::class, 'showI'])->name('infopublik.show');

Route::get('/', [HomeController::class, 'index']);
Route::get('/galeri', [HomeController::class, 'index']);
Route::get('/galeri', [HomeController::class, 'showG'])->name('galeri.lengkap');

Route::get('/', [HomeController::class, 'show'])->name('index');
Route::get('/berita', [HomeController::class, 'index'])->name('berita.lengkap');
Route::get('/berita/{berita:slug}', [HomeController::class, 'detail'])->name('berita.detail');

Route::get('/pengumuman', [HomeController::class, 'indexP'])->name('pengumuman.lengkap');
Route::get('/pengumuman/{slug}', [HomeController::class, 'showP'])->name('pengumuman.detail');


Route::get('/export-data', [HomeController::class, 'exportData'])->name('export.data');
