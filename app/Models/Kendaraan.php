<?php

namespace App\Models;

use App\Models\Pegawai;
use App\Models\JenisAset;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Kendaraan extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'id_asset',
        'sub_category',
        'asset_name',
        'number_plate',
        'brand',
        'type',
        'cc_size',
        'frame_number',
        'machine_number',
        'bpkb_number',
        'color',
        'production_year',
        'price',
        'description',
        'asset_holder',
        'user_entry',
        'id_image'
    ];

    public function jenisAset()
    {
        return $this->belongsTo(JenisAset::class, 'sub_category', 'id'); // 'sub_category' sebagai foreign key di tabel kendaraans
    }

    public function assetHolder()
    {
        return $this->belongsTo(Pegawai::class, 'asset_holder', 'id'); // 'asset_holder' sebagai foreign key di tabel kendaraans
    }

    public function image()
    {
        return $this->belongsTo(GambarAset::class, 'id_image', 'id');
    }
}
