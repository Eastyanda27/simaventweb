<?php

namespace App\Models;

use App\Models\Pegawai;
use App\Models\JenisAset;
use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class DataAset extends Model
{
    use HasFactory, Notifiable;

    protected static $logAttributes = ['id_asset', 'asset_name', 'user_entry'];
    protected static $logName = 'asset';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Asset {$this->name} has been {$eventName}";
    }

    protected $fillable = [
        'id_asset',
        'asset_name',
        'asset_category',
        'sub_category',
        'user_entry',
        'description'
    ];

    public function jenisAset()
    {
        return $this->belongsTo(JenisAset::class, 'sub_category', 'id'); // 'sub_category' sebagai foreign key di tabel kendaraans
    }

    public function userEntry()
    {
        return $this->belongsTo(Pegawai::class, 'user_entry', 'id'); // 'user_entry' sebagai foreign key di tabel kendaraans
    }

    public function assetHolder()
    {
        return $this->belongsTo(Pegawai::class, 'asset_holder', 'id');
    }

    public function assetagenda()
    {
        return $this->hasMany(DataAset::class, 'id_asset', 'id');
    }

    public function assetfinance()
    {
        return $this->hasMany(Kendaraan::class, 'id_asset', 'id');
    }

    public function assetjournal()
    {
        return $this->hasMany(Kendaraan::class, 'id_asset', 'id');
    }

    public function assethistory()
    {
        return $this->hasMany(Kendaraan::class, 'id_asset', 'id');
    }

    public function gambarKendaraan()
    {
        return $this->hasMany(GambarAset::class);
    }

    public function inspeksiAset()
    {
        return $this->hasMany(InspeksiAset::class, 'id_asset', 'id');
    }

    public function depreciationAset()
    {
        return $this->hasMany(DepresiasiAset::class, 'id_asset', 'id');
    }
}
