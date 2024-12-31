<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeuanganAset extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_finance',
        'id_asset', 
        'category', 
        'date',
        'nominal', 
        'description',
        'user_entry'
    ];

    protected $casts = [
        'date' => 'datetime:Y-m-d',
    ];

    public function user()
    {
        return $this->belongsTo(Pegawai::class)->withDefault();
    }

    public function assetdata()
    {
        return $this->belongsTo(DataAset::class)->withDefault();
    }
}
