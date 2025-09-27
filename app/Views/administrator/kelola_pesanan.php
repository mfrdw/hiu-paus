<?= $this->extend('layout_admin/header') ?>
<?= $this->section('content') ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    <?php if (session()->getFlashdata('success')): ?>
    Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    }).fire({
        icon: 'success',
        title: '<?= session()->getFlashdata('success'); ?>'
    });
    <?php elseif (session()->getFlashdata('error')): ?>
    Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    }).fire({
        icon: 'error',
        title: '<?= session()->getFlashdata('error'); ?>'
    });
    <?php endif; ?>
});
</script>

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
                                <input type="text" class="form-control" placeholder="Cari pesanan..."
                                    aria-label="Search">
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
                                        <th scope="col">Bukti</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($bookings)): ?>
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada data pemesanan</td>
                                    </tr>
                                    <?php else: ?>
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
                                            <span
                                                class="badge 
                            <?= ($booking['role_payment'] == 'pending') ? 'badge-warning' : (($booking['role_payment'] == 'confirmed') ? 'badge-success' : 'badge-primary'); ?>">
                                                <?= ucfirst($booking['role_payment']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php if (!empty($booking['upload_gambar'])): ?>
                                            <a href="<?= base_url('uploads/bukti_bayar/' . $booking['upload_gambar']); ?>"
                                                target="_blank" class="btn btn-info btn-sm">Lihat Bukti</a>
                                            <?php else: ?>
                                            <span class="text-muted">Belum Upload</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#editBookingModal" data-id="<?= $booking['id']; ?>"
                                                data-full_name="<?= esc($booking['full_name']); ?>"
                                                data-paket="<?= $booking['jumlah_orang'] == 1 && $booking['total_biaya'] == 650000 ? 'Open Trip Whale Shark Teluk Saleh' : 'Private Trip Whale Shark Teluk Saleh'; ?>"
                                                data-jumlah_orang="<?= esc($booking['jumlah_orang']); ?>"
                                                data-total_biaya="<?= esc($booking['total_biaya']); ?>"
                                                data-role_payment="<?= esc($booking['role_payment']); ?>"
                                                data-upload_gambar="<?= esc($booking['upload_gambar']); ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <!-- Delete Button with Font Awesome Icon -->
                                            <a href="<?= base_url('/delete/' . $booking['id']); ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>

                                    </tr>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Modal Edit -->
<div class="modal fade" id="editBookingModal" tabindex="-1" role="dialog" aria-labelledby="editBookingModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('update_booking/' . $booking['id']); ?>" method="post">

                <?= csrf_field() ?>
                <input type="hidden" name="id" id="booking_id" value="<?= esc($booking['id']) ?>">

                <div class="modal-header">
                    <h5 class="modal-title" id="editBookingModalLabel">Edit Booking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Nama Pemesan -->
                    <div class="form-group">
                        <label for="full_name">Nama Pemesan</label>
                        <input type="text" name="fullName" id="full_name" class="form-control"
                            value="<?= esc($booking['full_name']) ?>" required>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="<?= esc($booking['email']) ?>" required>
                    </div>

                    <!-- Kontak -->
                    <div class="form-group">
                        <label for="mobile">Kontak</label>
                        <input type="text" name="mobile" id="mobile" class="form-control"
                            value="<?= esc($booking['kontak']) ?>" required>
                    </div>

                    <!-- Jumlah Orang -->
                    <div class="form-group">
                        <label for="jumlah_orang">Jumlah Orang</label>
                        <input type="number" name="peopleCount" id="peopleCount" class="form-control"
                            value="<?= esc($booking['jumlah_orang']) ?>" required min="1">
                    </div>

                    <!-- Status Pembayaran -->
                    <div class="form-group">
                        <label for="role_payment">Status Pembayaran</label>
                        <select name="rolePayment" id="role_payment" class="form-control">
                            <option value="pending" <?= $booking['role_payment'] == 'pending' ? 'selected' : '' ?>>
                                Pending</option>
                            <option value="confirmed" <?= $booking['role_payment'] == 'confirmed' ? 'selected' : '' ?>>
                                Confirmed</option>
                            <option value="completed" <?= $booking['role_payment'] == 'completed' ? 'selected' : '' ?>>
                                Completed</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?= $this->endSection() ?>