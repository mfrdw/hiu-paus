<?= $this->extend('layout_user/header') ?>
<?= $this->section('content') ?>

<!-- Main Content Section -->
<div class="container mt-4">

    <!-- Hotel Images -->
    <div class="row mb-4">
        <!-- Gambar Utama -->
        <div class="col-md-8">
            <div class="card" style="border-radius: 0.5rem; margin-bottom: 1rem;">
                <img src="../dist/assets/images/images-1.jpg" class="card-img-top" alt="Hotel Image"
                    style="height: 100%; width: 100%; object-fit: cover;">
            </div>
        </div>

        <!-- Gambar Tambahan (2 gambar di kanan) -->
        <div class="col-md-4">
            <div class="row">
                <div class="col-12 mb-2">
                    <div class="card" style="border-radius: 0.5rem; margin-bottom: 1rem;">
                        <img src="../dist/assets/images/images-2.jpg" class="card-img-top" alt="Hotel Image"
                            style="height: 100%; width: 100%; object-fit: cover;">
                    </div>
                </div>
                <div class="col-12">
                    <div class="card" style="border-radius: 0.5rem; margin-bottom: 1rem;">
                        <img src="../dist/assets/images/images-3.jpg" class="card-img-top" alt="Hotel Image"
                            style="height: 100%; width: 100%; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Open Trip Info (Rating, Review, and Price) -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card mt-3" style="border-radius: 0.5rem; margin-bottom: 1rem;">
                <div class="card-header" style="background-color: #f8f9fa;">
                    <h5 class="card-title" style="font-size: 1.2rem; font-weight: bold;">Open Trip Whale Shark Teluk
                        Saleh</h5>
                </div>
                <div class="card-body">
                    <p><strong>Rating:</strong> 9.0/10 <small>(2.420 review)</small></p>
                    <p><strong>Kesan Mengikuti Trip Lain:</strong></p>
                    <ul class="rating-item" style="list-style: none; padding-left: 0;">
                        <li><i class="fas fa-star" style="color: #f39c12;"></i> Pengalaman: 9/10</li>
                        <li><i class="fas fa-star" style="color: #f39c12;"></i> Pemandu: 8/10</li>
                        <li><i class="fas fa-star" style="color: #f39c12;"></i> Fasilitas: 8/10</li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mt-3"
                style="border-radius: 0.5rem; margin-bottom: 1rem; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="card-body" style="background-color: #f8f9fa; padding: 30px;">
                    <h4 style="font-size: 1.5rem; font-weight: bold; color: #28a745;">Harga mulai dari:</h4>
                    <p style="font-size: 1.2rem; font-weight: bold; color: #007bff;">Rp 650.000/Orang</p>
                    <a href="<?= base_url('booking')?>" class="btn btn-primary"
                        style="width: 100%; padding: 15px; font-size: 1.1rem; font-weight: bold; border-radius: 50px; transition: all 0.3s ease;">
                        Pesan Sekarang
                    </a>
                </div>
            </div>
        </div>

    </div>


    <!-- Review Section -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card" style="border-radius: 0.5rem; margin-bottom: 1rem;">
                <div class="card-header" style="background-color: #f8f9fa;">
                    <h4 class="review-header" style="font-size: 1.1rem; font-weight: bold;">Kesan Mengikuti Trip Lain
                    </h4>
                </div>
                <div class="card-body">
                    <p><strong>Andi D.</strong> - <em>Pengalaman melihat hiu paus di Teluk Saleh sangat luar biasa!
                            Pemandu trip sangat berpengalaman, memberikan penjelasan yang jelas dan sangat membantu.
                            Perjalanan ini benar-benar mengesankan!</em></p>
                    <p><strong>Rina S.</strong> - <em>Trip ini sangat menyenangkan dan penuh petualangan! Meskipun cuaca
                            sedikit kurang mendukung, pengalaman berenang bersama hiu paus tetap menjadi momen yang tak
                            terlupakan. Pemandu sangat ramah dan siap membantu kapan saja.</em></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="border-radius: 0.5rem; margin-bottom: 1rem;">
                <div class="card-header" style="background-color: #f8f9fa;">
                    <h4 class="card-title" style="font-size: 1.2rem; font-weight: bold;">Fasilitas Trip</h4>
                </div>
                <div class="card-body">
                    <ul class="facilities-item" style="list-style: none; padding-left: 0;">
                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Boat / Perahu (3-4 jam)</li>
                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Life Jacket</li>
                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Air Mineral & Snack Lokal</li>
                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Alat Snorkeling (Mask, Fins,
                            Snorkel)</li>
                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Skin Dive (Roti & Nutella)</li>
                        <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Free Kamera GoPro (1 video + 5
                            foto underwater)</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card" style="border-radius: 0.5rem; margin-bottom: 1rem;">
                <div class="card-header" style="background-color: #f8f9fa;">
                    <h4 class="card-title" style="font-size: 1.2rem; font-weight: bold;">Tentang Whaleshark Teluk Saleh
                    </h4>
                </div>
                <div class="card-body">
                    <p><strong>Whaleshark Teluk Saleh</strong> merupakan salah satu destinasi wisata yang semakin
                        populer di kalangan wisatawan, terutama sejak tahun 2018. Wisata ini dikenal dengan pengalaman
                        langka melihat hiu paus atau whale shark yang berenang di perairan Teluk Saleh, Sumbawa.
                        Keindahan bawah laut di Teluk Saleh menjadi daya tarik utama, membuat wisata ini sangat diminati
                        oleh pecinta alam dan penyelam.</p>
                    <p>Selain keindahan alam yang menakjubkan, <strong>Teluk Saleh</strong> juga menjadi tempat yang
                        ideal bagi para penyelam untuk menikmati keanekaragaman hayati laut. Salah satu momen tak
                        terlupakan bagi para pengunjung adalah kesempatan untuk berenang bersama hiu paus yang dapat
                        mencapai ukuran raksasa. Keberadaan hiu paus di Teluk Saleh menjadi simbol dari kelestarian alam
                        yang terjaga dan menjadikannya salah satu lokasi wisata bawah laut terbaik di dunia.</p>
                    <p>Sejak pertama kali dibuka pada tahun 2018, bersamaan dengan acara <strong>Sail Moyo
                            Tambora</strong>, wisata ini terus berkembang dan kini menjadi destinasi utama bagi
                        wisatawan lokal dan mancanegara. Para pengunjung tidak hanya dapat menikmati pengalaman
                        snorkelling atau diving, tetapi juga dapat merasakan kedamaian dan ketenangan yang ditawarkan
                        oleh alam sekitar Teluk Saleh yang masih alami dan belum terlalu berkembang. Hal ini menjadikan
                        Teluk Saleh sebagai tempat yang tepat untuk melepaskan diri dari hiruk-pikuk kehidupan
                        sehari-hari.</p>
                    <p>Dengan berbagai pengalaman luar biasa yang ditawarkan, Teluk Saleh kini menjadi destinasi wajib
                        bagi para pecinta alam dan penyelam yang ingin menjelajahi keindahan bawah laut Indonesia.
                        Keindahan alami Teluk Saleh, dikombinasikan dengan ekosistem laut yang kaya, menjadikannya
                        lokasi yang sempurna untuk berlibur, belajar, dan menikmati alam.</p>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>