<?php

namespace App\Http\Controllers;

use App\Models\InspeksiAset;
use App\Models\DataAset;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;

class InspeksiAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data aktivitas dengan join ke tabel users
        $activities = Activity::with('causer:id,employee_name,access') // Menggunakan eager loading untuk menghindari join manual
        ->select('description', 'causer_id', 'properties', 'created_at')
        ->get();

        $user = Auth::user();

        $userRole = $user->access;

        $sender = $user->id;

        $month = [];
        for ($i = 1; $i <= 12; $i++) {
            $month[$i] = Carbon::create()->month($i)->translatedFormat('F');
        }

        $startYear = 2000;
        $endYear = Carbon::now()->year;

        $asset = DataAset::where('asset_holder', '=', $user->id)->select('id', 'id_asset', 'asset_name')->get();

        $query = InspeksiAset::with(['dataAset:id,id_asset,asset_name', 'Sender:id,employee_name', 'Auditors:id,id_user,employee_name'])
                             ->select('id_report','month', 'year', 'id_asset', 
                                         'conditions', 'message', 'reply_message', 'attachment', 
                                         'status', 'sender', 'auditors');
        
        if ($userRole === 'Staf Pegawai') {
            $query->whereHas('dataAset', function($q) use ($user) {
                $q->where('asset_holder', $user->id);
            });
        }

        $inspeksi = $query->paginate(10)->withQueryString();

        return view('/inspeksiaset', compact(
            'activities', 'sender', 'month', 'startYear', 
            'endYear', 'asset', 'inspeksi'));
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
            'id_report' => ['required', 'unique:inspeksi_asets'],
            'sender' => ['required'],
            'month' => ['required'],
            'year' => ['required'],
            'id_asset' => ['required'],
            'conditions' => ['required'],
            'message' => [],
            'image.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'status' => ['required']
        ]);

        $imageNames = [];

        if($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('Image/Kondisi Aset'), $imageName);
                $imageNames[] = $imageName;
            }
        }

        $validatedReport['attachment'] = json_encode($imageNames);

        InspeksiAset::create($validatedReport);

        return redirect()->back()->with('success', 'Kondisi Aset Berhasil Dilaporkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(InspeksiAset $inspeksiAset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InspeksiAset $inspeksiAset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InspeksiAset $inspeksiAset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InspeksiAset $inspeksiAset)
    {
        $inspeksiAset->delete();

        return redirect('/inspeksi')->with('success', 'Data Laporan Berhasil Dihapus');
    }

    public function inspeksiValidate(Request $request)
    {
        $validatedReport = $request->validate([
            'reply_message' => [],
            'kode_report' => ['required'],
            'status' => ['required']
        ]);

        InspeksiAset::where('id_report', $validatedReport['kode_report'])
                    ->update(['reply_message' => $validatedReport['reply_message'], 'status' => $validatedReport['status']]);

        return redirect()->back()->with('success', 'Laporan Aset Telah Divalidasi dan Disetujui');
    }

    public function print(InspeksiAset $inspeksiAset)
    {
        $inspeksi = $inspeksiAset;

        return view('/fileinspeksi', compact('inspeksi'));
    }
}
