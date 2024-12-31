<?php

namespace App\Http\Controllers;

use App\Charts\VehicleCategoryChart;
use App\Models\DataAset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class UserController extends Controller
{
    public function index()
    {
        return view('/landingpage', [

        ]);
    }

    public function login()
    {
        return view('/login');
    }

    public function admindashboard(VehicleCategoryChart $vehiclechart)
    {
        $activities = Activity::join('users', 'users.id', '=', 'activity_log.causer_id')
                              ->select('activity_log.description', 'users.employee_name', 'activity_log.properties', 'activity_log.created_at',
                                       'users.access')
                              ->get();
        
        $user = User::count();

        $asset = DataAset::count();

        return view('/admindashboard', ['vehiclechart' => $vehiclechart->build()])
             ->with(compact('activities', 'user', 'asset'));
    }

    public function pegawaidashboard(VehicleCategoryChart $vehiclechart)
    {
        $activities = Activity::join('users', 'users.id', '=', 'activity_log.causer_id')
                              ->select('activity_log.description', 'users.employee_name', 'activity_log.properties', 'activity_log.created_at', 
                                       'users.access')
                              ->where('activity_log.properties->asset_holder', '=', Auth::user()->id)
                              ->get();

        return view('/pegawaidashboard', ['vehiclechart' => $vehiclechart->build()])
        
        ->with(compact('activities'));
    }

    public function authenticate(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'max:250'],
            'password' => ['required', 'min:6', 'max:10']
        ]);
        
        // Mencari pengguna berdasarkan email
        $user = User::where('email', $validatedData['email'])->first();
        
        // Memastikan bahwa pengguna ditemukan dan kredensialnya cocok
        if ($user && Auth::attempt($validatedData)) {
            // Regenerasi sesi setelah login
            $request->session()->regenerate();

            //Cek apakah ini login pertama kali
            if ($user->is_first_login) {
                $user->is_first_login = false;

                $user->save();

                return redirect()->route('registrasi')->with('success', 'Berhasil Login, Silahkan Perbarui Data Anda');
            }
        
            // Memeriksa akses pengguna (misalnya field 'access' di tabel user)
            $access = $user->access;
        
            // Logika untuk menentukan redirect berdasarkan akses pengguna
            switch ($access) {
                case 'Admin':
                    return redirect()->intended('/admin-dashboard')->with('success', 'Login Berhasil! Selamat datang Admin.');
                
                case 'Staf Pegawai':
                    return redirect()->intended('/pegawai-dashboard')->with('success', 'Login Berhasil! Selamat datang Pegawai.');
                
                case 'Kepala Bidang':
                    return redirect()->intended('/kabid-dashboard')->with('success', 'Login Berhasil! Selamat Datang Kabid');
                
                case 'Kepala Dinas':
                    return redirect()->intended('/kabid-dashboard')->with('success', 'Login Berhasil! Selamat Datang Kepala Dinas');
            }
        }
        
        // Jika login gagal
        return back()->with('loginerror', 'Login Gagal! Masukkan Email/Password yang benar');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function registration()
    {
        $activities = Activity::join('users', 'users.id', '=', 'activity_log.causer_id')
                              ->select('activity_log.description', 'users.employee_name', 'activity_log.properties', 'activity_log.created_at',
                                       'users.access')
                              ->get();
        
        $user = Auth::user();

        return view('/registrasi', compact('activities', 'user'));
    }
}
