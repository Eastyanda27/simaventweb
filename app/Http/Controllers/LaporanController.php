<?php

namespace App\Http\Controllers;

use App\Models\DataAset;
use App\Models\Elektronik;
use App\Models\Laporan;
use App\Models\Kendaraan;
use App\Models\Perabotan;
use App\Models\TanahBangunan;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class LaporanController extends Controller
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

        $user_entry = $user->id;

        $month = [];
        for ($i = 1; $i <= 12; $i++) {
            $month[$i] = Carbon::create()->month($i)->translatedFormat('F');
        }

        $startYear = 2000;
        $endYear = Carbon::now()->year;

        $report = Laporan::with(['Sender:id,employee_name', 'Auditors:id,id_user,employee_name'])
                         ->select('id_report','sender', 'auditors', 'report_month', 
                                  'report_year', 'total_asset', 'total_value', 'assets_in_good_condition', 
                                  'assets_in_bad_condition', 'total_vehicle', 'total_building', 'total_electronic',
                                  'total_furniture', 'notes', 'reply_notes', 'status')
                         ->paginate(10)->withQueryString();

        $vehicle = Kendaraan::with(['jenisAset:id,sub_category', 'assetHolder:id,employee_name'])
        ->select('id_asset', 'asset_name', 'number_plate', 'brand', 
                 'type', 'cc_size', 'frame_number', 'machine_number', 
                 'bpkb_number', 'color', 'production_year', 'description', 
                 'sub_category', 'asset_holder')
        ->paginate(10)->withQueryString();

        return view('/laporanaset', compact('user_entry', 'vehicle', 'activities', 'month', 
                                            'startYear', 'endYear', 'report'));
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
        $validatedReport = $request->validate([
            'month' => ['required'],
            'year' => ['required'],
            'notes' => [],
            'status' => ['required']
        ]);

        $id_report = strtoupper(chr(mt_rand(65, 90)) . Str::random(15));

        $user = Auth::user();

        $sender = $user->id;

        $total_aset = DataAset::count();

        $vehicle = Kendaraan::count();

        $building = TanahBangunan::count();

        $electronic = Elektronik::count();

        $furniture = Perabotan::count();

        Laporan::create([
            'id_report' => $id_report,
            'sender' => $sender,
            'report_month' => $validatedReport['month'],
            'report_year' => $validatedReport['year'],
            'total_asset' => $total_aset,
            'total_vehicle' => $vehicle,
            'total_building' => $building,
            'total_electronic' => $electronic,
            'total_furniture' => $furniture,
            'notes' => $validatedReport['notes'],
            'status' => $validatedReport['status']
        ]);

        return redirect()->back()->with('success', 'Laporan Aset Berhasil Dikirimkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        //
    }

    public function inspeksiValidate(Request $request)
    {
        $validatedReport = $request->validate([
            'reply_message' => [],
            'kode_report' => ['required'],
        ]);

        Laporan::where('id_report', $validatedReport['kode_report'])
                    ->update(['reply_message' => $validatedReport['reply_message'], 'status' => $validatedReport['status']]);

        return redirect()->back()->with('success', 'Laporan Aset Telah Divalidasi dan Disetujui');
    }
}
