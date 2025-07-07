<?= $this->extend('layout_admin/header') ?>
<?= $this->section('content') ?>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <h4>Kelola Paket Wisata</h4>
        <div class="row">
            <!-- Card for Search and Filter -->
            <div class="col-md-12">
                <div class="card my-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <!-- Search Bar -->
                            <input type="text" class="form-control w-50" placeholder="Cari paket..." aria-label="Search">
                            <!-- Add New Paket Button -->
                            <!-- Button (sudah ada) -->
                            <button class="btn btn-success" data-toggle="modal" data-target="#addEditModal">
                                <i class="fas fa-plus"></i> Tambah Paket Baru
                            </button>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Card for Daftar Paket Wisata -->
            <div class="col-md-12">
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Paket Wisata</h5>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Durasi</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="path_to_image" alt="Paket Gunung Bromo" width="50" height="50"></td>
                                    <td>Paket Gunung Bromo</td>
                                    <td>Gunung</td>
                                    <td>Rp 500.000</td>
                                    <td>2D1N</td>
                                    <td><span class="badge badge-success">Aktif</span></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="path_to_image" alt="Paket Pantai" width="50" height="50"></td>
                                    <td>Paket Pantai</td>
                                    <td>Pantai</td>
                                    <td>Rp 800.000</td>
                                    <td>3D2N</td>
                                    <td><span class="badge badge-warning">Non-Aktif</span></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
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

<!-- Modal -->
<div class="modal fade" id="addEditModal" tabindex="-1" role="dialog" aria-labelledby="addEditModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= site_url('/kelola-wisata/create') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="addEditModalLabel">Tambah Paket Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Nama Paket -->
                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <input type="text" name="nama_paket" class="form-control" required>
                    </div>

                    <!-- Kategori -->
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" name="kategori" class="form-control" required>
                    </div>

                    <!-- Harga -->
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" class="form-control" required step="0.01">
                    </div>

                    <!-- Durasi -->
                    <div class="form-group">
                        <label for="durasi">Durasi</label>
                        <select name="durasi" class="form-control" required>
                            <option value="1D1N">1 Hari 1 Malam</option>
                            <option value="2D1N">2 Hari 1 Malam</option>
                            <option value="3D2N">3 Hari 2 Malam</option>
                            <option value="4D3N">4 Hari 3 Malam</option>
                            <!-- Tambah sesuai kebutuhan -->
                        </select>
                    </div>


                    <!-- Status -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="1">Aktif</option>
                            <option value="2">Nonaktif</option>
                        </select>
                    </div>

                    <!-- Gambar -->
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar" class="form-control-file" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>