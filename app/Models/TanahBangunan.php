<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanahBangunan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_asset',
        'sub_category',
        'asset_name',
        'size',
        'rights_status',
        'address',
        'condition',
        'certificate_date',
        'certificate_number',
        'origin',
        'price',
        'useful_for',
        'use_for',
        'description',
        'subdistrict',
        'village',
        'user_entry'
    ];

    public function user()
    {
        return $this->belongsTo(Pegawai::class)->withDefault();
    }

    public function assettype()
    {
        return $this->belongsTo(JenisAset::class)->withDefault();
    }

    public function jenisAset()
    {
        return $this->belongsTo(JenisAset::class, 'sub_category', 'id');
    }
}
