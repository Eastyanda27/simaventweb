<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elektronik extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_asset',
        'sub_category', 
        'asset_name', 
        'brand',
        'type', 
        'specification', 
        'warranty_period', 
        'price', 
        'quantity', 
        'condition',
        'description',
        'asset_holder',
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
}
