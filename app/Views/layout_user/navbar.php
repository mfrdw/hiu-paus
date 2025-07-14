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
            <a href="#" class="active">Beranda</a>
            <a href="#">Sewa Kapal</a>
            <a href="#">Paket Wisata</a>
            <a href="#">Unggulan</a>
        </div>
        <div class="nav-right">
            <?php if (session()->get('isLoggedIn')): ?>
            <span>Hai, <?= session()->get('username'); ?> | </span>
            <a href="<?= base_url('logout') ?>">Logout</a>
            <?php else: ?>
            <a href="<?= base_url('login') ?>">Masuk</a> | <a href="<?= base_url('registration') ?>">Daftar</a>
            <?php endif; ?>
        </div>

    </nav>

</header>