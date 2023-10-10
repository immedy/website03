<?php

namespace App\Http\Controllers;

use App\Models\laporankerusakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanKerusakanController extends Controller
{
    public function AddLaporanKerusakan(Request $request)
    {
        $ValidasiAddLaporan = $request->validate([
            "keterangan" => 'required',
            "spesifikasi" => 'required',
            "alat"          => 'required',
            "waktu_pelaporan" => 'required',
            "tujuanruangan" => 'required'
        ]);
        $ValidasiAddLaporan['status'] = 0;
        $ValidasiAddLaporan['dariruangan'] =  Auth::user()->pegawai->ruangan;
        $ValidasiAddLaporan['pengirim'] =  Auth::user()->pegawai->id;
        // dd($ValidasiAddLaporan);
     laporankerusakan::updateOrCreate($ValidasiAddLaporan);
     return back();
    }

    public function UpdateLaporanKerusakan(Request $request)
    {
        
    }
}
