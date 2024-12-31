<?php

namespace App\Http\Controllers;

use App\Models\DataAset;
use App\Models\KeuanganAset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeuanganAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'id_finance' => ['required', 'unique:keuangan_asets'],
            'id_asset' => ['required'],
            'category' => ['required'],
            'date' => ['required'],
            'nominal' => ['required'],
            'description' => ['required'],
            'user_entry' => ['required']
        ]);

        $id_asset = DataAset::where('id', $validatedData['id_asset'])->select('id_asset', 'asset_name')->first();

        $finance = KeuanganAset::create($validatedData);

        // Mencatat log aktivitas
        activity()
            ->causedBy(Auth::user())
            ->performedOn($finance)
            ->withProperties([
                'id_asset' => $id_asset->id_asset, 
                'asset_name' => $id_asset->asset_name, 
                'category' => $finance->category,
                'description' => $finance->description
            ])
            ->log('Data Riwayat Keuangan Aset Ditambahkan');

        return redirect('/aset'. '/'. $id_asset->id_asset. '/view')->with('success', 'Data Riwayat Keuangan Aset Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(KeuanganAset $keuanganAset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KeuanganAset $keuanganAset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KeuanganAset $keuanganAset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KeuanganAset $keuanganAset)
    {
        //
    }
}
