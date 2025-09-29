<?= $this->extend('layout_user/header') ?>
<?= $this->section('content') ?>


<!-- Main Section -->
<section class="main-section" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('../dist/assets/images/sea-gorontalo.jpg') center center / cover no-repeat; color: white; padding-top: 60px; padding-bottom: 60px;">
    <div class="container-fluid">
        <!-- Video Section -->
        <div class="video-container mb-5">
            <iframe width="660" height="415" src="https://www.youtube.com/embed/VxgaVjT5Lfk?si=rkG2LnXLG_3Ao1bV" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>

        <div class="row">
            <!-- Kalender (col-md-8) -->
            <div class="col-md-8 mb-5">
                <div class="calendar-container">
                    <div class="calendar-header">
                        <button id="prev" class="calendar-btn">&#10094;</button>
                        <h2 id="month-year"></h2>
                        <button id="next" class="calendar-btn">&#10095;</button>
                    </div>
                    <div class="calendar-days">
                        <div class="calendar-weekdays">
                            <div>Sun</div>
                            <div>Mon</div>
                            <div>Tue</div>
                            <div>Wed</div>
                            <div>Thu</div>
                            <div>Fri</div>
                            <div>Sat</div>
                        </div>
                        <div id="calendar-days" class="calendar-days-grid"></div>
                    </div>
                </div>
            </div>

            <!-- Alert Keterangan (col-md-4) -->
            <div class="col-md-4 mt-4" style="margin-left: -80px;">
                <!-- Available Alert -->
                <div class="alert alert-success">
                    <h4>Tersedia</h4>
                    <p>Semua tanggal yang muncul berwarna hijau adalah tanggal yang tersedia untuk pemesanan.</p>
                </div>

                <!-- Almost Full Alert -->
                <div class="alert alert-warning">
                    <h4>Hampir Penuh</h4>
                    <p>Tanggal yang berwarna kuning hampir terisi penuh. Segera pilih untuk mengamankan pemesanan Anda.</p>
                </div>

                <!-- Full Alert -->
                <div class="alert alert-danger">
                    <h4>Penuh</h4>
                    <p>Tanggal yang berwarna merah sudah penuh. Silakan pilih tanggal lain yang masih tersedia.</p>
                </div>
            </div>
        </div>

        <!-- Paket Trip Section -->
        <div class="row justify-content-center">
            <div class="section-title text-center mb-4 col-12">
                <h2 class="text-white">Pilih Paket Trip</h2>
            </div>

            <!-- Paket Trip Cards -->
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <img src="../dist/assets/images/kapal-pesiar.jpg" class="card-img-top" alt="Open Trip Whale Shark Teluk Saleh">
                    <div class="card-body text-center text-dark">
                        <h5 class="card-title">Open Trip Whale Shark Teluk Saleh</h5>
                        <p class="card-text">
                            <strong class="d-block mb-2" style="font-size: 1.2rem;">Rp 650.000 / Orang</strong>
                        </p>
                        <div class="bg-light text-start mb-3 px-3 py-2" style="font-size: 0.95rem; border-left: 4px solid #007bff; border-radius: 8px; box-shadow: 0 1px 4px rgba(0,0,0,0.05);">
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

            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <img src="../dist/assets/images/kapal-pesiar2.jpg" class="card-img-top" alt="Private Trip Whale Shark">
                    <div class="card-body text-center text-dark">
                        <h5 class="card-title">Private Trip Whale Shark Teluk Saleh</h5>
                        <p class="card-text">
                            <strong class="d-block mb-2" style="font-size: 1.2rem;">Rp 500.000 - Rp 2.800.000</strong>
                        </p>
                        <div class="bg-light text-start mb-3 px-3 py-2" style="font-size: 0.95rem; border-left: 4px solid #007bff; border-radius: 8px; box-shadow: 0 1px 4px rgba(0,0,0,0.05);">
                            <strong class="text-primary d-block mb-2">INCLUDE:</strong>
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

        <!-- Paket Wisata Pilihan Section -->
        <div class="section-title text-center mb-4 col-12">
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

        <!-- Aktivitas Unggulan Taman Hiu Paus Section -->
        <div class="section-title text-center mb-4 col-12">
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

<style>
    /* Styling untuk kalender */
    .calendar-container {
        background-color: #fff;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        overflow: hidden;
        width: 100%;
        max-width: 900px;
        margin: auto;
    }

    .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #0d6efd;
        color: #fff;
        padding: 15px;
        border-bottom: 2px solid #f1f1f1;
    }

    .calendar-btn {
        background: none;
        border: none;
        color: #fff;
        font-size: 24px;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .calendar-btn:hover {
        color: #ffeb3b;
    }

    .calendar-days {
        padding: 20px;
    }

    .calendar-weekdays {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        font-weight: bold;
        color: #0d6efd;
        text-align: center;
        margin-bottom: 10px;
    }

    .calendar-days-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        grid-gap: 10px;
        text-align: center;
        padding: 10px 0;
    }

    .day {
        padding: 20px;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
        font-size: 16px;
        background-color: #f1f1f1;
    }

    /* Status Tanggal */
    .day:hover {
        background-color: #0d6efd;
        color: #fff;
        transform: scale(1.1);
    }

    .day.selected {
        background-color: #ffeb3b;
        color: #000;
        font-weight: bold;
    }

    .day.available {
        background-color: #28a745;
        color: white;
    }

    .day.almost-full {
        background-color: #ffc107;
        color: white;
    }

    .day.full {
        background-color: #dc3545;
        color: white;
    }
</style>


<script>
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    const monthYearDisplay = document.getElementById('month-year');
    const calendarDaysContainer = document.getElementById('calendar-days');

    let currentDate = new Date();

    function renderCalendar(date) {
        const currentMonth = date.getMonth();
        const currentYear = date.getFullYear();

        // Display month and year
        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        monthYearDisplay.textContent = `${months[currentMonth]} ${currentYear}`;

        // Clear the calendar days
        calendarDaysContainer.innerHTML = '';

        // Get the first day of the month
        const firstDay = new Date(currentYear, currentMonth, 1).getDay();

        // Get the last day of the month
        const lastDate = new Date(currentYear, currentMonth + 1, 0).getDate();

        // Create empty divs for the first week (if necessary)
        for (let i = 0; i < firstDay; i++) {
            const emptyDiv = document.createElement('div');
            calendarDaysContainer.appendChild(emptyDiv);
        }

        // Create day buttons for each date in the month
        for (let day = 1; day <= lastDate; day++) {
            const dayButton = document.createElement('div');
            dayButton.textContent = day;
            dayButton.classList.add('day');

            // Assign random availability status (for demonstration)
            const status = getRandomStatus();
            dayButton.classList.add(status);

            dayButton.addEventListener('click', () => selectDate(day));

            calendarDaysContainer.appendChild(dayButton);
        }
    }

    function selectDate(day) {
        const selectedDays = document.querySelectorAll('.day.selected');
        selectedDays.forEach(day => day.classList.remove('selected'));

        const dayElements = document.querySelectorAll('.day');
        dayElements.forEach(dayElement => {
            if (parseInt(dayElement.textContent) === day) {
                dayElement.classList.add('selected');
            }
        });
    }

    // Function to randomly assign status (for demonstration)
    function getRandomStatus() {
        const statuses = ['available', 'almost-full', 'full'];
        const randomIndex = Math.floor(Math.random() * statuses.length);
        return statuses[randomIndex];
    }

    // Event listeners for next and previous buttons
    prevButton.addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    });

    nextButton.addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    });

    // Initial render
    renderCalendar(currentDate);
</script>


<?= $this->endSection() ?>