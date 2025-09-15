<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\galery;
use App\Models\instalasi;
use App\Models\layanan;
use App\Models\referensi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class InformasiController extends Controller
{
    public function BeritaLandingPage()
    {
        return view('LandingPage.Konten.Informasi.berita',[
            'berita' => berita::latest()->get(),
            'instalasi' => instalasi::all()
        ]);
    }
    public function BeritaLandingPageDetail($id)
    {
        // $EnkripsiId = Crypt::decryptString($id);
        return view('LandingPage.Konten.Informasi.detailberita',[
            'detailberita' => berita::where('slug',$id)->first(),
            'instalasi' => instalasi::all()
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
        return view('DashboardPage.informasi.sub.createBerita',[
            'kategori' => referensi::where('jenisreferensi', 8)->get()
        ]);
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
        $ValidasiBerita['slug'] = Str::slug($request->judul, '-');
        berita::updateOrCreate(['id'=>$id,'ruangan'=>1, 'user_id'=>Auth::user()->pegawai->id, 'expert' => Str::limit(strip_tags($request->kontent, 70))], $ValidasiBerita);
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
    public function InformasiPublic()
    {
        return view('LandingPage.Konten.Informasi.InformasiPublik');
    }
    
    public function galeryLandingPage()
    {
        return view('LandingPage.Konten.Informasi.galeri',[
            'galery' => galery::latest()->get()
        ]);
    }
    public function galeryDashboardPage()
    {
        return view('DashboardPage.informasi.galery',[
            'galery' => galery::latest()->get()
        ]);
    }
    public function addImagesToGalery(Request $request)
    {
        $dataValidate = $request->validate([
            'keterangan'    => 'required',
            'galery'        => 'required|mimes:png,jpg|max:1028',
        ],[
            'keterangan.required'   => 'Keterangan tidak boleh kosong',
            'galery.required'       => 'File Tidak Boleh Kosong',
            'galery.mimes'          => 'File Format tidak didukung',
        ]);
        if ($request->hasFile('galery')){
            $dataValidate['galery']= $request->file('galery')->store('Galery');
        }
        galery::create($dataValidate);
        if($dataValidate){
            Alert::Success('gambar berhasil di upload');
        }
        return back();
    }

    public function deleteImagesToGalery($id)
    {
        $deleteGalery = galery::findOrFail($id);
        if(!empty($deleteGalery->galery)){
            Storage::delete($deleteGalery->galery);
        }
        $deleteGalery->delete();
        if ($deleteGalery){
            Alert::success('Berita Berhasil di Hapus');
        }
        return back();
    }

}
