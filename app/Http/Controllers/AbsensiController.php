<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{

    public function index()
    {
        $absensi = Absensi::with('karyawan')->get();
        return view('absensi.index', compact('absensi'));
    }

    public function create()
    {
        $karyawan = Karyawan::all();
        return view('absensi.create', compact('karyawan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'tanggal' => 'required|date',
            'jam_masuk' => 'nullable',
            'jam_keluar' => 'nullable',
            'status' => 'required'
        ]);

        Absensi::create([
            'karyawan_id' => $request->karyawan_id,
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
            'status' => $request->status
        ]);

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        $karyawan = Karyawan::all();

        return view('absensi.edit', compact('absensi', 'karyawan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'tanggal' => 'required|date',
            'jam_masuk' => 'nullable',
            'jam_keluar' => 'nullable',
            'status' => 'required'
        ]);

        $absensi = Absensi::findOrFail($id);

        $absensi->update([
            'karyawan_id' => $request->karyawan_id,
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
            'status' => $request->status
        ]);

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil diupdate!');
    }

    public function destroy($id)
    {
        Absensi::destroy($id);
        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil dihapus!');
    }
}
