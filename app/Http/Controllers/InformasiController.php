<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        return view('DashboardPage.informasi.berita');
    }
    public function beritacreate()
    {
        return view('DashboardPage.informasi.sub.createBerita');
    }
    public function simpan(Request $request)
    {
        dd($request);
    }
}
