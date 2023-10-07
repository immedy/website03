<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use App\Models\referensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        return view('DashboarPage.Pegawai.login');
    }

    public function pegawai()
    {
        return view('DashboardPage.Pegawai.Pegawai',[
            'pegawai' => Pegawai::with('ReferensiRuangan')->Filter()->paginate(25),
            'Ruangan' => referensi::where('jenisreferensi',5)->get(),
            'hakakses' => referensi::where('jenisreferensi',6)->get()
        ]);
    }

    public function CariUsername($id)
    {
        $username = Pegawai::with('user')->find($id);
        return response()->json($username);
    }

    public function AddorUpdate(Request $request)
    {
        $id = $request ->id;
        $ValidasiUser = $request->validate([
            'pegawai_id' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
        $ValidasiUser['password'] = bcrypt($ValidasiUser['password']);
        $ValidasiUser['status'] = 1;
        $pegawai_id = $ValidasiUser['pegawai_id'];
        User::updateOrInsert(['pegawai_id'=>$pegawai_id], $ValidasiUser);
        if ($ValidasiUser){
            Alert::success('Berhasil');
        }
        return back();
    }
     public function AddOrUpdatePegawai(Request $request)
     {
        $id = $request->id;
        $ValidasiPegawai = $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'ruangan' => 'required',
            
        ]);
        $ValidasiPegawai['status'] = 1;
        // dd($ValidasiPegawai);
        Pegawai::updateOrCreate(['id'=> $id],$ValidasiPegawai);
        if($ValidasiPegawai){
            Alert::success('Berhasil');
        }
        return back();
     }

     public function HalamanLogin()
     {
        return view('DashboardPage.Layout.login');
     }

     public function HakAkses($id)
     {
        // $EnkripsiId = Crypt::decryptString($id);

        return view('DashboardPage.Pegawai.Hakakses',[
            'pegawai' => Pegawai::findOrFail($id),
            'Permission' => Permission::all()
        ]);
     }

     public function AddHakAkses(Request $request)
     {
        // Validasi request di sini jika diperlukan

        $user = User::findOrFail($request->id); // Mengambil objek User berdasarkan ID
        $permission = $request->permission_id; // Mendapatkan izin yang dipilih dari formulir

        // Memberikan izin menggunakan syncPermissions
        $user->givePermissionTo([$permission]);

    Alert::success('Berhasil', 'Izin diberikan dengan sukses');

    return back();
     }
     public function Autentikasi(Request $request)
     {
         $credentials = $request->validate([
             'username' => ['required'],
             'password' => ['required'],
         ]);
 
         if (Auth::attempt($credentials)) {
             $credentials = auth()->user();
             if ($credentials->status == '1' && $credentials->status == '1') {
                 $request->session()->regenerate();              
                 Alert::Toast('Selamat Datang','success');
                 return redirect('/dashboard');
             } else {
                 auth()->logout();
             }
         }
         Alert::error('Username Dan Password Telah Dimusnahkan');
         return back();
     }
     public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
