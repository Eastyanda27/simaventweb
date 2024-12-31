<?php

namespace App\Models;

use App\Models\User;
use App\Models\DataAset;
use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_user',
        'email',
        'nip',
        'employee_name'
    ];

    
    public function user()
    {
        return $this->hasMany(User::class, 'id', 'id_user');
    }

    public function kendaraans()
    {
        return $this->hasMany(Kendaraan::class, 'asset_holder', 'id');
    }

    public function assetdata()
    {
        return $this->hasMany(DataAset::class, 'asset_holder', 'id');
        return $this->hasMany(DataAset::class, 'user_entry', 'id');
    }

    public function building()
    {
        return $this->hasMany(Kendaraan::class, 'asset_holder', 'id');
        return $this->hasMany(Kendaraan::class, 'user_entry', 'id');
    }

    public function electronic()
    {
        return $this->hasMany(Kendaraan::class, 'asset_holder', 'id');
        return $this->hasMany(Kendaraan::class, 'user_entry', 'id');
    }

    public function furniture()
    {
        return $this->hasMany(Kendaraan::class, 'asset_holder', 'id');
        return $this->hasMany(Kendaraan::class, 'user_entry', 'id');
    }

    public function assetagenda()
    {
        return $this->hasMany(Kendaraan::class, 'user_entry', 'id');
    }

    public function assetfinance()
    {
        return $this->hasMany(Kendaraan::class, 'user_entry', 'id');
    }

    public function assetjournal()
    {
        return $this->hasMany(Kendaraan::class, 'user_entry', 'id');
    }

    public function assethistory()
    {
        return $this->hasMany(Kendaraan::class, 'user_entry', 'id');
    }

    public function sender()
    {
        return $this->hasMany(InspeksiAset::class, 'sender', 'id');
        return $this->hasMany(Laporan::class, 'sender', 'id');
    }

    public function auditors()
    {
        return $this->hasMany(InspeksiAset::class, 'sender', 'id');
        return $this->hasMany(Laporan::class, 'sender', 'id');
    }
}
