@extends('layouts.admin')

@section('content')
    <h2 class="mb-4">Dashboard Admin</h2>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5>Total Menu</h5>
                    <h2>{{ \App\Models\Menu::count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5>Total Pesanan</h5>
                    <h2>{{ \App\Models\Order::count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5>Testimoni Menunggu</h5>
                    <h2>{{ \App\Models\Testimonial::where('approved', false)->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    <h4>Grafik Jumlah Pesanan</h4>
    <canvas id="orderChart" height="100"></canvas>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('orderChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($dates) !!},
                    datasets: [{
                        label: 'Jumlah Pesanan',
                        data: {!! json_encode($totals) !!},
                        borderColor: '#212529',
                        backgroundColor: 'rgba(33, 37, 41, 0.2)',
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        });
    </script>
@endsection