<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Absensi;
use App\Models\Jabatan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Total Karyawan
        $totalKaryawan = Karyawan::count();
        
        // Total Hadir Hari Ini
        $totalHadir = Absensi::whereDate('tanggal', Carbon::today())
                            ->where('kategori_kehadiran_id', 1) // ID 1 = Hadir
                            ->count();
        
        // Gaji Terbesar
        $gajiTerbesar = Jabatan::max('gaji');
        
        // Data Absensi 7 Hari Terakhir
        $absensi7Hari = Absensi::selectRaw('DATE(tanggal) as tgl, COUNT(*) as jumlah')
                            ->where('tanggal', '>=', Carbon::now()->subDays(7))
                            ->where('kategori_kehadiran_id', 1)
                            ->groupBy('tgl')
                            ->orderBy('tgl', 'asc')
                            ->get();
        
        return view('dashboard.index', compact(
            'totalKaryawan', 
            'totalHadir', 
            'gajiTerbesar', 
            'absensi7Hari'
        ));
    }
}