<?= $this->extend('layout_admin/header') ?>
<?= $this->section('content') ?>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Card untuk Menampilkan Tabel Pembayaran -->
                <div class="card shadow border-0 rounded-3">
                    <div class="card-header">
                        <h5 class="card-title">Data Pembayaran</h5>
                        <button class="btn btn-success" data-toggle="modal" data-target="#addPaymentModal">Tambah Pembayaran</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="paymentTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Payments</th>
                                    <th>Number</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($payments) && is_array($payments)): ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($payments as $item): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= esc($item['payments']) ?></td>
                                            <td><?= esc($item['number']) ?></td>
                                            <td><?= esc($item['status']) ?></td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editPaymentModal<?= esc($item['id']) ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <!-- Tombol Delete -->
                                                <a href="<?= site_url('setting-payment/delete/' . $item['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data pembayaran ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data pembayaran</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Menambah Pembayaran -->
<div class="modal fade" id="addPaymentModal" tabindex="-1" role="dialog" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPaymentModalLabel">Tambah Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('setting-payment/create') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="paymentMethod">Payments</label>
                        <input type="text" class="form-control" id="paymentMethod" name="paymentMethod" required>
                    </div>
                    <div class="form-group">
                        <label for="paymentNumber">Number</label>
                        <input type="text" class="form-control" id="paymentNumber" name="paymentNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="paymentMethodType">Metode Pembayaran</label>
                        <select class="form-control" id="paymentMethodType" name="paymentMethodType" required>
                            <option value="e-wallet">E-Wallet</option>
                            <option value="bank-transfer">Transfer Bank</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit -->
<?php foreach ($payments as $item): ?>
    <div class="modal fade" id="editPaymentModal<?= esc($item['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="editPaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= site_url('setting-payment/update') ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_payment" id="id_payment" value="<?= esc($item['id']) ?>">

                    <div class="modal-header">
                        <h5 class="modal-title" id="editPaymentModalLabel">Edit Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="paymentMethod">Payments</label>
                            <input type="text" name="paymentMethod" id="paymentMethod" class="form-control" value="<?= esc($item['payments']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="paymentNumber">Number</label>
                            <input type="text" name="paymentNumber" id="paymentNumber" class="form-control" value="<?= esc($item['number']) ?>" required>
                        </div>
                        <!-- Dropdown Metode Pembayaran -->
                        <div class="form-group">
                            <label for="paymentMethodType">Metode Pembayaran</label>
                            <select class="form-control" id="paymentMethodType" name="paymentMethodType" required>
                                <option value="e-wallet" <?= ($item['metode'] == 'e-wallet') ? 'selected' : '' ?>>E-Wallet</option>
                                <option value="transfer-bank" <?= ($item['metode'] == 'transfer-bank') ? 'selected' : '' ?>>Transfer Bank</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="active" <?= ($item['status'] == 'active') ? 'selected' : '' ?>>Aktif</option>
                                <option value="inactive" <?= ($item['status'] == 'inactive') ? 'selected' : '' ?>>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<script>
    // Event listener untuk modal edit
    $('#editPaymentModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Tombol yang memicu modal
        var id = button.data('id');
        var paymentMethod = button.data('paymentMethod');
        var paymentNumber = button.data('paymentNumber');
        var status = button.data('status');
        var status = button.data('paymentMethodType');

        // Update modal dengan data yang didapat
        var modal = $(this);
        modal.find('#id_payment').val(id);
        modal.find('#paymentMethod').val(paymentMethod);
        modal.find('#paymentNumber').val(paymentNumber);
        modal.find('#status').val(status);
        modal.find('#paymentMethodType').val(paymentMethodType);
    });
</script>


<?= $this->endSection() ?>