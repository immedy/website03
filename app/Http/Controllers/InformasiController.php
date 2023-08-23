<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class InformasiController extends Controller
{
    public function BeritaLandingPage()
    {
        return view('LandingPage.Konten.Informasi.berita',[
            'berita' => berita::all()
        ]);
    }
    public function BeritaLandingPageDetail($id)
    {
        $EnkripsiId = Crypt::decryptString($id);
        return view('LandingPage.Konten.Informasi.detailberita',[
            'detailberita' => berita::findOrFail($EnkripsiId)
        ]);
    }
    public function index()
    {
        return view('DashboardPage.informasi.berita',[
            'berita' => berita::all()
        ]);
    }
    public function beritacreate()
    {
        return view('DashboardPage.informasi.sub.createBerita');
    }
    public function simpanOrUpdate(Request $request)
    {
        $id = $request->id;
        $ValidasiBerita = $request->validate([
            'judul' => 'required',
            'kontent' => 'required',
            'kategori' => 'required',
            'gambar' => 'required|mimes:png,jpg|max:1028',
        ]);
       
        if($request->hasFile('gambar')){
            $ValidasiBerita['gambar']= $request->file('gambar')->store('GambarBerita');
        }

        berita::updateOrCreate(['id'=>$id,'ruangan'=>1, 'user_id'=>1, 'expert' => Str::limit(strip_tags($request->kontent, 70))], $ValidasiBerita);
        if($ValidasiBerita){
            Alert::Success('Berita Berhasil Terpost');
        }
        return redirect('/dashboard/berita');
    }
    public function detailberita($id)
    {
        return view('DashboardPage.informasi.sub.editBerita',[
            'berita'   => berita::findOrFail($id)
        ]);
    }
    public function hapusberita($id)
    {
        $hapusberita = berita::findOrFail($id);
        if(!empty($hapusberita->gambar)){
            Storage::delete($hapusberita->gambar);
        }
        $hapusberita->delete();
        if ($hapusberita){
            Alert::success('Berita Berhasil di Hapus');
        }
        return back();
    }
    
}
