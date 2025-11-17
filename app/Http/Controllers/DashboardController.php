<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Absensi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Pastikan model names benar (StudlyCase)
        $totalKaryawan = Karyawan::count();
        $totalAbsensi = Absensi::count();
        $totalHadir = Absensi::where('status', 'hadir')->count();
        $gajiTerbesar = Karyawan::max('gaji_pokok');

        // Ambil 7 hari terakhir (jika tidak ada hari tertentu, akan ambil data yang ada)
        $absensi7Hari = Absensi::selectRaw('DATE(tanggal) as tgl, COUNT(*) as jumlah')
            ->where('status', 'hadir')
            ->where('tanggal', '>=', now()->subDays(6)->startOfDay())
            ->groupBy('tgl')
            ->orderBy('tgl', 'ASC')
            ->get();

        return view('dashboard.index', compact(
            'totalKaryawan',
            'totalAbsensi',
            'totalHadir',
            'gajiTerbesar',
            'absensi7Hari'
        ));
    }
}
