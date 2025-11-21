<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans';
    protected $primaryKey = 'id_karyawan';

    protected $fillable = [
        'nama_karyawan',
        'jabatan_id',
        'email',
        'no_hp'
    ];

    // Relasi: Karyawan belongs to Jabatan
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id_jabatan');
    }

    // Relasi: Karyawan punya banyak Absensi
    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'karyawan_id', 'id_karyawan');
    }
}