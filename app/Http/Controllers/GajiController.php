<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    public function index()
    {
        $karyawan = karyawan::all();
        return view('gaji.index', compact('karyawan'));
    }

    public function hitung($id)
    {
        $karyawan = karyawan::findOrFail($id);
        return view('gaji.hitung', compact('karyawan'));
    }

    public function proses(Request $request, $id)
    {
        $karyawan = karyawan::findOrFail($id);

        // Hitungan dasar
        $gaji_pokok = $karyawan->gaji_pokok;
        $tunjangan = $request->tunjangan;
        $potongan = $request->potongan;
        $lembur = $request->lembur * 10000; // contoh lembur per jam = 10k

        $total = $gaji_pokok + $tunjangan + $lembur - $potongan;

        return view('gaji.hasil', compact(
            'karyawan', 'gaji_pokok', 'tunjangan',
            'potongan', 'lembur', 'total'
        ));
    }
}
