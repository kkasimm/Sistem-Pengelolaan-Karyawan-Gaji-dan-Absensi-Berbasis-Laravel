@extends('layouts.dashboard')

@section('content')
<h2>Data Gaji Karyawan</h2>

<table class="table table-dark table-bordered mt-4">
    <tr>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Gaji Pokok</th>
        <th>Aksi</th>
    </tr>

    @foreach ($karyawan as $k)
    <tr>
        <td>{{ $k->nama }}</td>
        <td>{{ $k->jabatan }}</td>
        <td>Rp {{ number_format($k->gaji_pokok) }}</td>
        <td>
            <a href="/gaji/{{ $k->id }}" class="btn btn-primary btn-sm">Hitung</a>
        </td>
    </tr>
    @endforeach

</table>
@endsection
