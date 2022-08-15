<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pedagang extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $table = 'users';
    protected $guard_name = 'web';

    protected $fillable = [
        'nama',
        'nama_dagang',
        'lokasi',
        'email',
        'password',
        'no_telp',
        'profpict',
    ];
}
