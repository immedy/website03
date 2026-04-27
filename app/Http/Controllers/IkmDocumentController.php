<?php

namespace App\Http\Controllers;

use App\Models\IkmDocument;
use App\Models\referensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class IkmDocumentController extends Controller
{
    public function index()
    {
        return view('DashboardPage.ikm.index', [
            'documents' => IkmDocument::with(['pegawai', 'sumberDokemen'])->latest('id')->get(),
            'data' => referensi::where('jenisreferensi', 9)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => ['required', 'string', 'max:255'],
            'link_dokumen' => ['required', 'string'],
            'sumber_dokemen' => ['required', 'exists:referensis,id'],
            'status' => ['nullable'],
        ],[
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'link_dokumen.required' => 'Link dokumen wajib diisi.',
            'sumber_dokemen.required' => 'Sumber dokumen wajib dipilih.',
            'sumber_dokemen.exists' => 'Sumber dokumen yang dipilih tidak valid.',
        ]);

        $pegawaiId = Auth::user()?->pegawai_id;
        if (!$pegawaiId) {
            return back()->withErrors(['pegawai_id' => 'Pegawai belum terhubung ke akun login.'])->withInput();
        }

        IkmDocument::create([
            'deskripsi' => $validated['deskripsi'],
            'link_dokumen' => $validated['link_dokumen'],
            'sumber_dokemen' => $validated['sumber_dokemen'] ?? null,
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
            'sumber_dokemen' => ['required', 'exists:referensis,id'],
            'status' => ['nullable'],
        ],[
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'link_dokumen.required' => 'Link dokumen wajib diisi.',
            'sumber_dokemen.required' => 'Sumber dokumen wajib dipilih.',
            'sumber_dokemen.exists' => 'Sumber dokumen yang dipilih tidak valid.',
        ]);

        $document->update([
            'deskripsi' => $validated['deskripsi'],
            'link_dokumen' => $validated['link_dokumen'],
            'sumber_dokemen' => $validated['sumber_dokemen'] ?? null,
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
