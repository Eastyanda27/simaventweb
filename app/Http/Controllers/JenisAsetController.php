<?php

namespace App\Http\Controllers;

use App\Models\DataAset;
use App\Models\JenisAset;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class JenisAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = JenisAset::paginate(10)->withQueryString();

        $activities = Activity::join('users', 'users.id', '=', 'activity_log.causer_id')
                              ->select('activity_log.description', 'users.employee_name', 'activity_log.properties', 'activity_log.created_at',
                                       'users.access')
                              ->get();

        return view('/kategori', compact('category', 'activities'));
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
        
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisAset $jenisAset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisAset $jenisAset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisAset $jenisAset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisAset $jenisAset)
    {
        $data_aset = DataAset::where('sub_category', $jenisAset->id)->firstOrFail();

        $vehicle = DataAset::where('sub_category', $jenisAset->id)->firstOrFail();

        $vehicle->delete();

        $data_aset->delete();
        
        $jenisAset->delete();

        return redirect('/kategori')->with('success', 'Data Kategori Aset Berhasil Dihapus');
    }

    public function CategoriesVehicle(Request $request)
    {
        $validatedData = $request->validate([
            'id_category' => ['required', 'unique:jenis_asets'],
            'asset_category' => ['required'],
            'sub_category' => ['required'],
            'description' => ['']
        ]);

        JenisAset::create($validatedData);

        return redirect('/kendaraan')->with('success', 'Data Sub-Kategori Berhasil Ditambah');
    }

    public function CategoriesElectronic(Request $request)
    {
        $validatedData = $request->validate([
            'id_category' => ['required', 'unique:jenis_asets'],
            'asset_category' => ['required'],
            'sub_category' => ['required'],
            'description' => ['']
        ]);

        JenisAset::create($validatedData);

        return redirect('/elektronik')->with('success', 'Data Sub-Kategori Berhasil Ditambah');
    }

    public function CategoriesFurniture(Request $request)
    {
        $validatedData = $request->validate([
            'id_category' => ['required', 'unique:jenis_asets'],
            'asset_category' => ['required'],
            'sub_category' => ['required'],
            'description' => ['']
        ]);

        JenisAset::create($validatedData);

        return redirect('/perabotan')->with('success', 'Data Sub-Kategori Berhasil Ditambah');
    }

    public function getSubcategories($category)
    {
        $subcategories = JenisAset::select('id', 'sub_category')->where('asset_category', $category)->get();

        // Mengirim data sebagai respons JSON
        return response()->json($subcategories);
    }
}
