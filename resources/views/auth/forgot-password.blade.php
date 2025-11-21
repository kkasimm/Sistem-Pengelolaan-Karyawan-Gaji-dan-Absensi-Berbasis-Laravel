<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background:#121212; }
        .card-futuristic { background:#1d1d1d; color:#fff; border-radius:12px; border:none; }
        .form-control { background:#2a2a2a; border:1px solid #3a3a3a; color:#fff; }
        .form-control:focus { background:#2a2a2a; border-color:#0d6efd; color:#fff; box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25); }
        .form-control::placeholder { color:#666; }
        .text-muted { color: #aaa !important; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-5">
                <div class="card card-futuristic p-4">
                    <div class="text-center mb-3">
                        <h2 class="text-white">LUPA PASSWORD?</h2>
                        <p class="text-muted mb-4">
                            Masukkan email Anda. Kami akan mengirimkan tautan untuk mengatur ulang password.
                        </p>
                    </div>

                    <!-- Session Status -->
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Masukkan email terdaftar" required autofocus>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                KIRIM LINK RESET
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <a href="{{ route('login') }}" class="text-decoration-none">&larr; Kembali ke login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>