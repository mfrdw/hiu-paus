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
            <form id="contactForm" action="<?= base_url('booking/proses_booking_private'); ?>" method="POST">
                <input type="hidden" id="totalCost" name="totalCost" value="">
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

                    <!-- Form Grid 2 Kolom -->
                    <div class="container row g-3 mb-5">
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

                            <!-- Jumlah Pax -->
                            <div class="form-section mb-4">
                                <label for="peopleCount" class="form-label fw-bold">Jumlah Pax</label>
                                <select class="form-control" id="peopleCount" name="peopleCount" min="1" value="1" required onchange="updateCost()">
                                    <option value="" disabled>-- Pilih Pax --</option>
                                    <option value="1">1 Pax – IDR 2.800.000 / orang</option>
                                    <option value="2">2 Pax – IDR 1.450.000 / orang</option>
                                    <option value="3">3 Pax – IDR 1.050.000 / orang</option>
                                    <option value="4">4 Pax – IDR 850.000 / orang</option>
                                    <option value="5">5 Pax – IDR 800.000 / orang</option>
                                    <option value="6">6 Pax – IDR 750.000 / orang</option>
                                    <option value="7">7 Pax – IDR 650.000 / orang</option>
                                    <option value="8">8 Pax – IDR 600.000 / orang</option>
                                    <option value="9">9 Pax – IDR 550.000 / orang</option>
                                    <option value="10">10 Pax – IDR 500.000 / orang</option>
                                </select>
                            </div>
                        </div>
                        <div id="visitorForms" class="mt-2"></div>
                        <!-- Button Continue -->
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-secondary" id="continueBtn" style="padding: 12px; border-radius: 50px; font-weight: bold; background-color: #28a745; border: none; color: #fff; transition: background-color 0.3s ease;">
                                Lanjutkan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    // Function to check if user is logged in and redirect or show alert
    function checkSession() {
        const fullName = document.getElementById('fullName').value;
        const email = document.getElementById('email').value;
        const mobile = document.getElementById('mobile').value;
        const peopleCount = document.getElementById('peopleCount').value;

        // Check if all fields are filled
        if (!fullName || !email || !mobile || !peopleCount) {
            Swal.fire({
                icon: 'warning',
                title: 'Formulir belum lengkap!',
                text: 'Silakan isi semua kolom yang diperlukan.',
            });
        } else {
            // Check if user is logged in, then submit form
            <?php if (session()->get('isLoggedIn')): ?>
                // Submit the form
                document.getElementById("contactForm").submit();
            <?php else: ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Harus Login Terlebih Dahulu',
                    text: 'Silakan login untuk melanjutkan pembayaran.',
                });
            <?php endif; ?>
        }
    }


    // Function to enable the continue button when all fields are filled
    function enableButton() {
        const fullName = document.getElementById('fullName').value;
        const email = document.getElementById('email').value;
        const mobile = document.getElementById('mobile').value;
        const peopleCount = document.getElementById('peopleCount').value;

        const continueBtn = document.getElementById('continueBtn');

        // Enable the button if all fields are filled
        if (fullName && email && mobile && peopleCount) {
            continueBtn.disabled = false;
        } else {
            continueBtn.disabled = false; // Keep the button active even if some fields are empty
        }
    }
</script>
<script>
    // Harga per orang BERDASARKAN jumlah pax (sesuai brosur)
    const priceMap = {
        1: 2800000,
        2: 1450000,
        3: 1050000,
        4: 850000,
        5: 800000,
        6: 750000,
        7: 650000,
        8: 600000,
        9: 550000,
        10: 500000
    };

    function formatIDR(n) {
        return 'Rp ' + (n || 0).toLocaleString('id-ID');
    }

    function updateCost() {
        const count = parseInt(document.getElementById('peopleCount').value || '0', 10);
        const perPerson = priceMap[count] || 0;
        const total = perPerson * count;

        // Elemen-elemen tampilan (cek dulu agar tidak error)
        const priceEl = document.getElementById('pricePerPersonDisplay');
        const countEl = document.getElementById('peopleCountDisplay');
        const totalEl = document.getElementById('totalCostDisplay');
        const totalInput = document.getElementById('totalCost');

        if (priceEl) priceEl.textContent = perPerson ? formatIDR(perPerson) : '-';
        if (countEl) countEl.textContent = count ? count + ' orang' : '-';
        if (totalEl) totalEl.textContent = total ? formatIDR(total) : '-';
        if (totalInput) totalInput.value = total || '';
    }

    // Render awal (kalau ada value tersimpan)
    document.addEventListener('DOMContentLoaded', updateCost);
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
            <div class="conatiner p-3 mb-3 bg-white shadow-sm">
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