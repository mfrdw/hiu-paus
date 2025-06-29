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
                    <button class="btn btn-success"><i class="fas fa-calendar-plus"></i> Tambah Jadwal</button>
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
                                <tr>
                                    <td>15 Jul 2024</td>
                                    <td>Paket Bromo</td>
                                    <td>20 orang</td>
                                    <td>12 orang</td>
                                    <td>8 orang</td>
                                    <td><span class="badge badge-success">Tersedia</span></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Tutup</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>16 Jul 2024</td>
                                    <td>Paket Pantai</td>
                                    <td>15 orang</td>
                                    <td>15 orang</td>
                                    <td>0 orang</td>
                                    <td><span class="badge badge-danger">Penuh</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm"><i class="fas fa-list"></i> Lihat</button>
                                        <button class="btn btn-success btn-sm"><i class="fas fa-check"></i> Tambah Slot</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

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