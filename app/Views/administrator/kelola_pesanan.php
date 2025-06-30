<?= $this->extend('layout_admin/header') ?>
<?= $this->section('content') ?>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <!-- Card for Search and Filter -->
            <div class="col-md-12">
                <h5 class="card-title">Kelola Pesanan</h5>
                <div class="card my-3 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Search Bar -->
                            <div class="d-flex w-75">
                                <input type="text" class="form-control" placeholder="Cari pesanan..." aria-label="Search">
                                <button class="btn btn-primary ml-2">Cari</button>
                            </div>
                            <!-- Filter Dropdown -->
                            <div class="d-flex align-items-center">
                                <select class="custom-select mx-2">
                                    <option selected>Semua Status</option>
                                    <option value="1">Pending</option>
                                    <option value="2">Confirmed</option>
                                    <option value="3">Completed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card for Pesanan Table with Export Button -->
            <div class="col-md-12">
                <div class="card my-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between align-items-center">
                            Daftar Pesanan
                            <button class="btn btn-success"><i class="fas fa-file-export"></i> Export Excel</button>
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Pemesan</th>
                                        <th scope="col">Paket</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#PW001</td>
                                        <td>John Doe</td>
                                        <td>Paket Gunung Bromo</td>
                                        <td>2024-07-15</td>
                                        <td>4 orang</td>
                                        <td>Rp 2.000.000</td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>#PW002</td>
                                        <td>Jane Smith</td>
                                        <td>Paket Pantai Malang</td>
                                        <td>2024-07-16</td>
                                        <td>2 orang</td>
                                        <td>Rp 800.000</td>
                                        <td><span class="badge badge-success">Confirmed</span></td>
                                    </tr>
                                    <tr>
                                        <td>#PW003</td>
                                        <td>Bob Wilson</td>
                                        <td>Paket City Tour</td>
                                        <td>2024-07-10</td>
                                        <td>6 orang</td>
                                        <td>Rp 1.200.000</td>
                                        <td><span class="badge badge-primary">Completed</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Custom CSS for Table and Layout -->
<style>
    .table th,
    .table td {
        vertical-align: middle;
    }

    .badge-warning {
        background-color: #ffc107;
    }

    .badge-success {
        background-color: #28a745;
    }

    .badge-primary {
        background-color: #007bff;
    }

    .form-control {
        height: 40px;
    }

    .custom-select {
        width: auto;
        max-width: 200px;
    }

    .btn-group .btn {
        margin-right: 10px;
    }
</style>

<?= $this->endSection() ?>