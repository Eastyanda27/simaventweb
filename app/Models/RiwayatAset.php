<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatAset extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_history', 
        'id_asset',
        'latitude', 
        'longitude', 
        'reported_at', 
        'user_entry'
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
