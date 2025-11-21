@extends('layouts.dashboard')

@section('content')
<style>
.card-futuristic { background:#1d1d1d; color:#fff; border-radius:12px; border:none; }
body { background:#121212; }
.table-dark { background:#1d1d1d; }
.btn-primary { background:#0d6efd; border:none; }
.btn-warning { background:#ffc107; border:none; color:#000; }
.btn-danger { background:#dc3545; border:none; }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-white">Data Karyawan</h2>
    <a href="{{ route('karyawans.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Karyawan
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card card-futuristic">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>Jabatan</th>
                        <th>Gaji</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($karyawans as $index => $karyawan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $karyawan->nama_karyawan }}</td>
                        <td>
                            <span class="badge bg-info">{{ $karyawan->jabatan->jabatan }}</span>
                        </td>
                        <td>Rp {{ number_format($karyawan->jabatan->gaji, 0, ',', '.') }}</td>
                        <td>{{ $karyawan->email }}</td>
                        <td>{{ $karyawan->no_hp }}</td>
                        <td>
                            <a href="{{ route('karyawans.edit', $karyawan->id_karyawan) }}" 
                               class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('karyawans.destroy', $karyawan->id_karyawan) }}" 
                                  method="POST" 
                                  style="display:inline;" 
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data karyawan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection