<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\carousel;
use App\Models\dokter;
use App\Models\dokumen;
use App\Models\instalasi;
use App\Models\jadwaldokter;
use App\Models\laporankerusakan;
use App\Models\MenuUtama;
use App\Models\ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\FlareClient\View;

class MenuUtamaController extends Controller
{
    public function HalamanUtama()
    {
        return view('LandingPage.Konten.index',[
            'berita' => berita::latest()->paginate(3),
            'dokter' => dokter::where('status', 1)->get(),
            'instalasi' => instalasi::where('status',1)->get(),
            'carosel' => carousel::all()
        ]);
    }
    public function index()
    {
        return view('DashboardPage.Index', [
            'Menu' => MenuUtama::all(),
            'LaporanPengirim' => laporankerusakan::all(),
            'ruangan' => ruangan::where('penerima_order',1)->get(),
            'dokumen' => dokumen::latest()->get(),
            'carousel' => carousel::latest()->get(),
        ]);
    }
    public function AddDokumen(Request $request)
    {
        $ValidasiDokumen = $request->validate([
            'dokumen' => 'required',
            'link' => 'required'
        ]);
        dokumen::updateOrInsert($ValidasiDokumen);
        if($ValidasiDokumen){
            Alert::success('Berhasil');
        }
        return back();

    }
    public function editor()
    {
        return view('DashboardPage.Createfile.CreateMenu');
    }
    public function TambahEdit(Request $request)
    {

        $id = $request->id;
        $ValidasiMenu = $request->validate([
            'judul' => 'required',
            'gambar' => "mimes:png,jpg|max:1028|nullable",
            'konten' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $ValidasiMenu['gambar'] = $request->file('gambar')->store('GambarMenuUtama');
        }

        MenuUtama::updateOrInsert(['id' => $id, 'user' => 1], $ValidasiMenu);

        if ($ValidasiMenu) {
            Alert::success('Berhasil');
        }

        return redirect('/dashboard');
    }
    public function Hapus($id)
    {
        $Menu = MenuUtama::findOrFail($id);

        if (!empty($Menu->gambar)) {
            Storage::delete($Menu->gambar);
        }

        $Menu->delete();

        if ($Menu) {
            Alert::success('Berhasil Dihapus');
        }

        return back();
    }
    public function show ($id)
    {
        return view('DashboardPage.Createfile.DetailMenu',[
            'show' => MenuUtama::findOrFail($id)
        ]);
        
    }
    public function Kesalahan()
    {
        return view('LandingPage.Erorr.Eror');
    }

    public function JadwalDokter()
    {
        return view('LandingPage.Konten.JadwalDokter.JadwalDokter',[
            'jadwalDokter' =>jadwaldokter::where('status_aktif', 1)->get()
        ]);
    }

    public function AddCrousel(Request $request)
    {
        $ValidasiCarosel = $request->validate([
            "carusel" => 'required|mimes:png,jpg|max:1028'
        ]);
        if ($request->hasFile('carusel')){
            $ValidasiCarosel['carusel']= $request->file('carusel')->store('GambarCarusel');
        }
        $ValidasiCarosel['status'] = 1;
        carousel::create($ValidasiCarosel);
        if($ValidasiCarosel){
            Alert::success('Berhasil');
        }
        return back();
    }
    public function informasiPublik()
    {
        return view('LandingPage.Konten.PPID.InformasiPublik');
    }
    public function informasiBerkala()
    {
        return view('LandingPage.Konten.PPID.InformasiBerkala');
    }
    public function informasiSertaMerta()
    {
        return view('LandingPage.Konten.PPID.InformasiSertaMerta');
    }
    public function informasiDiKecualikan()
    {
        return view('LandingPage.Konten.PPID.InformasiDiKecualikan');
    }
    public function informasiSetiapSaat()
    {
        return view('LandingPage.Konten.PPID.InformasiSetipaSaat');
    }
}
