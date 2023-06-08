<?php

use App\Models\MenuUtama;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\MenuUtamaController;

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

Route::get('/', function () {
    return view('LandingPage.Konten.index');
});

Route::get('/login', function () {
    return view('DashboardPage.Layout.login');
});
Route::controller(MenuUtamaController::class)->group(function(){
    route::get('/dashboard','index');
    route::get('/dashboard/editor','editor')->name('editor');
    route::post('/TambahMenu','TambahEdit')->name('TambahMenu');
    route::delete('/hapus/{id}','Hapus')->name('hapus');
    route::get('/tampil/{id}','show')->name('tampil');
});
Route::controller(ProfilController::class)->group(function(){
    route::get('/sejarah','sejarah');
    route::get('/visimisimottonilai','visimisi');
    route::get('/strukturorganisasi','organisasi');

});
Route::controller(InformasiController::class)->group(function(){
    route::get('/dashboard/berita','index');
    route::get('/dashboard/berita/create','beritacreate');
    route::post('/simpan','simpan')->name('simpanberita');
});

