<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalAset extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_journal', 
        'id_asset', 
        'date', 
        'incident', 
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
