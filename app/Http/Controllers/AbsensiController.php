<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use App\Models\KategoriKehadiran;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    // Tampilkan semua absensi
    public function index()
    {
        $absensis = Absensi::with(['karyawan', 'kategoriKehadiran'])->latest()->get();
        return view('absensi.index', compact('absensis'));
    }

    // Form absen masuk
    public function create()
    {
        $karyawans = Karyawan::all();
        $kategoris = KategoriKehadiran::all();
        return view('absensi.create', compact('karyawans', 'kategoris'));
    }

    // Simpan absen masuk
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id_karyawan',
            'kategori_kehadiran_id' => 'required|exists:kategori_kehadirans,id_kategori',
        ]);

        Absensi::create([
            'karyawan_id' => $request->karyawan_id,
            'tanggal' => Carbon::now()->format('Y-m-d'),
            'jam_masuk' => Carbon::now()->format('H:i:s'),
            'kategori_kehadiran_id' => $request->kategori_kehadiran_id,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Absen masuk berhasil!');
    }

    // Update jam keluar
    public function updateJamKeluar($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->update([
            'jam_keluar' => Carbon::now()->format('H:i:s')
        ]);

        return redirect()->back()->with('success', 'Absen keluar berhasil!');
    }
}