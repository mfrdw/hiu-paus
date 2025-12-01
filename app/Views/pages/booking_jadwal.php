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
                        <!-- hidden dari booking -->
                        <input type="hidden" name="id" value="<?= $booking['id'] ?? ''; ?>">
                        <input type="hidden" name="jumlahOrang" value="<?= $booking['jumlah_orang'] ?? ''; ?>">
                        <input type="hidden" name="paket" value="<?= $booking['paket'] ?? ''; ?>">

                        <table class="table align-middle mb-0">
                            <thead class="text-white"
                                style="background: linear-gradient(90deg,#005ad9,#6a11cb);">
                                <tr>
                                    <th style="width:60px;">No.</th>
                                    <th>Jadwal Tersedia</th>
                                    <th>Jam</th>
                                    <th style="width:220px;">Kapasitas</th>
                                    <th style="width:120px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;

                                // mapping nama hari EN -> ID
                                $hariMap = [
                                    'Sunday'    => 'Minggu',
                                    'Monday'    => 'Senin',
                                    'Tuesday'   => 'Selasa',
                                    'Wednesday' => 'Rabu',
                                    'Thursday'  => 'Kamis',
                                    'Friday'    => 'Jumat',
                                    'Saturday'  => 'Sabtu',
                                ];
                                ?>

                                <?php foreach ($jadwal as $j): ?>
                                    <?php
                                    $kapasitas = (int) $j['kapasitas'];
                                    $terisi    = (int) $j['terisi'];
                                    $sisa      = $kapasitas - $terisi;
                                    $persen    = $kapasitas > 0 ? ($terisi / $kapasitas) * 100 : 0;

                                    // warna progress bar
                                    $barClass = 'bg-success';
                                    if ($sisa == 0) {
                                        $barClass = 'bg-danger';
                                    } elseif ($sisa <= 3) {
                                        $barClass = 'bg-warning';
                                    }

                                    // tanggal & hari
                                    $tgl      = $j['tanggal'];
                                    $hariEn   = date('l', strtotime($tgl));
                                    $hariId   = $hariMap[$hariEn] ?? $hariEn;

                                    // jam (SESUAIKAN dengan nama kolom di jadwal_trip kamu)
                                    $jamMulai   = $j['jam_mulai']   ?? '06:00';
                                    $jamSelesai = $j['jam_selesai'] ?? '08:00';
                                    ?>

                                    <tr <?= $sisa == 0 ? 'class="table-light"' : ''; ?>>
                                        <td><?= $no++; ?></td>

                                        <!-- Jadwal Tersedia -->
                                        <td>
                                            <div class="fw-bold">
                                                <i class="far fa-calendar-alt me-2 text-primary"></i><?= $hariId; ?>
                                            </div>
                                            <div class="text-muted" style="font-size:.9rem;">
                                                <?= $tgl; ?>
                                            </div>
                                        </td>

                                        <!-- Jam -->
                                        <td>
                                            <i class="far fa-clock me-2 text-primary"></i>
                                            <?= $jamMulai; ?> - <?= $jamSelesai; ?>
                                        </td>

                                        <!-- Kapasitas + progress -->
                                        <td>
                                            <div class="d-flex align-items-center mb-1" style="font-size:.9rem;">
                                                <i class="fas fa-users me-2 <?= $sisa == 0 ? 'text-danger' : ($sisa <= 3 ? 'text-warning' : 'text-success'); ?>"></i>
                                                <strong><?= $terisi; ?></strong>
                                                <span class="mx-1">/</span><?= $kapasitas; ?>
                                            </div>
                                            <div class="progress" style="height:6px;">
                                                <div class="progress-bar <?= $barClass; ?>"
                                                    style="width: <?= $persen; ?>%;"></div>
                                            </div>
                                        </td>

                                        <!-- Aksi -->
                                        <td>
                                            <?php if ($sisa == 0): ?>
                                                <button type="button" class="btn btn-danger px-4" disabled>Penuh</button>
                                            <?php else: ?>
                                                <!-- submit dengan id jadwal -->
                                                <button type="submit"
                                                    name="jadwal_id"
                                                    value="<?= $j['id']; ?>"
                                                    class="btn btn-success px-4">
                                                    Pilih
                                                </button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </form>
                </div>
            </div>
        </div>
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



<?= $this->endSection() ?>