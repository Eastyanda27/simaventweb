<?php

namespace App\Http\Controllers;

use App\Models\DepresiasiAset;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class DepresiasiAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::with('causer:id,employee_name,access') // Menggunakan eager loading untuk menghindari join manual
        ->select('description', 'causer_id', 'properties', 'created_at')
        ->get();

        $depreciation = DepresiasiAset::with(['dataAset:id,id_asset,asset_name'])
                                      ->select('id_asset', 'method', 'price', 'residual_price',
                                               'economic_life', 'depreciation_yearly', 'depreciation_monthly')
                                      ->paginate(10)->withQueryString();
        
        return view('/depresiasiaset', compact('activities', 'depreciation'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DepresiasiAset $depresiasiAset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DepresiasiAset $depresiasiAset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DepresiasiAset $depresiasiAset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DepresiasiAset $depresiasiAset)
    {
        //
    }
}
