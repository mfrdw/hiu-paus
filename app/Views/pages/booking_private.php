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
    <h2>Pemesanan Private Trip Whale Shark Teluk Saleh</h2>
    <p>Pastikan semua detail pada halaman ini sudah benar sebelum melanjutkan ke pembayaran dan pemesanan trip.</p>

    <div class="row">
        <!-- Left Form Section -->
        <div class="col-md-8">
            <form id="contactForm" action="<?= base_url('booking/proses_booking_private'); ?>" method="POST">
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

                        <!-- Jumlah Pax -->
                        <div class="form-section mb-4">
                            <label for="peopleCount" class="form-label fw-bold">Jumlah Pax</label>
                            <select class="form-control" id="peopleCount" name="peopleCount" required onchange="updateCost()" style="padding:12px; font-size:1rem;">
                                <option value="">-- Pilih Pax --</option>
                                <option value="1">1 Pax – IDR 2.800.000 / orang</option>
                                <option value="2">2 Pax – IDR 1.450.000 / orang</option>
                                <option value="3">3 Pax – IDR 1.050.000 / orang</option>
                                <option value="4">4 Pax – IDR 850.000 / orang</option>
                                <option value="5">5 Pax – IDR 800.000 / orang</option>
                                <option value="6">6 Pax – IDR 750.000 / orang</option>
                                <option value="7">7 Pax – IDR 650.000 / orang</option>
                                <option value="8">8 Pax – IDR 600.000 / orang</option>
                                <option value="9">9 Pax – IDR 550.000 / orang</option>
                                <option value="10">10 Pax – IDR 500.000 / orang</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="card mb-4" style="border-radius: 0.5rem; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                    <div class="card-header" style="background-color: #f8f9fa; padding: 20px;">
                        <h4 style="font-size: 1.4rem; font-weight: bold; color: #333;">Total Biaya</h4>
                    </div>
                    <div class="card-body" style="padding: 30px; background-color: #f8f9fa;">
                        <div style="margin-bottom: 1.5rem;">
                            <div style="display:flex; justify-content:space-between; font-size:1rem; color:#555;">
                                <p><strong>Harga per orang:</strong></p>
                                <p id="pricePerPersonDisplay">-</p>
                            </div>

                            <!-- Tambahkan baris Jumlah Orang -->
                            <div style="display:flex; justify-content:space-between; font-size:1rem; color:#555;">
                                <p><strong>Jumlah Orang:</strong></p>
                                <p id="peopleCountDisplay">-</p>
                            </div>

                            <div style="display:flex; justify-content:space-between; font-size:1rem; color:#555;">
                                <p><strong>Total Biaya:</strong></p>
                                <!-- nilai numerik untuk dikirim ke server -->
                                <input type="hidden" id="totalCost" name="totalCost" value="">
                                <p id="totalCostDisplay">-</p>
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
            <div class="card mb-5" style="background-color:#f8f9fa; border-radius:0.5rem; padding:20px;">
                <!-- Gambar Private Trip -->
                <img src="../dist/assets/images/images-1.jpg" alt="Private Trip Whale Shark Teluk Saleh" class="img-fluid"
                    style="border-radius:0.5rem; margin-bottom:15px;">

                <div class="details">
                    <h5 style="font-size:1.2rem; font-weight:bold; color:#007bff;">Private Trip Whale Shark Teluk Saleh</h5>

                    <!-- Harga Paket -->
                    <p><strong style="font-size:1rem;">Harga Paket (per Pax):</strong></p>
                    <ul style="list-style:none; padding-left:0; font-size:0.9rem; line-height:1.6;">
                        <li>1 Pax – IDR 2.800.000</li>
                        <li>2 Pax – IDR 1.450.000</li>
                        <li>3 Pax – IDR 1.050.000</li>
                        <li>4 Pax – IDR 850.000</li>
                        <li>5 Pax – IDR 800.000</li>
                        <li>6 Pax – IDR 750.000</li>
                        <li>7 Pax – IDR 650.000</li>
                        <li>8 Pax – IDR 600.000</li>
                        <li>9 Pax – IDR 550.000</li>
                        <li>10 Pax – IDR 500.000</li>
                    </ul>

                    <!-- Include -->
                    <p><strong style="font-size:1rem;">INCLUDE:</strong></p>
                    <ul style="list-style:none; padding-left:0; font-size:0.9rem;">
                        <li><i class="fas fa-check-circle" style="color:#28a745;"></i> Boat / Bagang</li>
                        <li><i class="fas fa-check-circle" style="color:#28a745;"></i> Pillow & Blanket</li>
                        <li><i class="fas fa-check-circle" style="color:#28a745;"></i> Life Jacket</li>
                        <li><i class="fas fa-check-circle" style="color:#28a745;"></i> Mineral Water</li>
                        <li><i class="fas fa-check-circle" style="color:#28a745;"></i> Tea, Coffee, Bread, Nutella</li>
                        <li><i class="fas fa-check-circle" style="color:#28a745;"></i> Fins & Swimming Goggles</li>
                        <li><i class="fas fa-check-circle" style="color:#28a745;"></i> Snorkeling Equipment (Mask & Fins)</li>
                        <li><i class="fas fa-check-circle" style="color:#28a745;"></i> GoPro 12/13 (Free Documentation)</li>
                        <li><i class="fas fa-check-circle" style="color:#28a745;"></i> Underwater Videographer</li>
                    </ul>

                    <p style="font-size:0.9rem; color:#6c757d;">Nikmati pengalaman luar biasa bersama kami di Teluk Saleh, Sumbawa.</p>

                    <!-- Kontak -->
                    <div style="margin-top:20px;">
                        <h6 style="font-size:1.1rem; font-weight:bold; color:#007bff;">Hubungi Kami:</h6>
                        <p style="font-size:0.9rem;">
                            <i class="bi bi-whatsapp text-success"></i>
                            <strong>WhatsApp:</strong> <a href="https://wa.me/6281214408108" target="_blank" style="color:#28a745;">081214408108</a>
                        </p>
                        <p style="font-size:0.9rem;">
                            <i class="bi bi-instagram text-danger"></i>
                            <strong>Instagram:</strong> <a href="https://instagram.com/whaleshark.teluksaleh" target="_blank" style="color:#28a745;">@whaleshark.teluksaleh</a>
                        </p>
                        <p style="font-size:0.9rem;">
                            <i class="bi bi-geo-alt text-primary"></i>
                            <strong>Lokasi:</strong> Labuhan Jambu, NTB
                        </p>
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
</script>
<script>
    // Harga per orang BERDASARKAN jumlah pax (sesuai brosur)
    const priceMap = {
        1: 2800000,
        2: 1450000,
        3: 1050000,
        4: 850000,
        5: 800000,
        6: 750000,
        7: 650000,
        8: 600000,
        9: 550000,
        10: 500000
    };

    function formatIDR(n) {
        return 'Rp ' + (n || 0).toLocaleString('id-ID');
    }

    function updateCost() {
        const count = parseInt(document.getElementById('peopleCount').value || '0', 10);
        const perPerson = priceMap[count] || 0;
        const total = perPerson * count;

        // Elemen-elemen tampilan (cek dulu agar tidak error)
        const priceEl = document.getElementById('pricePerPersonDisplay');
        const countEl = document.getElementById('peopleCountDisplay');
        const totalEl = document.getElementById('totalCostDisplay');
        const totalInput = document.getElementById('totalCost');

        if (priceEl) priceEl.textContent = perPerson ? formatIDR(perPerson) : '-';
        if (countEl) countEl.textContent = count ? count + ' orang' : '-';
        if (totalEl) totalEl.textContent = total ? formatIDR(total) : '-';
        if (totalInput) totalInput.value = total || '';
    }

    // Render awal (kalau ada value tersimpan)
    document.addEventListener('DOMContentLoaded', updateCost);
</script>


<?= $this->endSection() ?>