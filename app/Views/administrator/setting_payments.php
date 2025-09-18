<?= $this->extend('layout_admin/header') ?>
<?= $this->section('content') ?>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Card untuk Menampilkan Tabel Pembayaran -->
                <div class="card shadow border-0 rounded-3">
                    <div class="card-header">
                        <h5 class="card-title">Data Pembayaran</h5>
                        <button class="btn btn-success" data-toggle="modal" data-target="#addPaymentModal">Tambah Pembayaran</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="paymentTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Payments</th>
                                    <th>Number</th>
                                    <th>Status</th>
                                    <th>Logo</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Menambah Pembayaran -->
<div class="modal fade" id="addPaymentModal" tabindex="-1" role="dialog" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPaymentModalLabel">Tambah Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('addPayments') ?>" id="paymentForm" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="paymentMethod">Payments</label>
                        <input type="text" class="form-control" id="paymentMethod" name="paymentMethod" required>
                    </div>
                    <div class="form-group">
                        <label for="paymentNumber">Number</label>
                        <input type="text" class="form-control" id="paymentNumber" name="paymentNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                    </div>
                    <!-- Upload Gambar Logo -->
                    <div class="form-group">
                        <label for="logo">Logo Pembayaran</label>
                        <input type="file" class="form-control" id="logo" name="logo" accept="image/*" required>
                        <small class="form-text text-muted">Pilih file gambar untuk logo (JPG, PNG, atau GIF).</small>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal untuk Mengedit Pembayaran -->
<div class="modal fade" id="editPaymentModal" tabindex="-1" role="dialog" aria-labelledby="editPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPaymentModalLabel">Edit Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editPaymentForm">
                    <input type="hidden" id="editPaymentId" name="editPaymentId">
                    <div class="form-group">
                        <label for="editPaymentMethod">Metode Pembayaran</label>
                        <input type="text" class="form-control" id="editPaymentMethod" name="editPaymentMethod" required>
                    </div>
                    <div class="form-group">
                        <label for="editPaymentNumber">Nomor</label>
                        <input type="text" class="form-control" id="editPaymentNumber" name="editPaymentNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="editStatus">Status</label>
                        <select class="form-control" id="editStatus" name="editStatus" required>
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning w-100">Perbarui</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<!-- Bootstrap 4 JS, Popper.js -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>