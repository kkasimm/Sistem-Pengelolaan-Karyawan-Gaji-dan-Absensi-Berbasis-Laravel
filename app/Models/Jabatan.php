<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatans';
    protected $primaryKey = 'id_jabatan';

    protected $fillable = [
        'jabatan',
        'gaji'
    ];

    // Relasi: Jabatan punya banyak Karyawan
    public function karyawans()
    {
        return $this->hasMany(Karyawan::class, 'jabatan_id', 'id_jabatan');
    }
}