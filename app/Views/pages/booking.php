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
<div class="container" style="max-width: 1200px; margin-top: 50px;">
    <h2>Pemesanan Open Trip Whale Shark Teluk Saleh</h2>
    <p>Pastikan semua detail pada halaman ini sudah benar sebelum melanjutkan ke pembayaran dan pemesanan trip.</p>

    <div class="row">
        <!-- Left Form Section -->
        <div class="col-md-8">
            <form id="contactForm" action="<?= base_url('booking/proses_booking'); ?>" method="POST">
                <div class="card mb-4" style="border-radius: 0.5rem; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                    <div class="card-header" style="background-color: #f8f9fa; padding: 20px;">
                        <h4 style="font-size: 1.4rem; font-weight: bold;">Detail Kontak</h4>
                    </div>
                    <div class="card-body" style="padding: 30px; background-color: #f8f9fa;">
                        <!-- Nama Lengkap -->
                        <div class="form-section" style="margin-bottom: 1.5rem;">
                            <label for="fullName" class="form-label" style="font-weight: bold; font-size: 1rem;">Nama
                                Lengkap</label>
                            <input type="text" class="form-control" id="fullName" name="fullName"
                                placeholder="contoh: John Maeda" required style="padding: 12px; font-size: 1rem;"
                                oninput="enableButton()">
                        </div>

                        <!-- Email -->
                        <div class="form-section" style="margin-bottom: 1.5rem;">
                            <label for="email" class="form-label"
                                style="font-weight: bold; font-size: 1rem;">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="contoh: email@example.com" required style="padding: 12px; font-size: 1rem;"
                                oninput="enableButton()">
                        </div>

                        <!-- Nomor HP -->
                        <div class="form-section" style="margin-bottom: 1.5rem;">
                            <label for="mobile" class="form-label" style="font-weight: bold; font-size: 1rem;">Nomor
                                HP</label>
                            <input type="tel" class="form-control" id="mobile" name="mobile"
                                placeholder="contoh: +62 8123456789" required style="padding: 12px; font-size: 1rem;"
                                oninput="enableButton()">
                        </div>

                        <!-- Jumlah Orang -->
                        <div class="form-section" style="margin-bottom: 1.5rem;">
                            <label for="peopleCount" class="form-label"
                                style="font-weight: bold; font-size: 1rem;">Jumlah Orang</label>
                            <input type="number" class="form-control" id="peopleCount" name="peopleCount"
                                placeholder="contoh: 2" required style="padding: 12px; font-size: 1rem;"
                                oninput="updateCost()">
                        </div>
                    </div>
                </div>
                <div class="card mb-4" style="border-radius: 0.5rem; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                    <div class="card-header" style="background-color: #f8f9fa; padding: 20px;">
                        <h4 style="font-size: 1.4rem; font-weight: bold; color: #333;">Total Biaya</h4>
                    </div>
                    <div class="card-body" style="padding: 30px; background-color: #f8f9fa;">
                        <!-- Rincian Harga -->
                        <div style="margin-bottom: 1.5rem;">
                            <div style="display: flex; justify-content: space-between; font-size: 1rem; color: #555;">
                                <p><strong>Harga per orang:</strong></p>
                                <p>Rp 650.000</p>
                            </div>
                            <div style="display: flex; justify-content: space-between; font-size: 1rem; color: #555;">
                                <p><strong>Jumlah Orang:</strong></p>
                                <p id="peopleCountDisplay"></p>
                            </div>
                            <div style="display: flex; justify-content: space-between; font-size: 1rem; color: #555;">
                                <p><strong>Total Biaya:</strong></p>
                                <p id="totalCostDisplay"></p>
                            </div>
                        </div>

                        <!-- Button Cancel & Reschedule -->
                        <button type="submit" class="btn btn-secondary" id="continueBtn"
                            style="width: 100%; padding: 12px; border-radius: 50px; font-weight: bold; background-color: #28a745; border: none; color: #fff; transition: background-color 0.3s ease;"
                            onclick="checkSession()">
                            Continue Payment
                        </button>

                    </div>
                </div>
            </form>
        </div>

        <!-- Right Sidebar Section -->
        <div class="col-md-4">
            <div class="card mb-5" style="background-color: #f8f9fa; border-radius: 0.5rem; padding: 20px;">
                <!-- Gambar Open Trip -->
                <img src="../dist/assets/images/images-1.jpg" alt="Open Trip Whale Shark Teluk Saleh" class="img-fluid"
                    style="border-radius: 0.5rem; margin-bottom: 15px;">
                <div class="details">
                    <h5 style="font-size: 1.2rem; font-weight: bold; color: #007bff;">Open Trip Whale Shark Teluk Saleh
                    </h5>
                    <p><strong style="font-size: 1rem;">Harga Paket:</strong></p>
                    <ul style="list-style: none; padding-left: 0; font-size: 0.9rem;">
                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Boat / Perahu & Bagang</li>
                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Bantal, Selimut</li>
                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Life Jacket</li>
                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Air Mineral</li>
                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Teh, Kopi, Roti, Nutela</li>
                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Alat Snorkeling, Fins & Mask
                        </li>
                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> GoPro (Free Dokumentasi)</li>
                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Videografer Underwater</li>
                    </ul>
                    <p style="font-size: 1.2rem; color: #28a745; font-weight: bold;">Rp 650.000 / Orang</p>
                    <p style="font-size: 0.9rem; color: #6c757d;">Nikmati pengalaman luar biasa bersama kami di Teluk
                        Saleh, Sumbawa.</p>
                    <div style="margin-top: 20px; mb-5">
                        <h6 style="font-size: 1.1rem; font-weight: bold; color: #007bff;">Hubungi Kontak dan Kunjungi
                            Kami di :</h6>
                        <p style="font-size: 0.9rem;"><strong>WhatsApp:</strong> <a href="tel:+62812144408108"
                                style="color: #28a745;">081214408108</a></p>
                        <p style="font-size: 0.9rem;"><strong>Instagram:</strong> <a
                                href="https://instagram.com/whaleshark.teluksaleh" target="_blank"
                                style="color: #28a745;">@whaleshark.teluksaleh</a></p>
                        <p style="font-size: 0.9rem;"><strong>Lokasi:</strong> Labuhan Jambu, NTB</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Function to check if user is logged in and redirect or show alert
function checkSession() {
    const fullName = document.getElementById('fullName').value;
    const email = document.getElementById('email').value;
    const mobile = document.getElementById('mobile').value;
    const peopleCount = document.getElementById('peopleCount').value;

    // Check if all fields are filled
    if (!fullName || !email || !mobile || !peopleCount) {
        Swal.fire({
            icon: 'warning',
            title: 'Formulir belum lengkap!',
            text: 'Silakan isi semua kolom yang diperlukan.',
        });
    } else {
        // Check if user is logged in, then submit form
        <?php if (session()->get('isLoggedIn')): ?>
        // Submit the form
        document.getElementById("contactForm").submit();
        <?php else: ?>
        Swal.fire({
            icon: 'error',
            title: 'Harus Login Terlebih Dahulu',
            text: 'Silakan login untuk melanjutkan pembayaran.',
        });
        <?php endif; ?>
    }
}


// Function to enable the continue button when all fields are filled
function enableButton() {
    const fullName = document.getElementById('fullName').value;
    const email = document.getElementById('email').value;
    const mobile = document.getElementById('mobile').value;
    const peopleCount = document.getElementById('peopleCount').value;

    const continueBtn = document.getElementById('continueBtn');

    // Enable the button if all fields are filled
    if (fullName && email && mobile && peopleCount) {
        continueBtn.disabled = false;
    } else {
        continueBtn.disabled = false; // Keep the button active even if some fields are empty
    }
}

// Function to update the total cost based on the number of people
function updateCost() {
    const pricePerPerson = 650000;
    const peopleCount = document.getElementById('peopleCount').value;
    const totalCost = pricePerPerson * peopleCount;

    // Update the people count and total cost dynamically
    document.getElementById('peopleCountDisplay').innerText = peopleCount;
    document.getElementById('totalCostDisplay').innerText = 'Rp ' + totalCost.toLocaleString();
}
</script>

<?= $this->endSection() ?>