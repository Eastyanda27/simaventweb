<?php

namespace App\Http\Controllers;

use App\Models\AgendaAset;
use App\Models\DataAset;
use App\Models\JurnalAset;
use App\Models\KeuanganAset;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

use function Laravel\Prompts\select;

class AgendaAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $activities = Activity::join('users', 'users.id', '=', 'activity_log.causer_id')
                              ->select('activity_log.description', 'users.employee_name', 'activity_log.properties', 'activity_log.created_at',
                                       'users.access')
                              ->get();

        // Ambil bulan dan tahun dari request, default ke bulan dan tahun sekarang jika tidak ada
        $month = $request->input('month', Carbon::now()->month);
        $year = $request->input('year', Carbon::now()->year);

        // Buat tanggal awal dan akhir dari bulan yang dipilih
        $startOfMonth = Carbon::create($year, $month, 1)->startOfMonth();
        $endOfMonth = Carbon::create($year, $month, 1)->endOfMonth();

        // Ambil semua tanggal dalam bulan yang dipilih (termasuk sebelum dan setelah hari ini)
        $datesInMonth = [];
        for ($date = $startOfMonth; $date->lte($endOfMonth); $date->addDay()) {
            $datesInMonth[] = $date->copy();
        }

        $schedules = AgendaAset::join('data_asets', 'data_asets.id', '=', 'agenda_asets.id_asset')
                                ->select('data_asets.id_asset', 'data_asets.asset_name', 'agenda_asets.activity', 'agenda_asets.description',
                                         'agenda_asets.type', 'agenda_asets.day', 'agenda_asets.date', 'agenda_asets.custom_date')
                                ->where(function ($query) {
                                        $query->where('type', 'Mingguan')
                                              ->orWhere('type', 'Bulanan');
                                })
                                ->orWhere(function ($query) use ($month, $year) {
                                          $query->whereMonth('custom_date', $month)
                                                ->whereYear('custom_date', $year);
                                })
                                ->with('assetdata')->get();

        $journals = JurnalAset::join('data_asets', 'data_asets.id', '=', 'jurnal_asets.id_asset')
                              ->select('data_asets.id_asset', 'data_asets.asset_name', 'jurnal_asets.incident', 'jurnal_asets.description', 
                                       'jurnal_asets.date')
                              ->where(function ($query) use ($month, $year) {
                                      $query->whereMonth('date', $month)
                                            ->whereYear('date', $year);
                              })
                              ->with('assetdata')->get();

        $finances = KeuanganAset::join('data_asets', 'data_asets.id', '=', 'keuangan_asets.id_asset')
                               ->select('data_asets.id_asset', 'data_asets.asset_name', 'keuangan_asets.category', 'keuangan_asets.description', 
                                        'keuangan_asets.date')
                               ->where(function ($query) use ($month, $year) {
                                       $query->whereMonth('date', $month)
                                             ->whereYear('date', $year);
                               })
                               ->with('assetdata')->get();

        return view('/kalender', compact('datesInMonth', 'schedules', 'journals', 'finances', 'month', 'year', 'activities'));
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
            'id_agenda' => ['required', 'unique:agenda_asets'],
            'id_asset' => ['required'],
            'type' => ['required'],
            'activity' => ['required'],
            'user_entry' => ['required'],
            'day' => [],
            'date' => [],
            'custom_date' => [],
            'description' => []
        ]);
        
        $asset = DataAset::find($validatedData['id_asset'], ['id_asset', 'asset_name']);

        $agenda = AgendaAset::create($validatedData);
        
        // Log aktivitas
        activity()
            ->causedBy(Auth::user())
            ->performedOn($agenda)
            ->withProperties([
                'id_asset' => $asset->id_asset, 
                'asset_name' => $asset->asset_name, 
                'type' => $agenda->type,
                'activity' => $agenda->activity,
            ])
            ->log('Data Riwayat Agenda Aset Ditambahkan');
        
        // Redirect setelah selesai
        return redirect('/aset/' . $asset->id_asset . '/view')
             ->with('success', 'Data Riwayat Agenda Aset Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(AgendaAset $agendaAset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AgendaAset $agendaAset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AgendaAset $agendaAset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AgendaAset $agendaAset)
    {
        //
    }
}
