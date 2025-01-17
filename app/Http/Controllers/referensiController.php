<?php

namespace App\Http\Controllers;

use App\Models\ruangan;
use App\Models\instalasi;
use App\Models\referensi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\JenisReferensi;
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
            'ruangan' => ruangan::orderBy('instalasi','asc')->get()
        ]);
     }
     public function AddInstalasi(Request $request)
     {
        $id = $request->id;
        $ValidasiInstalasi = $request->validate([
            'instalasi' => 'required'
        ]);
        $ValidasiInstalasi['status'] = 1;
        $ValidasiInstalasi['slug'] = Str::slug($request->instalasi, '');
        instalasi::create($ValidasiInstalasi);
        if($ValidasiInstalasi){
            Alert::Success('Sukses');
        }
        return back();
     }

     public function AddRuangan(Request $request)
     {
        $id = $request->id;
        $ValidasiRuangan = $request->validate([
            'instalasi' => 'required',
            'ruangan' => 'required'
        ]);
        $ValidasiRuangan['penerima_order'] = 0;
        $ValidasiRuangan['status'] = 1;
        ruangan::create($ValidasiRuangan);
        if($ValidasiRuangan){
            Alert::Success('Sukses');
        }
        return back();
     }

}
