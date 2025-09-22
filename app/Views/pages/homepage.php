<?= $this->extend('layout_user/header') ?>
<?= $this->section('content') ?>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<!-- Video Section -->
<div class="video-container mb-5">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/VxgaVjT5Lfk?si=rkG2LnXLG_3Ao1bV" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
                        <a href="<?= base_url('detail') ?>" class="btn btn-light">BOOK NOW</a>
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
                        <a href="<?= base_url('detail_wisata') ?>" class="btn btn-light">BOOK NOW</a>
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
        <?php if (!empty($wisata_pilihan) && is_array($wisata_pilihan)): ?>
            <?php foreach ($wisata_pilihan as $item): ?>
                <div class="custom-card">
                    <img src="<?= base_url('uploads/kelola_wisata/' . $item['gambar']) ?>" alt="<?= esc($item['nama_wisata']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($item['nama_wisata']) ?></h5>
                        <p class="card-text"><?= esc($item['deskripsi']) ?></p>
                        <a href="#" class="btn btn-warning">DETAILS</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada paket wisata pilihan tersedia.</p>
        <?php endif; ?>
    </div>
</section>


<!-- Aktivitas Unggulan Taman Hiu Paus Section -->
<section class="mb-5">
    <div class="section-title text-center mb-4">
        <h2>Aktivitas Unggulan Taman Hiu Paus</h2>
    </div>
    <div class="custom-card-container">
        <?php if (!empty($wisata_unggulan) && is_array($wisata_unggulan)): ?>
            <?php foreach ($wisata_unggulan as $item): ?>
                <div class="custom-card">
                    <img src="<?= base_url('uploads/kelola_wisata/' . $item['gambar']) ?>" alt="<?= esc($item['nama_wisata']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($item['nama_wisata']) ?></h5>
                        <p class="card-text"><?= esc($item['deskripsi']) ?></p>
                        <a href="#" class="btn btn-warning">DETAILS</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada aktivitas unggulan yang tersedia.</p>
        <?php endif; ?>
    </div>
</section>

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
                        <input type="text" class="form-control" id="quantity" name="quantity" min="1" value="1"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="totalCost" class="form-label">Total Biaya</label>
                        <input type="text" class="form-control" id="totalCost" name="totalCost" value="650.000"
                            readonly>
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
                    window.location.href =
                        "<?= base_url('login'); ?>"; // Ganti dengan URL login aplikasi Anda
                }
            });
        } else {
            // Jika sudah login, buka modal booking
            const myModal = new bootstrap.Modal(document.getElementById('bookingModal'));
            myModal.show(); // Menampilkan modal
        }
    });
</script>


<!-- Iklan -->
<style>
    /* Popup Modal Style */
    .promo-popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        animation: fadeIn 0.5s ease-in-out;
    }

    /* Promo Content Styling */
    .promo-content {
        background: linear-gradient(145deg, #ff9e2c, #ff6a13);
        /* Warna gradasi cerah */
        padding: 30px;
        border-radius: 15px;
        text-align: center;
        max-width: 500px;
        width: 90%;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        position: relative;
        color: white;
    }

    /* Styling untuk teks di dalam promo-content */
    .promo-content p {
        font-size: 1.2rem;
        margin: 10px 0;
        font-weight: 500;
    }

    .promo-content p strong {
        font-size: 1.4rem;
        font-weight: bold;
        color: #fff;
    }

    /* Align text inside the promo */
    .promo-content .promo-header {
        margin-bottom: 15px;
        font-size: 1.5rem;
        font-weight: 700;
    }

    /* Teks harga */
    .promo-content .promo-price {
        margin: 15px 0;
        font-size: 1.3rem;
        font-weight: 600;
    }

    /* Button Styling */
    .promo-content .btn-promo,
    .promo-content .btn-whatsapp {
        background-color: #ff6a13;
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        font-size: 1.1rem;
        transition: background-color 0.3s ease;
        margin-top: 20px;
        display: inline-block;
        width: 100%;
    }

    .promo-content .btn-promo:hover,
    .promo-content .btn-whatsapp:hover {
        background-color: #d94e0b;
    }

    /* Styling untuk tombol close */
    .promo-content .close {
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: 1.8rem;
        color: #fff;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .promo-content .close:hover {
        color: #f1c40f;
    }

    /* Animasi fadeIn */
    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    /* Responsivitas untuk ukuran mobile */
    @media (max-width: 768px) {
        .promo-content {
            padding: 20px;
        }

        .promo-content p {
            font-size: 1rem;
        }

        .promo-content .btn-promo,
        .promo-content .btn-whatsapp {
            width: 100%;
            font-size: 1rem;
        }

        .promo-content .close {
            top: 10px;
            right: 10px;
        }
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link rel="stylesheet" href="path/to/your/css/style.css">
</head>

<body>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <h4>Promosi Wisata</h4>

            <!-- Tombol untuk memunculkan popup -->
            <button id="promoBtn" class="btn btn-primary">Lihat Promo</button>
        </div>
    </div>

    <!-- Popup Modal untuk Promosi -->
    <div id="promoPopup" class="promo-popup">
        <div class="promo-content">
            <span id="closePopup" class="close">&times;</span>
            <?php if (!empty($promosi)): ?>
                <div class="promo-header">
                    <p><strong><?= esc($promosi['nama_promosi']) ?></strong></p>
                </div>
                <div class="promo-price">
                    <p><?= esc($promosi['nama_promosi']) ?></p>
                    <p><strong>Harga Normal: Rp <?= number_format($promosi['harga_normal'], 0, ',', '.') ?></strong></p>
                    <p><strong>Harga Diskon: Rp <?= number_format($promosi['harga_diskon'], 0, ',', '.') ?></strong></p>
                </div>
                <button class="btn-promo">Gunakan Promo Sekarang</button>
                <button class="btn-whatsapp" onclick="window.open('https://wa.me/?text=<?= urlencode($promosi['nama_promosi']) ?>')">Bagikan ke WhatsApp</button>
                <div class="promo-footer">
                    <small><strong>Penawaran Terbatas - Jangan Sampai Terlewat!</strong></small>
                </div>
            <?php else: ?>
                <p>Tidak ada promosi aktif saat ini.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Script untuk Menampilkan dan Menutup Popup -->
    <script>
        const promoBtn = document.getElementById("promoBtn");
        const promoPopup = document.getElementById("promoPopup");
        const closePopup = document.getElementById("closePopup");

        promoBtn.onclick = function() {
            promoPopup.style.display = "block";
        }

        closePopup.onclick = function() {
            promoPopup.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == promoPopup) {
                promoPopup.style.display = "none";
            }
        }
    </script>

</body>

</html>


<script>
    setTimeout(function() {
        document.getElementById('promoPopup').style.display = 'flex';
    }, 1000);

    document.getElementById('closePopup').addEventListener('click', function() {
        document.getElementById('promoPopup').style.display = 'none';
    });

    setTimeout(function() {
        document.getElementById('promoPopup').style.display = 'none';
    }, 7000);
</script>


<?= $this->endSection() ?>