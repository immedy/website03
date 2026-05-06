<?php

namespace App\Http\Controllers;

use App\Models\IkmDocument;
use App\Models\IkmSurvei;
use App\Models\referensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

    public function survey()
    {
        return view('DashboardPage.ikm.survei', [
            'surveis' => IkmSurvei::with('pegawai')->latest('id')->get(),
        ]);
    }

    public function surveyStore(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => ['required', 'string', 'max:255'],
            'dokumen' => ['required', 'file', 'mimes:pdf', 'max:10240'],
        ], [
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'dokumen.required' => 'Dokumen wajib diunggah.',
            'dokumen.file' => 'Dokumen harus berupa file.',
            'dokumen.mimes' => 'Dokumen harus berformat PDF.',
            'dokumen.max' => 'Ukuran dokumen maksimal 10 MB.',
        ]);

        $pegawaiId = Auth::user()?->pegawai_id;
        if (!$pegawaiId) {
            return back()->withErrors(['pegawai_id' => 'Pegawai belum terhubung ke akun login.'])->withInput();
        }

        IkmSurvei::create([
            'deskripsi' => $validated['deskripsi'],
            'dokumen' => $request->file('dokumen')->store('IkmSurvei'),
            'status' => true,
            'pegawai_id' => $pegawaiId,
        ]);

        Alert::success('Berhasil', 'Survei berhasil ditambahkan.');
        return back();
    }

    public function surveyUpdate(Request $request, $id)
    {
        $survei = IkmSurvei::findOrFail($id);

        $validated = $request->validate([
            'deskripsi' => ['required', 'string', 'max:255'],
            'dokumen' => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
        ], [
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'dokumen.file' => 'Dokumen harus berupa file.',
            'dokumen.mimes' => 'Dokumen harus berformat PDF.',
            'dokumen.max' => 'Ukuran dokumen maksimal 10 MB.',
        ]);

        $data = [
            'deskripsi' => $validated['deskripsi'],
        ];

        if ($request->hasFile('dokumen')) {
            if ($survei->dokumen && Storage::exists($survei->dokumen)) {
                Storage::delete($survei->dokumen);
            }

            $data['dokumen'] = $request->file('dokumen')->store('IkmSurvei');
        }

        $survei->update($data);

        Alert::success('Berhasil', 'Survei berhasil diperbarui.');
        return back();
    }

    public function surveyDestroy($id)
    {
        $survei = IkmSurvei::findOrFail($id);

        if ($survei->dokumen && Storage::exists($survei->dokumen)) {
            Storage::delete($survei->dokumen);
        }

        $survei->delete();

        Alert::success('Berhasil', 'Survei berhasil dihapus.');
        return back();
    }
}
