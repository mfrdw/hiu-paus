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
                                    <?php if ($ulasan): ?>
                                        <?php $no = 1; ?>
                                        <?php foreach ($ulasan as $item): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td>
                                                    <?php if ($item['id_trip'] == 1): ?>
                                                        <span class="badge bg-info text-dark">Open Trip Whale Shark Teluk Saleh</span>
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
                                                        <span class="badge bg-warning text-dark"><?= esc($averageRating); ?>/5</span>
                                                    </div>
                                                </td>

                                                <td>
                                                    <em>"<?= esc($item['ulasan']); ?>"</em>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('edit_review/' . esc($item['id'])); ?>" class="btn btn-warning btn-sm rounded-pill">
                                                        <i class="bi bi-pencil"></i> Edit
                                                    </a>
                                                    <a href="<?= base_url('delete_review/' . esc($item['id'])); ?>" class="btn btn-danger btn-sm rounded-pill">
                                                        <i class="bi bi-trash"></i> Delete
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
</style>

<?= $this->endSection() ?>