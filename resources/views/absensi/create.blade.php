@extends('layouts.dashboard')

@section('content')
<h2>Tambah Absensi</h2>

<form action="{{ route('absensi.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Karyawan</label>
        <select name="karyawan_id" class="form-control">
            @foreach ($karyawan as $k)
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Jam Masuk</label>
        <input type="time" name="jam_masuk" class="form-control">
    </div>

    <div class="mb-3">
        <label>Jam Keluar</label>
        <input type="time" name="jam_keluar" class="form-control">
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="hadir">Hadir</option>
            <option value="sakit">Sakit</option>
            <option value="izin">Izin</option>
            <option value="alfa">Alfa</option>
        </select>
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
