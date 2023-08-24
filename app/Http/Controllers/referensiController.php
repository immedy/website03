<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisReferensi;
use App\Models\referensi;
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

}
