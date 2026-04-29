<?php

namespace App\Http\Controllers;

use App\Models\direktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DirekturController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_lengkap' => 'required',
            'deskripsi' => 'required',
            'awal_periode' => 'required|date',
            'akhir_periode' => 'nullable|date|after:awal_periode',
            'foto_direktur' => 'required|image|mimes:jpeg,png,jpg|max:548',
        ],[
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'awal_periode.required' => 'Tanggal awal menjabat wajib diisi.',
            'awal_periode.date' => 'Tanggal awal menjabat harus berupa tanggal yang valid.',
            'akhir_periode.date' => 'Tanggal akhir menjabat harus berupa tanggal yang valid.',
            'akhir_periode.after' => 'Tanggal akhir menjabat harus setelah tanggal awal menjabat.',
            'foto_direktur.required' => 'Foto direktur wajib diunggah.',
            'foto_direktur.image' => 'File yang diunggah harus berupa gambar.',
            'foto_direktur.mimes' => 'Format gambar harus jpeg, png, atau jpg.',
            'foto_direktur.max' => 'Ukuran gambar tidak boleh lebih dari 548 KB.',
        ]);
        $validateData['pegawai_id'] = auth()->user()->id;
        if ($request->hasFile('foto_direktur')) {
            $validateData['foto_direktur'] = $request->file('foto_direktur')->store('FotoDirektur');
        }
        direktur::create($validateData);
        if ($validateData){
            Alert::success('Sukses', 'Data Direktur Berhasil Disimpan');
        }   
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $direktur = direktur::findOrFail($id);

        $validateData = $request->validate([
            'nama_lengkap' => 'required',
            'deskripsi' => 'required',
            'awal_periode' => 'required|date',
            'akhir_periode' => 'nullable|date|after:awal_periode',
            'foto_direktur' => 'nullable|image|mimes:jpeg,png,jpg|max:548',
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'awal_periode.required' => 'Tanggal awal menjabat wajib diisi.',
            'awal_periode.date' => 'Tanggal awal menjabat harus berupa tanggal yang valid.',
            'akhir_periode.date' => 'Tanggal akhir menjabat harus berupa tanggal yang valid.',
            'akhir_periode.after' => 'Tanggal akhir menjabat harus setelah tanggal awal menjabat.',
            'foto_direktur.image' => 'File yang diunggah harus berupa gambar.',
            'foto_direktur.mimes' => 'Format gambar harus jpeg, png, atau jpg.',
            'foto_direktur.max' => 'Ukuran gambar tidak boleh lebih dari 548 KB.',
        ]);

        $validateData['pegawai_id'] = auth()->user()->id;

        if ($request->hasFile('foto_direktur')) {
            if ($direktur->foto_direktur && Storage::exists($direktur->foto_direktur)) {
                Storage::delete($direktur->foto_direktur);
            }
            $validateData['foto_direktur'] = $request->file('foto_direktur')->store('FotoDirektur');
        }

        $direktur->update($validateData);
        Alert::success('Sukses', 'Data Direktur Berhasil Diperbarui');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $direktur = direktur::findOrFail($id);

        if ($direktur->foto_direktur && Storage::exists($direktur->foto_direktur)) {
            Storage::delete($direktur->foto_direktur);
        }

        $direktur->delete();
        Alert::success('Sukses', 'Data Direktur Berhasil Dihapus');

        return redirect()->back();
    }
}
