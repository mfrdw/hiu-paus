<?= $this->extend('layout_user/header') ?>
<?= $this->section('content') ?>

<!-- Main Section -->
<section id="beranda" class="main-section" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('../dist/assets/images/sea-gorontalo.jpg') center center / cover no-repeat; color: white; padding-top: 60px; padding-bottom: 60px;">
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
        <div class="row justify-content-center" id="paket-trip">>
            <div class="section-title text-center mb-4 col-12">
                <h2 class="text-white">Pilih Paket Trip</h2>
            </div>

            <!-- Paket Trip Cards -->
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <img src="../dist/assets/images/images1.jpg" class="card-img-top" alt="Open Trip Whale Shark Teluk Saleh">
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
                    <img src="../dist/assets/images/images2.jpg" class="card-img-top" alt="Private Trip Whale Shark">
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
    </div>
</section>


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
        background: linear-gradient(145deg, #6a11cb, #2575fc);
        /* Ubah ke gradasi biru */
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
        background-color: #2575fc;
        /* Ubah warna tombol menjadi biru */
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
        background-color: #0056b3;
        /* Ubah warna tombol saat hover menjadi biru lebih gelap */
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

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- Popup Modal untuk Promosi -->
<div id="promoPopup" class="promo-popup">
    <div class="promo-content">
        <span id="closePopup" class="close">&times;</span>
        <?php if (!empty($promosi)): ?>
            <div class="promo-header">
                <p><strong><?= esc($promosi['nama_promosi']) ?></strong></p>
            </div>
            <div class="promo-price">
                <p><strong>Harga Normal: Rp <span class="text-decoration-line-through"><?= number_format($promosi['harga_normal'], 0, ',', '.') ?></span></strong></p>
                <p><strong>Harga Diskon: Rp <?= number_format($promosi['harga_diskon'], 0, ',', '.') ?></strong></p>
            </div>

            <form id="promoForm" action="<?= base_url('/get_promo') ?>" method="POST">
                <input type="hidden" name="promo_id" value="<?= esc($promosi['id']) ?>"> <!-- Kirim ID promo -->

                <?php if (isset($promosi_user) && $promosi_user['promo'] == 2): ?>
                    <!-- Jika promo sudah digunakan -->
                    <button type="button" class="btn-promo" style="background-color: #29f043ff; cursor: not-allowed;" disabled>
                        Promo Sudah Digunakan
                    </button>
                <?php else: ?>
                    <!-- Jika promo belum digunakan -->
                    <button type="submit" class="btn-promo" id="promoBtn">Gunakan Promo Sekarang</button>
                <?php endif; ?>
            </form>



            <!-- WhatsApp Button -->
            <button class="btn-whatsapp" onclick="window.open('https://wa.me/?text=<?= urlencode($promosi['nama_promosi']) ?>')">Bagikan ke WhatsApp</button>

            <div class="promo-footer mt-3">
                <small><strong>Penawaran Terbatas - Jangan Sampai Terlewat!</strong></small>
            </div>
        <?php else: ?>
            <p>Tidak ada promosi aktif saat ini.</p>
        <?php endif; ?>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const promoButton = document.getElementById('promoBtn'); // Tombol promo

        // Fetch untuk mengambil data promo dari server
        fetch('<?= base_url('/promo/getPromoStatus') ?>')
            .then(response => response.json())
            .then(data => {
                if (data.promo === 2) {
                    // Jika promo sudah digunakan
                    promoButton.textContent = 'Promo Sudah Digunakan';
                    promoButton.style.backgroundColor = '#cccccc'; // Ganti warna tombol
                    promoButton.style.cursor = 'not-allowed'; // Membuat tombol tidak dapat diklik
                } else {
                    // Jika promo belum aktif, tampilkan modal dan tombol
                    document.getElementById('promoPopup').style.display = 'flex';
                }
            })
            .catch(error => {
                console.error('Error fetching promo status:', error);
            });

        // Menangani tombol "Gunakan Promo Sekarang"
        document.querySelector('.btn-promo').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah form untuk langsung submit

            // Mengecek apakah user sudah login (memeriksa session)
            fetch('<?= base_url('/promo/getPromoStatus') ?>')
                .then(response => response.json())
                .then(data => {
                    if (data.promo === 0) {
                        // Jika belum login, tampilkan SweetAlert2
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: 'Anda harus login terlebih dahulu!',
                            confirmButtonText: 'Login',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '<?= base_url('/login') ?>'; // Arahkan ke halaman login
                            }
                        });
                    } else {
                        // Jika sudah login, submit form
                        document.getElementById('promoForm').submit();
                    }
                })
                .catch(error => {
                    console.error('Error fetching user data:', error);
                });
        });

        // Script untuk menutup popup
        document.getElementById('closePopup').addEventListener('click', function() {
            document.getElementById('promoPopup').style.display = 'none';
        });

        // Otomatis sembunyikan popup setelah beberapa detik (7 detik)
        setTimeout(function() {
            document.getElementById('promoPopup').style.display = 'none';
        }, 7000);
    });
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
        const currentMonth = date.getMonth() + 1; // Menyesuaikan bulan (1-12)
        const currentYear = date.getFullYear();

        // Display month and year
        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        monthYearDisplay.textContent = `${months[currentMonth - 1]} ${currentYear}`;

        // Clear the calendar days
        calendarDaysContainer.innerHTML = '';

        // Get the first day of the month
        const firstDay = new Date(currentYear, currentMonth - 1, 1).getDay();

        // Get the last day of the month
        const lastDate = new Date(currentYear, currentMonth, 0).getDate();

        // Create empty divs for the first week (if necessary)
        for (let i = 0; i < firstDay; i++) {
            const emptyDiv = document.createElement('div');
            calendarDaysContainer.appendChild(emptyDiv);
        }

        // Fetch data for the current month and year
        fetch(`/get_calendar_data?month=${currentMonth}&year=${currentYear}`)
            .then(response => response.json())
            .then(data => {
                // Create day buttons for each date in the month
                for (let day = 1; day <= lastDate; day++) {
                    const dayButton = document.createElement('div');
                    dayButton.textContent = day;
                    dayButton.classList.add('day');

                    // Find the status for the current day
                    const dayStatus = data.find(item => new Date(item.tanggal).getDate() === day);
                    const status = dayStatus ? dayStatus.status : 'past'; // Default to 'past' if no data

                    // Get the current date (today)
                    const today = new Date();
                    const currentDay = new Date(currentYear, currentMonth - 1, day);

                    // Assign the status class to the day
                    if (status === 'available') {
                        // If the day is today, it should not be past
                        if (currentDay.toDateString() === today.toDateString()) {
                            dayButton.style.backgroundColor = 'gray'; // Tanggal hari ini jadi abu
                        } else {
                            dayButton.style.backgroundColor = 'green'; // Tersedia
                        }
                    } else if (status === 'almost-full') {
                        dayButton.style.backgroundColor = 'yellow'; // Hampir penuh
                    } else if (status === 'full') {
                        // If the day is today, it should be red
                        if (currentDay.toDateString() === today.toDateString()) {
                            dayButton.style.backgroundColor = 'red'; // Penuh, merah
                        } else {
                            dayButton.style.backgroundColor = 'red'; // Penuh
                        }
                    } else if (status === 'past') {
                        dayButton.style.backgroundColor = 'gray'; // Tanggal lewat, abu-abu
                    }

                    dayButton.addEventListener('click', () => selectDate(day));
                    calendarDaysContainer.appendChild(dayButton);
                }
            })
            .catch(error => console.error('Error fetching calendar data:', error));
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