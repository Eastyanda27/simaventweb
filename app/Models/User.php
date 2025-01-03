<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Pegawai;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_user',
        'email',
        'employee_name',
        'nip',
        'password',
        'access',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    public function employee()
    {
        return $this->belongsTo(Pegawai::class)->withDefault();
    }

    public function isAdmin()
    {
        return $this->access === 'Admin';
    }

    public function isStaff()
    {
        return $this->access === 'Staf Pegawai';
    }

    public function isKabid()
    {
        return $this->access === 'Kepala Bidang';
    }

    public function isKadin()
    {
        return $this->access === 'Kepala Dinas';
    }
}
