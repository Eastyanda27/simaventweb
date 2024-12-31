<?php

namespace App\Http\Controllers;

use App\Models\GambarAset;
use App\Http\Requests\StoreGambarAsetRequest;
use App\Http\Requests\UpdateGambarAsetRequest;
use App\Models\Kendaraan;

class GambarAsetController extends Controller
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
    public function store(StoreGambarAsetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GambarAset $gambarAset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GambarAset $gambarAset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGambarAsetRequest $request, GambarAset $gambarAset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GambarAset $gambarAset)
    {
        //
    }

    public function duaxdua(Kendaraan $dataAset)
    {
        $vehicle = Kendaraan::with(['jenisAset:id,asset_category,sub_category', 
                                    'assetHolder:id,employee_name,nip,agency,work_unit,position', 
                                    'image:id,image_name,image_path'])
                            ->select('id', 'id_asset', 'asset_name', 'number_plate', 'brand', 
                            'type', 'cc_size', 'frame_number', 'machine_number', 
                            'bpkb_number', 'color', 'production_year', 'description', 
                            'sub_category', 'asset_holder', 'id_image')
                            ->where('kendaraans.id_asset', '=', $dataAset->id_asset)
                            ->get();
        
        return view('/qrcode2x2', compact(
            'vehicle'));
    }

    public function empatxempat(Kendaraan $dataAset)
    {
        $vehicle = Kendaraan::with(['jenisAset:id,asset_category,sub_category', 
                                    'assetHolder:id,employee_name,nip,agency,work_unit,position', 
                                    'image:id,image_name,image_path'])
                            ->select('id', 'id_asset', 'asset_name', 'number_plate', 'brand', 
                            'type', 'cc_size', 'frame_number', 'machine_number', 
                            'bpkb_number', 'color', 'production_year', 'description', 
                            'sub_category', 'asset_holder', 'id_image')
                            ->where('kendaraans.id_asset', '=', $dataAset->id_asset)
                            ->get();
        
        return view('/qrcode4x4', compact(
            'vehicle'));
    }
}
