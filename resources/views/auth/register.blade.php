<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background:#121212; }
        .card-futuristic { background:#1d1d1d; color:#fff; border-radius:12px; border:none; }
        .form-control { background:#2a2a2a; border:1px solid #3a3a3a; color:#fff; }
        .form-control:focus { background:#2a2a2a; border-color:#0d6efd; color:#fff; box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25); }
        .form-control::placeholder { color:#666; }
        .text-muted a { color:#0d6efd !important; text-decoration: none; }
        .text-muted a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-5">
                <div class="card card-futuristic p-4">
                    <div class="text-center mb-4">
                        <h2 class="text-white">BUAT AKUN</h2>
                        <p class="text-light mb-0">Daftar untuk mengakses dashboard admin</p>
                    </div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required autofocus>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Minimal 8 karakter" required>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Ulangi password" required>
                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary">DAFTAR</button>
                        </div>

                        <div class="text-center">
                            <span class="text-light">Sudah punya akun? </span>
                            <a href="{{ route('login') }}" class="text-decoration-none">Login di sini</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>