<?php

namespace App\Http\Controllers;

use App\Models\dokter;
use App\Models\jadwaldokter;
use App\Models\referensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DokterController extends Controller
{
    public function index()
    {
        return view('DashboardPage.Dokter.dokter',[
            'JenisDokter' => referensi::where('jenisreferensi',4)->get(),
            'dokter' => dokter::where('status',1)->get(),
            'jadwalDokter' => referensi::where('jenisreferensi',9)->get()
        ]);
    }
    public function addDokter(Request $request)
    {
        $id = $request->id;
        $AddDokter = $request->validate([
            'spesialis' => 'required',
            'nama'      => 'required',
            'gambar' => 'required|mimes:png,jpg|max:200'
        ]);
        $AddDokter['gambar']= $request->file('gambar')->store('gambarDokter');
        
        dokter::updateOrCreate(['id' => $id, 'status' => 1],$AddDokter);
        if($AddDokter){
            Alert::Success('Dokter Berhasil Terinput');
        }
        return back();
    }

    public function InputJadwalDokter($id)
    {
        $JadwalDokter = dokter::find($id);
        return response()->json($JadwalDokter);
    }

    public function addJadwalDokter (Request $request)
    {
        $dokterid = $request->dokter_id;
        $validasiData = $request->validate([
            'dokter_id' => 'required',
            'senin' => 'required',
            'selasa' => 'required',
            'rabu' => 'required',
            'kamis' => 'required',
            'jumat' => 'required',
            'dari' => 'required',
            'sampai' => 'required'
        ],[
            'dokter_id.required' => 'Pilih Dokter',
            'senin.required' => 'Pilih Senin',
            'selasa.required' => 'Pilih Selasa',
            'rabu.required' => 'Pilih Rabu',
            'kamis.required' => 'Pilih Kamis',
            'jumat.required' => 'Pilih Jumat',
            'dari.required' => 'Pilih Tanggal',
            'sampai.required' => 'Pilih Tanggal',
            
        ]);
        jadwaldokter::updateOrInsert(['dokter_id' => $dokterid ,'status_aktif' => 1], $validasiData);
        if ($validasiData){
            Alert::Success('Jadwal Dokter Berhasil Ditambahkan');
        }
        return back();
    }
    public function nonAktif($id)
    {
        $Dokter = dokter::find($id);
        return response()->json($Dokter);
    }

    public function updateStatusDokter(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
        ]);
    
        try {
            DB::transaction(function () use ($validatedData) {
                dokter::where('id', $validatedData['id'])->update(['status' => 0]);
                jadwaldokter::where('dokter_id', $validatedData['id'])->update(['status_aktif' => 0]);
            });
    
            Alert::success('Dokter dan Jadwal Berhasil Dinonaktifkan');
        } catch (\Exception $e) {
            Alert::error('Terjadi Kesalahan', $e->getMessage());
        }
    
        return back();
    }
}
