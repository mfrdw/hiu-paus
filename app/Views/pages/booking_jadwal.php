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
<div class="container mb-5" style="max-width: 1200px; margin-top: 50px;">
    <div class="text-center">
        <h2>BOOKING WHALE SHARK TRIP</h2>
        <p>Teluk Saleh, Sumbawa.</p>
    </div>

    <div class="row">
        <div class="col-md-12">


            <div class="card mb-4" style="border-radius: 0.5rem; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">

                <div class="card-header" style="background-color: #f8f9fa; padding: 20px;">
                    <div class="progress" style="height: 20px; margin-bottom: 10px;">
                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div style="display: flex; justify-content: space-between; font-size: 1rem; color: #007bff;">
                        <span style="font-weight: bold;">1</span>
                        <span style="font-weight: bold;">2</span>
                        <span style="font-weight: bold;">3</span>
                        <span style="font-weight: bold;">4</span>
                    </div>
                </div>

                <div class="card-body" style="padding: 30px; background-color: #f8f9fa;">
                    <h4 style="font-size: 1.4rem; font-weight: bold;">Pilih Jadwal</h4>
                    <form id="contactForm" action="<?= base_url('add_jadwal'); ?>" method="POST">
                        <input type="hidden" name="id" value="<?= isset($booking['id']) ? $booking['id'] : ''; ?>">
                        <input type="hidden" name="jumlahOrang" value="<?= isset($booking['jumlah_orang']) ? $booking['jumlah_orang'] : ''; ?>">
                        <input type="hidden" name="paket" value="<?= isset($booking['jumlah_orang']) ? $booking['paket'] : ''; ?>">

                        <!-- Tanggal Trip -->
                        <div class="form-section" style="margin-bottom: 1.2rem;">
                            <label for="tripDate" class="form-label" style="font-weight: bold; font-size: 1rem;">
                                <i class="fas fa-calendar-day" style="margin-right: 5px;"></i> Tanggal Trip
                            </label>
                            <input type="date" class="form-control" id="tripDate" name="tripDate" required style="padding: 12px; font-size: 1rem;">

                            <!-- Tempat untuk menampilkan alert ketersediaan -->
                            <div id="availabilityAlert" style="display: none;">
                                <div class="alert alert-success mt-2" role="alert">
                                    <i class="fas fa-check-circle" style="margin-right: 5px;"></i>
                                    Tersedia! Sisa slot: <span id="sisaSlot"></span> dari <span id="kapasitas"></span> orang
                                </div>
                            </div>
                            <div id="errorAlert" style="display: none;">
                                <div class="alert alert-danger mt-2" role="alert">
                                    <i class="fas fa-times-circle" style="margin-right: 5px;"></i>
                                    Jadwal tidak ditemukan atau tidak tersedia.
                                </div>
                            </div>
                            <div id="fullAlert" style="display: none;">
                                <div class="alert alert-danger mt-2" role="alert">
                                    <i class="fas fa-times-circle" style="margin-right: 5px;"></i>
                                    Jadwal Penuh! Tidak ada slot yang tersedia.
                                </div>
                            </div>
                            <div id="almostFullAlert" style="display: none;">
                                <div class="alert alert-warning mt-2" role="alert">
                                    <i class="fas fa-exclamation-circle" style="margin-right: 5px;"></i>
                                    Jadwal Hampir Penuh! Sisa slot tinggal sedikit.
                                </div>
                            </div>

                            <!-- Menampilkan 3 jadwal yang masih ada slot -->
                            <div id="recommendedSchedules" style="display: none; margin-top: 20px;">
                                <h5>Rekomendasi Jadwal Tersedia:</h5>
                                <ul id="scheduleList" class="list-group">
                                    <!-- 3 jadwal yang masih ada slot akan ditambahkan di sini -->
                                </ul>
                            </div>
                        </div>
                        <script>
                            document.getElementById('tripDate').addEventListener('change', function() {
                                const selectedDate = this.value; // Ambil tanggal yang dipilih
                                const errorAlert = document.getElementById('errorAlert');
                                const availabilityAlert = document.getElementById('availabilityAlert');
                                const fullAlert = document.getElementById('fullAlert');
                                const almostFullAlert = document.getElementById('almostFullAlert');
                                const kapasitas = document.getElementById('kapasitas');
                                const sisaSlot = document.getElementById('sisaSlot');
                                const recommendedSchedules = document.getElementById('recommendedSchedules');
                                const scheduleList = document.getElementById('scheduleList');

                                // Menyembunyikan semua alert terlebih dahulu
                                errorAlert.style.display = 'none';
                                availabilityAlert.style.display = 'none';
                                fullAlert.style.display = 'none';
                                almostFullAlert.style.display = 'none';
                                recommendedSchedules.style.display = 'none';
                                scheduleList.innerHTML = ''; // Kosongkan daftar jadwal yang ditampilkan

                                // Mengirimkan permintaan AJAX ke server untuk mendapatkan jadwal berdasarkan tanggal yang dipilih
                                fetch('/get_jadwal_by_date?tanggal=' + selectedDate)
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.error) {
                                            // Menampilkan pesan error jika tidak ada jadwal ditemukan
                                            errorAlert.style.display = 'block';

                                            // Menampilkan rekomendasi 3 jadwal dengan sisa slot yang masih ada
                                            fetch('/get_jadwal_by_date?tanggal=' + selectedDate) // Menyaring jadwal lain yang masih tersedia
                                                .then(res => res.json())
                                                .then(availableData => {
                                                    const availableSchedules = availableData.filter(jadwal => jadwal.kapasitas - jadwal.terisi > 0); // Filter jadwal yang masih tersedia
                                                    const topSchedules = availableSchedules.slice(0, 3); // Ambil 3 jadwal pertama yang tersedia

                                                    if (topSchedules.length > 0) {
                                                        recommendedSchedules.style.display = 'block'; // Tampilkan rekomendasi jadwal
                                                        topSchedules.forEach(jadwal => {
                                                            const li = document.createElement('li');
                                                            li.classList.add('list-group-item');
                                                            li.textContent = `Paket: ${jadwal.paket}, Tanggal: ${jadwal.tanggal}, Sisa Slot: ${jadwal.kapasitas - jadwal.terisi}`;
                                                            scheduleList.appendChild(li);
                                                        });
                                                    }
                                                });
                                        } else {
                                            // Menampilkan informasi jadwal jika ditemukan
                                            const jadwal = data[0]; // Ambil jadwal pertama jika ada
                                            const sisa = jadwal.kapasitas - jadwal.terisi;
                                            sisaSlot.textContent = sisa;
                                            kapasitas.textContent = jadwal.kapasitas;

                                            // Menampilkan status ketersediaan berdasarkan sisa slot
                                            if (sisa === 0) {
                                                fullAlert.style.display = 'block'; // Tampilkan alert "Penuh"
                                            } else if (sisa <= 3) {
                                                almostFullAlert.style.display = 'block'; // Tampilkan alert "Hampir Penuh"
                                                // Tampilkan rekomendasi 3 jadwal dengan sisa slot yang masih ada
                                                recommendedSchedules.style.display = 'block'; // Tampilkan rekomendasi jadwal
                                                fetch('/get_jadwal_by_date?tanggal=' + selectedDate) // Menyaring jadwal lain yang masih tersedia
                                                    .then(res => res.json())
                                                    .then(availableData => {
                                                        const availableSchedules = availableData.filter(jadwal => jadwal.kapasitas - jadwal.terisi > 0); // Filter jadwal yang masih tersedia
                                                        const topSchedules = availableSchedules.slice(0, 3); // Ambil 3 jadwal pertama yang tersedia

                                                        if (topSchedules.length > 0) {
                                                            topSchedules.forEach(jadwal => {
                                                                const li = document.createElement('li');
                                                                li.classList.add('list-group-item');
                                                                li.textContent = `Paket: ${jadwal.paket}, Tanggal: ${jadwal.tanggal}, Sisa Slot: ${jadwal.kapasitas - jadwal.terisi}`;
                                                                scheduleList.appendChild(li);
                                                            });
                                                        }
                                                    });
                                            } else {
                                                availabilityAlert.style.display = 'block'; // Tampilkan alert "Tersedia"
                                            }
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        errorAlert.style.display = 'block';
                                    });
                            });
                        </script>



                        <!-- Waktu Keberangkatan -->
                        <div class="form-section" style="margin-bottom: 1.2rem;">
                            <label for="departureTime" class="form-label" style="font-weight: bold; font-size: 1rem;">
                                <i class="fas fa-clock" style="margin-right: 5px;"></i> Waktu Keberangkatan
                            </label>
                            <select class="form-control" id="departureTime" name="departureTime" required style="padding: 12px; font-size: 1rem;">
                                <option value="" disabled selected>Pilih Waktu</option>
                                <option value="06:00">06:00 - Pagi (Rekomendasi)</option>
                                <option value="08:00">08:00 - Pagi</option>
                                <option value="10:00">10:00 - Siang</option>
                            </select>
                            <!-- Informasi Alert -->
                            <div class="alert alert-info mt-2" role="alert" style="font-size: 0.9rem;">
                                <i class="fas fa-info-circle" style="margin-right: 5px;"></i> Tips: Waktu 06:00 adalah waktu terbaik untuk menikmati pengalaman Whale Shark yang lebih tenang dan jarang ditemui pengunjung.
                            </div>
                        </div>

                        <!-- Button Continue -->
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-secondary" id="continueBtn" style="padding: 12px; border-radius: 50px; font-weight: bold; background-color: #28a745; border: none; color: #fff; transition: background-color 0.3s ease;">
                                <i class="fas fa-arrow-right" style="margin-right: 5px;"></i> Lanjutkan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<?= $this->endSection() ?>