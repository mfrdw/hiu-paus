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
    <div class="row">
        <!-- Detail Pemesanan (Kiri) -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body" style="padding: 30px; background-color: #f8f9fa;">
                    <h4 class="mb-4" style="font-weight: bold;">Detail Pemesanan</h4>

                    <!-- Nama Lengkap -->
                    <div class="form-section" style="margin-bottom: 1.5rem;">
                        <label for="fullName" class="form-label" style="font-weight: bold; font-size: 1rem;">Nama
                            Lengkap</label>
                        <input type="text" class="form-control" id="fullName" name="fullName"
                            placeholder="contoh: John Maeda" required style="padding: 12px; font-size: 1rem;">
                    </div>

                    <!-- Email -->
                    <div class="form-section" style="margin-bottom: 1.5rem;">
                        <label for="email" class="form-label" style="font-weight: bold; font-size: 1rem;">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="contoh: email@example.com" required style="padding: 12px; font-size: 1rem;">
                    </div>

                    <!-- Nomor HP -->
                    <div class="form-section" style="margin-bottom: 1.5rem;">
                        <label for="mobile" class="form-label" style="font-weight: bold; font-size: 1rem;">Nomor
                            HP</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile"
                            placeholder="contoh: +62 8123456789" required style="padding: 12px; font-size: 1rem;">
                    </div>

                    <!-- Jumlah Orang -->
                    <div class="form-section" style="margin-bottom: 1.5rem;">
                        <label for="peopleCount" class="form-label" style="font-weight: bold; font-size: 1rem;">Jumlah
                            Orang</label>
                        <input type="number" class="form-control" id="peopleCount" name="peopleCount"
                            placeholder="contoh: 2" required style="padding: 12px; font-size: 1rem;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Pembayaran (Kanan) -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body" style="padding: 30px; background-color: #f8f9fa;">
                    <h4 class="mb-4" style="font-weight: bold;">Metode Pembayaran</h4>

                    <!-- Mode Pembayaran -->
                    <div class="form-section" style="margin-bottom: 1.5rem;">
                        <label for="paymentMode" class="form-label" style="font-weight: bold; font-size: 1rem;">Mode
                            Pembayaran</label>
                        <select class="form-control" id="paymentMode" name="paymentMode" required
                            style="padding: 12px; font-size: 1rem;">
                            <option value="">Pilih Metode Pembayaran</option>
                            <option value="ewallet">E-wallet</option>
                            <option value="bank">Bank</option>
                        </select>
                    </div>

                    <!-- E-wallet Options (Gopay, Dana, Shopeepay) -->
                    <div class="form-section" id="ewalletOptions" style="margin-bottom: 1.5rem; display: none;">
                        <label for="ewalletChoice" class="form-label" style="font-weight: bold; font-size: 1rem;">Pilih
                            E-wallet</label>
                        <select class="form-control" id="ewalletChoice" name="ewalletChoice"
                            style="padding: 12px; font-size: 1rem;">
                            <option value="">Pilih E-wallet</option>
                            <option value="gopay">Gopay</option>
                            <option value="dana">Dana</option>
                            <option value="shopeepay">ShopeePay</option>
                        </select>
                    </div>

                    <!-- Bank Option (BNI) -->
                    <div class="form-section" id="bankOption" style="margin-bottom: 1.5rem; display: none;">
                        <label for="bankAccount" class="form-label" style="font-weight: bold; font-size: 1rem;">Rekening
                            Bank (BNI)</label>
                        <input type="text" class="form-control" id="bankAccount" name="bankAccount"
                            placeholder="contoh: 1234567890" required style="padding: 12px; font-size: 1rem;">
                    </div>

                    <!-- Total Biaya -->
                    <div class="form-section" style="margin-bottom: 1.5rem;">
                        <label for="totalCost" class="form-label" style="font-weight: bold; font-size: 1rem;">Total
                            Biaya</label>
                        <input type="number" class="form-control" id="totalCost" name="totalCost"
                            placeholder="Masukkan total biaya" required style="padding: 12px; font-size: 1rem;">
                    </div>

                    <!-- Upload Bukti Pembayaran -->
                    <div class="form-section" style="margin-bottom: 1.5rem;">
                        <label for="paymentProof" class="form-label" style="font-weight: bold; font-size: 1rem;">Upload
                            Bukti Pembayaran</label>
                        <input type="file" class="form-control" id="paymentProof" name="paymentProof"
                            accept="image/*,.pdf" required style="padding: 12px; font-size: 1rem;">
                    </div>

                    <!-- Tombol Submit di Tengah -->
                    <div class="d-flex justify-content-center mb-5" style="margin-top: 20px;">
                        <button type="submit" class="btn btn-primary" style="padding: 12px; font-size: 1rem;">Submit
                            Pembayaran</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gambar Metode Pembayaran di Bawah Form -->
    <div class="payment-method"
        style="display: flex; justify-content: space-evenly; flex-wrap: wrap; margin-top: 20px;">
        <div style="flex-basis: 23%; text-align: center;">
            <img src="../dist/assets/images/gopay.png" alt="Gopay" style="width: 100%; height: auto;" />
        </div>
        <div style="flex-basis: 23%; text-align: center;" class="mt-5">
            <img src="../dist/assets/images/dana.png" alt="Dana" style="width: 100%; height: auto;" />
        </div>
        <div style="flex-basis: 23%; text-align: center;" class="mt-5">
            <img src="../dist/assets/images/shopeepay.png" alt="ShopeePay" style="width: 100%; height: auto;" />
        </div>
        <div style="flex-basis: 23%; text-align: center;">
            <img src="../dist/assets/images/bni.png" alt="BNI" style="width: 100%; height: auto;" />
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