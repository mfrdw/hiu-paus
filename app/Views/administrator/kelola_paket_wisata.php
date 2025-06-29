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
                            <button class="btn btn-success" data-toggle="modal" data-target="#addEditModal">
                                <i class="fas fa-plus"></i> Tambah Paket Baru
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Add/Edit Paket -->
            <div class="modal fade" id="addEditModal" tabindex="-1" role="dialog" aria-labelledby="addEditModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addEditModalLabel">Form Tambah/Edit Paket</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form Tambah/Edit Paket -->
                            <form>
                                <div class="form-group">
                                    <label for="packageName">Nama Paket</label>
                                    <input type="text" class="form-control" id="packageName" placeholder="Masukkan nama paket">
                                </div>
                                <div class="form-group">
                                    <label for="packageCategory">Kategori</label>
                                    <select class="form-control" id="packageCategory">
                                        <option>Pantai</option>
                                        <option>Gunung</option>
                                        <option>City Tour</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="packagePrice">Harga per Orang</label>
                                    <input type="text" class="form-control" id="packagePrice" placeholder="Masukkan harga per orang">
                                </div>
                                <div class="form-group">
                                    <label for="packageDuration">Durasi</label>
                                    <input type="text" class="form-control" id="packageDuration" placeholder="Masukkan durasi">
                                </div>
                                <div class="form-group">
                                    <label for="packageDescription">Deskripsi</label>
                                    <textarea class="form-control" id="packageDescription" rows="3" placeholder="Masukkan deskripsi paket"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-primary" id="savePackage">Simpan Paket</button>
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

<!-- Custom CSS -->
<style>
    #packagePreview {
        text-align: center;
        font-size: 16px;
    }

    #packagePreview h6 {
        font-weight: bold;
    }

    #packagePreview p {
        margin: 5px 0;
    }

    .modal-header {
        background-color: #007bff;
        color: white;
    }

    .modal-footer {
        background-color: #f1f1f1;
    }

    .card-body {
        padding: 25px;
    }

    /* Style for the search box */
    .form-control {
        width: 300px;
    }
</style>

<!-- Bootstrap 4 JS, jQuery, and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Simulate a function to update the preview with data from the form
    $('#savePackage').click(function() {
        var name = $('#packageName').val();
        var category = $('#packageCategory').val();
        var price = $('#packagePrice').val();
        var duration = $('#packageDuration').val();
        var description = $('#packageDescription').val();

        // Update the preview
        $('#previewName').text(name);
        $('#previewCategory').text('Kategori: ' + category);
        $('#previewPrice').text('Rp ' + price + '/orang');
        $('#previewDuration').text('Durasi: ' + duration);
        $('#previewDescription').text(description);

        // Close the modal
        $('#addEditModal').modal('hide');
    });
</script>

<?= $this->endSection() ?>