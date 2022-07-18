<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\KategoriberitaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DonasiiController;
use App\Http\Controllers\ProgamdonasiController;
use App\Http\Controllers\DonasimasukController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function(){
    return view('landingpage/home');
});

Route::get('/home', function () {
    return view('landingpage/home');
});
Route::get('/adminn',function(){
        return view('admin/home');
});


Route::view('/admin/pages/cards', 'admin.pages.cards');
Route::resource('/user', UserController::class)->middleware('auth');
Route::get('/anggota', [UserController::class,'anggota'])->middleware('auth');
Route::get('/pengurus', [UserController::class,'pengurus'])->middleware('auth');





Route::get('/penguruslist', [PengurusController::class,'pengurusList'])->middleware('auth');
Route::resource('/kategori', KategoriberitaController::class)->middleware('auth');
Route::resource('/berita', BeritaController::class);
Route::get('/beritalist', [BeritaController::class,'beritaList']);
Route::get('/berita-delete/{id}',[BeritaController::class,'delete'])->middleware('auth');


Route::get('generate-pdf', [BeritaController::class, 'generatePDF'])->middleware('auth');
Route::get('beritapdf', [BeritaController::class, 'beritaPDF'])->middleware('auth');
Route::get('eksporberita', [BeritaController::class, 'beritaExcel'])->middleware('auth');

Route::get('anggotapdf', [AnggotaController::class, 'anggotaPDF'])->middleware('auth');
Route::get('penguruspdf', [PengurusController::class, 'pengurusPDF'])->middleware('auth');
Route::get('kategoriberitapdf', [KategoriberitaController::class, 'kategoriberitaPDF'])->middleware('auth');
Route::get('datajabatanpdf', [JabatanController::class, 'datajabatanPDF'])->middleware('auth');
Route::get('donasipdf', [DonasiController::class, 'donasiPDF'])->middleware('auth');

Route::get('eksporanggota', [AnggotaController::class, 'anggotaExcel'])->middleware('auth');
Route::get('eksporpengurus', [PengurusController::class, 'pengurusExcel'])->middleware('auth');
Route::get('eksporkategoriberita', [KategoriberitaController::class, 'kategoriberitaExcel'])->middleware('auth');
Route::get('ekspordatajabatan', [JabatanController::class, 'datajabatanExcel'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/afterRegister',function(){
        return view('landingpage/afterRegister');
});

Route::get('/cari', [BeritaController::class,'cari'])->name('cari');
Route::get('/beritaview/{id}', [BeritaController::class,'beritaView']);
Route::post('/beritaview', [BeritaController::class,'komentar'])->name('komentar');

Route::get('/user-delete/{id}', [UserController::class, 'delete'])->name('delete');
Route::get('/cari', [UserController::class,'cari'])->name('cari');
Route::get('/anggotalist', [UserController::class,'userList']);
Route::get('/berita-delete/{id}',[BeritaController::class,'delete'])->middleware('auth');
Route::get('/komentar-delete/{id}',[BeritaController::class,'KomentarDelete'])->middleware('auth');

Route::resource('/progamdonasi', ProgamdonasiController::class);
Route::resource('/donasi', DonasiiController::class);
Route::get('/sum', [DonasiiController::class,'sumJumlah']);
Route::get('/detailprogam/{id}', [ProgamdonasiController::class,'detailProgam']);
Route::get('/progamdonasi-delete/{id}', [ProgamdonasiController::class, 'delete'])->name('delete');
// Route::post('/viewprogam/{id}', [ProgamdonasiController::class,'create'])->name('create.donasi');
Route::get('/viewprogam/{id}', [ProgamdonasiController::class,'viewProgam']);
Route::get('/terkirim', [ProgamdonasiController::class,'terkirim']);
Route::post('/viewprogam', [ProgamdonasiController::class,'donasi'])->name('donasi');


Route::get('/donasimasuk',[DonasimasukController::class, 'donasimasuk']);
