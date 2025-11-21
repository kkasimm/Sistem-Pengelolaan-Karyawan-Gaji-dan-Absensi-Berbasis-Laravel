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
    <h2 class="text-white">Tambah Karyawan Baru</h2>
</div>

<div class="card card-futuristic">
    <form action="{{ route('karyawans.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">Nama Karyawan</label>
            <input type="text" 
                   name="nama_karyawan" 
                   class="form-control @error('nama_karyawan') is-invalid @enderror" 
                   value="{{ old('nama_karyawan') }}"
                   placeholder="Masukkan nama lengkap">
            @error('nama_karyawan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <select name="jabatan_id" class="form-select @error('jabatan_id') is-invalid @enderror">
                <option value="">-- Pilih Jabatan --</option>
                @foreach($jabatans as $jabatan)
                    <option value="{{ $jabatan->id_jabatan }}" {{ old('jabatan_id') == $jabatan->id_jabatan ? 'selected' : '' }}>
                        {{ $jabatan->jabatan }} - Rp {{ number_format($jabatan->gaji, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
            @error('jabatan_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" 
                   name="email" 
                   class="form-control @error('email') is-invalid @enderror" 
                   value="{{ old('email') }}"
                   placeholder="contoh@email.com">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">No HP</label>
            <input type="text" 
                   name="no_hp" 
                   class="form-control @error('no_hp') is-invalid @enderror" 
                   value="{{ old('no_hp') }}"
                   placeholder="081234567890">
            @error('no_hp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="{{ route('karyawans.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </form>
</div>
@endsection