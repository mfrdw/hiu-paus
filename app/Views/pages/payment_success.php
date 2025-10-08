<?= $this->extend('layout_user/header') ?>
<?= $this->section('content') ?>

<style>
    .success-card {
        background: #fff;
        color: #333;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, .2);
        text-align: center;
        padding: 40px 30px;
        width: 100%;
        max-width: 600px;
        margin: 20px auto;
        /* Mengatur margin otomatis agar card berada di tengah */
        animation: fadeInUp .8s ease-in-out;
    }

    .success-icon {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: #198754;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto 20px;
        box-shadow: 0 4px 15px rgba(25, 135, 84, .5);
        animation: bounce 1.2s infinite;
    }

    .success-icon i {
        font-size: 48px;
        color: #fff;
    }

    h2 {
        font-size: 1.8rem;
        font-weight: bold;
        color: #198754;
    }

    p {
        font-size: 1rem;
        margin-top: 10px;
    }

    .d-grid {
        display: grid;
        gap: 10px;
        margin-top: 20px;
    }

    .btn {
        padding: 12px;
        font-size: 1rem;
        font-weight: bold;
        border-radius: 50px;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-8px);
        }
    }

    @media (max-width: 768px) {
        .success-card {
            padding: 25px;
            width: 90%;
        }

        .success-icon i {
            font-size: 40px;
        }

        h2 {
            font-size: 1.5rem;
        }
    }
</style>

<div class="success-card">
    <div class="success-icon">
        <i class="bi bi-check-lg"></i>
    </div>
    <h2>Pembayaran Berhasil!</h2>
    <p>Terima kasih sudah melakukan pembayaran.<br> Transaksi kamu berhasil diproses 🎉</p>

    <div class="d-grid gap-2">
        <a href="<?= base_url('/') ?>" class="btn btn-primary btn-lg">
            <i class="bi bi-house-door"></i> Kembali ke Beranda
        </a>
        <a href="<?= base_url('/history') ?>" class="btn btn-outline-success btn-lg">
            <i class="bi bi-clock-history"></i> Lihat Riwayat Booking
        </a>
    </div>
</div>

<?= $this->endSection() ?>