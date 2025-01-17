<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\instalasi;
use App\Models\referensi;
use App\Models\kritiksaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KritikSaranController extends Controller
{
    public function index()
    {
        return view('LandingPage.Konten.KritikSaran',[
            'nilai' => referensi::where('jenisreferensi',1)->get(),
            'instalasi' => instalasi::all()
        ]);
    }
    public function show()
    {
        return view('DashboardPage.KritikSaran.KritikSaran',[
            'KritikSaran' => kritiksaran::all()
        ]);
    }
    public function TampilPesan($id)
    {
        $pesan = kritiksaran::find($id);
        return response()->json($pesan);
    }

    public function Kirim(Request $request)
    {
        $ValidasiKritikSaran = $request->validate([
            'nama'          => 'required',
            'notelepon'     => 'required',
            'alamat'        => 'required',
            'kritiksaran'   => 'required',
            'nilai'         => 'required',
            'kecurangan'    => 'required',
        ]);
        
        kritiksaran::create($ValidasiKritikSaran);
        if ($ValidasiKritikSaran){
            Alert::Success('Terima Kasih
            Kritik dan Saran Anda Membantu Kami Menjadi Lebih Baik');
        }
        return back();
    }
}
