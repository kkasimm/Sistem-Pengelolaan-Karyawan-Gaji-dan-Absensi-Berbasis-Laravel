@extends('layouts.dashboard')

@section('content')
<style>
/* minimal styling, dark background handled in layout */
.card-futuristic { background:#1d1d1d; color:#fff; border-radius:12px; border:none; }
body { background:#121212; }
</style>

<h2 class="text-white">Dashboard</h2>

<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card card-futuristic p-3">
            <h5>Total Karyawan</h5>
            <h2>{{ $totalKaryawan }}</h2>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card card-futuristic p-3">
            <h5>Hadir Hari Ini</h5>
            <h2>{{ $totalHadir }}</h2>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card card-futuristic p-3">
            <h5>Gaji Terbesar</h5>
            <h2>Rp {{ number_format($gajiTerbesar ?? 0) }}</h2>
        </div>
    </div>
</div>

<div class="card card-futuristic p-4 mt-3">
    <h5>Grafik Kehadiran 7 Hari Terakhir</h5>
    <canvas id="absensiChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('absensiChart');
    const labels = [
        @foreach($absensi7Hari as $d)
            "{{ $d->tgl }}",
        @endforeach
    ];
    const data = [
        @foreach($absensi7Hari as $d)
            {{ $d->jumlah }},
        @endforeach
    ];

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels,
            datasets: [{
                label: 'Jumlah Hadir',
                data,
                borderWidth: 2,
                tension: 0.3
            }]
        }
    });
</script>
@endsection
