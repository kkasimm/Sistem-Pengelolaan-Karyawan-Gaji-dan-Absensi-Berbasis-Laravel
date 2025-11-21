<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background:#121212; }
        .card-futuristic { background:#1d1d1d; color:#fff; border-radius:12px; border:none; }
        .form-control { background:#2a2a2a; border:1px solid #3a3a3a; color:#fff; }
        .form-control:focus { background:#2a2a2a; border-color:#0d6efd; color:#fff; }
        .form-control::placeholder { color:#666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-5">
                <div class="card card-futuristic p-4">
                    <div class="text-center mb-4">
                        <h2 class="text-white">ADMIN PANEL</h2>
                        <p class="text-light mb-0">Masuk ke dashboard admin</p>
                    </div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukkan password" required>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label text-light" for="remember">Ingat saya</label>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary">LOGIN</button>
                        </div>

                        <div class="text-center">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none">Lupa password?</a>
                            @endif
                            
                            @if (Route::has('register'))
                            <div class="mt-2">
                                <span class="text-light">Belum punya akun? </span>
                                <a href="{{ route('register') }}" class="text-decoration-none">Buat akun</a>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>