<?= $this->extend('layout_user/header') ?>
<?= $this->section('content') ?>

<div class="container mt-4">

    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card" style="border-radius:.5rem;">
                <img src="<?= base_url('uploads/kelola_wisata/' . $wisata['gambar']) ?>" class="card-img-top" alt="Whaleshark Teluk Saleh"
                    style="height:250px; width:100%; object-fit:cover;">
            </div>
        </div>
        <div class="col-md-4">
            <div class="row g-2">
                <div class="col-12">
                    <div class="card" style="border-radius:.5rem;">
                        <img src="<?= base_url('uploads/kelola_wisata/' . $wisata['gambar']) ?>" class="card-img-top" alt="Whaleshark"
                            style="height:100%; width:100%; object-fit:cover;">
                    </div>
                </div>
                <div class="col-12">
                    <div class="card" style="border-radius:.5rem;">
                        <img src="<?= base_url('uploads/kelola_wisata/' . $wisata['gambar']) ?>" class="card-img-top" alt="Trip Teluk Saleh"
                            style="height:100%; width:100%; object-fit:cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card" style="border-radius:.5rem;">
                <div class="card-body">
                    <!-- Display name dynamically -->
                    <h5 class="card-title"><?= esc($wisata['nama_wisata']) ?></h5>

                    <!-- Display category with different color -->
                    <div class="category-label" style="background-color: #4CAF50; color: white; display: inline-block; padding: 5px 15px; border-radius: 20px; margin-bottom: 15px;">
                        <?= esc($wisata['kategori']) ?>
                    </div>

                    <!-- Display description dynamically -->
                    <p class="card-text"><?= esc($wisata['deskripsi']) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>