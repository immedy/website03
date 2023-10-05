<?php

namespace App\Http\Controllers;

use App\Models\instalasi;
use Illuminate\Http\Request;
use App\Models\JenisReferensi;
use App\Models\referensi;
use App\Models\ruangan;
use RealRashid\SweetAlert\Facades\Alert;

class referensiController extends Controller
{
    public function index()
    {
        return view('DashboardPage.referensi.Referensi',[
            'JenisReferensi' => JenisReferensi::all(),
            'referensi'     => referensi::all()
        ]);
    }   
    public function AddJenisReferensi(Request $request)
    {
        $validasiJenisRefrensi = $request->validate([
            'deskripsi' => 'required'
        ]);
        JenisReferensi::create($validasiJenisRefrensi);
        if($validasiJenisRefrensi){
            Alert::Success('Sukses');
        }
        return back();
    }

    public function AddReferensi(Request $request)
    {
        $ValidasiReferensi = $request->validate([
            'jenisreferensi' => 'required',
            'deskripsi'     => 'required'
        ]);        
        referensi::updateOrInsert($ValidasiReferensi);
        if($ValidasiReferensi){
            Alert::Success('Sukses Menambah Referensi');
        }
        return back();
    }
     public function Instalasi()
     {
        return view('DashboardPage.referensi.Ruangan',[
            'instalasi' => instalasi::all(),
            'ruangan' => ruangan::all()
        ]);
     }
     public function AddInstalasi(Request $request)
     {
        $id = $request->id;
        $ValidasiInstalasi = $request->validate([
            'instalasi' => 'required'
        ]);
        $ValidasiInstalasi['status'] = 1;
        instalasi::create($ValidasiInstalasi);
        if($ValidasiInstalasi){
            Alert::Success('Sukses');
        }
        return back();
     }

}
