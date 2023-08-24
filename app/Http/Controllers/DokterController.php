<?php

namespace App\Http\Controllers;

use App\Models\dokter;
use App\Models\referensi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DokterController extends Controller
{
    public function index()
    {
        return view('DashboardPage.Dokter.dokter',[
            'JenisDokter' => referensi::where('jenisreferensi',4)->get(),
            'dokter' => dokter::all()
        ]);
    }
    public function addDokter(Request $request)
    {
        $id = $request->id;
        $AddDokter = $request->validate([
            'spesialis' => 'required',
            'nama'      => 'required',
            'gambar' => 'required|mimes:png,jpg|max:200'
        ]);
        $AddDokter['gambar']= $request->file('gambar')->store('gambarDokter');
        
        dokter::updateOrCreate(['id' => $id, 'status' => 1],$AddDokter);
        if($AddDokter){
            Alert::Success('Dokter Berhasil Terinput');
        }
        return back();
    }
}
