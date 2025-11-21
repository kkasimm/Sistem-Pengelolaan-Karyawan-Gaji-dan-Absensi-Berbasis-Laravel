@extends('layouts.dashboard')

@section('content')
    <style>
        .card-futuristic {
            background: #1d1d1d;
            color: #fff;
            border-radius: 12px;
            border: none;
        }

        body {
            background: #121212;
        }

        .table-dark {
            background: #1d1d1d;
        }

        .btn-primary {
            background: #0d6efd;
            border: none;
        }

        .btn-warning {
            background: #ffc107;
            border: none;
            color: #000;
        }

        .btn-danger {
            background: #dc3545;
            border: none;
        }
    </style>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white">💼 Data Jabatan</h2>
        <a href="{{ route('jabatans.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Jabatan
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
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
                            <th>Nama Jabatan</th>
                            <th>Gaji</th>
                            <th>Jumlah Karyawan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jabatans as $index => $jabatan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <strong>{{ $jabatan->jabatan }}</strong>
                                </td>
                                <td>
                                    <span class="badge bg-success" style="font-size:1rem;">
                                        Rp {{ number_format($jabatan->gaji, 0, ',', '.') }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-info">
                                        {{ $jabatan->karyawans_count }} Orang
                                    </span>
                                </td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('jabatans.edit', $jabatan->id_jabatan) }}"
                                        class="btn btn-sm btn-warning me-1">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('jabatans.destroy', $jabatan->id_jabatan) }}" method="POST"
                                        style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus jabatan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash me-1"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data jabatan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection