<?php

namespace App\Http\Controllers;

use App\Models\DataAset;
use App\Models\Elektronik;
use App\Models\JenisAset;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class ElektronikController extends Controller
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

        $query = Elektronik::join('jenis_asets', 'jenis_asets.id', '=', 'elektroniks.sub_category')
        ->join('pegawais', 'pegawais.id', '=', 'elektroniks.asset_holder')
        ->select('elektroniks.id_asset', 'jenis_asets.asset_category', 'jenis_asets.sub_category', 'elektroniks.asset_name',
                 'elektroniks.brand', 'elektroniks.type', 'elektroniks.specification', 'elektroniks.warranty_period',
                 'elektroniks.price', 'elektroniks.quantity', 'elektroniks.condition', 'elektroniks.description',
                 'pegawais.employee_name');
        
        $electronic = $query->paginate(10)->withQueryString();

        return view('/elektronik', compact('electronic', 'asset_holder', 'user_entry', 'activities'));
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
            'id_asset' => ['required', 'unique:elektroniks'],
            'sub_category' => [],
            'asset_name' => ['required'],
            'brand' => ['required'],
            'type' => ['required'],
            'specification' => ['required'],
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
        
        Elektronik::create($validatedData);

        $elektronik = DataAset::where('id_asset', $validatedData['id_asset'])->value('id');

        Elektronik::where('id_asset', $validatedData['id_asset'])->update(['id' => $elektronik]);

        return redirect('/elektronik')->with('success', 'Data Aset Elektronik Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Elektronik $elektronik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Elektronik $elektronik)
    {
        return view('/editelektronik', [
            "electronic" => $elektronik,
            "category" => JenisAset::select('id', 'asset_category', 'sub_category')->where('id', $elektronik->sub_category)->get(),
            "holder" => User::select('id', 'employee_name')->where('id', $elektronik->asset_holder)->get(),
            "asset_holder" => User::select('id', 'employee_name')->whereNot('id', $elektronik->asset_holder)->get(),
            "user_entry" => User::where('employee_name', Auth::user()->employee_name)->first()->id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Elektronik $elektronik)
    {
        $validateData = $request->validate([
            'sub_category' => [],
            'asset_name' => ['required'],
            'brand' => ['required'],
            'type' => ['required'],
            'specification' => ['required'],
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

        Elektronik::where('id_asset', $elektronik->id_asset)->update($validateData);

        DataAset::where('id_asset', $elektronik->id_asset)->update($validatedAset);

        return redirect('/elektronik')->with('success', 'Data Aset Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Elektronik $elektronik)
    {
        Elektronik::destroy($elektronik->id);

        return redirect('/elektronik')->with('success', 'Data Aset Berhasil Dihapus');
    }
}
