@extends('layouts.dashboard')

@section('content')
<h2>Hitung Gaji: {{ $karyawan->nama }}</h2>

<form action="{{ route('gaji.proses', $karyawan->id) }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Gaji Pokok</label>
        <input type="text" class="form-control" value="{{ $karyawan->gaji_pokok }}" readonly>
    </div>

    <div class="mb-3">
        <label>Tunjangan</label>
        <input type="number" name="tunjangan" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Potongan</label>
        <input type="number" name="potongan" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Jam Lembur</label>
        <input type="number" name="lembur" class="form-control" required>
        <small class="text-warning">Lembur dihitung 10.000 / jam</small>
    </div>

    <button class="btn btn-primary">Hitung Gaji</button>
</form>
@endsection
