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
<!-- Main Content Section -->
<div class="container mt-4">

    <!-- Wisata Images -->
    <div class="row mb-4">
        <!-- Gambar Utama -->
        <div class="col-md-8">
            <div class="card" style="border-radius: 0.5rem; margin-bottom: 1rem;">
                <img src="../dist/assets/images/images1.jpg" class="card-img-top"
                    style="height: 100%; width: 100%; object-fit: cover;">
            </div>
        </div>

        <!-- Gambar Tambahan (2 gambar di kanan) -->
        <div class="col-md-4">
            <div class="row">
                <div class="col-12 mb-2">
                    <div class="card" style="border-radius: 0.5rem; margin-bottom: 1rem;">
                        <img src="../dist/assets/images/images1.jpg" class="card-img-top"
                            style="height: 100%; width: 100%; object-fit: cover;">
                    </div>
                </div>
                <div class="col-12">
                    <div class="card" style="border-radius: 0.5rem; margin-bottom: 1rem;">
                        <img src="../dist/assets/images/images1.jpg" class="card-img-top"
                            style="height: 100%; width: 100%; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Review Section -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card" style="border-radius: 0.5rem; margin-bottom: 1rem;">
                <div class="card-header" style="background-color: #f8f9fa;">
                    <h4 class="card-title" style="font-size: 1.2rem; font-weight: bold;">Tentang Whaleshark Teluk Saleh
                    </h4>
                </div>
                <div class="card-body">
                    <p><strong>Whaleshark Teluk Saleh</strong> merupakan salah satu destinasi wisata yang semakin
                        populer di kalangan wisatawan, terutama sejak tahun 2018. Wisata ini dikenal dengan pengalaman
                        langka melihat hiu paus atau whale shark yang berenang di perairan Teluk Saleh, Sumbawa.
                        Keindahan bawah laut di Teluk Saleh menjadi daya tarik utama, membuat wisata ini sangat diminati
                        oleh pecinta alam dan penyelam.</p>
                    <p>Selain keindahan alam yang menakjubkan, <strong>Teluk Saleh</strong> juga menjadi tempat yang
                        ideal bagi para penyelam untuk menikmati keanekaragaman hayati laut. Salah satu momen tak
                        terlupakan bagi para pengunjung adalah kesempatan untuk berenang bersama hiu paus yang dapat
                        mencapai ukuran raksasa. Keberadaan hiu paus di Teluk Saleh menjadi simbol dari kelestarian alam
                        yang terjaga dan menjadikannya salah satu lokasi wisata bawah laut terbaik di dunia.</p>
                    <p>Sejak pertama kali dibuka pada tahun 2018, bersamaan dengan acara <strong>Sail Moyo
                            Tambora</strong>, wisata ini terus berkembang dan kini menjadi destinasi utama bagi
                        wisatawan lokal dan mancanegara. Para pengunjung tidak hanya dapat menikmati pengalaman
                        snorkelling atau diving, tetapi juga dapat merasakan kedamaian dan ketenangan yang ditawarkan
                        oleh alam sekitar Teluk Saleh yang masih alami dan belum terlalu berkembang. Hal ini menjadikan
                        Teluk Saleh sebagai tempat yang tepat untuk melepaskan diri dari hiruk-pikuk kehidupan
                        sehari-hari.</p>
                    <p>Dengan berbagai pengalaman luar biasa yang ditawarkan, Teluk Saleh kini menjadi destinasi wajib
                        bagi para pecinta alam dan penyelam yang ingin menjelajahi keindahan bawah laut Indonesia.
                        Keindahan alami Teluk Saleh, dikombinasikan dengan ekosistem laut yang kaya, menjadikannya
                        lokasi yang sempurna untuk berlibur, belajar, dan menikmati alam.</p>
                </div>
            </div>

        </div>

        <div class="col-md-4">
            <div class="card" style="border-radius: 0.5rem; margin-bottom: 1rem;">
                <div class="card-header" style="background-color: #f8f9fa;">
                    <h4 class="card-title" style="font-size: 1.2rem; font-weight: bold;">Fasilitas Trip</h4>
                </div>
                <div class="card-body">
                    <ul class="facilities-item" style="list-style: none; padding-left: 0;">
                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Boat / Perahu (3-4 jam)</li>
                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Life Jacket</li>
                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Air Mineral & Snack Lokal</li>
                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Alat Snorkeling (Mask, Fins,
                            Snorkel)</li>
                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Skin Dive (Roti & Nutella)</li>
                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Free Kamera GoPro (1 video + 5
                            foto underwater)</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>


</div>




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