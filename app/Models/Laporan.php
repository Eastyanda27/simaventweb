<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_report',
        'sender',
        'auditor',
        'report_month',
        'report_year',
        'total_asset', 
        'total_value',
        'assets_in_good_condition', 
        'assets_in_bad_condition', 
        'total_vehicle',
        'total_building',
        'total_electronic',
        'total_furniture',
        'notes',
        'reply_notes',
        'status'
    ];

    public function Sender()
    {
        return $this->belongsTo(Pegawai::class, 'sender', 'id');
    }

    public function Auditors()
    {
        return $this->belongsTo(Pegawai::class, 'auditors', 'id');
    }
}
