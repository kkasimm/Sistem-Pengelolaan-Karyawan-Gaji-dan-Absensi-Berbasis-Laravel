<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::withCount('karyawans')->get();
        return view('jabatans.index', compact('jabatans'));
    }

    public function create()
    {
        return view('jabatans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255|unique:jabatans,jabatan',
            'gaji' => 'required|numeric|min:0',
        ]);

        Jabatan::create($request->all());
        return redirect()->route('jabatans.index')->with('success', 'Jabatan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return view('jabatans.edit', compact('jabatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255|unique:jabatans,jabatan,' . $id . ',id_jabatan',
            'gaji' => 'required|numeric|min:0',
        ]);

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update($request->all());
        return redirect()->route('jabatans.index')->with('success', 'Jabatan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        
        // Cek apakah ada karyawan dengan jabatan ini
        if ($jabatan->karyawans()->count() > 0) {
            return redirect()->route('jabatans.index')
                ->with('error', 'Tidak dapat menghapus jabatan yang masih memiliki karyawan!');
        }
        
        $jabatan->delete();
        return redirect()->route('jabatans.index')->with('success', 'Jabatan berhasil dihapus!');
    }
}