<?php

namespace App\Http\Controllers;

use App\Models\ruangan;
use App\Models\instalasi;
use Illuminate\Http\Request;

class InstalasiController extends Controller
{
    public function index()
    {
        return view('DashboardPage.Instalasi.instalasi');
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
}
