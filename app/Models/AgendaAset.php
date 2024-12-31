<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaAset extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_agenda', 
        'id_asset',
        'type', 
        'day', 
        'date', 
        'custom_date',
        'activity', 
        'description', 
        'user_entry'
    ];

    protected $casts = [
        'custom_date' => 'datetime:Y-m-d',
    ];

    public function user()
    {
        return $this->belongsTo(Pegawai::class)->withDefault();
    }

    public function assetData()
    {
        return $this->belongsTo(DataAset::class, 'id_asset', 'id');
    }
}
