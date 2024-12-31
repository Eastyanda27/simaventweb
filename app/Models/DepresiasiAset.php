<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepresiasiAset extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_asset',
        'method',
        'price',
        'residual_price',
        'economic_life',
        'depreciation_yearly',
        'depreciation_monthly'
    ];

    public function dataAset()
    {
        return $this->belongsTo(DataAset::class, 'id_asset', 'id');
    }
}
