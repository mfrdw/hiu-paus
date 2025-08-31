<?= $this->extend('layout_admin/header') ?>
<?= $this->section('content') ?>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <!-- Card for Search and Filter -->
            <div class="col-md-12">
                <h5 class="card-title">Kelola Pesanan</h5>
                <div class="card my-3 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Search Bar -->
                            <div class="d-flex w-75">
                                <input type="text" class="form-control" placeholder="Cari pesanan..." aria-label="Search">
                                <button class="btn btn-primary ml-2">Cari</button>
                            </div>
                            <!-- Filter Dropdown -->
                            <div class="d-flex align-items-center">
                                <select class="custom-select mx-2">
                                    <option selected>Semua Status</option>
                                    <option value="1">Pending</option>
                                    <option value="2">Confirmed</option>
                                    <option value="3">Completed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card for Pesanan Table with Export Button -->
            <div class="col-md-12">
                <div class="card my-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between align-items-center">
                            Daftar Pesanan
                            <button class="btn btn-success"><i class="fas fa-file-export"></i> Export Excel</button>
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Pemesan</th>
                                        <th scope="col">Paket</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Bukti Bayar</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $index = 1; ?>
                                    <?php foreach ($bookings as $booking): ?>
                                        <tr>
                                            <td><?= $index++; ?></td>
                                            <td><?= esc($booking['full_name']); ?></td>
                                            <td>
                                                <?php
                                                if ($booking['jumlah_orang'] == 1 && $booking['total_biaya'] == 650000) {
                                                    echo 'Open Trip Whale Shark Teluk Saleh';
                                                } else {
                                                    echo 'Private Trip Whale Shark Teluk Saleh';
                                                }
                                                ?>
                                            </td>
                                            <td><?= esc($booking['created_at']); ?></td>
                                            <td><?= esc($booking['jumlah_orang']); ?> orang</td>
                                            <td>Rp <?= number_format($booking['total_biaya'], 0, ',', '.'); ?></td>
                                            <td>
                                                <span class="badge 
                        <?= ($booking['role_payment'] == 'pending') ? 'badge-warning' : (($booking['role_payment'] == 'confirmed') ? 'badge-success' : 'badge-primary'); ?>">
                                                    <?= ucfirst($booking['role_payment']); ?>
                                                </span>
                                            </td>
                                            <td>
                                                <?php if (!empty($booking['upload_gambar'])): ?>
                                                    <a href="<?= base_url('uploads/bukti_bayar/' . $booking['upload_gambar']); ?>" target="_blank" class="btn btn-info btn-sm">Lihat Bukti</a>
                                                <?php else: ?>
                                                    <span class="text-muted">Belum Upload</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('admin/edit_booking/' . $booking['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="<?= base_url('admin/delete_booking/' . $booking['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?');">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Custom CSS for Table and Layout -->
<style>
    .table th,
    .table td {
        vertical-align: middle;
    }

    .badge-warning {
        background-color: #ffc107;
    }

    .badge-success {
        background-color: #28a745;
    }

    .badge-primary {
        background-color: #007bff;
    }

    .form-control {
        height: 40px;
    }

    .custom-select {
        width: auto;
        max-width: 200px;
    }

    .btn-group .btn {
        margin-right: 10px;
    }
</style>

<?= $this->endSection() ?>