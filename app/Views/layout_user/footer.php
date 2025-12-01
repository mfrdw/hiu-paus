
<footer class="mt-5 pt-4 pb-4 bg-light border-top" id="kontak">
    <div class="container-fluid">
        <div class="row">

            <!-- MAP -->
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="ratio ratio-4x3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1994.8404155936314!2d123.0968980064535!3d0.47565989987942203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x327f2b1ebb06a7ad%3A0x6e207bf0624d792f!2sWisata%20Hiu%20Paus%20Botubarani%20Gorontalo!5e0!3m2!1sid!2sid!4v1764513150872!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <!-- CONTACT FORM -->
            <div class="col-md-6">
                <h5 class="mb-3">Kontak</h5>

                <form action="<?= site_url('kontak/kirim'); ?>" method="post">
                    <?= csrf_field(); ?>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name*</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-Mail*</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject*</label>
                        <input type="text" name="subject" id="subject" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message*</label>
                        <textarea name="message" id="message" rows="4" class="form-control" required></textarea>
                    </div>

                    <!-- SIMPLE CAPTCHA -->
                    <div class="mb-3">
                        <label for="captcha" class="form-label">
                            Please prove that you are human by solving the equation *
                        </label>
                        <input type="text" name="captcha" id="captcha" class="form-control" placeholder="1 + 0 = ?" required>
                    </div>

                    <button type="submit" class="btn btn-light px-4">
                        Submit
                    </button>
                </form>
            </div>

        </div>
    </div>
</footer>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>