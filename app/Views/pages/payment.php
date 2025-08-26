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

                    <!-- Mode Pembayaran -->
                    <div class="form-section mb-4">
                        <label for="paymentMode" class="form-label">Mode Pembayaran</label>
                        <select class="form-control" id="paymentMode" name="paymentMode" required>
                            <option value="">Pilih Metode Pembayaran</option>
                            <option value="ewallet">E-wallet</option>
                            <option value="bank">Bank</option>
                        </select>
                    </div>

                    <!-- E-wallet Options (Gopay, Dana, Shopeepay) -->
                    <div class="form-section mb-4" id="ewalletOptions" style="display: none;">
                        <label for="ewalletChoice" class="form-label">Pilih E-wallet</label>
                        <select class="form-control" id="ewalletChoice" name="ewalletChoice">
                            <option value="">Pilih E-wallet</option>
                            <option value="gopay">Gopay</option>
                            <option value="dana">Dana</option>
                            <option value="shopeepay">ShopeePay</option>
                        </select>
                    </div>

                    <!-- Bank Option (BNI) -->
                    <div class="form-section mb-4" id="bankOption" style="display: none;">
                        <label for="bankAccount" class="form-label">Rekening Bank (BNI)</label>
                        <input type="text" class="form-control" id="bankAccount" name="bankAccount" placeholder="contoh: 1234567890" required>
                    </div>

                    <!-- Total Biaya -->
                    <div class="form-section mb-4">
                        <label for="totalCost" class="form-label">Total Biaya</label>
                        <input type="number" class="form-control" id="totalCost" name="totalCost" value="<?= esc($booking['total_biaya']); ?>" readonly>
                    </div>

                    <!-- Upload Bukti Pembayaran -->
                    <div class="form-section mb-4">
                        <label for="paymentProof" class="form-label">Upload Bukti Pembayaran</label>
                        <input type="file" class="form-control" id="paymentProof" name="paymentProof" accept="image/*,.pdf" required>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="d-flex justify-content-center mb-5">
                        <button type="submit" class="btn btn-primary btn-lg">Submit Pembayaran</button>
                    </div>
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