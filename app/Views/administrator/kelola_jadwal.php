<?= $this->extend('layout_admin/header') ?>
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

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>Kelola Jadwal & Ketersediaan</h3>

                <!-- Button Group for Adding and Viewing Full Schedule -->
                <div class="btn-group my-3">
                    <!-- Button Tambah Jadwal -->
                    <button class="btn btn-success" data-toggle="modal" data-target="#tambahJadwalModal">
                        <i class="fas fa-calendar-plus"></i> Tambah Jadwal
                    </button>
                    <!-- Tombol untuk Menampilkan Modal -->
                    <button class="btn btn-warning" data-toggle="modal" data-target="#calendarModal">
                        <i class="fas fa-calendar-check"></i> Jadwal Penuh
                    </button>


                </div>

                <!-- Dropdown for Date Selection (e.g., July 2024) -->
                <div class="float-right">
                    <select class="custom-select" style="width: 150px;">
                        <option selected>July 2024</option>
                        <option value="1">August 2024</option>
                        <option value="2">September 2024</option>
                    </select>
                </div>

                <!-- Calendar Component -->
                <div class="mt-4">
                    <h5>Kalender Jadwal</h5>
                    <p>Calendar Component - <span class="text-success">Tanggal Tersedia (hijau)</span>,
                        <span class="text-warning">Tanggal Penuh (kuning)</span>,
                        <span class="text-danger">Tanggal Tidak Tersedia (merah)</span>
                    </p>
                    <!-- Here, you can add a calendar component (For now, it's just a placeholder) -->
                    <div class="calendar">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="day available">1</div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="day booked">2</div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="day unavailable">3</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="day available">4</div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="day booked">5</div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="day unavailable">6</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabel Jadwal Minggu Ini -->
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">Jadwal Minggu Ini</h5>
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jam</th> <!-- ✅ TAMBAH INI -->
                                    <th scope="col">Paket</th>
                                    <th scope="col">Kapasitas</th>
                                    <th scope="col">Terisi</th>
                                    <th scope="col">Sisa</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($jadwals as $jadwal): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= date('d M Y', strtotime($jadwal['tanggal'])); ?></td>

                                        <!-- ✅ KOLOM JAM -->
                                        <td>
                                            <i class="far fa-clock mr-1 text-primary"></i>
                                            <?= esc($jadwal['jam_mulai']) . ' - ' . esc($jadwal['jam_selesai']); ?>
                                        </td>

                                        <td><?= esc($jadwal['paket']); ?></td>
                                        <td><?= esc($jadwal['kapasitas']) . ' orang'; ?></td>
                                        <td><?= esc($jadwal['terisi']) . ' orang'; ?></td>
                                        <td><?= esc($jadwal['sisa']) . ' orang'; ?></td>
                                        <td>
                                            <span class="badge
                        <?= ($jadwal['status'] == 'tersedia')
                                        ? 'badge-success'
                                        : (($jadwal['status'] == 'penuh') ? 'badge-danger' : 'badge-warning'); ?>">
                                                <?= ucfirst($jadwal['status']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-warning btn-sm"
                                                data-toggle="modal"
                                                data-target="#editJadwalModal<?= esc($jadwal['id']); ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <a href="<?= base_url('/delete_jadwal/' . $jadwal['id']); ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Jadwal -->
<div class="modal fade" id="tambahJadwalModal" tabindex="-1" role="dialog" aria-labelledby="tambahJadwalModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahJadwalModalLabel">Tambah Jadwal Trip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="jadwalForm" action="<?= base_url('jadwal_trip/tambah') ?>" method="POST">
                    <div class="form-group">
                        <label for="tanggal">Tanggal Trip</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>

                    <div class="form-group">
                        <label for="paket">Paket</label>
                        <select class="form-control" id="paket" name="paket" required>
                            <option value="Open Trip Whale Shark Teluk Saleh">Open Trip Whale Shark Teluk Saleh</option>
                            <option value="Private Trip Whale Shark Teluk Saleh">Private Trip Whale Shark Teluk Saleh</option>
                        </select>
                    </div>

                    <!-- JAM MULAI -->
                    <div class="form-group">
                        <label for="jam_mulai">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                    </div>

                    <!-- JAM SELESAI -->
                    <div class="form-group">
                        <label for="jam_selesai">Jam Selesai</label>
                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                    </div>

                    <div class="form-group">
                        <label for="kapasitas">Kapasitas</label>
                        <input type="number" class="form-control" id="kapasitas" name="kapasitas" required>
                    </div>

                    <!-- Alert message -->
                    <div id="alertMessage" class="alert alert-danger mt-3" style="display: none;">
                        Kapasitas tidak boleh lebih dari 15 orang.
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan Jadwal</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to handle validation -->
<script>
    // Event listener untuk menangani form submit
    document.getElementById('jadwalForm').addEventListener('submit', function(event) {
        var kapasitas = document.getElementById('kapasitas').value;

        // Cek jika kapasitas lebih dari 15
        if (kapasitas > 15) {
            // Batalkan form submit
            event.preventDefault();

            // Tampilkan alert
            document.getElementById('alertMessage').style.display = 'block';
        }
    });
</script>



<!-- Modal Edit Jadwal -->
<?php foreach ($jadwals as $jadwal): ?>
    <div class="modal fade" id="editJadwalModal<?= esc($jadwal['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="editJadwalModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editJadwalModalLabel">Edit Jadwal Trip</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/update/' . esc($jadwal['id'])) ?>" method="POST">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" value="<?= esc($jadwal['id']) ?>">

                        <div class="form-group">
                            <label for="tanggal">Tanggal Trip</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                value="<?= esc($jadwal['tanggal']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="paket">Paket</label>
                            <select class="form-control" id="paket" name="paket" required>
                                <option value="Open Trip Whale Shark Teluk Saleh"
                                    <?= $jadwal['paket'] == 'Open Trip Whale Shark Teluk Saleh' ? 'selected' : '' ?>>Open
                                    Trip Whale Shark Teluk Saleh</option>
                                <option value="Private Trip Whale Shark Teluk Saleh"
                                    <?= $jadwal['paket'] == 'Private Trip Whale Shark Teluk Saleh' ? 'selected' : '' ?>>
                                    Private Trip Whale Shark Teluk Saleh</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kapasitas">Kapasitas</label>
                            <input type="number" class="form-control" id="kapasitas" name="kapasitas"
                                value="<?= esc($jadwal['kapasitas']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="tersedia" <?= $jadwal['status'] == 'tersedia' ? 'selected' : '' ?>>Tersedia
                                </option>
                                <option value="penuh" <?= $jadwal['status'] == 'penuh' ? 'selected' : '' ?>>Penuh</option>
                                <option value="tidak tersedia"
                                    <?= $jadwal['status'] == 'tidak tersedia' ? 'selected' : '' ?>>Tidak Tersedia</option>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary w-100">Simpan Jadwal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Kalender -->
<div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="calendarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="calendarModalLabel">Kalender Jadwal Bulan Ini</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <style>
                .calendar-table th,
                .calendar-table td {
                    text-align: center;
                    vertical-align: middle;
                    padding: 10px;
                }

                .status-available {
                    background: #2ecc71;
                    color: #fff;
                }

                .status-almost_full {
                    background: #f1c40f;
                    color: #111;
                }

                .status-full {
                    background: #e74c3c;
                    color: #fff;
                }

                .legend {
                    display: inline-block;
                    width: 12px;
                    height: 12px;
                    border-radius: 2px;
                    margin-right: 6px;
                    border: 1px solid rgba(0, 0, 0, .1);
                }

                .legend-available {
                    background: #2ecc71;
                }

                .legend-almost_full {
                    background: #f1c40f;
                }

                .legend-full {
                    background: #e74c3c;
                }

                .date-num {
                    font-weight: 600;
                }

                .small-note {
                    font-size: .75rem;
                    opacity: .85;
                }
            </style>

            <div class="modal-body">
                <?php
                // Pakai variabel dari controller kalau ada, kalau tidak fallback
                $currentMonth = isset($currentMonth) ? (int)$currentMonth : (int)date('m');
                $currentYear  = isset($currentYear)  ? (int)$currentYear  : (int)date('Y');

                $monthName = date('F', mktime(0, 0, 0, $currentMonth, 10));
                echo "<h4 class='mb-3'>{$monthName} {$currentYear}</h4>";

                // --- Index data jadwal per tanggal & ambil status "terberat" per hari ---
                $byDate = [];
                if (!empty($jadwal)) {
                    foreach ($jadwal as $row) {
                        // Check if tanggal is a valid date
                        $tanggal = $row['tanggal'] ?? ''; // Ensure it's set
                        $dateObj = strtotime($tanggal); // Try converting to timestamp

                        // If strtotime returns false, skip this row
                        if ($dateObj === false) {
                            continue;  // Skip invalid dates or handle accordingly
                        }

                        // Convert to Y-m-d format
                        $key = date('Y-m-d', $dateObj);

                        // Get the kapasitas and terisi values
                        $kap    = isset($row['kapasitas']) ? (int)$row['kapasitas'] : 15;  // Default 15 if not set
                        $terisi = isset($row['terisi'])    ? (int)$row['terisi']    : 0;
                        $sisa   = isset($row['sisa']) && $row['sisa'] !== '' ? (int)$row['sisa'] : max($kap - $terisi, 0);

                        // Determine the status based on the available capacity
                        if ($sisa <= 0 || $terisi >= $kap || $terisi >= 15) {
                            $status = 'full';  // Penuh
                        } elseif ($terisi >= 10) {
                            $status = 'almost_full';  // Hampir Penuh
                        } else {
                            $status = 'available';  // Tersedia
                        }

                        // Store the "heaviest" status per day
                        $sevMap = ['available' => 1, 'almost_full' => 2, 'full' => 3];
                        $sev    = $sevMap[$status];

                        // If this date's status is stronger, update
                        if (!isset($byDate[$key]) || $sev > $byDate[$key]['sev']) {
                            $byDate[$key] = [
                                'status'  => $status,
                                'sev'     => $sev,
                                'terisi'  => $terisi,
                                'kap'     => $kap,
                                'sisa'    => $sisa,
                                'paket'   => $row['paket'] ?? null, // Optional, if you want to display
                            ];
                        }
                    }
                }


                // --- Bangun tabel kalender ---
                $daysInMonth    = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
                $firstDayOfWeek = (int)date('N', strtotime(sprintf('%04d-%02d-01', $currentYear, $currentMonth))); // 1=Senin..7=Minggu
                ?>

                <!-- Legend -->
                <div class="mb-2">
                    <span class="legend legend-available"></span> Tersedia
                    &nbsp;&nbsp;<span class="legend legend-almost_full"></span> Hampir penuh
                    &nbsp;&nbsp;<span class="legend legend-full"></span> Penuh
                </div>

                <table class="table table-bordered calendar-table">
                    <thead>
                        <tr>
                            <th>Sen</th>
                            <th>Sel</th>
                            <th>Rab</th>
                            <th>Kam</th>
                            <th>Jum</th>
                            <th>Sab</th>
                            <th>Min</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $weekday = $firstDayOfWeek; // 1..7
                        echo "<tr>";
                        // Sel kosong sebelum tanggal 1
                        for ($i = 1; $i < $weekday; $i++) echo "<td></td>";

                        for ($day = 1; $day <= $daysInMonth; $day++) {
                            $dateKey = sprintf('%04d-%02d-%02d', $currentYear, $currentMonth, $day);

                            $cls   = '';
                            $info  = '';
                            $title = '';

                            if (isset($byDate[$dateKey])) {
                                $st = $byDate[$dateKey]['status'];  // available / almost_full / full
                                $cls = "status-{$st}";
                                // Info kecil di bawah tanggal (opsional)
                                $terisi = $byDate[$dateKey]['terisi'];
                                $kap    = $byDate[$dateKey]['kap'];
                                $sisa   = $byDate[$dateKey]['sisa'];
                                $info   = "<div class='small-note'>{$terisi}/{$kap} (sisa {$sisa})</div>";
                                $title  = " title='Terisi {$terisi} dari {$kap} — Sisa {$sisa}'";
                            }
                            // Jika tidak ada jadwal pada tanggal tsb => tidak diberi class => sel tetap putih

                            echo "<td class='{$cls}'{$title}><div class='date-num'>{$day}</div>{$info}</td>";

                            // Pindah baris tiap Minggu
                            if ($weekday == 7 && $day < $daysInMonth) {
                                echo "</tr><tr>";
                                $weekday = 1;
                            } else {
                                $weekday++;
                            }
                        }

                        // Sel kosong setelah tanggal terakhir
                        if ($weekday != 1) {
                            for ($i = $weekday; $i <= 7; $i++) echo "<td></td>";
                        }
                        echo "</tr>";
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>

        </div>
    </div>
</div>



<script>
    // Menangani event ketika tombol edit diklik
    $('#editJadwalModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Tombol yang memicu modal
        var id = button.data('id');
        var tanggal = button.data('tanggal');
        var paket = button.data('paket');
        var kapasitas = button.data('kapasitas');
        var status = button.data('status');

        // Isi data di dalam modal dengan data yang diambil dari tombol
        var modal = $(this);
        modal.find('#edit_id').val(id);
        modal.find('#edit_tanggal').val(tanggal);
        modal.find('#edit_paket').val(paket);
        modal.find('#edit_kapasitas').val(kapasitas);
        modal.find('#edit_status').val(status);
    });
</script>


<!-- Bootstrap 4 JS & Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Custom CSS for Calendar and Buttons -->
<style>
    .calendar {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .day {
        width: 30px;
        height: 30px;
        margin: 5px;
        display: inline-block;
        line-height: 30px;
        text-align: center;
        border-radius: 50%;
        font-weight: bold;
        cursor: pointer;
    }

    .available {
        background-color: #28a745;
        color: white;
    }

    .booked {
        background-color: #ffc107;
        color: white;
    }

    .unavailable {
        background-color: #dc3545;
        color: white;
    }

    .btn-group .btn {
        margin-right: 10px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?= $this->endSection() ?>