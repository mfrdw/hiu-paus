<?= $this->extend('layout_admin/header') ?>
<?= $this->section('content') ?>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <h4 class="mb-4">Kelola Ulasan</h4>

            <div class="col-md-12">
                <div class="card my-3 shadow-sm border-light rounded">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Trip</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Rating</th>
                                        <th scope="col">Ulasan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($ulasan && count($ulasan) > 0): ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($ulasan as $item): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <?php if ($item['id_trip'] == 1): ?>
                                            <span class="badge bg-info text-dark">Open Trip Whale Shark Teluk
                                                Saleh</span>
                                            <?php elseif ($item['id_trip'] == 2): ?>
                                            <span class="badge bg-success">Private Trip Whale Shark Teluk Saleh</span>
                                            <?php else: ?>
                                            <span class="badge bg-secondary">Trip Tidak Diketahui</span>
                                            <?php endif; ?>
                                        </td>

                                        <td><?= esc($item['nama_lengkap']); ?></td>
                                        <td>
                                            <?php
                            $averageRating = ($item['pengalaman_rating'] + $item['pemandu_rating'] + $item['fasilitas_rating']) / 3;
                            $averageRating = round($averageRating, 1);
                        ?>
                                            <div class="rating-star">
                                                <span
                                                    class="badge bg-warning text-dark"><?= esc($averageRating); ?>/5</span>
                                            </div>
                                        </td>

                                        <td>
                                            <em>"<?= esc($item['ulasan']); ?>"</em>
                                        </td>
                                        <td>
                                            <!-- Edit Button with Font Awesome Icon -->
                                            <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#editBookingModal" data-id="<?= $item['id']; ?>"
                                                data-id_user="<?= esc($item['id_user']); ?>"
                                                data-id_trip="<?= esc($item['id_trip']); ?>"
                                                data-ulasan="<?= esc($item['ulasan']); ?>"
                                                data-pengalaman_rating="<?= esc($item['pengalaman_rating']); ?>"
                                                data-pemandu_rating="<?= esc($item['pemandu_rating']); ?>"
                                                data-fasilitas_rating="<?= esc($item['fasilitas_rating']); ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <!-- Delete Button with Font Awesome Icon -->
                                            <a href="<?= base_url('/delete_ulasan/' . $item['id']); ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Belum ada ulasan</td>
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
</div>



<!-- Modal Edit -->
<?php foreach ($ulasan as $item): ?>
<div class="modal fade" id="editBookingModal" tabindex="-1" role="dialog" aria-labelledby="editBookingModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= site_url('/update_ulasan/'. $item['id']); ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="id" id="edit_id" value="<?= isset($item['id']) ? esc($item['id']) : ''; ?>">

                <div class="modal-header">
                    <h5 class="modal-title" id="editBookingModalLabel">Edit Ulasan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <!-- ID Trip -->
                    <div class="form-group">
                        <label for="edit_id_trip">ID Trip</label>
                        <input type="text" name="id_trip" id="edit_id_trip" class="form-control"
                            value="<?= isset($item['id_trip']) ? esc($item['id_trip']) : ''; ?>" readonly>
                    </div>

                    <!-- Ulasan -->
                    <div class="form-group">
                        <label for="edit_ulasan">Ulasan</label>
                        <textarea name="ulasan" id="edit_ulasan" class="form-control" rows="4" required>
                            <?= isset($item['ulasan']) ? esc($item['ulasan']) : ''; ?>
                        </textarea>
                    </div>

                    <!-- Pengalaman Rating (Star Rating) -->
                    <div class="form-group">
                        <label for="edit_pengalaman_rating">Rating Pengalaman</label>
                        <div class="stars">
                            <input type="radio" name="pengalaman_rating" id="star1" value="1"
                                <?= isset($item['pengalaman_rating']) && $item['pengalaman_rating'] == 1 ? 'checked' : ''; ?>><label
                                for="star1" class="fa fa-star"></label>
                            <input type="radio" name="pengalaman_rating" id="star2" value="2"
                                <?= isset($item['pengalaman_rating']) && $item['pengalaman_rating'] == 2 ? 'checked' : ''; ?>><label
                                for="star2" class="fa fa-star"></label>
                            <input type="radio" name="pengalaman_rating" id="star3" value="3"
                                <?= isset($item['pengalaman_rating']) && $item['pengalaman_rating'] == 3 ? 'checked' : ''; ?>><label
                                for="star3" class="fa fa-star"></label>
                            <input type="radio" name="pengalaman_rating" id="star4" value="4"
                                <?= isset($item['pengalaman_rating']) && $item['pengalaman_rating'] == 4 ? 'checked' : ''; ?>><label
                                for="star4" class="fa fa-star"></label>
                            <input type="radio" name="pengalaman_rating" id="star5" value="5"
                                <?= isset($item['pengalaman_rating']) && $item['pengalaman_rating'] == 5 ? 'checked' : ''; ?>><label
                                for="star5" class="fa fa-star"></label>
                        </div>
                    </div>

                    <!-- Pemandu Rating (Star Rating) -->
                    <div class="form-group">
                        <label for="edit_pemandu_rating">Rating Pemandu</label>
                        <div class="stars">
                            <input type="radio" name="pemandu_rating" id="guide_star1" value="1"
                                <?= isset($item['pemandu_rating']) && $item['pemandu_rating'] == 1 ? 'checked' : ''; ?>><label
                                for="guide_star1" class="fa fa-star"></label>
                            <input type="radio" name="pemandu_rating" id="guide_star2" value="2"
                                <?= isset($item['pemandu_rating']) && $item['pemandu_rating'] == 2 ? 'checked' : ''; ?>><label
                                for="guide_star2" class="fa fa-star"></label>
                            <input type="radio" name="pemandu_rating" id="guide_star3" value="3"
                                <?= isset($item['pemandu_rating']) && $item['pemandu_rating'] == 3 ? 'checked' : ''; ?>><label
                                for="guide_star3" class="fa fa-star"></label>
                            <input type="radio" name="pemandu_rating" id="guide_star4" value="4"
                                <?= isset($item['pemandu_rating']) && $item['pemandu_rating'] == 4 ? 'checked' : ''; ?>><label
                                for="guide_star4" class="fa fa-star"></label>
                            <input type="radio" name="pemandu_rating" id="guide_star5" value="5"
                                <?= isset($item['pemandu_rating']) && $item['pemandu_rating'] == 5 ? 'checked' : ''; ?>><label
                                for="guide_star5" class="fa fa-star"></label>
                        </div>
                    </div>

                    <!-- Fasilitas Rating (Star Rating) -->
                    <div class="form-group">
                        <label for="edit_fasilitas_rating">Rating Fasilitas</label>
                        <div class="stars">
                            <input type="radio" name="fasilitas_rating" id="facility_star1" value="1"
                                <?= isset($item['fasilitas_rating']) && $item['fasilitas_rating'] == 1 ? 'checked' : ''; ?>><label
                                for="facility_star1" class="fa fa-star"></label>
                            <input type="radio" name="fasilitas_rating" id="facility_star2" value="2"
                                <?= isset($item['fasilitas_rating']) && $item['fasilitas_rating'] == 2 ? 'checked' : ''; ?>><label
                                for="facility_star2" class="fa fa-star"></label>
                            <input type="radio" name="fasilitas_rating" id="facility_star3" value="3"
                                <?= isset($item['fasilitas_rating']) && $item['fasilitas_rating'] == 3 ? 'checked' : ''; ?>><label
                                for="facility_star3" class="fa fa-star"></label>
                            <input type="radio" name="fasilitas_rating" id="facility_star4" value="4"
                                <?= isset($item['fasilitas_rating']) && $item['fasilitas_rating'] == 4 ? 'checked' : ''; ?>><label
                                for="facility_star4" class="fa fa-star"></label>
                            <input type="radio" name="fasilitas_rating" id="facility_star5" value="5"
                                <?= isset($item['fasilitas_rating']) && $item['fasilitas_rating'] == 5 ? 'checked' : ''; ?>><label
                                for="facility_star5" class="fa fa-star"></label>
                        </div>
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
<?php endforeach; ?>





<!-- Custom CSS for Table and Layout -->
<style>
.table th,
.table td {
    vertical-align: middle;
}

.btn-sm {
    font-size: 0.875rem;
}

.btn-outline-primary {
    border-color: #007bff;
    color: #007bff;
}

.btn-outline-primary:hover {
    background-color: #007bff;
    color: white;
}

.badge {
    font-size: 0.875rem;
    padding: 0.5rem 1rem;
}

.rating-star span {
    font-size: 1.2rem;
    font-weight: bold;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f9f9f9;
}

.card {
    border-radius: 0.75rem;
    border: none;
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #e0e0e0;
}

.table-hover tbody tr:hover {
    background-color: #f1f1f1;
}

.stars input[type="radio"] {
    display: none;
}

.stars label {
    color: gray;
    font-size: 1.5em;
    cursor: pointer;
}

.stars input[type="radio"]:checked~label {
    color: gold;
}

.stars label:hover,
.stars label:hover~label {
    color: gold;
}
</style>





<?= $this->endSection() ?>