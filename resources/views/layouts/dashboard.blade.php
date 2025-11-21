<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #0f0f0f;
            color: #fff;
            font-family: 'Inter', sans-serif;
        }

        .sidebar {
            width: 250px;
            background: #181818;
            min-height: 100vh;
            padding: 20px;
            border-right: 1px solid #2c2c2c;
        }

        .sidebar h4 {
            letter-spacing: 1px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            padding: 10px 12px;
            margin-bottom: 8px;
            border-radius: 8px;
            color: #dcdcdc;
            text-decoration: none;
            font-size: 15px;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background: #272727;
            color: #fff;
        }

        .sidebar .active {
            background: #0d6efd;
            color: #fff;
        }

        .content {
            flex-grow: 1;
            padding: 30px;
        }
    </style>
</head>

<body>

    <div class="d-flex">

        <!-- Sidebar -->
        <div class="sidebar">
            <h4>ADMIN PANEL</h4>
            <div class="mb-3 p-2 bg-dark rounded text-center">
                <small class="text-gray">Selamat Datang,</small><br>
                <strong>{{ Auth::user()->name ?? 'User' }}</strong>
            </div>

            <a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                📊 Dashboard
            </a>

            <a href="{{ url('/karyawans') }}" class="{{ request()->is('karyawans*') ? 'active' : '' }}">
                👥 Data Karyawan
            </a>

            <a href="{{ url('/jabatans') }}" class="{{ request()->is('jabatan*') ? 'active' : '' }}">
                💰 Jabatan
            </a>

            <a href="{{ url('/absensi') }}" class="{{ request()->is('absensi*') ? 'active' : '' }}">
                📝 Absensi
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger w-100 mt-3">
                    🚪 Logout
                </button>
            </form>
        </div>

        <!-- Page Content -->
        <div class="content">
            @yield('content')
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>