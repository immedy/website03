<?php

namespace App\Http\Controllers;

use App\Models\MenuUtama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class MenuUtamaController extends Controller
{
    public function index()
    {
        return view('DashboardPage.Index', [
            'Menu' => MenuUtama::all()
        ]);
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

        MenuUtama::updateOrCreate(['id' => $id, 'user' => 1], $ValidasiMenu);

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
    
}
