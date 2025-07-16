<?= $this->extend('layout_user/header') ?>
<?= $this->section('content') ?>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- Video Section -->
<div class="video-container mb-5">
    <iframe src="https://www.youtube.com/" allow="autoplay" allowfullscreen></iframe>
</div>

<!-- Circle Icons Section -->
<div class="circle-icons d-flex mb-5">
    <div class="text-center">
        <img src="../dist/assets/images/ship.jpg" alt="Paket Trip Whale Shark" class="img-fluid mb-3">
        <p>Paket Trip Whale Shark</p>
    </div>
    <div class="text-center">
        <img src="../dist/assets/images/vacation.jpg" alt="Paket Wisata" class="img-fluid mb-3">
        <p>Paket Wisata</p>
    </div>
    <div class="text-center">
        <img src="../dist/assets/images/unggulan.jpg" alt="Unggulan" class="img-fluid mb-3">
        <p>Unggulan</p>
    </div>
</div>

<!-- Paket Trip Section -->
<section class="mb-5" style="
    background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                url('../dist/assets/images/sea-gorontalo.jpg') center center / cover no-repeat;
    color: white;
    padding-top: 60px;
    padding-bottom: 60px;
">
    <div class="container">
        <div class="section-title text-center mb-2">
            <h2 class="text-white">Pilih Paket Trip</h2>
        </div>

        <div class="row justify-content-center">

            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <img src="../dist/assets/images/kapal-pesiar.jpg" class="card-img-top"
                        alt="Open Trip Whale Shark Teluk Saleh">
                    <div class="card-body text-center text-dark">
                        <h5 class="card-title">Open Trip Whale Shark Teluk Saleh</h5>
                        <p class="card-text">
                            <strong class="d-block mb-2" style="font-size: 1.2rem;">Rp 650.000 / Orang</strong>
                        </p>
                        <div class="bg-light text-start mb-3 px-3 py-2"
                            style="font-size: 0.95rem; border-left: 4px solid #007bff; border-radius: 8px; box-shadow: 0 1px 4px rgba(0,0,0,0.05);">
                            <strong class="text-primary d-block mb-2">INCLUDE:</strong>
                            <ul class="ps-3" style="list-style: disc; margin-bottom: 65px;">
                                <li>Boat / Perahu (3-4 jam)</li>
                                <li>Life Jacket</li>
                                <li>Air Mineral & Snack Lokal</li>
                                <li>Alat Snorkeling (Mask, Fins, Snorkel)</li>
                                <li>Skin Dive (Roti & Nutella)</li>
                                <li>Free Kamera GoPro (1 video + 5 foto underwater)</li>
                            </ul>
                        </div>
                        <button class="btn btn-light" id="bookingButton">BOOK NOW</button>
                    </div>
                </div>
            </div>





            <!-- Card 2 -->
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <img src="../dist/assets/images/kapal-pesiar2.jpg" class="card-img-top"
                        alt="Private Trip Whale Shark">
                    <div class="card-body text-center text-dark">
                        <h5 class="card-title">Private Trip Whale Shark Teluk Saleh</h5>
                        <p class="card-text">
                            <strong class="d-block mb-2" style="font-size: 1.2rem;">Rp 500.000 - Rp 2.800.000</strong>
                        </p>
                        <div class="bg-light text-start mb-3 px-3 py-2"
                            style="font-size: 0.95rem; border-left: 4px solid #007bff; border-radius: 8px; box-shadow: 0 1px 4px rgba(0,0,0,0.05);">
                            <strong class="text-primary d-bloc  k mb-2">INCLUDE:</strong>
                            <ul class="mb-0 ps-3" style="list-style: disc;">
                                <li>Boat / Boat & Bagang</li>
                                <li>Pillow, Blanket</li>
                                <li>Life Jacket</li>
                                <li>Mineral Water</li>
                                <li>Tea, Coffee, Bread, Nutella</li>
                                <li>Swimming Goggles</li>
                                <li>Snorkeling Equipment (Fins & Mask)</li>
                                <li>GoPro 12/13 (Free Documentation)</li>
                                <li>Underwater Videographer</li>
                            </ul>
                        </div>
                        <a href="https://wa.me/6281246408108" class="btn btn-light" target="_blank">BOOK NOW</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



<!-- Paket Wisata Pilihan Section -->
<section class="mb-5">
    <div class="section-title text-center mb-4">
        <h2>Paket Wisata Pilihan</h2>
    </div>
    <div class="custom-card-container">
        <div class="custom-card">
            <img src="../dist/assets/images/vacation.jpg" alt="Hiu Paus Gorontalo">
            <div class="card-body">
                <h5 class="card-title">Hiu Paus Gorontalo</h5>
                <p class="card-text">Rasakan sensasi berenang bersama hiu paus di perairan Gorontalo yang indah dan
                    eksotis...</p>
                <a href="#" class="btn btn-warning">DETAILS</a>
            </div>
        </div>

        <div class="custom-card">
            <img src="../dist/assets/images/vacation.jpg" alt="Diving di Gorontalo">
            <div class="card-body">
                <h5 class="card-title">Diving di Gorontalo</h5>
                <p class="card-text">Jelajahi keindahan bawah laut Gorontalo yang menakjubkan dengan berbagai spesies
                    terumbu karang...</p>
                <a href="#" class="btn btn-warning">DETAILS</a>
            </div>
        </div>

        <div class="custom-card">
            <img src="../dist/assets/images/vacation.jpg" alt="Jalur Alam Gorontalo">
            <div class="card-body">
                <h5 class="card-title">Jalur Alam Gorontalo</h5>
                <p class="card-text">Nikmati petualangan trekking melewati hutan tropis yang rimbun dan pemandangan alam
                    yang memukau...</p>
                <a href="#" class="btn btn-warning">DETAILS</a>
            </div>
        </div>

        <div class="custom-card">
            <img src="../dist/assets/images/vacation.jpg" alt="Jalur Alam Gorontalo">
            <div class="card-body">
                <h5 class="card-title">Jalur Alam Gorontalo</h5>
                <p class="card-text">Nikmati petualangan trekking melewati hutan tropis yang rimbun dan pemandangan alam
                    yang memukau...</p>
                <a href="#" class="btn btn-warning">DETAILS</a>
            </div>
        </div>
    </div>
</section>

<!-- Aktivitas Unggulan Taman Hiu Paus Section -->
<section class="mb-5">
    <div class="section-title text-center mb-4">
        <h2>Aktivitas Unggulan Taman Hiu Paus</h2>
    </div>
    <div class="custom-card-container">
        <div class="custom-card">
            <img src="../dist/assets/images/vacation.jpg" alt="Berenang dengan Hiu Paus">
            <div class="card-body">
                <h5 class="card-title">Berenang dengan Hiu Paus</h5>
                <p class="card-text">Rasakan pengalaman tak terlupakan berenang dengan Hiu Paus di perairan Gorontalo
                    yang jernih...</p>
                <a href="#" class="btn btn-warning">DETAILS</a>
            </div>
        </div>

        <div class="custom-card">
            <img src="../dist/assets/images/vacation.jpg" alt="Snorkeling di Perairan Gorontalo">
            <div class="card-body">
                <h5 class="card-title">Snorkeling di Perairan Gorontalo</h5>
                <p class="card-text">Temukan keindahan dunia bawah laut Gorontalo dengan beragam terumbu karang dan
                    ikan-ikan warna-warni...</p>
                <a href="#" class="btn btn-warning">DETAILS</a>
            </div>
        </div>

        <div class="custom-card">
            <img src="../dist/assets/images/vacation.jpg" alt="Tur Pantai Gorontalo">
            <div class="card-body">
                <h5 class="card-title">Tur Pantai Gorontalo</h5>
                <p class="card-text">Nikmati pemandangan pantai eksotis dan bersantai sambil menikmati udara segar di
                    Gorontalo...</p>
                <a href="#" class="btn btn-warning">DETAILS</a>
            </div>
        </div>

        <div class="custom-card">
            <img src="../dist/assets/images/vacation.jpg" alt="Tur Pantai Gorontalo">
            <div class="card-body">
                <h5 class="card-title">Tur Pantai Gorontalo</h5>
                <p class="card-text">Nikmati pemandangan pantai eksotis dan bersantai sambil menikmati udara segar di
                    Gorontalo...</p>
                <a href="#" class="btn btn-warning">DETAILS</a>
            </div>
        </div>
    </div>
</section>

<!-- Modal Booking -->



<!-- Modal Booking -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Form Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bookingForm">
                    <div class="mb-3">
                        <label for="customerName" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="customerName" name="customerName" required>
                    </div>
                    <div class="mb-3">
                        <label for="package" class="form-label">Paket</label>
                        <input type="text" class="form-control" id="package" name="package"
                            value="Open Trip Whale Shark Teluk Saleh" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="bookingDate" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="bookingDate" name="bookingDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Jumlah Orang</label>
                        <input type="text" class="form-control" id="quantity" name="quantity" min="1" value="1" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="totalCost" class="form-label">Total Biaya</label>
                        <input type="text" class="form-control" id="totalCost" name="totalCost" value="650.000" readonly>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn w-50">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap 5.3 JS (termasuk Popper.js untuk modal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- JavaScript untuk Modal dan SweetAlert2 -->
<script>
    // Mengambil status login dari PHP
    const isLoggedIn = <?= session()->get('isLoggedIn') ? 'true' : 'false'; ?>;

    // Menangani event klik tombol BOOK NOW
    document.getElementById('bookingButton').addEventListener('click', function() {
        if (!isLoggedIn) {
            // Jika belum login, tampilkan SweetAlert2
            Swal.fire({
                icon: 'warning',
                title: 'Harap Login Terlebih Dahulu',
                text: 'Anda harus login untuk melakukan pemesanan.',
                confirmButtonText: 'Login',
                showCancelButton: true,
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke halaman login jika pengguna memilih 'Login'
                    window.location.href = "<?= base_url('login'); ?>"; // Ganti dengan URL login aplikasi Anda
                }
            });
        } else {
            // Jika sudah login, buka modal booking
            const myModal = new bootstrap.Modal(document.getElementById('bookingModal'));
            myModal.show(); // Menampilkan modal
        }
    });
</script>

<?= $this->endSection() ?>