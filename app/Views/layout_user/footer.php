<footer class="footer">
    <div class="footer-container">
        <!-- Logo and Contact Info -->
        <div class="footer-column logo-contact">
            <img src="../dist/assets/images/logo.png" alt="Logo" class="footer-logo">
            <p>Hubungi Kami</p>
            <strong>info@hiupaustrip.com</strong><br>
            <strong>+6287844342546</strong>
            <p>Ikuti Kami</p>
            <div class="social-icons">
                <a href="https://www.facebook.com/hiupaustrip" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/hiupaustrip" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/6287844342546" target="_blank" class="social-icon"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>

        <!-- Seva Kapal Links -->
        <div class="footer-column">
            <h3 class="footer-title">PAKET TRIP</h3>
            <a href="#" class="footer-link">Open Trip Whale Shark Teluk Saleh</a>
            <a href="#" class="footer-link">Private Trip Whale Shark Teluk Saleh</a>
        </div>

        <!-- Pilihan Wisata Links -->
        <div class="footer-column">
            <h3 class="footer-title">PILIHAN WISATA</h3>
            <a href="#" class="footer-link">Tur Bali Timur</a>
            <a href="#" class="footer-link">Tur Bali Utara</a>
            <a href="#" class="footer-link">Tur Bali Selatan</a>
        </div>

        <!-- Aktivitas Unggulan Links -->
        <div class="footer-column">
            <h3 class="footer-title">AKTIVITAS UNGGULAN</h3>
            <a href="#" class="footer-link">Olahraga Air</a>
            <a href="#" class="footer-link">Balon Udara Panas</a>
            <a href="#" class="footer-link">Pulau Penida</a>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <p>&copy; 2025 HIU PAUS Trip. All rights reserved.</p>
    </div>
</footer>

<style>
    /* General footer styles */
    .footer {
        background-color: #2058f1ff;
        color: #fff;
        padding: 60px 0;
        font-family: 'Arial', sans-serif;
    }

    .footer-container {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 40px;
        max-width: 1500px;
        margin: 0 auto;
    }

    .footer-column {
        flex: 1;
        min-width: 200px;
    }

    .footer-title {
        font-size: 1.2rem;
        margin-bottom: 15px;
        color: #f39c12;
        text-transform: uppercase;
    }

    .footer-logo {
        width: 120px;
        margin-bottom: 20px;
    }

    .footer-link {
        display: block;
        color: #ccc;
        text-decoration: none;
        margin: 8px 0;
        font-size: 0.9rem;
        transition: color 0.3s;
    }

    .footer-link:hover {
        color: #f39c12;
    }

    .social-icons {
        display: flex;
        gap: 15px;
    }

    .social-icon {
        font-size: 20px;
        color: #ccc;
        transition: color 0.3s;
    }

    .social-icon:hover {
        color: #f39c12;
    }

    /* Footer bottom */
    .footer-bottom {
        text-align: center;
        margin-top: 40px;
        font-size: 0.9rem;
        color: #bbb;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .footer-container {
            flex-direction: column;
            gap: 30px;
        }

        .footer-column {
            min-width: auto;
            text-align: center;
        }

        .footer-logo {
            margin: 0 auto;
        }

        .social-icons {
            justify-content: center;
        }
    }
</style>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>