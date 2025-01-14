<?php

use App\Models\MenuUtama;
use App\Models\laporankerusakan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\InstalasiController;
use App\Http\Controllers\MenuUtamaController;
use App\Http\Controllers\referensiController;
use App\Http\Controllers\KritikSaranController;
use App\Http\Controllers\LaporanKerusakanController;

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

Route::get('/storage-link', function(){
    $targetFolder = base_path(). '/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    symlink($targetFolder, $linkFolder);
});


Route::controller(MenuUtamaController::class)->group(function(){
    route::get('/','HalamanUtama');
    route::get('/JadwalDokter','JadwalDokter');
    route::get('/Kesalahan','Kesalahan');
    route::get('/dashboard','index')->middleware('auth');
    route::get('/dashboard/editor','editor')->name('editor')->middleware('auth');
    route::post('/TambahMenu','TambahEdit')->name('TambahMenu')->middleware('auth');
    route::delete('/hapus/{id}','Hapus')->name('hapus')->middleware('auth');
    route::get('/tampil/{id}','show')->name('tampil')->middleware('auth');
    route::post('/AddDokumen','AddDokumen')->name('AddDokumen')->middleware('auth');
    route::post('/InputCrousel','AddCrousel')->middleware('auth')->name('AddCrousel');
});
Route::controller(ProfilController::class)->group(function(){
    route::get('/profil/sejarah','sejarah');
    route::get('/profil/visimisimottonilai','visimisi');
    route::get('/profil/strukturorganisasi','organisasi');

});
Route::controller(InformasiController::class)->group(function(){
    route::get('/informasi/berita','BeritaLandingPage');
    route::get('/informasi/berita/{id}','BeritaLandingPageDetail');
    route::get('/informasi/InformasiPublik','InformasiPublic');
    route::get('/dashboard/berita','index')->middleware('auth');
    route::get('/dashboard/berita/create','beritacreate')->middleware('auth');
    route::get('/dashboard/berita/edit/{id}','detailberita')->name('detailberita')->middleware('auth');
    route::delete('/dashboard/berita/hapus/{id}','hapusberita')->name('hapusberita')->middleware('auth');
    route::post('/simpan','simpanOrupdate')->name('simpanberita')->middleware('auth');
});

Route::controller(InstalasiController::class)->group(function(){
    route::get('/dashboard/instalasi','index')->middleware('auth');
    route::get('/dashboard/instalasi/tambah','CreateInstalasi')->name('TambahInstalasi')->middleware('auth');
    route::get('/get-ruangan','getRuangan');
    route::post('/AddLayanan','Addlayanan')->name('AddLayanan');
    route::get('/dashboard/instalasi/edit/{id}','EditLayanan')->name('EditLayanan');
    route::get('/Instalasi/GawatDarurat','InstalasiGawatDarurat');
    route::get('/Instalasi/Rawatjalan','InstalasiRawatJalan');
    route::get('/Instalasi/RawatInap','InstalasiRawatInap');
    route::get('/Instalasi/Rawatjalan','InstalasiRawatJalan');
    route::get('/Instalasi/CareUnit','InstalasiCareUnit');
    route::get('/Instalasi/BedahSentral','InstalasiBedahSentral');
    route::get('/Instalasi/Radiologi','InstalasiRadiologi');
    route::get('/Instalasi/Laboratorium','InstalasiLaboratorium');
    route::get('/Instalasi/Farmasi','InstalasiFarmasi');
    
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
    route::post('AddRuangan','AddRuangan')->name('AddRuangan')->middleware('auth');

});

Route::controller(DokterController::class)->group(function(){
    route::get('/dashboard/dokter','index')->middleware('auth');
    route::post('/addDokter','addDokter')->name('addDokter')->middleware('auth');
    route::post('addJadwalDokter','addJadwalDokter')->name('addJadwalDokter')->middleware('auth');
    route::get('/InputJadwalDokter/{id}','InputJadwalDokter')->middleware('auth')->name('InputJadwalDokter');
    route::get('/NonAktif/{id}','nonAktif')->middleware('auth')->name('deletedokter');
    route::post('updateStatusDokter','updateStatusDokter')->middleware('auth')->name('updateStatusDokter');
});

Route::controller(UserController::class)->group(function(){
    route::get('/ManajemenPengguna','pegawai')->middleware('permission:DashboardMenuUtama','permission:DashboardPelaporan');
    route::get('/CariUsername/{id}','CariUsername')->name('CariUsername')->middleware('auth');
    route::put('/AddorUpdate','AddorUpdate')->name('AddorUpdate')->middleware('auth');
    route::put('/AddOrUpdatePegawai','AddOrUpdatePegawai')->name('AddOrUpdatePegawai')->middleware('auth');
    route::get('/Dashboard/HakAkses/{id}','HakAkses');
    route::post('/AddHakAkses','AddHakAkses')->name('AddHakAkses');
    route::get('/login','HalamanLogin')->name('login')->middleware('guest');
    route::post('/Autentikasi','Autentikasi')->name('Autentikasi');
    route::post('/logout','logout')->middleware('auth');
});

Route::controller(LaporanKerusakanController::class)->group(function(){
    route::post('/AddlaporanKerusakan','AddLaporanKerusakan')->name('AddLaporanKerusakan')->middleware('auth');
});

Route::get('/foo', function () {
    Artisan::call('storage:link');
});