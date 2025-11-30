<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Invoice #<?= esc($order['id_bookings'] ?? $order['id']); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <style>
        body {
            background: #f3f4f8;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .invoice-wrapper {
            max-width: 900px;
            margin: 40px auto;
        }

        .invoice-card {
            border-radius: 18px;
            overflow: hidden;
            border: none;
            box-shadow: 0 15px 35px rgba(0, 0, 0, .08);
        }

        .invoice-header {
            background: radial-gradient(circle at top left, #00b4d8, #0077b6 40%, #03045e);
            color: #fff;
            padding: 24px 32px;
            position: relative;
        }

        .invoice-header::after {
            content: "";
            position: absolute;
            right: -80px;
            top: -80px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255, 255, 255, .15), transparent 70%);
            opacity: .7;
        }

        .invoice-badge {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .35rem .75rem;
            border-radius: 999px;
            background: rgba(0, 0, 0, .25);
            font-size: .8rem;
            text-transform: uppercase;
            letter-spacing: .06em;
        }

        .invoice-status-badge {
            padding: .25rem .75rem;
            border-radius: 999px;
            font-size: .8rem;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-confirmed {
            background: #cce5ff;
            color: #004085;
        }

        .status-completed {
            background: #d4edda;
            color: #155724;
        }

        .amount-pill {
            display: inline-flex;
            padding: .4rem .9rem;
            border-radius: 999px;
            background: #f1f3ff;
            font-size: .9rem;
            align-items: center;
            gap: .4rem;
        }

        .table-summary th,
        .table-summary td {
            padding: .5rem .75rem;
            border: none;
        }

        .table-summary tr:not(:last-child) td {
            border-bottom: 1px dashed #dee2e6;
        }

        /* Status pembayaran (LUNAS / BELUM LUNAS) */
        .payment-status-box {
            border-radius: 16px;
            padding: 16px 18px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 10px;
        }

        .payment-status-icon {
            font-size: 2rem;
        }

        .payment-status-text-title {
            font-weight: 600;
            font-size: .95rem;
        }

        .payment-status-text-sub {
            font-size: .8rem;
        }

        .payment-status-lunas {
            background: #d4edda;
            border: 1px solid #b1dfbb;
            color: #155724;
        }

        .payment-status-belum {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        @media print {
            body {
                background: #fff;
            }

            .no-print {
                display: none !important;
            }

            .invoice-card {
                box-shadow: none;
            }
        }
    </style>
</head>

<body>

    <div class="invoice-wrapper">
        <div class="card invoice-card">
            <!-- HEADER -->
            <div class="invoice-header d-flex justify-content-between align-items-start gap-3">
                <div>
                    <div class="invoice-badge mb-2">
                        <i class="fas fa-water"></i>
                        <span>Whale Shark Trip</span>
                    </div>
                    <h2 class="mb-1">Invoice</h2>
                    <div class="small text-white-50">
                        Teluk Saleh, Sumbawa · Whale Shark Experience
                    </div>
                </div>
                <div class="text-end position-relative" style="z-index:2;">
                    <?php
                    $invoiceNo   = $order['id_bookings'] ?? ('INV-' . str_pad($order['id'], 5, '0', STR_PAD_LEFT));
                    $createdAt   = $order['created_at'] ?? date('Y-m-d H:i:s');
                    $invoiceDate = date('d M Y H:i', strtotime($createdAt));

                    $statusClass = 'status-pending';
                    $statusLabel = ucfirst($order['role_payment'] ?? 'pending');
                    if (($order['role_payment'] ?? '') === 'confirmed') {
                        $statusClass = 'status-confirmed';
                    } elseif (($order['role_payment'] ?? '') === 'completed') {
                        $statusClass = 'status-completed';
                    }
                    ?>
                    <div class="mb-1">
                        <span class="text-white-50 small">No. Invoice</span><br>
                        <span class="fw-semibold"><?= esc($invoiceNo); ?></span>
                    </div>
                    <div class="mb-1">
                        <span class="text-white-50 small">Tanggal</span><br>
                        <span><?= esc($invoiceDate); ?></span>
                    </div>
                    <div class="invoice-status-badge mt-2 <?= $statusClass; ?>">
                        <i class="fas fa-circle-notch fa-spin me-1"></i><?= esc($statusLabel); ?>
                    </div>
                </div>
            </div>

            <!-- BODY -->
            <div class="card-body p-4">
                <?php
                $nama       = $order['full_name'] ?? '-';
                $email      = $order['email'] ?? '-';
                $kontak     = $order['kontak'] ?? '-';
                $paket      = $order['paket'] ?? '-';
                $jumlah     = (int)($order['jumlah_orang'] ?? 0);
                $tglTrip    = $order['tanggal_trip'] ?? null;
                $jamTrip    = $order['jam_trip'] ?? null;
                $voucher    = $order['voucher'] ?? null;
                $nilaiV     = (int)($order['nilai_voucher'] ?? 0);
                $totalAkhir = (int)($order['total_biaya'] ?? 0); // diasumsikan total setelah diskon

                // Rekonstruksi harga sebelum diskon (kalau ada voucher)
                $hargaSebelumDiskon = $totalAkhir + $nilaiV;
                $grandTotal         = $totalAkhir;
                $modeBayar          = $order['mode_pembayaran'] ?? '-';

                $status  = $order['role_payment'] ?? '';
                $isLunas = ($status === 'confirmed' || $status === 'completed');

                ?>

                <!-- Row atas: Customer & Trip -->
                <div class="row mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <h6 class="text-uppercase text-muted small mb-2">Ditagihkan Kepada</h6>
                        <h5 class="mb-1">
                            <i class="fas fa-user-circle me-2 text-primary"></i><?= esc($nama); ?>
                        </h5>
                        <div class="small text-muted mb-1">
                            <i class="fas fa-envelope me-2"></i><?= esc($email); ?>
                        </div>
                        <div class="small text-muted">
                            <i class="fas fa-phone-alt me-2"></i><?= esc($kontak); ?>
                        </div>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <h6 class="text-uppercase text-muted small mb-2">Detail Trip</h6>
                        <div class="fw-semibold mb-1">
                            <i class="fas fa-ship me-2 text-primary"></i><?= esc($paket); ?>
                        </div>
                        <div class="small text-muted">
                            <i class="far fa-calendar-alt me-2"></i>
                            <?= $tglTrip ? date('d M Y', strtotime($tglTrip)) : '-'; ?>
                        </div>
                        <div class="small text-muted">
                            <i class="far fa-clock me-2"></i><?= $jamTrip ? esc($jamTrip) : '-'; ?>
                        </div>
                        <div class="small text-muted mt-1">
                            <i class="fas fa-users me-2"></i><?= $jumlah; ?> orang
                        </div>
                        <?php if (!empty($modeBayar) && $modeBayar !== '-'): ?>
                            <div class="amount-pill mt-2">
                                <i class="fas fa-credit-card-front text-primary"></i>
                                <span class="small text-muted">Metode</span>
                                <span class="fw-semibold text-dark"><?= esc(ucfirst($modeBayar)); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Ringkasan Biaya + Status Pembayaran -->
                <div class="row g-4 align-items-start">
                    <div class="col-md-7">
                        <h6 class="text-uppercase text-muted small mb-2">Ringkasan Biaya</h6>
                        <div class="table-responsive">
                            <table class="table table-summary mb-0">
                                <tbody>
                                    <tr>
                                        <th class="text-muted small">Harga Paket</th>
                                        <td class="text-end">
                                            Rp <?= number_format($hargaSebelumDiskon, 0, ',', '.'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted small">
                                            Voucher
                                            <?php if ($voucher): ?>
                                                <span class="badge bg-light text-dark border ms-1"><?= esc($voucher); ?></span>
                                            <?php endif; ?>
                                        </th>
                                        <td class="text-end">
                                            <?php if ($nilaiV > 0): ?>
                                                <span class="text-success">- Rp <?= number_format($nilaiV, 0, ',', '.'); ?></span>
                                            <?php else: ?>
                                                <span class="text-muted">Tidak digunakan</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted small">Jumlah Orang</th>
                                        <td class="text-end"><?= $jumlah; ?> orang</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted small">Total Pembayaran</th>
                                        <td class="text-end">
                                            <span class="fw-bold fs-5 text-success">
                                                Rp <?= number_format($grandTotal, 0, ',', '.'); ?>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p class="small text-muted mt-3 mb-0">
                            <i class="fas fa-info-circle me-1"></i>
                            Mohon lakukan pembayaran sesuai nominal di atas. Setelah pembayaran terkonfirmasi,
                            e‑ticket dan detail final akan dikirimkan ke email Anda.
                        </p>
                    </div>

                    <!-- Status Pembayaran + Catatan -->
                    <div class="col-md-5">
                        <h6 class="text-uppercase text-muted small mb-2">Status Pembayaran</h6>

                        <?php if ($isLunas): ?>
                            <div class="payment-status-box payment-status-lunas">
                                <i class="fas fa-check-circle payment-status-icon"></i>
                                <div>
                                    <div class="payment-status-text-title">
                                        LUNAS
                                    </div>
                                    <div class="payment-status-text-sub">
                                        Pembayaran untuk invoice ini telah diterima dan dikonfirmasi.
                                        Selamat menikmati trip Anda! 🎉
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="payment-status-box payment-status-belum">
                                <i class="fas fa-times-circle payment-status-icon"></i>
                                <div>
                                    <div class="payment-status-text-title">
                                        BELUM LUNAS
                                    </div>
                                    <div class="payment-status-text-sub">
                                        Silakan selesaikan pembayaran sesuai nominal tagihan
                                        agar pemesanan Anda dapat diproses.
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="small text-muted mt-2">
                            <strong>Catatan:</strong><br>
                            Simpan invoice ini sebagai bukti pemesanan sah. Untuk perubahan jadwal atau pembatalan,
                            hubungi admin maksimal H-3 sebelum keberangkatan.
                        </div>
                    </div>
                </div>
            </div>

            <!-- FOOTER -->
            <div class="card-footer d-flex justify-content-between align-items-center px-4 py-3 bg-light">
                <div class="small text-muted">
                    Terima kasih telah memilih <strong>Whale Shark Trip Teluk Saleh</strong> 🐋
                </div>
                <div class="no-print">
                    <button class="btn btn-outline-secondary btn-sm me-2" onclick="window.history.back();">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </button>
                    <button class="btn btn-primary btn-sm" onclick="window.print();">
                        <i class="fas fa-print me-1"></i> Cetak / Simpan PDF
                    </button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>