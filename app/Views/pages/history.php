<?= $this->extend('layout_user/header') ?>
<?= $this->section('content') ?>

<div class="container" style="max-width: 1200px; margin-top: 50px;">
    <h2 class="text-center mb-4">Riwayat Pemesanan</h2>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Email</th>
                    <th scope="col">Kontak</th>
                    <th scope="col">Jumlah Orang</th>
                    <th scope="col">Total Biaya</th>
                    <th scope="col">Status</th>
                    <th scope="col">Invoice</th> <!-- 🧾 kolom baru -->
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($orders)): ?>
                    <?php foreach ($orders as $index => $order): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td>
                                <a href="<?= base_url('verifikasi/' . $order['id']); ?>">
                                    <?= esc($order['full_name']); ?>
                                </a>
                            </td>
                            <td><?= esc($order['email']) ?></td>
                            <td><?= esc($order['kontak']) ?></td>
                            <td><?= esc($order['jumlah_orang']) ?></td>
                            <td>Rp <?= number_format($order['total_biaya'], 0, ',', '.') ?></td>
                            <td>
                                <?php if ($order['role_payment'] == 'pending'): ?>
                                    <span class="badge bg-warning">Pending</span>
                                <?php elseif ($order['role_payment'] == 'confirmed'): ?>
                                    <span class="badge bg-info">Confirmed</span>
                                <?php elseif ($order['role_payment'] == 'completed'): ?>
                                    <span class="badge bg-success">Completed</span>
                                <?php endif; ?>
                            </td>

                            <!-- 🧾 Invoice -->
                            <td>
                                <a href="<?= base_url('invoice/' . $order['id']); ?>">
                                    <i class=" fas fa-file-download me-1"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada pemesanan untuk ditampilkan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
</div>

<?= $this->endSection() ?>