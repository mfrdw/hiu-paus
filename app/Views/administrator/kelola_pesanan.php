<?= $this->extend('layout_admin/header') ?>
<?= $this->section('content') ?>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <!-- Card for Search and Filter -->
            <div class="col-md-12">
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">Kelola Pesanan</h5>
                        <div class="d-flex justify-content-between">
                            <!-- Search Bar -->
                            <div>
                                <input type="text" class="form-control w-800" placeholder="Cari pesanan..." aria-label="Search">
                            </div>
                            <!-- Filter Dropdown -->
                            <div>
                                <select class="custom-select w-50 mx-2">
                                    <option selected>Semua Status</option>
                                    <option value="1">Pending</option>
                                    <option value="2">Confirmed</option>
                                    <option value="3">Completed</option>
                                </select>
                                <button class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card for Pesanan Table with Export Button -->
            <div class="col-md-12">
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between">
                            Daftar Pesanan
                            <button class="btn btn-success"><i class="fas fa-file-export"></i> Export Excel</button>
                        </h5>
                        <table class="table table-bordered table-hover">
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

<!-- Custom CSS for Table and Layout -->
<style>
    .table th,
    .table td {
        text-align: center;
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

    .btn-group .btn {
        margin-right: 10px;
    }

    /* Style for the search box */
    .form-control {
        width: 300px;
    }
</style>

<?= $this->endSection() ?>