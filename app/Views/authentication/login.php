<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?> | Wisata Whale Shark Teluk Saleh</title>

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 5 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Google Font Keren -->
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Lobster&display=swap" rel="stylesheet">

    <style>
    body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background-image: url('../dist/assets/images/sea-gorontalo.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .title-section {
        text-align: center;
        margin-bottom: 30px;
        color: white;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
    }

    .title-section .top-text {
        font-family: 'Anton', sans-serif;
        font-size: 3.5rem;
        letter-spacing: 3px;
    }

    .title-section .bottom-text {
        font-family: 'Lobster', cursive;
        font-size: 2rem;
        letter-spacing: 1px;
    }

    .login-box {
        max-width: 420px;
        width: 100%;
        background: #fff;
        border-radius: 20px;
        padding: 40px 30px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
    }

    .form-control-lg {
        border-radius: 12px;
    }

    .btn-primary {
        background-color: #0064ff;
        border: none;
        border-radius: 12px;
    }

    .btn-primary:hover {
        background-color: #0052cc;
    }

    .social-btn {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        border: 1px solid #ccc;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #333;
        transition: 0.2s;
    }

    .social-btn:hover {
        background-color: #f0f0f0;
    }

    .divider {
        display: flex;
        align-items: center;
        text-align: center;
        margin: 20px 0;
    }

    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #ddd;
    }

    .divider::before {
        margin-right: 10px;
    }

    .divider::after {
        margin-left: 10px;
    }

    @media (max-width: 768px) {
        .title-section .top-text {
            font-size: 2.2rem;
        }

        .title-section .bottom-text {
            font-size: 1.4rem;
        }
    }
    </style>
</head>

<body>
    <div class="d-flex flex-column align-items-center justify-content-center min-vh-100 px-3">

        <!-- Judul -->
        <div class="title-section">
            <div class="top-text">WELCOME TO</div>
            <div class="bottom-text">WISATA WHALE SHARK TELUK SALEH</div>
        </div>

        <!-- Login Box -->
        <div class="login-box text-center">
            <h4 class="fw-bold mb-4">Log in</h4>

            <!-- Form Login -->
            <form method="post" action="<?= base_url('auth/dologin') ?>">
                <div class="mb-3 text-start">
                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Username"
                        required>
                </div>

                <div class="mb-3 text-start">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password"
                        required>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">Log in</button>
            </form>


            <!-- Divider -->
            <div class="divider">Log in lebih cepat dengan</div>

            <!-- Social -->
            <div class="d-flex justify-content-center gap-2 mb-4">
                <a href="#" class="social-btn"><i class="fab fa-apple"></i></a>
                <a href="#" class="social-btn"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-btn"><i class="fab fa-google"></i></a>
                <a href="#" class="social-btn"><i class="fab fa-tiktok"></i></a>
            </div>

            <!-- Daftar -->
            <p class="mb-2">
                Belum punya akun?
                <a href="<?= base_url('registration') ?>" class="text-primary fw-semibold text-decoration-none">Daftar,
                    yuk!</a>
            </p>

            <!-- Disclaimer -->
            <p class="text-muted small">
                Dengan log in, kamu menyetujui
                <a href="#" class="text-decoration-none">Kebijakan Privasi</a> dan
                <a href="#" class="text-decoration-none">Syarat & Ketentuan</a>.
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>