<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [
        'nama',
        'jabatan',
        'email',
        'no_hp',
        'gaji_pokok'
    ];
}

