<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::with('jabatan')->get();
        return view('karyawans.index', compact('karyawans'));
    }

    public function create()
    {
        $jabatans = Jabatan::all();
        return view('karyawans.create', compact('jabatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'jabatan_id' => 'required|exists:jabatans,id_jabatan',
            'email' => 'required|email|unique:karyawans,email',
            'no_hp' => 'required|string|max:15',
        ]);

        Karyawan::create($request->all());
        return redirect()->route('karyawans.index')->with('success', 'Karyawan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $jabatans = Jabatan::all();
        return view('karyawans.edit', compact('karyawan', 'jabatans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'jabatan_id' => 'required|exists:jabatans,id_jabatan',
            'email' => 'required|email|unique:karyawans,email,' . $id . ',id_karyawan',
            'no_hp' => 'required|string|max:15',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->all());
        return redirect()->route('karyawans.index')->with('success', 'Karyawan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();
        return redirect()->route('karyawans.index')->with('success', 'Karyawan berhasil dihapus!');
    }
}