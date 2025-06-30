<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Help</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Sidebar -->
<div class="sidebar">
    <ul class="list-unstyled">
        <li><a href="<?= base_url('dashboard') ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="<?= base_url('kelola_pesanan') ?>"><i class="fas fa-box"></i> Kelola Pesanan</a></li>
        <li><a href="<?= base_url('kelola_jadwal') ?>"><i class="fas fa-calendar"></i> Kelola Jadwal</a></li>
        <li><a href="<?= base_url('kelola_paket_wisata') ?>"><i class="fas fa-cogs"></i> Kelola Paket</a></li>
        <li><a href="<?= base_url('data_wisatawan') ?>"><i class="fas fa-users"></i> Data Wisatawan</a></li>
        <li><a href="<?= base_url('kelola_ulasan') ?>"><i class="fas fa-comments"></i> Kelola Ulasan</a></li>
        <li><a href="<?= base_url('promosi') ?>"><i class="fas fa-gift"></i> Promosi</a></li>
        <li><a href="<?= base_url('pengaturan') ?>"><i class="fas fa-cogs"></i> Pengaturan</a></li>
        <li><a href="<?= base_url('logout') ?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</div>