@extends('layouts.dashboard')

@section('content')
<style>
.card-futuristic { background:#1d1d1d; color:#fff; border-radius:12px; border:none; padding:2rem; }
body { background:#121212; }
.form-control, .form-select { background:#2d2d2d; color:#fff; border:1px solid #444; }
.form-control:focus, .form-select:focus { background:#2d2d2d; color:#fff; border-color:#0d6efd; }
.form-label { color:#fff; }
</style>

<div class="mb-4">
    <h2 class="text-white">Absen Masuk</h2>
    <p class="text-muted">Waktu: {{ \Carbon\Carbon::now()->format('d F Y, H:i:s') }}</p>
</div>

<div class="card card-futuristic">
    <form action="{{ route('absensi.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">Pilih Karyawan</label>
            <select name="karyawan_id" class="form-select @error('karyawan_id') is-invalid @enderror">
                <option value="">-- Pilih Karyawan --</option>
                @foreach($karyawans as $karyawan)
                    <option value="{{ $karyawan->id_karyawan }}">
                        {{ $karyawan->nama_karyawan }} - {{ $karyawan->jabatan->jabatan }}
                    </option>
                @endforeach
            </select>
            @error('karyawan_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori Kehadiran</label>
            <select name="kategori_kehadiran_id" class="form-select @error('kategori_kehadiran_id') is-invalid @enderror">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id_kategori }}">
                        {{ $kategori->kategori_kehadiran }}
                    </option>
                @endforeach
            </select>
            @error('kategori_kehadiran_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i>
            Waktu absen akan otomatis tercatat saat Anda klik tombol <strong>Absen Masuk</strong>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-check"></i> Absen Masuk
            </button>
            <a href="{{ route('absensi.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </form>
</div>
@endsection