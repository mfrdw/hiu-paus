<?= $this->extend('layout_user/header') ?>
<?= $this->section('content') ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if (session()->getFlashdata('success')): ?>
            Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            }).fire({
                icon: 'success',
                title: '<?= session()->getFlashdata('success'); ?>'
            });
        <?php elseif (session()->getFlashdata('error')): ?>
            Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            }).fire({
                icon: 'error',
                title: '<?= session()->getFlashdata('error'); ?>'
            });
        <?php endif; ?>
    });
</script>

<div class="container" style="max-width: 1200px; margin-top: 50px;">
    <div class="text-center">
        <h2>BOOKING WHALE SHARK TRIP</h2>
        <p>Teluk Saleh, Sumbawa.</p>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form id="contactForm" action="<?= base_url('booking/proses_booking'); ?>" method="POST">
                <div class="card mb-4" style="border-radius: 0.5rem; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">

                    <div class="card-header" style="background-color: #f8f9fa; padding: 20px;">
                        <div class="progress" style="height: 20px; margin-bottom: 10px;">
                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div style="display: flex; justify-content: space-between; font-size: 1rem; color: #007bff;">
                            <span style="font-weight: bold;">1</span>
                            <span style="font-weight: bold;">2</span>
                            <span style="font-weight: bold;">3</span>
                            <span style="font-weight: bold;">4</span>
                        </div>
                    </div>

                    <div class="card-body" style="padding: 30px; background-color: #f8f9fa;">
                        <h4 style="font-size: 1.4rem; font-weight: bold;">Detail Kontak</h4>

                        <!-- Grid 2 kolom -->
                        <div class="row g-3">
                            <!-- Kolom Kiri -->
                            <div class="col-12 col-md-6">
                                <div class="form-section mb-3">
                                    <label for="fullName" class="form-label fw-bold">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="fullName" name="fullName" required oninput="enableButton()">
                                </div>

                                <div class="form-section mb-3">
                                    <label for="email" class="form-label fw-bold">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required oninput="enableButton()">
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-12 col-md-6 d-flex flex-column">
                                <div class="form-section mb-3">
                                    <label for="mobile" class="form-label fw-bold">Nomor HP</label>
                                    <input type="tel" class="form-control" id="mobile" name="mobile" required oninput="enableButton()">
                                </div>

                                <!-- Jumlah Orang -->
                                <div class="mb-3">
                                    <label for="peopleCount" class="form-label fw-bold">Jumlah Orang</label>
                                    <input type="number" class="form-control" id="peopleCount" name="peopleCount" min="1" value="1" required>
                                    <div class="form-text">Jika &gt; 1, detail pengunjung akan muncul.</div>
                                </div>

                                <!-- Kontainer dinamis -->
                            </div>

                            <div id="visitorForms" class="mt-2"></div>
                            <hr class="mt-3">

                            <!-- Button Continue -->
                            <div class="mt-auto text-end">
                                <button type="submit" class="btn btn-success rounded-pill fw-bold" id="continueBtn" disabled>
                                    Lanjutkan
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- JS vendor -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- jQuery harus sebelum script dinamis -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    // Cek session + submit (opsional dipakai saat klik lanjutkan jika mau validasi login dulu)
    function checkSession() {
        const fullName = document.getElementById('fullName').value.trim();
        const email = document.getElementById('email').value.trim();
        const mobile = document.getElementById('mobile').value.trim();

        if (!fullName || !email || !mobile) {
            Swal.fire({
                icon: 'warning',
                title: 'Formulir belum lengkap!',
                text: 'Silakan isi semua kolom yang diperlukan.',
            });
            return;
        }

        <?php if (session()->get('isLoggedIn')): ?>
            document.getElementById("contactForm").submit();
        <?php else: ?>
            Swal.fire({
                icon: 'error',
                title: 'Harus Login Terlebih Dahulu',
                text: 'Silakan login untuk melanjutkan pembayaran.',
            }).then(() => {
                window.location.href = '<?= base_url('/booking'); ?>';
            });
        <?php endif; ?>
    }

    function enableButton() {
        const fullName = document.getElementById('fullName').value.trim();
        const email = document.getElementById('email').value.trim();
        const mobile = document.getElementById('mobile').value.trim();
        const continueBtn = document.getElementById('continueBtn');

        if (fullName && email && mobile) {
            continueBtn.disabled = false;
        } else {
            continueBtn.disabled = true;
        }
    }
</script>

<!-- Dinamis: form Pengunjung -->
<script>
    (function($) {
        function renderVisitors(n) {
            var $c = $('#visitorForms');
            n = parseInt(n, 10);

            // Selalu tampilkan minimal 1 form pengunjung
            if (isNaN(n) || n < 1) {
                n = 1;
            }

            var html = '';
            for (var i = 1; i <= n; i++) {
                html += `
            <div class="border rounded p-3 mb-3 bg-white shadow-sm">
                <h6 class="mb-3 fw-bold">Pengunjung ${i}</h6>
                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <label class="form-label fw-bold" for="v_${i}_fullname">Nama Lengkap</label>
                        <input type="text" class="form-control" id="v_${i}_fullname"
                            name="visitors[${i-1}][fullName]" placeholder="Nama lengkap" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label fw-bold" for="v_${i}_age">Usia</label>
                        <input type="number" class="form-control" id="v_${i}_age"
                            name="visitors[${i-1}][age]" min="0" max="120" placeholder="cth: 25" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label fw-bold" for="v_${i}_gender">Jenis Kelamin</label>
                        <select class="form-select" id="v_${i}_gender" name="visitors[${i-1}][gender]" required>
                            <option value="">Pilih jenis kelamin</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label fw-bold" for="v_${i}_citizenship">Kewarganegaraan</label>
                        <select class="form-select" id="v_${i}_citizenship" name="visitors[${i-1}][citizenship]" required>
                            <option value="">Pilih kewarganegaraan</option>
                            <option value="WNI">WNI</option>
                            <option value="WNA">WNA</option>
                        </select>
                    </div>
                </div>
            </div>
        `;
            }
            $c.html(html);
        }


        // Pasang listener saat DOM siap
        $(function() {
            // Render awal (berdasarkan value default input)
            renderVisitors($('#peopleCount').val());

            // Ubah jumlah -> render ulang
            $('#peopleCount').on('input change', function() {
                var val = parseInt($(this).val(), 10);
                if (isNaN(val) || val < 1) {
                    val = 1; // Set minimum ke 1
                    $(this).val(1);
                }
                renderVisitors(val);
            });
        });
    })(jQuery);
</script>


<?= $this->endSection() ?>