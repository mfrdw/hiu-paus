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
            <!-- Form Tambah/Edit Paket -->
            <div class="col-md-12">
                <div class="card my-3">
                    <div class="card-body">
                        <h5>Daftar Wisata</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Wisata</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($wisata) && is_array($wisata)): ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($wisata as $item): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= esc($item['nama_wisata']) ?></td>
                                            <td>
                                                <?= $item['kategori'] == 'wisata_pilihan' ? 'Wisata Pilihan' : 'Wisata Unggulan' ?>
                                            </td>

                                            <td><?= esc($item['deskripsi']) ?></td>
                                            <td>
                                                <img src="<?= base_url('uploads/kelola_wisata/' . $item['gambar']) ?>" alt="Gambar" width="100">
                                            </td>
                                            <td>
                                                <a href="<?= site_url('kelola-wisata/edit/' . $item['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="<?= site_url('kelola-wisata/delete/' . $item['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data wisata</td>
                                    </tr>
                                <?php endif; ?>
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
                    <h5 class="modal-title" id="addEditModalLabel">Tambah Wisata</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Nama Wisata -->
                    <div class="form-group">
                        <label for="nama_wisata">Nama Wisata</label>
                        <input type="text" name="nama_wisata" class="form-control" required>
                    </div>

                    <!-- Kategori -->
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" class="form-control" required>
                            <option value="wisata_pilihan">Wisata Pilihan</option>
                            <option value="wisata_unggulan">Wisata Unggulan</option>
                        </select>
                    </div>

                    <!-- Deskripsi -->
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                    </div>

                    <!-- Gambar -->
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar[]" class="form-control-file" accept="image/*" multiple required>
                        <small class="form-text text-muted">Pilih beberapa gambar untuk diunggah.</small>
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?= $this->endSection() ?>