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

<header class="navbar-header">
    <div class="logo">
        <a href="#">
            <img src="../dist/assets/images/logo.png" alt="HIU PAUS Logo">
        </a>
    </div>
    <nav class="navbar">
        <div class="nav-left">
            <a href="<?= base_url('/#beranda') ?>" class="active">Beranda</a>
            <a href="<?= base_url('/#paket-trip') ?>">Paket Trip</a>
            <a href="<?= base_url('/#kontak') ?>">Kontak</a>
        </div>
        <div class="nav-right">
            <?php if (session()->get('isLoggedIn')): ?>
                <div class="dropdown">
                    <button class="btn-profile" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown">
                        <img src="<?= base_url('../dist/assets/images/images-2.jpg') ?>" alt="Profile Picture">
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><span class="dropdown-item" style="color: black;">Hai, <?= session()->get('username'); ?></span></li>
                        <li><a class="dropdown-item" href="<?= base_url('profile') ?>">Profile</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('history') ?>">History</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <a href="<?= base_url('login') ?>" class="btn-login">Masuk</a>|<a href="<?= base_url('registration') ?>" class="btn-register">Daftar</a>
            <?php endif; ?>
        </div>
    </nav>
</header>


<style>
    /* General reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Top Bar */
    .top-bar {
        background: #2058f1ff;
        color: #fff;
        display: flex;
        justify-content: space-between;
        padding: 10px 30px;
        font-size: 14px;
        z-index: 10;
        position: relative;
    }

    .top-bar .left,
    .top-bar .right {
        display: flex;
        align-items: center;
    }

    .top-bar i {
        margin-right: 10px;
    }

    .top-bar span {
        font-size: 14px;
    }

    /* Sticky Navbar */
    .navbar-header {
        background: #fff;
        color: #fff;
        padding: 8px 18px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Logo Styling */
    .navbar-header .logo img {
        max-height: 70px;
    }

    /* Navbar Links */
    .navbar .navbar {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .navbar .nav-left {
        display: flex;
        gap: 20px;
    }

    .navbar .nav-left a {
        color: #2058f1ff;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .navbar .nav-left a:hover {
        color: #f39c12;
    }

    /* Profile Dropdown */
    .navbar .nav-right {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .btn-profile {
        padding: 0;
        border: none;
        background: transparent;
        cursor: pointer;
        display: flex;
        align-items: center;
    }

    .btn-profile img {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        object-fit: cover;
    }

    .dropdown-menu {
        background: #ffffffff;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        position: absolute;
        top: 40px;
        right: 0;
        width: 150px;
        padding: 10px;
        display: none;
    }


    .dropdown-item {
        padding: 6px 8px;
        color: #fff;
        text-decoration: none;
        transition: background-color 0.2s ease;
    }

    .dropdown-item:hover {
        background-color: #ffffffff;
    }

    /* Buttons (Login and Register) */
    .btn-login,
    .btn-register {
        color: #fff;
        background-color: #f39c12;
        padding: 8px 20px;
        text-decoration: none;
        border-radius: 25px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-login:hover,
    .btn-register:hover {
        background-color: #e67e22;
    }

    /* Responsive Hamburger Menu */
    @media (max-width: 768px) {
        .navbar .nav-left {
            display: none;
            width: 100%;
            flex-direction: column;
            gap: 10px;
            align-items: center;
        }

        .navbar .nav-left.active {
            display: flex;
        }

        .navbar-toggle {
            display: block;
            color: white;
            font-size: 20px;
            cursor: pointer;
        }

        .navbar-toggle i {
            color: #fff;
        }

        /* Dropdown Menu yang tampil */
        .dropdown-menu.show {
            display: block;
        }

    }
</style>

<script>
    // Dropdown toggle
    const dropdownButton = document.getElementById('dropdownMenuButton1');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    // Menambahkan event listener untuk membuka/menutup dropdown
    if (dropdownButton) {
        dropdownButton.addEventListener('click', (event) => {
            event.stopPropagation(); // Mencegah event propagasi agar klik pada button tidak menutup menu secara langsung
            dropdownMenu.classList.toggle('show'); // Toggle dropdown visibility
        });
    }

    // Menutup dropdown jika klik di luar
    document.addEventListener('click', function(event) {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.remove('show'); // Menghapus class show jika klik di luar dropdown
        }
    });

    // Untuk Hamburger Menu (Responsive)
    const navToggle = document.querySelector('.navbar-toggle');
    const navMenu = document.querySelector('.navbar .nav-left');

    if (navToggle) {
        navToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
        });
    }
</script>