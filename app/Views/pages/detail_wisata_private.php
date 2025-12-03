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

<div class="container mt-4">

    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card" style="border-radius:.5rem;">
                <img src="../dist/assets/images/images2.jpg" class="card-img-top" alt="Whaleshark Teluk Saleh"
                    style="height:100%; width:100%; object-fit:cover;">
            </div>
        </div>
        <div class="col-md-4">
            <div class="row g-2">
                <div class="col-12">
                    <div class="card" style="border-radius:.5rem;">
                        <img src="../dist/assets/images/images2.jpg" class="card-img-top" alt="Whaleshark"
                            style="height:100%; width:100%; object-fit:cover;">
                    </div>
                </div>
                <div class="col-12">
                    <div class="card" style="border-radius:.5rem;">
                        <img src="../dist/assets/images/images2.jpg" class="card-img-top" alt="Trip Teluk Saleh"
                            style="height:100%; width:100%; object-fit:cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 2) Judul & Rating (8) vs Harga (4) -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card h-100" style="border-radius:.5rem;">
                <div class="card" style="border-radius:.5rem;">
                    <div class="card-header bg-light">
                        <h4 class="fw-bold mb-0">Tentang Whaleshark Teluk Saleh</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Whaleshark Teluk Saleh</strong> is one of the most popular tourist attractions today.
                            This tour has been open since 2018 or in conjunction with the <strong>Sail Moyo
                                Tambora</strong> event.</p>
                        <p><strong>Teluk Saleh</strong> on Sumbawa Island has become a must-visit destination for lovers
                            of
                            underwater beauty that provides an extraordinary experience for divers or snorkelers.</p>
                        <p class="mb-0">Enjoy a memorable travel experience with a trip with us!</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100" style="border-radius:.5rem; box-shadow:0 4px 10px rgba(0,0,0,.1);">
                <div class="card-body bg-light p-4">
                    <h4 class="fw-bold text-success">Private Trip</h4>
                    <ul class="mb-3" style="columns:2; -webkit-columns:2; -moz-columns:2; padding-left:1rem;">
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
                    <a href="<?= base_url('booking_private') ?>" class="btn btn-primary w-100 fw-bold rounded-pill">
                        Pesan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card" style="border-radius:.5rem;">
                <div class="card-header bg-light">
                    <h4 class="fw-bold mb-0">INCLUDE</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-check-circle text-success"></i> Boat / Perahu &amp; Bagang</li>
                        <li><i class="fas fa-check-circle text-success"></i> Pillow, Blanket</li>
                        <li><i class="fas fa-check-circle text-success"></i> Life Jacket</li>
                        <li><i class="fas fa-check-circle text-success"></i> Mineral Water</li>
                        <li><i class="fas fa-check-circle text-success"></i> Tea, Coffee, Bread, Nutella</li>
                        <li><i class="fas fa-check-circle text-success"></i> Fins &amp; Swimming Goggles</li>
                        <li><i class="fas fa-check-circle text-success"></i> Snorkeling Equipment (Fins &amp; Mask)</li>
                        <li><i class="fas fa-check-circle text-success"></i> GoPro 12/13 (Free Documentation)</li>
                        <li><i class="fas fa-check-circle text-success"></i> Underwater Videographer</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="border-radius:.5rem;">
                <div class="card-header bg-warning-subtle">
                    <h4 class="fw-bold mb-0">Contact and Visit Us</h4>
                </div>
                <div class="card-body">
                    <p class="mb-2">
                        <i class="bi bi-whatsapp me-2 text-success"></i>
                        <a href="https://wa.me/6281214408108" target="_blank" rel="noopener">081214408108</a>
                    </p>
                    <p class="mb-2">
                        <i class="bi bi-instagram me-2 text-danger"></i>
                        <a href="https://instagram.com/whaleshark.teluksaleh" target="_blank"
                            rel="noopener">whaleshark.teluksaleh</a>
                    </p>
                    <p class="mb-0">
                        <i class="bi bi-geo-alt me-2 text-primary"></i>
                        Labuhan Jambu, NTB
                    </p>
                </div>
            </div>
        </div>
    </div>



</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk menangani klik pada bintang
    document.querySelectorAll('.rating').forEach(function(ratingElement) {
        ratingElement.querySelectorAll('.star').forEach(function(star) {
            star.addEventListener('click', function() {
                let ratingValue = this.getAttribute('data-value');
                ratingElement.setAttribute('data-rating', ratingValue);
                updateStars(ratingElement, ratingValue);

                // Perbarui nilai input hidden dengan rating yang dipilih
                if (ratingElement.classList.contains('experience-rating')) {
                    document.getElementById('pengalaman_rating').value = ratingValue;
                } else if (ratingElement.classList.contains('guide-rating')) {
                    document.getElementById('pemandu_rating').value = ratingValue;
                } else if (ratingElement.classList.contains('facilities-rating')) {
                    document.getElementById('fasilitas_rating').value = ratingValue;
                }
            });
        });
    });

    // Fungsi untuk mengupdate warna bintang berdasarkan rating
    function updateStars(ratingElement, ratingValue) {
        ratingElement.querySelectorAll('.star').forEach(function(star) {
            if (star.getAttribute('data-value') <= ratingValue) {
                star.style.color = '#f39c12'; // Warna bintang yang dipilih
            } else {
                star.style.color = '#ccc'; // Warna bintang yang tidak dipilih
            }
        });
    }
});
</script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
<script>
// Function to generate the calendar
function generateCalendar(year, month) {
    const monthDays = moment([year, month]).daysInMonth();
    const firstDayOfMonth = moment([year, month]).startOf('month').day();
    const calendarGrid = document.getElementById('calendar');
    const currentMonthYear = document.getElementById('current-month-year');

    // Clear previous calendar
    calendarGrid.innerHTML = '';

    // Set month and year header
    const monthYearText = moment([year, month]).format('MMMM YYYY');
    currentMonthYear.innerText = monthYearText;

    // Create the calendar header (days of the week)
    const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    const headerRow = document.createElement('div');
    headerRow.classList.add('calendar-header');
    daysOfWeek.forEach(day => {
        const dayColumn = document.createElement('div');
        dayColumn.classList.add('calendar-day');
        dayColumn.innerText = day;
        headerRow.appendChild(dayColumn);
    });
    calendarGrid.appendChild(headerRow);

    // Create the calendar grid (days of the month)
    const dayGrid = document.createElement('div');
    dayGrid.classList.add('calendar-grid');

    // Empty space for the first week
    for (let i = 0; i < firstDayOfMonth; i++) {
        const emptyCell = document.createElement('div');
        emptyCell.classList.add('calendar-cell');
        dayGrid.appendChild(emptyCell);
    }

    // Add actual days of the month
    for (let i = 1; i <= monthDays; i++) {
        const dayCell = document.createElement('div');
        dayCell.classList.add('calendar-cell');
        dayCell.innerText = i;
        // Add status based on the date (this can be dynamic)
        if (i === 15) {
            dayCell.classList.add('available'); // Available (Green)
        } else if (i === 16) {
            dayCell.classList.add('full'); // Full (Yellow)
        } else if (i === 17) {
            dayCell.classList.add('unavailable'); // Unavailable (Red)
        }
        dayGrid.appendChild(dayCell);
    }

    calendarGrid.appendChild(dayGrid);
}

// Generate calendar for current month
const today = moment();
generateCalendar(today.year(), today.month());
</script>

<style>
/* Styling the calendar */
.calendar-header {
    display: flex;
    justify-content: space-around;
    font-weight: bold;
    background-color: #fff;
    padding: 15px 0;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.calendar-day {
    flex: 1;
    text-align: center;
    font-size: 1.1rem;
    color: #333;
    padding: 10px;
}

.calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    grid-gap: 10px;
    padding: 15px 0;
}

.calendar-cell {
    text-align: center;
    padding: 15px;
    font-size: 1rem;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
}

.calendar-cell:hover {
    background-color: #f1f1f1;
}

.available {
    background-color: #28a745;
    color: white;
    transform: scale(1.05);
}

.full {
    background-color: #ffc107;
    color: white;
    transform: scale(1.05);
}

.unavailable {
    background-color: #dc3545;
    color: white;
    transform: scale(1.05);
}
</style>
<?= $this->endSection() ?>