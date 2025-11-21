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
    <h2 class="text-white">💼 Edit Jabatan</h2>
</div>

<div class="card card-futuristic">
    <form action="{{ route('jabatans.update', $jabatan->id_jabatan) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label class="form-label">Nama Jabatan</label>
            <input type="text" 
                   name="jabatan" 
                   class="form-control @error('jabatan') is-invalid @enderror" 
                   value="{{ old('jabatan', $jabatan->jabatan) }}">
            @error('jabatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Gaji (Rp)</label>
            <input type="number" 
                   name="gaji" 
                   class="form-control @error('gaji') is-invalid @enderror" 
                   value="{{ old('gaji', $jabatan->gaji) }}"
                   step="1000">
            @error('gaji')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="text-muted">Masukkan nominal tanpa titik atau koma</small>
        </div>

        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i>
            Jabatan ini digunakan oleh <strong>{{ $jabatan->karyawans()->count() }} karyawan</strong>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update
            </button>
            <a href="{{ route('jabatans.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </form>
</div>
@endsection