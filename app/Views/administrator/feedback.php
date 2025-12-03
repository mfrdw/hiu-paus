<?= $this->extend('layout_admin/header') ?>
<?= $this->section('content') ?>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <h4 class="mb-4">Feedback</h4>

            <div class="col-md-12">
                <div class="card my-3 shadow-sm border-light rounded">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Subjek</th>
                                        <th scope="col">Pesan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($feedbacks as $index => $feedback): ?>
                                    <tr>
                                        <td><?= $index + 1; ?></td>
                                        <td><?= $feedback['nama']; ?></td>
                                        <td><?= $feedback['email']; ?></td>
                                        <td><?= $feedback['subjek']; ?></td>
                                        <td><?= $feedback['pesan']; ?></td>
                                        <td>
                                            <button class="btn btn-warning" data-toggle="modal"
                                                data-target="#editModal<?= $feedback['id']; ?>">Edit</button>
                                            <a href="<?= site_url('kontak/delete/' . $feedback['id']); ?>"
                                                class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this feedback?');">Delete</a>
                                        </td>
                                    </tr>

                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="editModal<?= $feedback['id']; ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Feedback</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="<?= site_url('kontak/updateSave/' . $feedback['id']); ?>"
                                                        method="post">
                                                        <?= csrf_field(); ?>
                                                        <div class="form-group">
                                                            <label for="name" class="form-label">Nama Lengkap</label>
                                                            <input type="text" name="name" id="name"
                                                                class="form-control" value="<?= $feedback['nama']; ?>"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" name="email" id="email"
                                                                class="form-control" value="<?= $feedback['email']; ?>"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="subject" class="form-label">Subjek</label>
                                                            <input type="text" name="subject" id="subject"
                                                                class="form-control" value="<?= $feedback['subjek']; ?>"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message" class="form-label">Pesan</label>
                                                            <textarea name="message" id="message" rows="4"
                                                                class="form-control"
                                                                required><?= $feedback['pesan']; ?></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>












<?= $this->endSection() ?>