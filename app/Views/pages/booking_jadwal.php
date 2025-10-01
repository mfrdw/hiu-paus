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
                            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div style="display: flex; justify-content: space-between; font-size: 1rem; color: #007bff;">
                            <span style="font-weight: bold;">1</span>
                            <span style="font-weight: bold;">2</span>
                            <span style="font-weight: bold;">3</span>
                            <span style="font-weight: bold;">4</span>
                        </div>
                    </div>

                    <div class="card-body" style="padding: 30px; background-color: #f8f9fa;">
                        <h4 style="font-size: 1.4rem; font-weight: bold;">Pilih Jadwal</h4>

                        <!-- Tanggal Trip -->
                        <div class="form-section" style="margin-bottom: 1.2rem;">
                            <label for="tripDate" class="form-label" style="font-weight: bold; font-size: 1rem;">
                                <i class="fas fa-calendar-day" style="margin-right: 5px;"></i> Tanggal Trip
                            </label>
                            <input type="date" class="form-control" id="tripDate" name="tripDate" required style="padding: 12px; font-size: 1rem;" value="<?= date('Y-m-d'); ?>">

                            <!-- Alert untuk ketersediaan (dapat diganti sesuai status) -->
                            <div class="alert alert-success mt-2" role="alert">
                                <i class="fas fa-check-circle" style="margin-right: 5px;"></i> Tersedia! Sisa slot: 12 dari 20 orang
                            </div>
                        </div>

                        <!-- Waktu Keberangkatan -->
                        <div class="form-section" style="margin-bottom: 1.2rem;">
                            <label for="departureTime" class="form-label" style="font-weight: bold; font-size: 1rem;">
                                <i class="fas fa-clock" style="margin-right: 5px;"></i> Waktu Keberangkatan
                            </label>
                            <select class="form-control" id="departureTime" name="departureTime" required style="padding: 12px; font-size: 1rem;">
                                <option value="" disabled selected>Pilih Waktu</option>
                                <option value="06:00">06:00 - Pagi (Rekomendasi)</option>
                                <option value="08:00">08:00 - Pagi</option>
                                <option value="10:00">10:00 - Siang</option>
                            </select>
                            <!-- Informasi Alert -->
                            <div class="alert alert-info mt-2" role="alert" style="font-size: 0.9rem;">
                                <i class="fas fa-info-circle" style="margin-right: 5px;"></i> Tips: Waktu 06:00 adalah waktu terbaik untuk menikmati pengalaman Whale Shark yang lebih tenang dan jarang ditemui pengunjung.
                            </div>
                        </div>

                        <!-- Button Continue -->
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-secondary" id="continueBtn" style="padding: 12px; border-radius: 50px; font-weight: bold; background-color: #28a745; border: none; color: #fff; transition: background-color 0.3s ease;">
                                <i class="fas fa-arrow-right" style="margin-right: 5px;"></i> Lanjutkan
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

    // Function to update the total cost based on the number of people
    function updateCost() {
        const pricePerPerson = 650000;
        const peopleCount = document.getElementById('peopleCount').value;
        const totalCost = pricePerPerson * peopleCount;

        // Update the people count and total cost dynamically
        document.getElementById('peopleCountDisplay').innerText = peopleCount;
        document.getElementById('totalCostDisplay').innerText = 'Rp ' + totalCost.toLocaleString();
    }
</script>

<?= $this->endSection() ?>