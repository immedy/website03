<?php

namespace App\Http\Controllers;

use App\Models\instalasi;
use App\Models\MenuUtama;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function sejarah()
    {
        return view('LandingPage.Konten.Profil.Sejarah',[
            'sejarah' => MenuUtama::where('id',5)->get(),
            'instalasi' => instalasi::all()
        ]);
    }
    public function visimisi()
    {
        return view('LandingPage.Konten.Profil.visimisi',[
            'visimisi' => MenuUtama::where('id',11)->get(),
            'instalasi' => instalasi::all()
        ]);
    }
    public function organisasi()
    {
        return view('LandingPage.Konten.Profil.struktur',[
            'struktur' => MenuUtama::where('id',15)->get(),
            'instalasi' => instalasi::all()
        ]);
    }
    public function direktur()
    {
        return view('LandingPage.Konten.Profil.direktur');
    }
}
