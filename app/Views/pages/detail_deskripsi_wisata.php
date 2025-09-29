<?= $this->extend('layout_user/header') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card" style="border-radius:.5rem;">
                <img src="../dist/assets/images/images-1.jpg" class="card-img-top" alt="Whaleshark Teluk Saleh"
                    style="height:100%; width:100%; object-fit:cover;">
            </div>
        </div>
        <div class="col-md-4">
            <div class="row g-2">
                <div class="col-12">
                    <div class="card" style="border-radius:.5rem;">
                        <img src="../dist/assets/images/images-2.jpg" class="card-img-top" alt="Whaleshark"
                            style="height:100%; width:100%; object-fit:cover;">
                    </div>
                </div>
                <div class="col-12">
                    <div class="card" style="border-radius:.5rem;">
                        <img src="../dist/assets/images/images-3.jpg" class="card-img-top" alt="Trip Teluk Saleh"
                            style="height:100%; width:100%; object-fit:cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>