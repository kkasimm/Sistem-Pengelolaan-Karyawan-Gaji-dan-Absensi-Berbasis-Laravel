<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKehadiran extends Model
{
    use HasFactory;

    protected $table = 'kategori_kehadirans';
    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'kategori_kehadiran'
    ];

    // Relasi: Kategori punya banyak Absensi
    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'kategori_kehadiran_id', 'id_kategori');
    }
}