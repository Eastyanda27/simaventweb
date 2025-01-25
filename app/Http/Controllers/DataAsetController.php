<?php

namespace App\Http\Controllers;

use App\Models\AgendaAset;
use App\Models\DataAset;
use App\Models\JenisAset;
use App\Models\JurnalAset;
use App\Models\Kendaraan;
use App\Models\KeuanganAset;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;

class DataAsetController extends Controller
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
        
        $user = Auth::user();  // Ambil user yang sedang login
        $userRole = $user->access;

        // Buat query utama untuk kendaraan
        $query = DataAset::with(['jenisAset:id,sub_category', 'userEntry:id,employee_name'])
                         ->select('id_asset', 'asset_name', 'asset_category', 'sub_category', 'asset_holder', 'user_entry', 'description');

        // Filter kendaraan berdasarkan role
        if ($userRole === 'Staf Pegawai') {
            $query->where('asset_holder', $user->id);
        }

        // Paginate kendaraan
        $asset = $query->paginate(10)->withQueryString();

        return view('/aset', compact('asset', 'activities'));
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
    public function show(DataAset $dataAset)
    {
        $activities = Activity::join('users', 'users.id', '=', 'activity_log.causer_id')
                              ->select('activity_log.description', 'users.employee_name', 'activity_log.properties', 'activity_log.created_at',
                                       'users.access')
                              ->get();
        
        $vehicle = Kendaraan::with(['jenisAset:id,asset_category,sub_category', 
                                    'assetHolder:id,employee_name,nip,agency,work_unit,position', 
                                    'image:id,image_name,image_path'])
                            ->select('id', 'id_asset', 'asset_name', 'number_plate', 'brand', 
                            'type', 'cc_size', 'frame_number', 'machine_number', 
                            'bpkb_number', 'color', 'production_year', 'description', 
                            'sub_category', 'asset_holder', 'id_image')
                            ->where('kendaraans.id_asset', '=', $dataAset->id_asset)
                            ->get();
        
        $agenda = AgendaAset::select('id_agenda', 'type', 'day', 'date',
                                     'custom_date', 'activity', 'description')
                            ->where('id_asset', '=', $dataAset->id)
                            ->get();
        
        $finance = KeuanganAset::select('id_finance', 'category', 'date', 'nominal',
                                        'description')
                               ->where('id_asset', '=', $dataAset->id)
                               ->get();
        
        $journal = JurnalAset::select('id_journal', 'date', 'incident', 'description')
                             ->where('id_asset', '=', $dataAset->id)
                             ->get();

        $user_entry = User::where('employee_name', Auth::user()->employee_name)->first()->id;

        return view('/viewaset', compact(
            'activities', 'user_entry', 'vehicle', 'agenda', 'finance', 'journal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataAset $dataAset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataAset $dataAset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataAset $dataAset)
    {
        //
    }
}
