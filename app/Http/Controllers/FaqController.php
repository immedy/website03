<?php

namespace App\Http\Controllers;

use App\Models\faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class FaqController extends Controller
{
    public function indexDashboard()
    {
        return view('DashboardPage.faq.index', [
            'faqs' => faq::with('pegawai')
                ->orderByDesc('status')
                ->orderBy('urutan')
                ->orderByDesc('created_at')
                ->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string',
            'urutan' => 'nullable|integer|min:0',
            'status' => 'nullable',
        ]);

        $data['status'] = $request->boolean('status');
        if ($request->filled('urutan')) {
            $data['urutan'] = (int) $request->input('urutan');
        } else {
            $data['urutan'] = ((int) faq::max('urutan')) + 1;
        }
        $data['pegawai_id'] = Auth::user()->pegawai->id;

        faq::create($data);
        Alert::success('Berhasil', 'FAQ berhasil ditambahkan.');

        return back();
    }

    public function update(Request $request, $id)
    {
        $faq = faq::findOrFail($id);

        $data = $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string',
            'urutan' => 'nullable|integer|min:0',
            'status' => 'nullable',
        ]);

        $data['status'] = $request->boolean('status');
        if ($request->filled('urutan')) {
            $data['urutan'] = (int) $request->input('urutan');
        } else {
            unset($data['urutan']);
        }
        $data['pegawai_id'] = Auth::user()->pegawai->id;

        $faq->update($data);
        Alert::success('Berhasil', 'FAQ berhasil diperbarui.');

        return back();
    }

    public function destroy($id)
    {
        $faq = faq::findOrFail($id);
        $faq->status = false;
        $faq->pegawai_id = Auth::user()->pegawai->id;
        $faq->save();

        Alert::success('Berhasil', 'FAQ dinonaktifkan.');

        return back();
    }
}
