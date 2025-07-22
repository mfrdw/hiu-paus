<?= $this->extend('layout_user/header') ?>
<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Accommodation Booking</title>
    <!-- Link to Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container" style="max-width: 1200px; margin-top: 50px;">
        <h2>Pemesanan Open Trip Whale Shark Teluk Saleh</h2>
        <p>Pastikan semua detail pada halaman ini sudah benar sebelum melanjutkan ke pembayaran dan pemesanan trip.</p>

        <div class="row">
            <!-- Left Form Section -->
            <div class="col-md-8">
                <div class="card mb-4" style="border-radius: 0.5rem; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                    <div class="card-header" style="background-color: #f8f9fa; padding: 20px;">
                        <h4 style="font-size: 1.4rem; font-weight: bold;">Detail Kontak</h4>
                    </div>
                    <div class="card-body" style="padding: 30px; background-color: #f8f9fa;">
                        <form>
                            <!-- Nama Lengkap -->
                            <div class="form-section" style="margin-bottom: 1.5rem;">
                                <label for="fullName" class="form-label"
                                    style="font-weight: bold; font-size: 1rem;">Nama Lengkap (sesuai
                                    KTP/Passport)</label>
                                <input type="text" class="form-control" id="fullName" placeholder="contoh: John Maeda"
                                    required style="padding: 12px; font-size: 1rem;">
                            </div>

                            <!-- Email -->
                            <div class="form-section" style="margin-bottom: 1.5rem;">
                                <label for="email" class="form-label"
                                    style="font-weight: bold; font-size: 1rem;">Email</label>
                                <input type="email" class="form-control" id="email"
                                    placeholder="contoh: email@example.com" required
                                    style="padding: 12px; font-size: 1rem;">
                            </div>

                            <!-- Nomor HP -->
                            <div class="form-section" style="margin-bottom: 1.5rem;">
                                <label for="mobile" class="form-label" style="font-weight: bold; font-size: 1rem;">Nomor
                                    HP</label>
                                <input type="tel" class="form-control" id="mobile" placeholder="contoh: +62 8123456789"
                                    required style="padding: 12px; font-size: 1rem;">
                            </div>

                            <!-- Jumlah Orang -->
                            <div class="form-section" style="margin-bottom: 1.5rem;">
                                <label for="peopleCount" class="form-label"
                                    style="font-weight: bold; font-size: 1rem;">Jumlah Orang</label>
                                <input type="number" class="form-control" id="peopleCount" placeholder="contoh: 2"
                                    required style="padding: 12px; font-size: 1rem;">
                            </div>

                            <!-- Durasi Trip (2D1N, 3D2N, dll.) -->
                            <div class="form-section" style="margin-bottom: 1.5rem;">
                                <label for="tripDuration" class="form-label"
                                    style="font-weight: bold; font-size: 1rem;">Durasi Trip</label>
                                <select class="form-control" id="tripDuration" required
                                    style="padding: 12px; font-size: 1rem;">
                                    <option value="2D1N">2D1N (2 Hari 1 Malam)</option>
                                    <option value="3D2N">3D2N (3 Hari 2 Malam)</option>
                                    <option value="4D3N">4D3N (4 Hari 3 Malam)</option>
                                    <option value="5D4N">5D4N (5 Hari 4 Malam)</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mb-4" style="border-radius: 0.5rem; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                    <div class="card-header" style="background-color: #f8f9fa; padding: 20px;">
                        <h4 style="font-size: 1.4rem; font-weight: bold;">Total Biaya</h4>
                    </div>
                    <div class="card-body" style="padding: 30px; background-color: #f8f9fa;">
                        <!-- Rincian Harga -->
                        <div style="margin-bottom: 1.5rem;">
                            <p><strong>Harga per orang:</strong> Rp 650.000</p>
                            <p><strong>Total Biaya:</strong> Rp 650.000</p> <!-- Misalnya hanya untuk 1 orang -->
                        </div>

                        <!-- Button Cancel & Reschedule -->
                        <button class="btn btn-secondary"
                            style="width: 100%; padding: 10px; border-radius: 50px;">Kebijakan
                            Pembatalan & Penjadwalan
                            Ulang</button>

                        <!-- Info -->
                        <p style="font-size: 0.9rem; color: #6c757d;">Anda mendapatkan harga terbaik untuk Open Trip ini
                            dengan opsi ini!</p>
                    </div>
                </div>

            </div>

            <!-- Right Sidebar Section -->
            <div class="col-md-4">
                <div class="card mb-5" style="background-color: #f8f9fa; border-radius: 0.5rem; padding: 20px;">
                    <!-- Gambar Open Trip -->
                    <img src="../dist/assets/images/images-1.jpg" alt="Open Trip Whale Shark Teluk Saleh"
                        class="img-fluid" style="border-radius: 0.5rem; margin-bottom: 15px;">
                    <div class="details">
                        <h5 style="font-size: 1.2rem; font-weight: bold; color: #007bff;">Open Trip Whale Shark Teluk
                            Saleh</h5>
                        <p><strong style="font-size: 1rem;">Harga Paket:</strong></p>
                        <ul style="list-style: none; padding-left: 0; font-size: 0.9rem;">
                            <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Boat / Perahu & Bagang</li>
                            <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Bantal, Selimut</li>
                            <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Life Jacket</li>
                            <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Air Mineral</li>
                            <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Teh, Kopi, Roti, Nutela</li>
                            <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Alat Snorkeling, Fins & Mask
                            </li>
                            <li><i class="fas fa-check-circle" style="color: #28a745;"></i> GoPro (Free Dokumentasi)
                            </li>
                            <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Videografer Underwater</li>
                        </ul>
                        <p style="font-size: 1.2rem; color: #28a745; font-weight: bold;">Rp 650.000 / Orang</p>
                        <p style="font-size: 0.9rem; color: #6c757d;">Nikmati pengalaman luar biasa bersama kami di
                            Teluk Saleh, Sumbawa.</p>
                        <!-- Kontak dan Kunjungan -->
                        <div style="margin-top: 20px; mb-5">
                            <h6 style="font-size: 1.1rem; font-weight: bold; color: #007bff;">Hubungi Kontak dan
                                Kunjungi Kami di :</h6>
                            <p style="font-size: 0.9rem;"><strong>WhatsApp:</strong> <a href="tel:+62812144408108"
                                    style="color: #28a745;">081214408108</a></p>
                            <p style="font-size: 0.9rem;"><strong>Instagram:</strong> <a
                                    href="https://instagram.com/whaleshark.teluksaleh" target="_blank"
                                    style="color: #28a745;">@whaleshark.teluksaleh</a></p>
                            <p style="font-size: 0.9rem;"><strong>Lokasi:</strong> Labuhan Jambu, NTB</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>


<?= $this->endSection() ?>