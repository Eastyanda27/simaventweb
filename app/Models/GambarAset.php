<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarAset extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_category',
        'id_asset',
        'image_name',
        'image_path'
    ];

    public function assetdata()
    {
        return $this->belongsTo(DataAset::class)->withDefault();
    }

    public function kendaraans()
    {
        return $this->hasMany(Kendaraan::class, 'id_image', 'id');
    }
}
