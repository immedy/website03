<?php

use App\Models\MenuUtama;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\InstalasiController;
use App\Http\Controllers\KritikSaranController;
use App\Http\Controllers\MenuUtamaController;
use App\Http\Controllers\referensiController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::controller(MenuUtamaController::class)->group(function(){
    route::get('/','HalamanUtama');
    route::get('/dashboard','index')->middleware('auth');
    route::get('/dashboard/editor','editor')->name('editor')->middleware('auth');
    route::post('/TambahMenu','TambahEdit')->name('TambahMenu')->middleware('auth');
    route::delete('/hapus/{id}','Hapus')->name('hapus')->middleware('auth');
    route::get('/tampil/{id}','show')->name('tampil')->middleware('auth');
});
Route::controller(ProfilController::class)->group(function(){
    route::get('/profil/sejarah','sejarah');
    route::get('/profil/visimisimottonilai','visimisi');
    route::get('/profil/strukturorganisasi','organisasi');

});
Route::controller(InformasiController::class)->group(function(){
    route::get('/informasi/berita','BeritaLandingPage');
    route::get('/informasi/berita/{id}','BeritaLandingPageDetail');
    route::get('/dashboard/berita','index')->middleware('auth');
    route::get('/dashboard/berita/create','beritacreate')->middleware('auth');
    route::get('/dashboard/berita/edit/{id}','detailberita')->name('detailberita')->middleware('auth');
    route::delete('/dashboard/berita/hapus/{id}','hapusberita')->name('hapusberita')->middleware('auth');
    route::post('/simpan','simpanOrupdate')->name('simpanberita')->middleware('auth');
});

Route::controller(InstalasiController::class)->group(function(){
    route::get('/dashboard/instalasi','index')->middleware('auth');
    route::get('/dashboard/instalasi/tambah','CreateInstalasi')->name('TambahInstalasi')->middleware('auth');
});

Route::controller(KritikSaranController::class)->group(function(){
    route::get('/KritikSaran','index')->name('KritikSaran');
    route::get('/dashboard/kritiksaran','show')->middleware('auth');
    route::get('/dashboard/kritiksaran/{id}','TampilPesan')->name('TampilPesan')->middleware('auth');
    route::post('/KritikSaranKirim','Kirim');
});

Route::controller(referensiController::class)->group(function(){
    route::get('/dashboard/referensi','index')->middleware('auth');
    route::post('/AddJenisReferensi','AddJenisReferensi')->name('AddJenisReferensi')->middleware('auth');
    route::post('/AddReferensi','AddReferensi')->name('AddReferensi')->middleware('auth');
    route::get('/dashboard/ruangan','Instalasi')->middleware('auth');
    route::post('AddInstalasi','AddInstalasi')->name('AddInstalasi')->middleware('auth');
});

Route::controller(DokterController::class)->group(function(){
    route::get('/dashboard/dokter','index')->middleware('auth');
    route::post('/addDokter','addDokter')->name('addDokter')->middleware('auth');
});

Route::controller(UserController::class)->group(function(){
    route::get('/ManajemenPengguna','pegawai')->middleware(['auth','Level-2','Level-3']);
    route::get('/CariUsername/{id}','CariUsername')->name('CariUsername')->middleware('auth');
    route::put('/AddorUpdate','AddorUpdate')->name('AddorUpdate')->middleware('auth');
    route::put('/AddOrUpdatePegawai','AddOrUpdatePegawai')->name('AddOrUpdatePegawai')->middleware('auth');
    route::get('/login','HalamanLogin')->name('login')->middleware('guest');
    route::post('/Autentikasi','Autentikasi')->name('Autentikasi');
    route::post('/logout','logout')->middleware('auth');
});
