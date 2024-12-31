<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::join('users', 'users.id', '=', 'activity_log.causer_id')
                              ->select('activity_log.description', 'users.employee_name', 'activity_log.properties', 'activity_log.created_at',
                                       'users.access')
                              ->get();

        return view('/pegawai ', [
            "employee" => Pegawai::join('users', 'users.id', '=', 'pegawais.id')
                                 ->select('users.email', 'users.nip', 'pegawais.employee_name', 'users.access', 
                                          'pegawais.place_birth', 'pegawais.date_birth', 'pegawais.group', 'pegawais.rank', 
                                          'pegawais.gender', 'pegawais.last_education', 'pegawais.agency', 'pegawais.work_unit', 
                                          'pegawais.position', 'pegawais.id_user')
                                 ->paginate(10)->withQueryString()
        ])->with(compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_user' => ['required', 'unique:users'],
            'employee_name' => ['required', 'max:50'],
            'email' => ['required', 'unique:users'],
            'nip' => [],
            'password' => ['required', 'min:6', 'max:12'],
            'access' => ['required']
        ]);
    
        // Encrypt password for User model
        $validatedData['password'] = bcrypt($validatedData['password']);
    
        // Create User data
        $user = User::create($validatedData);
    
        // Create Pegawai data using validated data
        Pegawai::create([
            'id_user' => $user->id,
            'employee_name' => $validatedData['employee_name'],
            'email' => $validatedData['email'],
            'nip' => $validatedData['nip'],
        ]);
    
        return redirect('/pegawai')->with('success', 'Berhasil Membuat Akun');
    }
   
    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        $employee = $pegawai;

        $activities = Activity::join('users', 'users.id', '=', 'activity_log.causer_id')
                              ->select('activity_log.description', 'users.employee_name', 'activity_log.properties', 'activity_log.created_at',
                                       'users.access')
                              ->get();
        
        $access = User::select('access')->where('id_user', $pegawai->id_user)->get();

        return view('/editpegawai')->with(compact('activities', 'employee', 'access'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $validatedData = $request->validate([
            'email' => ['required'],
            'employee_name' => ['required', 'max:50'],
            'nip' => [],
            'access' => ['required']
        ]);

        User::where('id_user', $pegawai->id_user)->update($validatedData);

        return redirect('/pegawai')->with('success', 'Data Akun Pegawai Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $user = User::findOrFail($pegawai->id);

        $pegawai->delete();
        $user->delete();

        return redirect('/pegawai')->with('success', 'Data Pegawai Berhasil Dihapus');
    }

    public function registration(Request $request)
    {
        $user = Auth::user();

        $id_user = $user->id_user;

        $validatedData = $request->validate([
            'employee_name' => ['required', 'max:50'],
            'nip' => ['required'],
            'place_birth' => ['required'],
            'date_birth' => ['required'],
            'group' => [],
            'rank' => [],
            'gender' => ['required'],
            'last_education' => ['required'],
            'agency' => [],
            'work_unit' => [],
            'position' => []
        ]);

        $validatedImage = $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,svg,webp']
        ]);

        if($request->hasFile('image')) {
            // Mendapatkan nama file
            $imageName = time().'.'.$validatedImage['image']->extension();  
        
            // Simpan file ke public/images
            $validatedImage['image']->move(public_path('Image/Foto Profil'), $imageName);

            Pegawai::where('id_user', $id_user)->update(['profile_photo' => 'Image/Foto Profil/' . $imageName]);
        }

        Pegawai::where('id_user', $id_user)->update($validatedData);

        $access = $user->access;

        switch ($access) {
            case 'Admin':
                return redirect()->intended('/admin-dashboard')->with('success', 'Login Berhasil! Selamat datang Admin.');
            
            case 'Staf Pegawai':
                return redirect()->intended('/pegawai-dashboard')->with('success', 'Login Berhasil! Selamat datang Pegawai.');
            
            case 'Kepala Bidang':
                return redirect()->intended('/kabid-dashboard')->with('success', 'Login Berhasil! Selamat Datang Kabid');
        }
    }

    public function reset(Pegawai $pegawai)
    {
        $password = bcrypt('12345678');

        User::where('id_user', $pegawai->id_user)->update(['password' => $password]);

        return redirect('/pegawai')->with('success', 'Akun Pegawai telah Direset');
    }
}
