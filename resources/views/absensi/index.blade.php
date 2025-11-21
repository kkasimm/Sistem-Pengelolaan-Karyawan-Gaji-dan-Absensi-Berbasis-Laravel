@extends('layouts.dashboard')

@section('content')
<style>
.card-futuristic { background:#1d1d1d; color:#fff; border-radius:12px; border:none; }
body { background:#121212; }
.table-dark { background:#1d1d1d; }
.badge { padding:0.5rem 0.8rem; }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-white">Data Absensi</h2>
    <a href="{{ route('absensi.create') }}" class="btn btn-success">
        <i class="fas fa-clock"></i> Absen Sekarang
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
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($absensis as $index => $absensi)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $absensi->karyawan->nama_karyawan }}</td>
                        <td>{{ \Carbon\Carbon::parse($absensi->tanggal)->format('d M Y') }}</td>
                        <td>
                            @if($absensi->jam_masuk)
                                <span class="badge bg-success">
                                    {{ \Carbon\Carbon::parse($absensi->jam_masuk)->format('H:i') }}
                                </span>
                            @else
                                <span class="badge bg-secondary">-</span>
                            @endif
                        </td>
                        <td>
                            @if($absensi->jam_keluar)
                                <span class="badge bg-danger">
                                    {{ \Carbon\Carbon::parse($absensi->jam_keluar)->format('H:i') }}
                                </span>
                            @else
                                <span class="badge bg-secondary">-</span>
                            @endif
                        </td>
                        <td>
                            @php
                                $kategori = $absensi->kategoriKehadiran->kategori_kehadiran;
                                $badgeClass = match($kategori) {
                                    'Hadir' => 'bg-success',
                                    'Izin' => 'bg-warning',
                                    'Sakit' => 'bg-info',
                                    'Alfa' => 'bg-danger',
                                    default => 'bg-secondary'
                                };
                            @endphp
                            <span class="badge {{ $badgeClass }}">{{ $kategori }}</span>
                        </td>
                        <td>
                            @if(!$absensi->jam_keluar)
                                <form action="{{ route('absensi.keluar', $absensi->id_absen) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-warning">
                                        <i class="fas fa-sign-out-alt"></i> Keluar
                                    </button>
                                </form>
                            @else
                                <span class="badge bg-secondary">Selesai</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data absensi</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection