<div class="top-bar">
    <div class="left">
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-instagram"></i>
        <span>info@hiupaustrip.com</span>
    </div>
    <div class="right">
        <i class="fab fa-whatsapp"></i>
        <span>0812309282722</span>
    </div>
</div>

<header>
    <div class="logo">
        <a href="#">
            <img src="../dist/assets/images/logo.png" alt="HIU PAUS Logo">
        </a>
    </div>

    <nav class="navbar">
        <div class="nav-left">
            <a href="<?= base_url('/') ?>" class="active">Beranda</a>
            <a href="<?= base_url('/') ?>">Paket Trip</a>
            <a href="<?= base_url('/') ?>">Paket Wisata</a>
            <a href="<?= base_url('/') ?>">Unggulan</a>
        </div>
        <div class="nav-right">
            <?php if (session()->get('isLoggedIn')): ?>
            <div class="dropdown" style="position: relative;">
                <!-- Foto/Gambar pengguna sebagai tombol dropdown tanpa tanda panah -->
                <button class="btn btn-link" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false" style="padding: 0; border: none; background: transparent;">
                    <img src="<?= base_url('../dist/assets/images/images-2.jpg') ?>" alt="Profile Picture"
                        style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover; cursor: pointer;">
                </button>
                <!-- Dropdown menu, dipindahkan ke kiri tanpa tanda panah -->
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="left: -150px; top: 0;">
                    <li><span class="dropdown-item">Hai, <?= session()->get('username'); ?></span></li>
                    <li><a class="dropdown-item" href="<?= base_url('profile') ?>">Profile</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('keranjang') ?>">Keranjang</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
                </ul>
            </div>
            <?php else: ?>
            <a href="<?= base_url('login') ?>">Masuk</a> | <a href="<?= base_url('registration') ?>">Daftar</a>
            <?php endif; ?>
        </div>
    </nav>
</header>

<!-- Bootstrap 5.3 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap 5.3 JS (untuk dropdown) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>