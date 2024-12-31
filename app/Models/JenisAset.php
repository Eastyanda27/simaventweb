<?php

namespace App\Models;

use App\Models\DataAset;
use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisAset extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_category',
        'asset_category',
        'sub_category',
        'description'
    ];

    public function assetdata()
    {
        return $this->hasMany(DataAset::class, 'asset_category', 'id');
    }

    public function kendaraans()
    {
        return $this->hasMany(Kendaraan::class, 'sub_category', 'id');
    }

    public function building()
    {
        return $this->hasMany(Kendaraan::class, 'sub_category', 'id');
    }

    public function electronic()
    {
        return $this->hasMany(Elektronik::class, 'sub_category', 'id');
    }

    public function furniture()
    {
        return $this->hasMany(Perabotan::class, 'sub_category', 'id');
    }
}
