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
<div class="container" style="max-width: 1200px; margin-top: 50px; margin-bottom: 250px;">
    <div class="text-center">
        <h2>BOOKING WHALE SHARK TRIP</h2>
        <p>Teluk Saleh, Sumbawa.</p>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form id="contactForm" action="<?= base_url('add_bukti'); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= isset($booking['id']) ? $booking['id'] : ''; ?>">
                <div class="card-body" style="padding: 30px; background-color: #f8f9fa;">
                    <h4 style="font-size: 1.4rem; font-weight: bold;">Verifikasi Pembayaran</h4>

                    <!-- Pembayaran Info -->
                    <div class="alert alert-info" role="alert" style="font-size: 1rem;">
                        <i class="fas fa-check-circle" style="margin-right: 5px;"></i> Pembayaran menggunakan <?= htmlspecialchars($booking['mode_pembayaran']); ?>
                    </div>

                    <!-- Detail Pemesanan -->
                    <div class="alert alert-success" role="alert" style="font-size: 1rem;">
                        <strong>Detail Pemesanan:</strong><br>
                        <strong>Nama Pemesan:</strong> <?= htmlspecialchars($booking['full_name']); ?><br>
                        <strong>Total Pembayaran:</strong> Rp <?= number_format($booking['total_biaya'], 0, ',', '.'); ?>
                    </div>

                    <!-- Bukti Pembayaran -->
                    <div class="form-section" style="margin-top: 20px;">
                        <label for="paymentProof" class="form-label" style="font-weight: bold; font-size: 1rem;">
                            <i class="fas fa-upload" style="margin-right: 5px;"></i> Upload Bukti Pembayaran
                        </label>

                        <!-- Jika sudah ada bukti pembayaran, tampilkan gambar dengan ukuran kecil -->
                        <div id="paymentProofImageSection" style="display: <?= !empty($booking['upload_gambar']) ? 'block' : 'none'; ?>;">
                            <strong>Bukti Pembayaran:</strong><br>
                            <img src="<?= base_url('uploads/bukti_bayar/' . $booking['upload_gambar']); ?>" alt="Bukti Pembayaran" style="max-width: 150px; height: auto; border-radius: 10px;">
                        </div>

                        <!-- Jika belum ada bukti pembayaran, tampilkan upload box -->
                        <div id="paymentProofSection" style="display: <?= empty($booking['upload_gambar']) ? 'block' : 'none'; ?>;">
                            <!-- Upload Box -->
                            <div class="border border-secondary rounded-3 p-3 text-center" style="cursor: pointer; width: 100%; height: 150px; position: relative;" id="uploadBox" onclick="document.getElementById('paymentProof').click();">
                                <!-- Input file -->
                                <input type="file" class="form-control" id="paymentProof" name="paymentProof" accept="image/*, .pdf" required style="opacity: 0; position: absolute; z-index: 10;" onchange="updateFileName()">
                                <div style="font-size: 1rem; color: #007bff;">
                                    <i class="fas fa-cloud-upload-alt" style="font-size: 3rem;"></i><br>
                                    Seret file di sini atau klik untuk memilih file
                                </div>
                            </div>
                            <!-- Display File Name after Selection -->
                            <div id="fileName" style="margin-top: 10px; font-size: 1rem; color: #333;"></div>
                        </div>
                    </div>




                    <!-- Catatan untuk Pengguna -->
                    <div class="alert alert-warning mt-3" role="alert" style="font-size: 0.9rem;">
                        <i class="fas fa-info-circle" style="margin-right: 5px;"></i> <strong>Catatan:</strong> Booking Anda akan dikonfirmasi dalam 12 jam setelah upload bukti pembayaran. Anda akan menerima konfirmasi via email.
                    </div>

                    <!-- Button Konfirmasi Pembayaran -->
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-secondary" id="continueBtn" style="padding: 12px; border-radius: 50px; font-weight: bold; background-color: #28a745; border: none; color: #fff; transition: background-color 0.3s ease;">
                            <i class="fas fa-arrow-right" style="margin-right: 5px;"></i> Konfirmasi Pembayaran
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    function updateFileName() {
        var fileInput = document.getElementById('paymentProof');
        var fileName = fileInput.files[0].name;
        document.getElementById('fileName').textContent = fileName;
    }

    document.getElementById('uploadBox').addEventListener('dragover', function(event) {
        event.preventDefault();
        event.stopPropagation();
        document.getElementById('uploadBox').style.borderColor = '#28a745'; // Highlight border on drag over
    });

    document.getElementById('uploadBox').addEventListener('dragleave', function(event) {
        event.preventDefault();
        event.stopPropagation();
        document.getElementById('uploadBox').style.borderColor = '#6c757d'; // Reset border on drag leave
    });

    document.getElementById('uploadBox').addEventListener('drop', function(event) {
        event.preventDefault();
        event.stopPropagation();
        var fileInput = document.getElementById('paymentProof');
        fileInput.files = event.dataTransfer.files; // Set the dragged files to the input element
        updateFileName(); // Update the file name display
    });
</script>

<?= $this->endSection() ?>