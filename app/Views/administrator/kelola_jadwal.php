<?= $this->extend('layout_admin/header') ?>
<?= $this->section('content') ?>


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
                    <button class="btn btn-warning"><i class="fas fa-calendar-check"></i> Jadwal Penuh</button>
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
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Paket</th>
                                    <th scope="col">Kapasitas</th>
                                    <th scope="col">Terisi</th>
                                    <th scope="col">Sisa</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jadwals as $jadwal): ?>
                                    <tr>
                                        <td><?= date('d M Y', strtotime($jadwal['tanggal'])); ?></td>
                                        <td><?= esc($jadwal['paket']); ?></td>
                                        <td><?= esc($jadwal['kapasitas']) . ' orang'; ?></td>
                                        <td><?= esc($jadwal['terisi']) . ' orang'; ?></td>
                                        <td><?= esc($jadwal['sisa']) . ' orang'; ?></td>
                                        <td>
                                            <span class="badge 
                                <?= ($jadwal['status'] == 'tersedia') ? 'badge-success' : (($jadwal['status'] == 'penuh') ? 'badge-danger' : 'badge-warning'); ?>">
                                                <?= ucfirst($jadwal['status']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Tutup</button>
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
<div class="modal fade" id="tambahJadwalModal" tabindex="-1" role="dialog" aria-labelledby="tambahJadwalModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahJadwalModalLabel">Tambah Jadwal Trip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('jadwal_trip/tambah') ?>" method="POST">
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
                    <div class="form-group">
                        <label for="kapasitas">Kapasitas</label>
                        <input type="number" class="form-control" id="kapasitas" name="kapasitas" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan Jadwal</button>
                </form>
            </div>
        </div>
    </div>
</div>

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

<?= $this->endSection() ?>