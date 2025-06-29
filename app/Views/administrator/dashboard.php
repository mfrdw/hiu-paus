<?= $this->extend('layout_admin/header') ?>
<?= $this->section('content') ?>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <!-- Dashboard Overview Cards -->
            <div class="col-md-3">
                <div class="card-box bg-blue">
                    <i class="fas fa-cogs"></i>
                    <h4>24</h4>
                    <p>Pesanan Baru</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-box bg-green">
                    <i class="fas fa-chart-line"></i>
                    <h4>156</h4>
                    <p>Kunjungan Bulan Ini</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-box bg-yellow">
                    <i class="fas fa-check-circle"></i>
                    <h4>8</h4>
                    <p>Pendukung Konfirmasi</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-box bg-red">
                    <i class="fas fa-dollar-sign"></i>
                    <h4>Rp 12.5M</h4>
                    <p>Pendapatan Bulan Ini</p>
                </div>
            </div>
        </div>

        <!-- Grafik Kunjungan Harian -->
        <div class="row">
            <div class="col-md-12">
                <div class="card-box bg-light text-dark">
                    <h5>Grafik Kunjungan Harian</h5>
                    <canvas id="visitChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Tabel Aktivitas Terbaru -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card-box bg-light text-dark">
                    <h5>Aktivitas Terbaru</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Waktu</th>
                                <th scope="col">Aktivitas</th>
                                <th scope="col">User</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>10:30</td>
                                <td>Pesanan baru #PW001</td>
                                <td>John Doe</td>
                                <td><span class="badge badge-warning">Pending</span></td>
                            </tr>
                            <tr>
                                <td>09:15</td>
                                <td>Pembayaran dikonfirmasi #PW002</td>
                                <td>Jane Smith</td>
                                <td><span class="badge badge-success">Confirmed</span></td>
                            </tr>
                            <tr>
                                <td>06:45</td>
                                <td>Kunjungan selesai #PW003</td>
                                <td>Bob Wilson</td>
                                <td><span class="badge badge-primary">Completed</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Menambahkan script untuk Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('visitChart').getContext('2d');
    var visitChart = new Chart(ctx, {
        type: 'line', // Tipe grafik (line chart)
        data: {
            labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'], // Label untuk setiap hari
            datasets: [{
                label: 'Kunjungan Harian',
                data: [10, 25, 50, 75, 90, 120, 150], // Data jumlah kunjungan per hari
                borderColor: '#007bff', // Warna garis
                backgroundColor: 'rgba(0, 123, 255, 0.2)', // Warna latar belakang area grafik
                borderWidth: 2
            }]
        },
        options: {
            responsive: true, // Grafik akan responsif di berbagai perangkat
            scales: {
                y: {
                    beginAtZero: true // Y-axis mulai dari angka 0
                }
            }
        }
    });
</script>

<?= $this->endSection() ?>