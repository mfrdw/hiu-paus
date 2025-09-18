<?= $this->extend('layout_admin/header') ?>
<?= $this->section('content') ?>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <!-- Kartu Pembayaran -->
            <div class="col-md-4 mb-4">
                <div class="card shadow border-0 rounded-3" style="background: #f8f9fa;">
                    <div class="card-body p-4 text-center">
                        <h5 class="card-title text-primary mb-3">Pembayaran</h5>
                        <p class="card-text">Kelola metode pembayaran Anda, tambahkan metode baru, atau perbarui metode yang sudah ada.</p>
                        <a href="<?= base_url('setting_payments') ?>" class="btn btn-outline-primary btn-lg w-100">Ke Pembayaran</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>