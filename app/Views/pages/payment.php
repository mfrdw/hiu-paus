<?= $this->extend('layout_user/header') ?>
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
<div class="container mt-5">
    <h2 class="text-center font-weight-bold mb-4">Pembayaran Open Trip Whale Shark Teluk Saleh</h2>
    <p class="text-center mb-5">Silahkan lakukan pembayaran menggunakan salah satu metode di bawah ini.</p>

    <div class="row">
        <!-- Detail Pemesanan (Kiri) -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="mb-4 font-weight-bold">Detail Pemesanan</h4>
                    <div class="form-section mb-4">
                        <label for="fullName" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" value="<?= esc($booking['full_name']); ?>" placeholder="contoh: John Maeda" required readonly>
                    </div>
                    <div class="form-section mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= esc($booking['email']); ?>" placeholder="contoh: email@example.com" required readonly>
                    </div>
                    <div class="form-section mb-4">
                        <label for="mobile" class="form-label">Nomor HP</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" value="<?= esc($booking['kontak']); ?>" placeholder="contoh: +62 8123456789" required readonly>
                    </div>
                    <div class="form-section mb-4">
                        <label for="peopleCount" class="form-label">Jumlah Orang</label>
                        <input type="number" class="form-control" id="peopleCount" name="peopleCount" value="<?= esc($booking['jumlah_orang']); ?>" placeholder="contoh: 2" required readonly>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pembayaran (Kanan) -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="mb-4 font-weight-bold">Metode Pembayaran</h4>

                    <!-- FORM MULAI -->
                    <form action="<?= base_url('payment/update') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" class="form-control" name="booking_id" value="<?= esc($booking['id']); ?>">

                        <?php
                        $sudahBayar = !empty($booking['mode_pembayaran']) && !empty($booking['upload_gambar']);
                        ?>

                        <!-- Mode Pembayaran -->
                        <div class="form-section mb-4">
                            <label for="paymentMode" class="form-label">Mode Pembayaran</label>
                            <select class="form-control" id="paymentMode" name="paymentMode" <?= $sudahBayar ? 'disabled' : '' ?> required>
                                <option value="">Pilih Metode Pembayaran</option>
                                <option value="ewallet" <?= ($booking['mode_pembayaran'] != 'bni' && !empty($booking['mode_pembayaran'])) ? 'selected' : '' ?>>E-wallet</option>
                                <option value="bank" <?= ($booking['mode_pembayaran'] == 'bni') ? 'selected' : '' ?>>Bank</option>
                            </select>
                        </div>

                        <!-- E-wallet Options -->
                        <div class="form-section mb-4" id="ewalletOptions" style="display: <?= ($booking['mode_pembayaran'] != 'bni' && !empty($booking['mode_pembayaran'])) ? 'block' : 'none'; ?>;">
                            <label for="ewalletChoice" class="form-label">Pilih E-wallet</label>
                            <select class="form-control" id="ewalletChoice" name="ewalletChoice" <?= $sudahBayar ? 'disabled' : '' ?>>
                                <option value="">Pilih E-wallet</option>
                                <option value="gopay" <?= ($booking['mode_pembayaran'] == 'gopay') ? 'selected' : '' ?>>Gopay</option>
                                <option value="dana" <?= ($booking['mode_pembayaran'] == 'dana') ? 'selected' : '' ?>>Dana</option>
                                <option value="qris" <?= ($booking['mode_pembayaran'] == 'shopeepay') ? 'selected' : '' ?>>ShopeePay</option>
                            </select>
                        </div>

                        <!-- Bank Option -->
                        <div class="form-section mb-4" id="bankOption" style="display: <?= ($booking['mode_pembayaran'] == 'bni') ? 'block' : 'none'; ?>;">
                            <label for="bankAccount" class="form-label">Rekening Bank (BNI)</label>
                            <input type="text" class="form-control" id="bankAccount" name="bankAccount" value="<?= esc($booking['bank_account'] ?? '') ?>" <?= $sudahBayar ? 'readonly' : '' ?>>
                        </div>

                        <!-- Total Biaya -->
                        <div class="form-section mb-4">
                            <label for="totalCost" class="form-label">Total Biaya</label>
                            <input type="number" class="form-control" id="totalCost" name="totalCost" value="<?= esc($booking['total_biaya']); ?>" readonly>
                        </div>

                        <!-- Upload Bukti Pembayaran -->
                        <div class="form-section mb-4">
                            <label for="paymentProof" class="form-label">Upload Bukti Pembayaran</label>
                            <?php if ($sudahBayar && !empty($booking['upload_gambar'])): ?>
                                <div class="alert alert-success">
                                    Bukti sudah diupload: <br>
                                    <img src="<?= base_url('uploads/bukti_bayar/' . $booking['upload_gambar']); ?>" alt="Bukti" class="img-fluid mt-2 rounded" style="max-height:200px;">
                                </div>
                            <?php else: ?>
                                <input type="file" class="form-control" id="paymentProof" name="paymentProof" accept="image/*,.pdf" required>
                            <?php endif; ?>
                        </div>

                        <!-- Tombol Submit -->
                        <?php if (!$sudahBayar): ?>
                            <div class="d-flex justify-content-center mb-5">
                                <button type="submit" class="btn btn-primary btn-lg">Submit Pembayaran</button>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info text-center">
                                Pembayaran sudah dilakukan. Tidak bisa mengubah data.
                            </div>
                        <?php endif; ?>
                    </form>
                    <!-- FORM SELESAI -->

                </div>
            </div>
        </div>

    </div>

    <!-- Gambar Metode Pembayaran -->
    <div class="payment-method mt-5 d-flex justify-content-center flex-wrap">
        <div class="payment-item p-3">
            <img src="../dist/assets/images/gopay.png" alt="Gopay" class="img-fluid" style="max-width: 120px;">
        </div>
        <div class="payment-item p-3">
            <img src="../dist/assets/images/dana.png" alt="Dana" class="img-fluid" style="max-width: 120px;">
        </div>
        <div class="payment-item p-3">
            <img src="../dist/assets/images/shopeepay.png" alt="ShopeePay" class="img-fluid" style="max-width: 120px;">
        </div>
        <div class="payment-item p-3">
            <img src="../dist/assets/images/bni.png" alt="BNI" class="img-fluid" style="max-width: 120px;">
        </div>
    </div>
</div>

<script>
    // Fungsi untuk menampilkan pilihan pembayaran yang sesuai
    document.getElementById('paymentMode').addEventListener('change', function() {
        const paymentMode = this.value;
        const ewalletOptions = document.getElementById('ewalletOptions');
        const bankOption = document.getElementById('bankOption');

        if (paymentMode === 'ewallet') {
            ewalletOptions.style.display = 'block';
            bankOption.style.display = 'none';
        } else if (paymentMode === 'bank') {
            ewalletOptions.style.display = 'none';
            bankOption.style.display = 'block';
        } else {
            ewalletOptions.style.display = 'none';
            bankOption.style.display = 'none';
        }
    });
</script>

<?= $this->endSection() ?>