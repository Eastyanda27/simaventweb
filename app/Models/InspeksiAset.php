<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspeksiAset extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_report', 
        'sender', 
        'auditors', 
        'month',
        'year',
        'id_asset',
        'conditions',
        'message',
        'reply_message',
        'attachment',
        'validate_time',
        'status'
    ];

    public function dataAset()
    {
        return $this->belongsTo(DataAset::class, 'id_asset', 'id');
    }

    public function Sender()
    {
        return $this->belongsTo(Pegawai::class, 'sender', 'id');
    }

    public function Auditors()
    {
        return $this->belongsTo(Pegawai::class, 'auditors', 'id');
    }
}
