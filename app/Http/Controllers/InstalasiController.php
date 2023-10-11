<?php

namespace App\Http\Controllers;

use App\Models\layanan;
use App\Models\ruangan;
use App\Models\instalasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class InstalasiController extends Controller
{
    public function index()
    {
        return view('DashboardPage.Instalasi.instalasi',[
            'instalasi' => layanan::all()
        ]);
    }
    public function CreateInstalasi()
    {
        return view('DashboardPage.Createfile.createinstalasi', [
            'instalasi' => instalasi::where('status', 1)->get()
        ]);
    }

    public function getRuangan(Request $request)
    {
        $instalasi = $request->instalasi;
        $ruangan = ruangan::where('instalasi', $instalasi)->get();
        return response()->json($ruangan);
    }

    public function LayananInstalasi($id)
    {
        return view('LandingPage.Konten.LayananMedis.LayananInstalasi',[
            'unit' => layanan::where('instalasi', $id)->get()
        ]);
    }
    public function AddLayanan(Request $request)
    {
        $validasiLayanan = $request->validate([
            'instalasi' => 'required',
            'ruangan' => 'required',
            'gambar' => 'required|mimes:png,jpg|max:1028',
            'konten' => 'required',
        ]);
        $validasiLayanan['pegawai'] = Auth::user()->pegawai->id;
        $validasiLayanan['status'] = 1;
        if($request->hasFile('gambar')){
            $validasiLayanan['gambar']= $request->file('gambar')->store('GambarLayanan');
        }
        layanan::create($validasiLayanan);
        if ($validasiLayanan){
            Alert::success('Suksess');
        }
        return redirect('/dashboard/instalasi');
    }
}
