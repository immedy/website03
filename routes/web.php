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


Route::get('/login', function () {
    return view('DashboardPage.Layout.login');
});
Route::controller(MenuUtamaController::class)->group(function(){
    route::get('/','HalamanUtama');
    route::get('/dashboard','index');
    route::get('/dashboard/editor','editor')->name('editor');
    route::post('/TambahMenu','TambahEdit')->name('TambahMenu');
    route::delete('/hapus/{id}','Hapus')->name('hapus');
    route::get('/tampil/{id}','show')->name('tampil');
});
Route::controller(ProfilController::class)->group(function(){
    route::get('/profil/sejarah','sejarah');
    route::get('/profil/visimisimottonilai','visimisi');
    route::get('/profil/strukturorganisasi','organisasi');

});
Route::controller(InformasiController::class)->group(function(){
    route::get('/informasi/berita','BeritaLandingPage');
    route::get('/informasi/berita/{id}','BeritaLandingPageDetail');
    route::get('/dashboard/berita','index');
    route::get('/dashboard/berita/create','beritacreate');
    route::get('/dashboard/berita/edit/{id}','detailberita')->name('detailberita');
    route::delete('/dashboard/berita/hapus/{id}','hapusberita')->name('hapusberita');
    route::post('/simpan','simpanOrupdate')->name('simpanberita');
});

Route::controller(InstalasiController::class)->group(function(){
    route::get('/dashboard/instalasi','index');
    route::get('/dashboard/instalasi/tambah','CreateInstalasi')->name('TambahInstalasi');
});

Route::controller(KritikSaranController::class)->group(function(){
    route::get('/KritikSaran','index')->name('KritikSaran');
    route::get('/dashboard/kritiksaran','show');
    route::get('/dashboard/kritiksaran/{id}','TampilPesan')->name('TampilPesan');
    route::post('/KritikSaranKirim','Kirim');
});

Route::controller(referensiController::class)->group(function(){
    route::get('/dashboard/referensi','index');
    route::post('/AddJenisReferensi','AddJenisReferensi')->name('AddJenisReferensi');
    route::post('/AddReferensi','AddReferensi')->name('AddReferensi');
});

Route::controller(DokterController::class)->group(function(){
    route::get('/dashboard/dokter','index');
    route::post('/addDokter','addDokter')->name('addDokter');
});
