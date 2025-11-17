@extends('layouts.dashboard')

@section('content')
<h2>Edit Karyawan</h2>

<form action="/karyawans/{{ $karyawan->id }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $karyawan->nama }}">
    </div>

    <div class="mb-3">
        <label>Jabatan</label>
        <input type="text" name="jabatan" class="form-control" value="{{ $karyawan->jabatan }}">
    </div>

    <div class="mb-3">
        <label>Gaji Pokok</label>
        <input type="number" name="gaji_pokok" class="form-control" value="{{ $karyawan->gaji_pokok }}">
    </div>

    <button class="btn btn-primary">Update</button>
</form>

@endsection
