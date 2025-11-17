@extends('layouts.dashboard')

@section('content')
<h2>Hasil Perhitungan Gaji</h2>

<table class="table table-dark table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ $karyawan->nama }}</td>
    </tr>
    <tr>
        <th>Gaji Pokok</th>
        <td>Rp {{ number_format($gaji_pokok) }}</td>
    </tr>
    <tr>
        <th>Tunjangan</th>
        <td>Rp {{ number_format($tunjangan) }}</td>
    </tr>
    <tr>
        <th>Potongan</th>
        <td>Rp {{ number_format($potongan) }}</td>
    </tr>
    <tr>
        <th>Lembur</th>
        <td>Rp {{ number_format($lembur) }}</td>
    </tr>
    <tr>
        <th><b>Total Gaji</b></th>
        <td><b>Rp {{ number_format($total) }}</b></td>
    </tr>
</table>

<a href="/gaji" class="btn btn-secondary">Kembali</a>
@endsection
