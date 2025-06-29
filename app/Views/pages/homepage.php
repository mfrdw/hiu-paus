<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIU PAUS</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 5 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: rgb(12, 120, 242);
            --accent-green: #2ecc71;
            --accent-orange: #f39c12;
            --dark-text: #2c3e50;
            --light-bg: #ecf0f1;
            --white: #ffffff;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: var(--white);
            color: var(--dark-text);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .top-bar {
            background: var(--primary-color);
            color: var(--white);
            padding: 8px 20px;
            font-size: 14px;
            display: flex;
            justify-content: space-between;
        }

        .top-bar .left,
        .top-bar .right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            /* Pastikan logo dan elemen navbar terpusat */
            padding: 10px 20px;
            /* Padding lebih kecil */
            background: var(--white);
            border-bottom: 1px solid #ddd;
        }

        .logo img {
            max-width: 150px;
            max-height: 50px;
            height: auto;
        }



        header nav {
            font-size: 14px;
            /* Menyesuaikan ukuran font */
            display: flex;
            gap: 15px;
        }

        header nav a {
            font-weight: 600;
            color: var(--dark-text);
        }

        header nav a.active {
            color: var(--accent-green);
        }

        .video-container {
            position: relative;
            width: 100%;
            height: 75vh;
            overflow: hidden;
        }

        .video-container iframe {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            border: 0;
        }

        .circle-icons {
            display: flex;
            justify-content: center;
            gap: 40px;
            padding: 50px 20px 30px;
            flex-wrap: wrap;
        }

        .circle-icons div {
            text-align: center;
        }

        .circle-icons img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .circle-icons img:hover {
            transform: scale(1.1);
        }

        .section-title {
            text-align: center;
            font-size: 30px;
            font-weight: 700;
            padding: 30px 20px;
            color: var(--primary-color);
        }

        .cards-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            padding: 0 20px 50px;
        }

        .card {
            width: 300px;
            background: var(--white);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 20px;
        }

        .card-content h3 {
            margin: 0 0 10px;
        }

        .btn {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 20px;
            border: 1px solid var(--dark-text);
            font-size: 14px;
            color: var(--dark-text);
            text-transform: uppercase;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn.black {
            background-color: var(--accent-orange);
            color: var(--white);
            border: none;
        }

        .btn:hover {
            background-color: var(--accent-green);
            color: var(--white);
        }

        .center-btn {
            text-align: center;
            margin: 20px 0 50px;
        }

        footer {
            background-color: var(--primary-color);
            color: var(--white);
            padding: 50px 30px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        footer .column {
            flex: 1;
            min-width: 200px;
            margin-bottom: 30px;
        }

        footer h3 {
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
            padding-bottom: 10px;
        }

        footer a {
            color: var(--white);
            display: block;
            margin: 5px 0;
        }

        footer {
            background-color: var(--primary-color);
            /* Warna dasar footer */
            color: var(--white);
            padding: 50px 30px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            flex-wrap: wrap;
        }

        .footer-column {
            flex: 1;
            min-width: 250px;
            margin-bottom: 30px;
        }

        .footer-logo {
            max-width: 120px;
            /* Ukuran logo di footer */
            height: auto;
            margin-bottom: 20px;
        }

        footer h3 {
            border-bottom: 2px solid var(--white);
            padding-bottom: 10px;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        footer a {
            color: var(--white);
            display: block;
            margin: 5px 0;
            text-decoration: none;
        }

        footer a:hover {
            color: var(--accent-green);
            text-decoration: underline;
        }

        .social-icons a {
            color: var(--white);
            margin-right: 15px;
            font-size: 20px;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: var(--accent-green);
        }
    </style>
</head>

<body>
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

        <nav>
            <a href="#" class="active">Beranda</a>
            <a href="#">Sewa Kapal</a>
            <a href="#">Paket Wisata</a>
            <a href="#">Unggulan</a>
        </nav>
    </header>

    <div class="video-container">
        <iframe src="https://www.youtube.com/embed/lbKOT68vGig?autoplay=1" allow="autoplay" allowfullscreen></iframe>
    </div>

    <div class="circle-icons">
        <div><img src="../dist/assets/images/ship.jpg">
            <p>Sewa Kapal</p>
        </div>
        <div><img src="../dist/assets/images/vacation.jpg">
            <p>Paket Wisata</p>
        </div>
        <div><img src="../dist/assets/images/unggulan.jpg">
            <p>Unggulan</p>
        </div>
    </div>

    <div class="section-title">Paket Sewa Kapal Pesiar</div>
    <div class="cards-container">
        <div class="card">
            <img src="../dist/assets/images/kapal-pesiar.jpg">
            <div class="card-content">
                <h3>Luxury Cruiser | Ocean Majesty</h3>
                <p>Capacity: 100 | Length: 70 m<br><strong>Start from IDR 1,500,000,000</strong></p>
                <a href="#" class="btn black">BOOK NOW</a>
            </div>
        </div>
        <div class="card">
            <img src="../dist/assets/images/kapal-pesiar2.jpg">
            <div class="card-content">
                <h3>Premium Catama | Sea Breeze</h3>
                <p>Capacity: 50 | Length: 40 m<br><strong>Start from IDR 900,000,000</strong></p>
                <a href="#" class="btn black">BOOK NOW</a>
            </div>
        </div>
        <div class="card">
            <img src="../dist/assets/images/kapal-pesiar3.jpg">
            <div class="card-content">
                <h3>Grand Yacht | Royal Voyager</h3>
                <p>Capacity: 200 | Length: 100 m<br><strong>Start from IDR 3,000,000,000</strong></p>
                <a href="#" class="btn black">BOOK NOW</a>
            </div>
        </div>
    </div>
    <div class="center-btn">
        <a href="#" class="btn">Lihat Semua</a>
    </div>

    <div class="section-title">Paket Wisata Pilihan</div>
    <div class="cards-container">
        <div class="card">
            <img src="../dist/assets/images/vacation.jpg">
            <div class="card-content">
                <h3>Hiu Paus Gorontalo</h3>
                <p>Rasakan sensasi berenang bersama hiu paus di perairan Gorontalo yang indah dan eksotis...</p>
                <a href="#" class="btn">DETAILS</a>
            </div>
        </div>
        <div class="card">
            <img src="../dist/assets/images/vacation.jpg">
            <div class="card-content">
                <h3>Diving di Gorontalo</h3>
                <p>Jelajahi keindahan bawah laut Gorontalo yang menakjubkan dengan berbagai spesies terumbu karang...</p>
                <a href="#" class="btn">DETAILS</a>
            </div>
        </div>
        <div class="card">
            <img src="../dist/assets/images/vacation.jpg">
            <div class="card-content">
                <h3>Jalur Alam Gorontalo</h3>
                <p>Nikmati petualangan trekking melewati hutan tropis yang rimbun dan pemandangan alam yang memukau...</p>
                <a href="#" class="btn">DETAILS</a>
            </div>
        </div>
    </div>


    <div class="section-title">Aktivitas Unggulan Taman Hiu Paus</div>
    <div class="cards-container">
        <div class="card">
            <img src="../dist/assets/images/vacation.jpg">
            <div class="card-content">
                <h3>Berenang dengan Hiu Paus</h3>
                <p>Rasakan pengalaman tak terlupakan berenang dengan Hiu Paus di perairan Gorontalo yang jernih...</p>
                <a href="#" class="btn">DETAILS</a>
            </div>
        </div>
        <div class="card">
            <img src="../dist/assets/images/vacation.jpg">
            <div class="card-content">
                <h3>Snorkeling di Perairan Gorontalo</h3>
                <p>Temukan keindahan dunia bawah laut Gorontalo dengan beragam terumbu karang dan ikan-ikan warna-warni...</p>
                <a href="#" class="btn">DETAILS</a>
            </div>
        </div>
        <div class="card">
            <img src="../dist/assets/images/vacation.jpg">
            <div class="card-content">
                <h3>Tur Pantai Gorontalo</h3>
                <p>Nikmati pemandangan pantai eksotis dan bersantai sambil menikmati udara segar di Gorontalo...</p>
                <a href="#" class="btn">DETAILS</a>
            </div>
        </div>
    </div>



    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <img src="../dist/assets/images/logo.png" alt="Logo" class="footer-logo">
                <p>Hubungi Kami</p>
                <strong>info@hiupaustrip.com</strong><br>
                <strong>+6287844342546</strong>
                <p>Ikuti Kami</p>
                <div class="social-icons">
                    <a href="https://www.facebook.com/hiupaustrip" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/hiupaustrip" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://wa.me/6287844342546" target="_blank"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

            <div class="footer-column">
                <h3>SEWA KAPAL</h3>
                <a href="#">Yacht Pelayaran</a>
                <a href="#">Catamaran Lagoon</a>
                <a href="#">Accura 55 Luxury</a>
            </div>

            <div class="footer-column">
                <h3>PILIHAN WISATA</h3>
                <a href="#">Tur Bali Timur</a>
                <a href="#">Tur Bali Utara</a>
                <a href="#">Tur Bali Selatan</a>
            </div>

            <div class="footer-column">
                <h3>AKTIVITAS UNGGULAN</h3>
                <a href="#">Olahraga Air</a>
                <a href="#">Balon Udara Panas</a>
                <a href="#">Pulau Penida</a>
            </div>
        </div>
    </footer>




    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>