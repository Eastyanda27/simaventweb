<?php

namespace App\Http\Controllers;

use App\Models\DataAset;
use App\Models\RiwayatAset;
use Illuminate\Http\Request;

class RiwayatAsetController extends Controller
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
            'id_history' => ['required'],
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'id_asset' => ['required'],
            'user_entry' => ['required'],
        ]);

        RiwayatAset::create([
            'id_history' => $validatedData['id_history'],
            'user_entry' => $validatedData['user_entry'],
            'id_asset' => $validatedData['id_asset'],
            'latitude' => $validatedData['latitude'],
            'longitude' => $validatedData['longitude'],
            'reported_at' => now(),
        ]);

        $id_asset = DataAset::where('id', $validatedData['id_asset'])->value('id_asset');

        return redirect('/aset'. '/'. $id_asset. '/view')->with('success', 'Data Riwayat Agenda Aset Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(RiwayatAset $riwayatAset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RiwayatAset $riwayatAset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RiwayatAset $riwayatAset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RiwayatAset $riwayatAset)
    {
        //
    }
}
