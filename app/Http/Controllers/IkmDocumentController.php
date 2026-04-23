<?php

namespace App\Http\Controllers;

use App\Models\IkmDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class IkmDocumentController extends Controller
{
    public function index()
    {
        return view('DashboardPage.ikm.index', [
            'documents' => IkmDocument::with('pegawai')->latest('id')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => ['required', 'string', 'max:255'],
            'link_dokumen' => ['required', 'string'],
            'status' => ['nullable'],
        ]);

        $pegawaiId = Auth::user()?->pegawai_id;
        if (!$pegawaiId) {
            return back()->withErrors(['pegawai_id' => 'Pegawai belum terhubung ke akun login.'])->withInput();
        }

        IkmDocument::create([
            'deskripsi' => $validated['deskripsi'],
            'link_dokumen' => $validated['link_dokumen'],
            'status' => $request->boolean('status'),
            'pegawai_id' => $pegawaiId,
        ]);

        Alert::success('Berhasil', 'Dokumen IKM ditambahkan.');
        return back();
    }

    public function update(Request $request, $id)
    {
        $document = IkmDocument::findOrFail($id);

        $validated = $request->validate([
            'deskripsi' => ['required', 'string', 'max:255'],
            'link_dokumen' => ['required', 'string'],
            'status' => ['nullable'],
        ]);

        $document->update([
            'deskripsi' => $validated['deskripsi'],
            'link_dokumen' => $validated['link_dokumen'],
            'status' => $request->boolean('status'),
        ]);

        Alert::success('Berhasil', 'Dokumen IKM diperbarui.');
        return back();
    }

    public function destroy($id)
    {
        $document = IkmDocument::findOrFail($id);
        $document->delete();

        Alert::success('Berhasil', 'Dokumen IKM dihapus.');
        return back();
    }
}
