<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIU PAUS</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 5 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
    :root {
        --primary-color: #008080;
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
        padding: 20px 30px;
        background: var(--white);
        border-bottom: 1px solid #ddd;
    }

    .logo-text {
        font-family: 'Montserrat', sans-serif;
        font-weight: 800;
        font-size: 24px;
        /* Menyesuaikan ukuran logo */
        color: var(--primary-color);
        text-transform: uppercase;
        letter-spacing: 3px;
        /* Memberi jarak antar huruf */
        text-align: center;
        text-decoration: none;
    }


    .logo-text:hover {
        color: var(--accent-orange);
        /* Warna berubah saat hover */
        transition: color 0.3s ease;
    }


    nav a {
        margin: 0 15px;
        font-weight: 600;
        color: var(--dark-text);
    }

    nav a.active {
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
            <a href="#" class="logo-text">HIU PAUS</a>
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
            <img src="zoo.jpg">
            <div class="card-content">
                <h3>Visiting Zoo</h3>
                <p>For those who want to see a habitat of wildlife...</p>
                <a href="#" class="btn">DETAILS</a>
            </div>
        </div>
        <div class="card">
            <img src="water.jpg">
            <div class="card-content">
                <h3>Water Sport</h3>
                <p>Bali has a wonderful underwater world...</p>
                <a href="#" class="btn">DETAILS</a>
            </div>
        </div>
        <div class="card">
            <img src="horse.jpg">
            <div class="card-content">
                <h3>Horse Riding</h3>
                <p>Explore Bali island riding a horse...</p>
                <a href="#" class="btn">DETAILS</a>
            </div>
        </div>
    </div>

    <div class="section-title">Aktivitas Unggulan Taman Hiu Paus</div>

    <div class="cards-container">
        <div class="card">
            <img src="ubud.jpg">
            <div class="card-content">
                <h3>Ubud Tour</h3>
                <p>As Bali known with its art and culture...</p>
                <a href="#" class="btn">DETAILS</a>
            </div>
        </div>
        <div class="card">
            <img src="east.jpg">
            <div class="card-content">
                <h3>East Bali Tour</h3>
                <p>East Bali Tour is a Bali Full Day Tour...</p>
                <a href="#" class="btn">DETAILS</a>
            </div>
        </div>
        <div class="card">
            <img src="north.jpg">
            <div class="card-content">
                <h3>North Bali Tour</h3>
                <p>If you ask where is the center of culture...</p>
                <a href="#" class="btn">DETAILS</a>
            </div>
        </div>
    </div>




    <footer>
        <div class="column">
            <img src="../dist/assets/images/logo2.png" alt="Logo" style="height: 50px;">
            <p>Email for Us</p>
            <strong>info@easybalitrip.com</strong><br>
            <strong>+6287844342546</strong>
            <p>Follow Us</p>
        </div>
        <div class="column">
            <h3>YACHT</h3>
            <a href="#">Sailing Yacht</a>
            <a href="#">Catamaran Lagoon</a>
            <a href="#">Accura 55 Luxury</a>
        </div>
        <div class="column">
            <h3>EXCURSIONS</h3>
            <a href="#">East Bali Tour</a>
            <a href="#">North Bali Tour</a>
            <a href="#">South Bali Tour</a>
        </div>
        <div class="column">
            <h3>ACTIVITIES</h3>
            <a href="#">Water Sport</a>
            <a href="#">Hot Air Balloon</a>
            <a href="#">Penida Island</a>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>