<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Open Trip Whale Shark</title>
</head>

<body>
    <h2>Pembayaran Open Trip Whale Shark Teluk Saleh</h2>

    <!-- Tombol untuk memulai pembayaran -->
    <button id="pay-button">Bayar Sekarang</button>

    <!-- Script Midtrans Snap -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= config('Midtrans')->clientKey ?>">
    </script>
    <script>
    // Token Snap dari PHP
    var snapToken = "<?= $snap_token ?>";

    // Menangani klik pada tombol pembayaran
    document.getElementById('pay-button').onclick = function() {
        snap.pay(snapToken, {
            onSuccess: function(result) {
                alert("Pembayaran Berhasil");
                // Lakukan aksi setelah pembayaran berhasil, misalnya redirect ke halaman sukses
                window.location.href = '/payment/success';
            },
            onPending: function(result) {
                alert("Pembayaran Tertunda");
            },
            onError: function(result) {
                alert("Pembayaran Gagal");
            }
        });
    };
    </script>
</body>

</html>