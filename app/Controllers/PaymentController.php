<?php namespace App\Controllers;

use CodeIgniter\Controller;
use Midtrans\Snap;
use Midtrans\Config;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Memuat konfigurasi Midtrans
        $config = config('Midtrans');
        Config::$serverKey = $config->serverKey;
        Config::$isProduction = $config->isProduction;
        Config::$isSanitized = $config->isSanitized;
        Config::$is3ds = $config->is3ds;
    }

    public function createTransaction()
    {
        // Data transaksi yang akan diteruskan ke Midtrans
        $transaction_details = [
            'order_id' => 'ORDER12345',  // ID transaksi unik
            'gross_amount' => 650000,    // Total biaya transaksi
        ];

        // Detail item pembelian
        $item_details = [
            [
                'id' => 'ITEM123',
                'price' => 650000,
                'quantity' => 1,
                'name' => 'Open Trip Whale Shark'
            ]
        ];

        // Informasi pelanggan
        $customer_details = [
            'first_name'    => 'John',
            'last_name'     => 'Doe',
            'email'         => 'john@example.com',
            'phone'         => '+6281234567890',
        ];

        // Data transaksi untuk dikirim ke Midtrans
        $transaction_data = [
            'transaction_details' => $transaction_details,
            'item_details'        => $item_details,
            'customer_details'    => $customer_details
        ];

        // Mengambil Snap Token dari Midtrans
        try {
            $snap_token = Snap::getSnapToken($transaction_data);
        } catch (\Exception $e) {
            // Tangani error jika ada masalah saat mengambil token
            return redirect()->to('/payment/error');
        }

        // Kirim Snap Token ke view untuk frontend
        return view('payment', ['snap_token' => $snap_token]);
    }
}