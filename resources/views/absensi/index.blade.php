@extends('layouts.dashboard')

@section('content')
<h2>Data Absensi</h2>

<a href="{{ route('absensi.create') }}" class="btn btn-primary mb-3">+ Tambah Absensi</a>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Karyawan</th>
            <th>Tanggal</th>
            <th>Jam Masuk</th>
            <th>Jam Keluar</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($absensi as $a)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $a->karyawan->nama }}</td>
            <td>{{ $a->tanggal }}</td>
            <td>{{ $a->jam_masuk ?? '-' }}</td>
            <td>{{ $a->jam_keluar ?? '-' }}</td>
            <td>
                <span class="badge bg-info">
                    {{ ucfirst($a->status) }}
                </span>
            </td>
            <td>
                <a href="{{ route('absensi.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('absensi.destroy', $a->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
