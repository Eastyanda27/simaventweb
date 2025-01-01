<?php

namespace App\Http\Controllers;

use App\Models\DataAset;
use App\Models\TanahBangunan;
use App\Models\JenisAset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class TanahBangunanController extends Controller
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

        $sub_category = JenisAset::where('asset_category', 'Tanah & Bangunan')->select('id', 'sub_category')->get();

        $user_entry = $user->id;

        $query = TanahBangunan::join('jenis_asets', 'jenis_asets.id', '=', 'tanah_bangunans.sub_category')
        ->join('pegawais', 'pegawais.id', '=', 'tanah_bangunans.user_entry')
        ->select('tanah_bangunans.id_asset', 'jenis_asets.asset_category', 'jenis_asets.sub_category', 'tanah_bangunans.asset_name',
                 'tanah_bangunans.size', 'tanah_bangunans.rights_status', 'tanah_bangunans.address', 'tanah_bangunans.subdistrict',
                 'tanah_bangunans.village', 'tanah_bangunans.condition', 'tanah_bangunans.certificate_date', 'tanah_bangunans.certificate_number',
                 'tanah_bangunans.origin', 'tanah_bangunans.price', 'tanah_bangunans.useful_life', 'tanah_bangunans.use_for',
                 'tanah_bangunans.description', 'pegawais.employee_name');
        
        $building = $query->paginate(10)->withQueryString();

        return view('/tanahbangunan', compact('sub_category', 'user_entry', 'building', 'activities'));
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
            'id_asset' => ['required', 'unique:tanah_bangunans'],
            'asset_name' => ['required'],
            'size' => ['required'],
            'rights_status' => ['required'],
            'address' => ['required'],
            'subdistrict' => ['required'],
            'village' => ['required'],
            'condition' => ['required'],
            'certificate_date' => ['required'],
            'certificate_number' => ['required'],
            'origin' => ['required'],
            'price' => ['required'],
            'useful_life' => [],
            'use_for' => [],
            'description' => [],
            'user_entry' => []
        ]);

        $validatedCategory = $request->validate([
            'id_category' => ['required', 'unique:jenis_asets'],
            'asset_category' => ['required'],
            'sub_category' => []
        ]);

        $validatedAset = $request->validate([
            'id_asset' => ['required', 'unique:data_asets'],
            'asset_category' => ['required'],
            'user_entry' => ['required'],
            'description' => []
        ]);

        $validated = $request->input('sub_category');

        if(JenisAset::where('sub_category', $validated)->exists()) {
            TanahBangunan::create($validatedData);
            DataAset::create($validatedAset);
            $Category = JenisAset::where('sub_category', $validatedCategory['sub_category'])->value('id');
            TanahBangunan::where('id_asset', $validatedData['id_asset'])->update(['sub_category' => $Category]);
            DataAset::where('id_asset', $validatedAset['id_asset'])->update(['sub_category' => $Category]);
            return redirect('/tanahbangunan')->with('success', 'Data Tanah & Bangunan Berhasil Ditambahkan');
        }

        JenisAset::create($validatedCategory);

        DataAset::create($validatedAset);
        
        TanahBangunan::create($validatedData);

        $idCategory = JenisAset::where('id_category', $validatedCategory['id_category'])->value('id');

        TanahBangunan::where('id_asset', $validatedData['id_asset'])->update(['sub_category' => $idCategory]);

        DataAset::where('id_asset', $validatedAset['id_asset'])->update(['sub_category' => $idCategory]);

        $building = DataAset::where('id_asset', $validatedData['id_asset'])->value('id');

        TanahBangunan::where('id_asset', $validatedData['id_asset'])->update(['id' => $building]);

        return redirect('/tanahbangunan')->with('success', 'Data Tanah & Bangunan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(TanahBangunan $tanahBangunan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TanahBangunan $tanahbangunan)
    {
        return view('/edittanahbangunan', [
            "building" => $tanahbangunan,
            "sub_category" => JenisAset::select('id', 'sub_category')->where('asset_category', 'Tanah & Bangunan')->get(),
            "user_entry" => User::where('employee_name', Auth::user()->employee_name)->first()->id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TanahBangunan $tanahbangunan)
    {
        $validatedData = $request->validate([
            'asset_name' => ['required'],
            'size' => ['required'],
            'rights_status' => ['required'],
            'address' => ['required'],
            'subdistrict' => ['required'],
            'village' => ['required'],
            'condition' => ['required'],
            'certificate_date' => ['required'],
            'certificate_number' => ['required'],
            'origin' => ['required'],
            'price' => ['required'],
            'useful_life' => [],
            'use_for' => [],
            'description' => [],
            'user_entry' => []
        ]);

        $validatedCategory = $request->validate([
            'id_category' => ['required', 'unique:jenis_asets'],
            'asset_category' => ['required'],
            'sub_category' => []
        ]);

        $validatedAset = $request->validate([
            'user_entry' => ['required'],
            'description' => []
        ]);

        $validated = $request->input('sub_category');

        if(JenisAset::where('sub_category', $validated)->exists()) {
            TanahBangunan::where('id_asset', $tanahbangunan->id_asset)->update($validatedData);
            DataAset::where('id_asset', $tanahbangunan->id_asset)->update($validatedAset);
            return redirect('/tanahbangunan')->with('success', 'Data Aset Tanah & Bangunan Berhasil Diubah');
        }

        JenisAset::create($validatedCategory);

        TanahBangunan::where('id_asset', $tanahbangunan->id_asset)->update($validatedData);

        DataAset::where('id_asset', $tanahbangunan->id_asset)->update($validatedAset);

        $idCategory = JenisAset::where('id_category', $validatedCategory['id_category'])->value('id');

        TanahBangunan::where('id_asset', $tanahbangunan->id_asset)->update(['sub_category' => $idCategory]);

        DataAset::where('id_asset', $tanahbangunan->id_asset)->update(['sub_category' => $idCategory]);

        return redirect('/tanahbangunan')->with('success', 'Data Aset Tanah & Bangunan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TanahBangunan $tanahbangunan)
    {
        TanahBangunan::destroy($tanahbangunan->id);

        return redirect('/tanahbangunan')->with('success', 'Data Aset Tanah & Bangunan Berhasil Dihapus');
    }
}
