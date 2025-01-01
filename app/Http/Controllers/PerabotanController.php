<?php

namespace App\Http\Controllers;

use App\Models\DataAset;
use App\Models\JenisAset;
use App\Models\Perabotan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class PerabotanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::with('causer:id,employee_name,access') // Menggunakan eager loading untuk menghindari join manual
        ->select('description', 'causer_id', 'properties', 'created_at')
        ->get();

        $user = Auth::user();

        $userRole = $user->access;

        $asset_holder = User::all();

        $user_entry = $user->id;

        $query = Perabotan::join('jenis_asets', 'jenis_asets.id', '=', 'perabotans.sub_category')
        ->join('pegawais', 'pegawais.id', '=', 'perabotans.asset_holder')
        ->select('perabotans.id_asset', 'jenis_asets.asset_category', 'jenis_asets.sub_category', 'perabotans.asset_name',
                 'perabotans.brand', 'perabotans.type', 'perabotans.specification', 'perabotans.warranty_period',
                 'perabotans.price', 'perabotans.quantity', 'perabotans.condition', 'perabotans.description',
                 'pegawais.employee_name');

        $furniture = $query->paginate(10)->withQueryString();

        return view('/perabotan ', compact('furniture', 'asset_holder', 'user_entry', 'activities'));
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
            'id_asset' => ['required', 'unique:perabotans'],
            'sub_category' => [],
            'asset_name' => ['required'],
            'brand' => [],
            'type' => [],
            'specification' => [],
            'warranty_period' => [],
            'price' => ['required'],
            'quantity' => ['required'],
            'condition' => ['required'],
            'description' => [],
            'asset_holder' => ['required'],
            'user_entry' => ['required']
        ]);

        $validatedAset = $request->validate([
            'id_asset' => ['required', 'unique:data_asets'],
            'asset_category' => ['required'],
            'sub_category' => [],
            'user_entry' => ['required'],
            'description' => []
        ]);

        DataAset::create($validatedAset);
        
        Perabotan::create($validatedData);

        $furniture = DataAset::where('id_asset', $validatedData['id_asset'])->value('id');

        Perabotan::where('id_asset', $validatedData['id_asset'])->update(['id' => $furniture]);

        return redirect('/perabotan')->with('success', 'Data Aset Perabotan & Alat Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Perabotan $perabotan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perabotan $perabotan)
    {
        return view('/editperabotan', [
            "furniture" => $perabotan,
            "category" => JenisAset::select('id', 'asset_category', 'sub_category')->where('id', $perabotan->sub_category)->get(),
            "holder" => User::select('id', 'employee_name')->where('id', $perabotan->asset_holder)->get(),
            "asset_holder" => User::select('id', 'employee_name')->whereNot('id', $perabotan->asset_holder)->get(),
            "user_entry" => User::where('employee_name', Auth::user()->employee_name)->first()->id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perabotan $perabotan)
    {
        $validateData = $request->validate([
            'sub_category' => [],
            'asset_name' => ['required'],
            'brand' => [],
            'type' => [],
            'specification' => [],
            'warranty_period' => [],
            'price' => ['required'],
            'quantity' => ['required'],
            'condition' => ['required'],
            'description' => [],
            'asset_holder' => ['required'],
            'user_entry' => ['required']
        ]);

        $validatedAset = $request->validate([
            'asset_category' => ['required'],
            'sub_category' => [],
            'user_entry' => ['required'],
            'description' => []
        ]);

        Perabotan::where('id_asset', $perabotan->id_asset)->update($validateData);

        DataAset::where('id_asset', $perabotan->id_asset)->update($validatedAset);

        return redirect('/perabotan')->with('success', 'Data Aset Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perabotan $perabotan)
    {
        Perabotan::destroy($perabotan->id);

        return redirect('/perabotan')->with('success', 'Data Aset Berhasil Dihapus');
    }
}
