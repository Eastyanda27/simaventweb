<?php

use App\Http\Controllers\AgendaAsetController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DataAsetController;
use App\Http\Controllers\DepresiasiAsetController;
use App\Http\Controllers\ElektronikController;
use App\Http\Controllers\GambarAsetController;
use App\Http\Controllers\InspeksiAsetController;
use App\Http\Controllers\JenisAsetController;
use App\Http\Controllers\JurnalAsetController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\KeuanganAsetController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LogAktivitasController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PerabotanController;
use App\Http\Controllers\RiwayatAsetController;
use App\Http\Controllers\TanahBangunanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'index'])->name('index');

Route::get('login', [UserController::class, 'login']);

Route::get('/admin-dashboard', [UserController::class, 'admindashboard']);

Route::get('/pegawai-dashboard', [UserController::class, 'pegawaidashboard']);

Route::get('/kabid-dashboard', [UserController::class, 'pegawaidashboard']);

Route::post('/login', [UserController::class, 'authenticate']);

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/registrasi', [UserController::class, 'registration'])->name('registrasi');

Route::post('/registrasi-update', [PegawaiController::class, 'registration']);

Route::resource('/user', PegawaiController::class);

Route::resource('/pegawai', PegawaiController::class);

Route::get('/pegawai/{pegawai:id_user}/edit', [PegawaiController::class, 'edit']);

Route::post('/pegawai/{pegawai:id_user}/update', [PegawaiController::class, 'update']);

Route::post('/pegawai/{pegawai:id_user}/destroy', [PegawaiController::class, 'destroy']);

Route::post('/pegawai/{pegawai:id_user}/reset', [PegawaiController::class, 'reset']);

Route::resource('/aset', DataAsetController::class);

Route::resource('/kategori', JenisAsetController::class);

Route::post('/kategori/{jenisAset:id_category}/destroy', [JenisAsetController::class, 'destroy']);

Route::post('/kategorikendaraan', [JenisAsetController::class, 'CategoriesVehicle']);

Route::post('/kategorielektronik', [JenisAsetController::class, 'CategoriesElectronic']);

Route::post('/kategoriperabotan', [JenisAsetController::class, 'CategoriesFurniture']);

Route::get('/get-subcategories/{category}', [JenisAsetController::class, 'getSubcategories']);

Route::resource('/kendaraan', KendaraanController::class);

Route::get('/aset/{dataAset:id_asset}/view', [DataAsetController::class, 'show'])->name('asset.show');

Route::get('/aset/{dataAset:id_asset}/print', [KendaraanController::class, 'print']);

Route::get('/kendaraan/{kendaraan:id_asset}/edit', [KendaraanController::class, 'edit']);

Route::post('/kendaraan/{kendaraan:id_asset}/update', [KendaraanController::class, 'update']);

Route::post('/kendaraan/{kendaraan:id_asset}/destroy', [KendaraanController::class, 'destroy']);

Route::resource('/tanahbangunan', TanahBangunanController::class);

Route::get('/tanahbangunan/{tanahbangunan:id_asset}/edit', [TanahBangunanController::class, 'edit']);

Route::post('/tanahbangunan/{tanahbangunan:id_asset}/update', [TanahBangunanController::class, 'update']);

Route::post('/tanahbangunan/{tanahbangunan:id_asset}/destroy', [TanahBangunanController::class, 'destroy']);

Route::resource('/elektronik', ElektronikController::class);

Route::get('/elektronik/{elektronik:id_asset}/edit', [ElektronikController::class, 'edit']);

Route::post('/elektronik/{elektronik:id_asset}/update', [ElektronikController::class, 'update']);

Route::post('/elektronik/{elektronik:id_asset}/destroy', [ElektronikController::class, 'destroy']);

Route::resource('/perabotan', PerabotanController::class);

Route::get('/perabotan/{perabotan:id_asset}/edit', [PerabotanController::class, 'edit']);

Route::post('/perabotan/{perabotan:id_asset}/update', [PerabotanController::class, 'update']);

Route::post('/perabotan/{perabotan:id_asset}/destroy', [PerabotanController::class, 'destroy']);

Route::resource('/update-location', RiwayatAsetController::class);

Route::resource('/agenda', AgendaAsetController::class);

Route::resource('/keuangan', KeuanganAsetController::class);

Route::resource('/jurnal', JurnalAsetController::class);

Route::get('/kalender', [AgendaAsetController::class, 'index'])->name('kalender');

Route::resource('/log-aktivitas', LogAktivitasController::class);

Route::resource('/laporan', LaporanController::class);

Route::resource('/inspeksi', InspeksiAsetController::class);

Route::get('/inspeksi/{inspeksiAset:id_report}/print', [InspeksiAsetController::class, 'print']);

Route::post('/inspeksi/{inspeksiAset:id_report}/destroy', [InspeksiAsetController::class, 'destroy']);

Route::post('/inspeksi-validate', [InspeksiAsetController::class, 'inspeksiValidate']);

Route::resource('/depresiasi', DepresiasiAsetController::class);

Route::get('/qrcode/{dataAset:id_asset}/print/2x2', [GambarAsetController::class, 'duaxdua']);

Route::get('/qrcode/{dataAset:id_asset}/print/7x7', [GambarAsetController::class, 'tujuhxtujuh']);

Route::get('/qrcode/{dataAset:id_asset}/print/4x4', [GambarAsetController::class, 'empatxempat']);

Route::get('/tes', [KendaraanController::class, 'tes']);