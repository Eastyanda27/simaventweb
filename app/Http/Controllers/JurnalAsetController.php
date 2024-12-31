<?php

namespace App\Http\Controllers;

use App\Models\DataAset;
use App\Models\JurnalAset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JurnalAsetController extends Controller
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
            'id_journal' => ['required', 'unique:jurnal_asets'],
            'id_asset' => ['required'],
            'date' => ['required'],
            'incident' => ['required'],
            'description' => [],
            'user_entry' => ['required']
        ]);

        $id_asset = DataAset::where('id', $validatedData['id_asset'])->select('id_asset', 'asset_name')->first();

        $journal = JurnalAset::create($validatedData);
        
        // Mencatat log aktivitas
        activity()
            ->causedBy(Auth::user())
            ->performedOn($journal)
            ->withProperties([
                'id_asset' => $id_asset->id_asset, 
                'asset_name' => $id_asset->asset_name, 
                'incident' => $journal->incident
            ])
            ->log('Data Jurnal Aset Ditambahkan');

        return redirect('/aset'. '/'. $id_asset->id_asset. '/view')->with('success', 'Data Riwayat Jurnal Aset Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(JurnalAset $jurnalAset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JurnalAset $jurnalAset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JurnalAset $jurnalAset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JurnalAset $jurnalAset)
    {
        //
    }
}
