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
            <div class="card mb-4" style="border-radius: 0.5rem; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="card-header" style="background-color: #f8f9fa; padding: 20px;">
                    <div class="progress" style="height: 20px; margin-bottom: 10px;">
                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div style="display: flex; justify-content: space-between; font-size: 1rem; color: #007bff;">
                        <span style="font-weight: bold;">1</span>
                        <span style="font-weight: bold;">2</span>
                        <span style="font-weight: bold;">3</span>
                        <span style="font-weight: bold;">4</span>
                    </div>
                </div>

                <div class="card-body" style="padding:30px; background-color:#f8f9fa;">
                    <h4 style="font-size:1.4rem; font-weight:bold;">Metode Pembayaran</h4>
                    <form id="paymentForm" action="<?= base_url('add_payments'); ?>" method="POST">
                        <input type="hidden" name="id" value="<?= isset($booking['id']) ? $booking['id'] : ''; ?>">
                        <!-- Kategori Pembayaran -->
                        <ul class="nav nav-pills gap-2 mb-3" id="payTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="wallet-tab" data-bs-toggle="tab" data-bs-target="#wallet"
                                    type="button" role="tab" aria-controls="wallet" aria-selected="true">
                                    <i class="fas fa-wallet me-2"></i>E-Wallet
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="bank-tab" data-bs-toggle="tab" data-bs-target="#bank"
                                    type="button" role="tab" aria-controls="bank" aria-selected="false">
                                    <i class="fas fa-university me-2"></i>Transfer Bank
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="payTabContent">
                            <!-- TAB: E-Wallet -->
                            <div class="tab-pane fade show active" id="wallet" role="tabpanel" aria-labelledby="wallet-tab">
                                <div class="list-group mb-3">
                                    <label class="list-group-item list-group-item-action p-3 rounded-3 mb-2">
                                        <div class="d-flex align-items-center">
                                            <input class="form-check-input me-3" type="radio" name="payment_channel" value="shopeepay" required>
                                            <i class="fas fa-wallet me-3 text-secondary"></i>
                                            <div>
                                                <div class="fw-semibold">ShopeePay</div>
                                                <small class="text-muted">QR/Transfer Instan</small>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="list-group-item list-group-item-action p-3 rounded-3 mb-2">
                                        <div class="d-flex align-items-center">
                                            <input class="form-check-input me-3" type="radio" name="payment_channel" value="gopay">
                                            <i class="fas fa-wallet me-3 text-secondary"></i>
                                            <div>
                                                <div class="fw-semibold">GoPay</div>
                                                <small class="text-muted">QR/Transfer Instan</small>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="list-group-item list-group-item-action p-3 rounded-3 mb-2">
                                        <div class="d-flex align-items-center">
                                            <input class="form-check-input me-3" type="radio" name="payment_channel" value="ovo">
                                            <i class="fas fa-wallet me-3 text-secondary"></i>
                                            <div>
                                                <div class="fw-semibold">OVO</div>
                                                <small class="text-muted">QR/Transfer Instan</small>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="list-group-item list-group-item-action p-3 rounded-3">
                                        <div class="d-flex align-items-center">
                                            <input class="form-check-input me-3" type="radio" name="payment_channel" value="dana">
                                            <i class="fas fa-wallet me-3 text-secondary"></i>
                                            <div>
                                                <div class="fw-semibold">DANA</div>
                                                <small class="text-muted">QR/Transfer Instan</small>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- TAB: Transfer Bank -->
                            <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="bank-tab">
                                <div class="list-group mb-3">
                                    <label class="list-group-item list-group-item-action p-3 rounded-3 mb-2">
                                        <div class="d-flex align-items-center">
                                            <input class="form-check-input me-3" type="radio" name="payment_channel" value="bni_va" required>
                                            <i class="fas fa-university me-3 text-secondary"></i>
                                            <div>
                                                <div class="fw-semibold">BNI</div>
                                                <small class="text-muted">Virtual Account</small>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="list-group-item list-group-item-action p-3 rounded-3 mb-2">
                                        <div class="d-flex align-items-center">
                                            <input class="form-check-input me-3" type="radio" name="payment_channel" value="bri_va">
                                            <i class="fas fa-university me-3 text-secondary"></i>
                                            <div>
                                                <div class="fw-semibold">BRI</div>
                                                <small class="text-muted">Virtual Account</small>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="list-group-item list-group-item-action p-3 rounded-3 mb-2">
                                        <div class="d-flex align-items-center">
                                            <input class="form-check-input me-3" type="radio" name="payment_channel" value="bca_va">
                                            <i class="fas fa-university me-3 text-secondary"></i>
                                            <div>
                                                <div class="fw-semibold">BCA</div>
                                                <small class="text-muted">Virtual Account</small>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="list-group-item list-group-item-action p-3 rounded-3">
                                        <div class="d-flex align-items-center">
                                            <input class="form-check-input me-3" type="radio" name="payment_channel" value="mandiri_va">
                                            <i class="fas fa-university me-3 text-secondary"></i>
                                            <div>
                                                <div class="fw-semibold">Mandiri</div>
                                                <small class="text-muted">Virtual Account</small>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Persetujuan -->
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" value="1" id="agree" required>
                            <label class="form-check-label small text-muted" for="agree">
                                Saya menyetujui <a href="#" class="text-decoration-underline">syarat & ketentuan</a> dan <a href="#" class="text-decoration-underline">kebijakan privasi</a>.
                            </label>
                        </div>

                        <!-- Tombol -->
                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-secondary" id="continueBtn" style="padding: 12px; border-radius: 50px; font-weight: bold; background-color: #28a745; border: none; color: #fff; transition: background-color 0.3s ease;">
                                <i class="fas fa-arrow-right" style="margin-right: 5px;"></i> Lanjutkan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
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