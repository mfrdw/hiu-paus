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
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Lobster&display=swap" rel="stylesheet">

    <style>
    body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background: url('../dist/assets/images/sea-gorontalo.jpg') center/cover no-repeat;
    }

    .title-section {
        text-align: center;
        margin-bottom: 30px;
        color: #fff;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, .6)
    }

    .title-section .top-text {
        font-family: 'Anton', sans-serif;
        font-size: 3.5rem;
        letter-spacing: 3px
    }

    .title-section .bottom-text {
        font-family: 'Lobster', cursive;
        font-size: 2rem;
        letter-spacing: 1px;
        margin-top: -6px
    }

    .auth-box {
        max-width: 460px;
        width: 100%;
        background: #fff;
        border-radius: 20px;
        padding: 40px 30px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, .2)
    }

    .form-control-lg {
        border-radius: 12px
    }

    .btn-primary {
        background: #0064ff;
        border: none;
        border-radius: 12px
    }

    .btn-primary:hover {
        background: #0052cc
    }

    @media(max-width:768px) {
        .title-section .top-text {
            font-size: 2.2rem
        }

        .title-section .bottom-text {
            font-size: 1.4rem
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

        <!-- Register Box -->
        <div class="auth-box text-center">
            <h4 class="fw-bold mb-4">Register</h4>

            <form method="post" action="<?= base_url('auth/doregistration') ?>">
                <?= csrf_field() ?>
                <!-- CSRF protection -->

                <div class="mb-3 text-start">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control form-control-lg"
                        placeholder="Nama lengkap" value="<?= old('nama_lengkap') ?>" required>
                </div>

                <div class="mb-3 text-start">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control form-control-lg"
                        placeholder="Username" value="<?= old('username') ?>" required>
                </div>

                <div class="mb-3 text-start">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg"
                        placeholder="Password" required>
                </div>

                <div class="mb-3 text-start">
                    <label for="kontak">Kontak (No. HP/WA)</label>
                    <input type="text" name="kontak" id="kontak" class="form-control form-control-lg"
                        placeholder="Kontak (No. HP/WA)" value="<?= old('kontak') ?>" required>
                </div>

                <div class="mb-4 text-start">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Email"
                        value="<?= old('email') ?>" required>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">Daftar</button>
            </form>


            <p class="mb-2">
                Sudah punya akun?
                <a href="<?= base_url('login') ?>" class="text-primary fw-semibold text-decoration-none">Log in</a>
            </p>

            <p class="text-muted small">
                Dengan mendaftar, kamu menyetujui
                <a href="#" class="text-decoration-none">Kebijakan Privasi</a> dan
                <a href="#" class="text-decoration-none">Syarat & Ketentuan</a>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>