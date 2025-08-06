<?php namespace App\Controllers;

use CodeIgniter\Controller;
use Midtrans\Notification;
use Midtrans\Config;

class PaymentCallbackController extends Controller
{
    public function notification()
    {
        // Ambil notifikasi dari Midtrans
        $notification = new Notification();

        // Verifikasi status transaksi
        $transaction_status = $notification->transaction_status;
        $order_id = $notification->order_id;

        // Tangani status transaksi sesuai status dari Midtrans
        if ($transaction_status == 'capture') {
            // Pembayaran berhasil
            // Lakukan sesuatu, misalnya update status transaksi ke database
            // ...
        } elseif ($transaction_status == 'pending') {
            // Pembayaran pending
            // ...
        } elseif ($transaction_status == 'deny') {
            // Pembayaran gagal
            // ...
        }

        // Kirim response yang diharapkan oleh Midtrans
        return json_encode(['status' => 'success']);
    }
}