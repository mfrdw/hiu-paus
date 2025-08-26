<?php

namespace App\Controllers;

use App\Models\M_PaymentDetails;
use CodeIgniter\Controller;

class BookingController extends Controller
{
   public function proses_booking()
{
    // Cek apakah pengguna sudah login
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
    }

    // Memuat model
    $paymentModel = new M_PaymentDetails();

    // Mengambil data dari form
    $data = [
        'user_id'       => session()->get('id'),
        'full_name'     => $this->request->getPost('fullName'),
        'email'         => $this->request->getPost('email'),
        'kontak'        => $this->request->getPost('mobile'),
        'jumlah_orang'  => $this->request->getPost('peopleCount'),
        'total_biaya'   => $this->hitungTotalBiaya($this->request->getPost('peopleCount')),
        'role_payment'  => 'Pending', // Status pembayaran, Anda bisa sesuaikan sesuai kebutuhan
        'created_at'    => date('Y-m-d H:i:s') // Waktu pembuatan data
    ];

    // Coba simpan data pemesanan
    if ($paymentModel->save($data)) {
        // Jika berhasil
        return redirect()->to('/payment')->with('success', 'Pemesanan berhasil!');
    } else {
        // Jika gagal menyimpan data
        $errors = $paymentModel->errors();  // Ambil pesan error dari model
        dd($errors);  // Tampilkan pesan error (untuk debugging)
        
        return redirect()->to('/booking')->with('error', 'Gagal memproses pemesanan. Silakan coba lagi.');
    }
}


    // Fungsi untuk menghitung total biaya
    private function hitungTotalBiaya($jumlahOrang)
    {
        $hargaPerOrang = 650000; // Harga per orang
        return $jumlahOrang * $hargaPerOrang;
    }
}