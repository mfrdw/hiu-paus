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
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card my-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5>Daftar Promosi</h5>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPromosiModal">Tambah Promosi</button>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Promosi</th>
                                    <th>Harga Normal</th>
                                    <th>Harga Diskon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($promosi) && is_array($promosi)): ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($promosi as $item): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= esc($item['nama_promosi']) ?></td>
                                            <td>Rp <?= number_format($item['harga_normal'], 0, ',', '.') ?></td>
                                            <td>Rp <?= number_format($item['harga_diskon'], 0, ',', '.') ?></td>
                                            <td>
                                                <a href="#" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this promo?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data promosi</td>
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

<div class="modal fade" id="addPromosiModal" tabindex="-1" role="dialog" aria-labelledby="addPromosiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= site_url('promosi/create') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="addPromosiLabel">Tambah Promosi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_promosi">Nama Promosi</label>
                        <input type="text" name="nama_promosi" id="nama_promosi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_normal">Harga Normal</label>
                        <input type="number" name="harga_normal" id="harga_normal" class="form-control" min="0" step="100" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_diskon">Harga Diskon</label>
                        <input type="number" name="harga_diskon" id="harga_diskon" class="form-control" min="0" step="100" required>
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#promosiTable').DataTable();
    });
</script>
<?= $this->endSection() ?>