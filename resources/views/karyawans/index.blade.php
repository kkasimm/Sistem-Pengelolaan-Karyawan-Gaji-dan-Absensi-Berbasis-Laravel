@extends('layouts.dashboard')

@section('content')

<h2>Data Karyawan</h2>

<a href="/karyawans/create" class="btn btn-primary mb-3">+ Tambah Karyawan</a>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Gaji Pokok</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($karyawan as $k => $karyawan)
        <tr>
            <td>{{ $k+1 }}</td>
            <td>{{ $karyawan->nama }}</td>
            <td>{{ $karyawan->jabatan }}</td>
            <td>Rp {{ number_format($karyawan->gaji_pokok) }}</td>

            <td>
                <a href="/karyawans/{{ $karyawan->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                <form action="/karyawans/{{ $karyawan->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
