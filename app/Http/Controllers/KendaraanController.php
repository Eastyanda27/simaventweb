<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataAset;
use App\Models\JenisAset;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DepresiasiAset;
use App\Models\GambarAset;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Activitylog\Models\Activity;

class KendaraanController extends Controller
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

        $user = Auth::user();  // Ambil user yang sedang login
        $userRole = $user->access;

        // Ambil subkategori aset kendaraan
        $sub_category = JenisAset::where('asset_category', 'Kendaraan')->select('id', 'sub_category')->get();

        // Ambil semua pemegang aset
        $asset_holder = User::all();

        // Ambil ID user yang sedang login
        $user_entry = $user->id;

        // Buat query utama untuk kendaraan
        $query = Kendaraan::with(['jenisAset:id,sub_category', 'assetHolder:id,employee_name'])
        ->select('id_asset', 'asset_name', 'number_plate', 'brand', 
                 'type', 'cc_size', 'frame_number', 'machine_number', 
                 'bpkb_number', 'color', 'production_year', 'description', 
                 'price', 'sub_category', 'asset_holder');

        // Filter kendaraan berdasarkan role
        if ($userRole === 'Staf Pegawai') {
            $query->where('asset_holder', $user->id);
        }

        // Paginate kendaraan
        $vehicle = $query->paginate(10)->withQueryString();

        return view('/kendaraan', compact('sub_category', 'asset_holder', 'user_entry', 'vehicle', 'activities'));
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
            'id_asset' => ['required', 'unique:kendaraans'],
            'sub_category' => [''],
            'asset_name' => ['required'],
            'number_plate' => [],
            'brand' => ['required'],
            'type' => ['required'],
            'cc_size' => [''],
            'frame_number' => [''],
            'machine_number' => [''],
            'bpkb_number' => [''],
            'color' => [''],
            'production_year' => ['required'],
            'price' => ['required'],
            'description' => [],
            'asset_holder' => ['required'],
            'user_entry' => ['required'],
        ]);

        $validatedAset = $request->validate([
            'id_asset' => ['required', 'unique:data_asets'],
            'asset_name' => ['required'],
            'asset_category' => ['required'],
            'sub_category' => [],
            'asset_holder' => [],
            'user_entry' => ['required'],
            'description' => []
        ]);

        $validatedImage = $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,svg,webp'],
            'id_asset' => ['required'],
            'image_category' => ['required'],
        ]);

        $validatedDepreciation = $request->validate([
            'id_asset' => ['required'],
            'method' => ['required'],
            'price' => ['required'],
            'residual_price' => ['required'],
            'economic_life' => ['required'],
        ]);

        $dataAset = DataAset::create($validatedAset);

        // Simpan ke tabel Kendaraan menggunakan ID dari DataAset
        $validatedData['id'] = $dataAset->id; // Mengambil ID yang baru saja disimpan

        $validatedDepreciation['id_asset'] = $dataAset->id;

        $asset = Kendaraan::create($validatedData);

        $depreciation = DepresiasiAset::create($validatedDepreciation);

        $depreciationYearly = ($depreciation->price - $depreciation->residual_price) / $depreciation->economic_life;

        $depreciationMonthly = $depreciationYearly / 12;

        DepresiasiAset::where('id', '=', $depreciation->id)->update(['depreciation_yearly' => $depreciationYearly,
                                                                     'depreciation_monthly' => $depreciationMonthly]);

        DataAset::where('id_asset', '=', $asset->id_asset)->update(['asset_holder' => $asset->asset_holder]);

        // Mencatat log aktivitas
        activity()
            ->causedBy(Auth::user())
            ->performedOn($asset)
            ->withProperties(['asset_name' => $asset->asset_name, 'id_asset' => $asset->id_asset, 'asset_holder' => $asset->asset_holder])
            ->log('Data Aset Kendaraan Ditambahkan');
        
        if($request->hasFile('image')) {
            // Mendapatkan nama file
            $imageName = time().'.'.$validatedImage['image']->extension();  
        
            // Simpan file ke public/images
            $validatedImage['image']->move(public_path('Image'), $imageName);

            $image = GambarAset::create([
                'image_category' => $validatedImage['image_category'],
                'id_asset' => $dataAset->id,
                'image_name' => $imageName,
                'image_path' => 'Image/' . $imageName,
            ]);

            Kendaraan::where('id_asset', '=', $dataAset->id_asset)->update(['id_image' => $image->id]);
        }

        $url = route('asset.show', ['dataAset' => $dataAset->id_asset]);

        // Path untuk file QR Code
        $qrPath = 'QR Code/aset_' . $dataAset->id_asset . '.png';

        // Pastikan folder 'QR Code' ada
        if (!file_exists(public_path('QR Code'))) {
            mkdir(public_path('QR Code'), 0777, true);
        }

        // Generate QR Code
        QrCode::format('png')->size(300)->generate($url, public_path($qrPath));

        return redirect('/kendaraan')->with('success', 'Data Aset Kendaraan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function view(Kendaraan $kendaraan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kendaraan $kendaraan)
    {
        $vehicle = $kendaraan;

        $activities = Activity::join('users', 'users.id', '=', 'activity_log.causer_id')
                          ->select('activity_log.description', 'users.employee_name', 'activity_log.properties', 'activity_log.created_at', 'users.access')
                          ->get();

        $category = JenisAset::select('id', 'sub_category')->where('id', $kendaraan->sub_category)->get();

        $sub_category = JenisAset::select('id', 'sub_category')
                                ->where('asset_category', 'Kendaraan')
                                ->where('id', '!=', $kendaraan->sub_category)
                                ->get();

        $assetHolder = User::select('id', 'employee_name')->where('id', $kendaraan->asset_holder)->get();

        $otherHolders = User::select('id', 'employee_name')
                            ->where('id', '!=', $kendaraan->asset_holder)
                            ->get();

        return view('/editkendaraan', compact('vehicle', 'category', 'sub_category', 'assetHolder', 'otherHolders', 'activities'))
            ->with('user_entry', Auth::id());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kendaraan $kendaraan)
    {
        $validatedData = $request->validate([
            'sub_category' => ['nullable'],
            'asset_name' => ['required'],
            'number_plate' => ['nullable'],
            'brand' => ['required'],
            'type' => ['required'],
            'cc_size' => ['nullable'],
            'frame_number' => ['nullable'],
            'machine_number' => ['nullable'],
            'bpkb_number' => ['nullable'],
            'color' => ['required'],
            'production_year' => ['required'],
            'description' => ['nullable'],
            'asset_holder' => ['required'],
            'user_entry' => ['required']
        ]);

        // Update pada tabel DataAset
        $dataAset = [
            'asset_name' => $validatedData['asset_name'],
            'sub_category' => $validatedData['sub_category'] ?? null,
            'user_entry' => $validatedData['user_entry'],
            'description' => $validatedData['description'] ?? null,
        ];
        DataAset::where('id_asset', $kendaraan->id_asset)->update($dataAset);

        // Update pada tabel Kendaraan
        $kendaraan->update($validatedData);

        // Mencatat log aktivitas
        activity()
            ->causedBy(Auth::user())
            ->performedOn($kendaraan)
            ->withProperties([
                'asset_name' => $kendaraan->asset_name,
                'id_asset' => $kendaraan->id_asset,
                'asset_holder' => $kendaraan->asset_holder
            ])
            ->log('Data Aset Kendaraan Diubah');

        return redirect('/kendaraan')->with('success', 'Data Kendaraan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kendaraan $kendaraan)
    {
        $asset = DataAset::findOrFail($kendaraan->id);

        activity()
            ->causedBy(Auth::user())
            ->performedOn($asset)
            ->withProperties(['asset_name' => $asset->asset_name, 'id_asset' => $asset->id_asset, 'asset_holder' => $asset->asset_holder])
            ->log('Data Aset Kendaraan Dihapus');

        // Hapus data kendaraan dan aset terkait
        $kendaraan->delete();
        $asset->delete();

        return redirect('/kendaraan')->with('success', 'Data Aset Berhasil Dihapus');
    }

    public function restore(Kendaraan $kendaraan)
    {
        $vehicle = Kendaraan::withTrashed()->findOrFail($kendaraan->id);

        $vehicle->restore();

        $dataaset = DataAset::withTrashed()->findOrFail($kendaraan->id);

        $dataaset->restore();

        return redirect('/kendaraan')->with('success', 'Data Aset Berhasil Dikembalikan');
    }

    public function forceDelete(Kendaraan $kendaraan)
    {
        $vehicle = Kendaraan::withTrashed()->findOrFail($kendaraan->id);

        $vehicle->forceDelete();

        $dataaset = DataAset::withTrashed()->findOrFail($kendaraan->id);

        $dataaset->forceDelete();

        return redirect('/kendaraan')->with('success', 'Data Aset Berhasil Dihapus Permanen');
    }

    public function print(Kendaraan $dataAset)
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
        
        return view('/filekendaraan', compact(
            'vehicle'));
    }

    public function tes()
    {
        $activities = Activity::join('users', 'users.id', '=', 'activity_log.causer_id')
                              ->select('activity_log.description', 'users.employee_name', 'activity_log.properties', 'activity_log.created_at',
                                       'users.access')
                              ->get();
        return view('/tes', compact('activities'));
    }
}
