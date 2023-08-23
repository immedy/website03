<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstalasiController extends Controller
{
    public function index()
    {
        return view('DashboardPage.Instalasi.instalasi');
    }
    public function CreateInstalasi()
    {
        return view('DashboardPage.Createfile.createinstalasi');
    }
}
