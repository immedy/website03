<?php

namespace App\Http\Controllers;

use App\Models\layanan;
use App\Models\ruangan;
use App\Models\instalasi;
use Illuminate\Support\Str;
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
            'unit' => layanan::where('instalasi', $id)->get(),
            'instalasi' => instalasi::all()
        ]);
    }
    public function AddLayanan(Request $request)
    {
        $validasiLayanan = $request->validate([
            'ruangan' => 'required',
            'gambar' => 'required|mimes:png,jpg|max:1028',
            'konten' => 'required',
        ]);
        $validasiLayanan['pegawai'] = Auth::user()->pegawai->id;
        $validasiLayanan['instalasi'] = Str::slug($request->instalasi,'');
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

    public function EditLayanan($id)
    {
        return view('DashboardPage.Createfile.EditInstalasi',[
            "unit" => layanan::findOrFail($id)
        ]);
    }

    Public function InstalasiGawatDarurat()
    {
        return view('LandingPage.Konten.LayananMedis.LayananInstalasi',[
            'unit' => layanan::where('instalasi', 1)->get()
        ]);
    }
    Public function InstalasiRawatJalan()
    {
        return view('LandingPage.Konten.LayananMedis.LayananInstalasi',[
            'unit' => layanan::where('instalasi', 3)->get()
        ]);
    }
    Public function InstalasiRawatInap()
    {
        return view('LandingPage.Konten.LayananMedis.LayananInstalasi',[
            'unit' => layanan::where('instalasi', 2)->get()
        ]);
    }
    Public function InstalasiCareUnit()
    {
        return view('LandingPage.Konten.LayananMedis.LayananInstalasi',[
            'unit' => layanan::where('instalasi', 4)->get()
        ]);
    }
    Public function InstalasiBedahSentral()
    {
        return view('LandingPage.Konten.LayananMedis.LayananInstalasi',[
            'unit' => layanan::where('instalasi', 5)->get()
        ]);
    }
    Public function InstalasiRadiologi()
    {
        return view('LandingPage.Konten.LayananMedis.LayananInstalasi',[
            'unit' => layanan::where('instalasi', 6)->get()
        ]);
    }
    Public function InstalasiLaboratorium()
    {
        return view('LandingPage.Konten.LayananMedis.LayananInstalasi',[
            'unit' => layanan::where('instalasi', 7)->get()
        ]);
    }
    Public function InstalasiFarmasi()
    {
        return view('LandingPage.Konten.LayananMedis.LayananInstalasi',[
            'unit' => layanan::where('instalasi', 8)->get()
        ]);
    }
}
