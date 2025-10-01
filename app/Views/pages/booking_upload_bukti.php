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
<div class="container" style="max-width: 1200px; margin-top: 50px; margin-bottom: 250px;">
    <div class="text-center">
        <h2>BOOKING WHALE SHARK TRIP</h2>
        <p>Teluk Saleh, Sumbawa.</p>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form id="contactForm" action="<?= base_url('booking/proses_booking'); ?>" method="POST">
                <div class="card mb-4" style="border-radius: 0.5rem; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                    <div class="card-header" style="background-color: #f8f9fa; padding: 20px;">
                        <!-- Progress Bar -->
                        <div class="progress" style="height: 20px; margin-bottom: 10px;">
                            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <!-- Step Numbers -->
                        <div style="display: flex; justify-content: space-between; font-size: 1rem; color: #007bff;">
                            <span style="font-weight: bold;">1</span>
                            <span style="font-weight: bold;">2</span>
                            <span style="font-weight: bold;">3</span>
                            <span style="font-weight: bold;">4</span>
                        </div>
                    </div>

                    <div class="card-body" style="padding: 30px; background-color: #f8f9fa;">
                        <h4 style="font-size: 1.4rem; font-weight: bold;">Verifikasi Pembayaran</h4>

                        <!-- Metode Pembayaran -->
                        <div class="alert alert-info" role="alert" style="font-size: 1rem;">
                            <i class="fas fa-check-circle" style="margin-right: 5px;"></i> Pembayaran menggunakan ShopeePay
                        </div>

                        <!-- Detail Pemesanan -->
                        <div class="alert alert-success" role="alert" style="font-size: 1rem;">
                            <strong>Detail Pemesanan:</strong><br>
                            <strong>Nama Pemesan:</strong> John Doe<br>
                            <strong>Total Pembayaran:</strong> Rp 1.300.000
                        </div>

                        <!-- Upload Bukti Pembayaran -->
                        <div class="form-section" style="margin-top: 20px;">
                            <label for="paymentProof" class="form-label" style="font-weight: bold; font-size: 1rem;">
                                <i class="fas fa-upload" style="margin-right: 5px;"></i> Upload Bukti Pembayaran
                            </label>
                            <!-- Upload Box -->
                            <div class="border border-secondary rounded-3 p-3 text-center" style="cursor: pointer; width: 100%; height: 150px; position: relative;" id="uploadBox">
                                <input type="file" class="form-control" id="paymentProof" name="paymentProof" accept="image/*, .pdf" required style="opacity: 0; position: absolute; z-index: -1;" onchange="updateFileName()">
                                <div style="font-size: 1rem; color: #007bff;">
                                    <i class="fas fa-cloud-upload-alt" style="font-size: 3rem;"></i><br>
                                    Seret file di sini atau klik untuk memilih file
                                </div>
                            </div>
                            <!-- Display File Name after Selection -->
                            <div id="fileName" style="margin-top: 10px; font-size: 1rem; color: #333;"></div>
                        </div>

                        <script>
                            // Update the file name after a file is selected
                            function updateFileName() {
                                const fileInput = document.getElementById('paymentProof');
                                const fileName = fileInput.files[0] ? fileInput.files[0].name : '';
                                const fileDisplay = document.getElementById('fileName');

                                if (fileName) {
                                    fileDisplay.textContent = `File yang dipilih: ${fileName}`;
                                } else {
                                    fileDisplay.textContent = '';
                                }
                            }

                            // Enable the drop functionality for the drag-and-drop box
                            const uploadBox = document.getElementById('uploadBox');
                            uploadBox.addEventListener('dragover', function(event) {
                                event.preventDefault();
                                uploadBox.style.borderColor = '#007bff'; // Change border color when dragging over
                            });

                            uploadBox.addEventListener('dragleave', function() {
                                uploadBox.style.borderColor = '#ccc'; // Reset border color when drag leaves
                            });

                            uploadBox.addEventListener('drop', function(event) {
                                event.preventDefault();
                                const fileInput = document.getElementById('paymentProof');
                                const files = event.dataTransfer.files;

                                // If a file is dropped, set it in the input field
                                if (files.length > 0) {
                                    fileInput.files = files;
                                    updateFileName(); // Display the selected file name
                                }
                            });
                        </script>



                        <!-- Catatan untuk Pengguna -->
                        <div class="alert alert-warning mt-3" role="alert" style="font-size: 0.9rem;">
                            <i class="fas fa-info-circle" style="margin-right: 5px;"></i> <strong>Catatan:</strong> Booking Anda akan dikonfirmasi dalam 12 jam setelah upload bukti pembayaran. Anda akan menerima konfirmasi via email.
                        </div>

                        <!-- Button Konfirmasi Pembayaran -->
                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-secondary" id="continueBtn" style="padding: 12px; border-radius: 50px; font-weight: bold; background-color: #28a745; border: none; color: #fff; transition: background-color 0.3s ease;">
                                <i class="fas fa-arrow-right" style="margin-right: 5px;"></i> Konfirmasi Pembayaran
                            </button>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>


<!-- Button to Open Modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#paymentSuccessModal">
    Lihat Pembayaran
</button>

<!-- Modal -->
<div class="modal fade" id="paymentSuccessModal" tabindex="-1" aria-labelledby="paymentSuccessModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content" style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #28a745; color: white; border-top-left-radius: 10px; border-top-right-radius: 10px;">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body" style="font-family: Arial, sans-serif; font-size: 0.9rem; padding: 15px; background-color: #f8f9fa; border-radius: 10px;">
                <h5 style="color: #007bff;">Pembayaran Berhasil</h5>

                <div style="border: 2px solid #28a745; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
                    <!-- Booking Information -->
                    <div style="margin-bottom: 15px;">
                        <h5 style="color: #007bff;">WHILE SHARK TRIP</h5>
                        <p><strong>Booking ID:</strong> W551962582</p>
                        <p><strong>Booking Date:</strong> 29/09/2023</p>
                    </div>

                    <!-- Personal Details -->
                    <div style="margin-bottom: 15px;">
                        <h6 style="color: #007bff;">Detail Pemesanan:</h6>
                        <p><strong>Nama Pemesan:</strong> John Doe</p>
                        <p><strong>Email:</strong> johndoe@example.com</p>
                        <p><strong>Nomor HP:</strong> +628123456789</p>
                    </div>

                    <!-- Trip Details -->
                    <div style="margin-bottom: 15px;">
                        <h6 style="color: #007bff;">Detail Trip:</h6>
                        <p><strong>Tanggal Trip:</strong> 5 Oktober 2025</p>
                        <p><strong>Waktu Keberangkatan:</strong> 06:00 WIB (Rekomendasi)</p>
                    </div>

                    <!-- Payment Details with Border -->

                    <h6 style="color: #007bff;">Pembayaran:</h6>
                    <p><strong>Metode Pembayaran:</strong> ShopeePay</p>
                    <p><strong>Status:</strong> Pending</p>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-primary btn-sm" onclick="downloadInvoice()">Download Invoice</button>
                    <button type="button" class="btn btn-info btn-sm" onclick="sendInvoiceToWA()">Kirim Invoice ke WA</button>
                </div>

                <!-- Button for New Booking -->
                <div class="d-flex justify-content-center mt-3">
                    <button type="button" class="btn btn-success btn-sm" style="font-weight: bold;" data-bs-dismiss="modal">
                        Booking Baru
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

<script>
    // Function to download invoice (Placeholder)
    function downloadInvoice() {
        alert("Download Invoice - Placeholder");
    }

    // Function to send invoice to WhatsApp (Placeholder)
    function sendInvoiceToWA() {
        const phoneNumber = "628123456789"; // WhatsApp number to send invoice
        const message = "Invoice Pembayaran Trip Whale Shark"; // Message
        const url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
        window.open(url, '_blank'); // Opens WhatsApp with prefilled message
    }
</script>



<style>
    /* Modal Header Styling */
    .modal-header {
        background-color: #28a745;
        /* Green header */
        color: white;
        /* White text */
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        font-weight: bold;
    }

    /* Modal Body Styling */
    .modal-body {
        font-family: Arial, sans-serif;
        font-size: 1rem;
        padding: 30px;
        background-color: #f8f9fa;
        /* Light background */
        border-radius: 20px;
    }

    /* Box Styling for Booking Information, Trip Details, Payment Details */
    .modal-body div {
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #ddd;
        /* Soft separator */
    }

    /* Title Styling */
    .modal-body h4,
    .modal-body h5 {
        color: #007bff;
        /* Blue title */
    }

    /* Button Styling */
    .btn {
        font-weight: bold;
        border-radius: 50px;
        padding: 12px;
        transition: background-color 0.3s ease;
    }

    /* Custom Button for Download Invoice */
    .btn-primary {
        background-color: #007bff;
        color: white;
        border: none;
    }

    /* Custom Button for Send to WhatsApp */
    .btn-info {
        background-color: #17a2b8;
        color: white;
        border: none;
    }

    /* Booking Baru Button Styling */
    .btn-success {
        background-color: #28a745;
        color: white;
        border: none;
    }

    /* Add Hover Effect */
    .btn:hover {
        opacity: 0.9;
    }

    /* Modal Close Button */
    .btn-close {
        color: white;
        background-color: transparent;
        border: none;
    }

    /* Modal Content Border */
    .modal-content {
        border-radius: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        /* Soft shadow around modal */
    }

    /* Modal Footer */
    .modal-footer {
        border-top: 1px solid #ddd;
        /* Divider between body and footer */
    }

    /* General Alert Styling */
    .alert {
        font-size: 1rem;
        margin-top: 10px;
    }

    .alert-info {
        background-color: #d1ecf1;
        border-color: #bee5eb;
        color: #0c5460;
    }

    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }

    .alert-warning {
        background-color: #fff3cd;
        border-color: #ffeeba;
        color: #856404;
    }

    /* Styling for File Input with Drag-and-Drop */
    input[type="file"] {
        display: none;
    }

    .text-center {
        text-align: center;
    }

    .border-secondary {
        border: 2px dashed #28a745;
        /* Green dashed border for file upload */
        border-radius: 10px;
        padding: 20px;
        cursor: pointer;
    }

    .text-center i {
        font-size: 3rem;
        color: #007bff;
    }
</style>


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