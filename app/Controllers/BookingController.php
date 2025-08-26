<?php

namespace App\Controllers;

use App\Models\M_BookingDetails;
use CodeIgniter\Controller;

class BookingController extends Controller
{
    public function proses_booking()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $paymentModel = new M_BookingDetails();

        $data = [
            'user_id'      => session()->get('id'),
            'full_name'    => $this->request->getPost('fullName'),
            'email'        => $this->request->getPost('email'),
            'kontak'       => $this->request->getPost('mobile'),
            'jumlah_orang' => $this->request->getPost('peopleCount'),
            'total_biaya'  => $this->hitungTotalBiaya($this->request->getPost('peopleCount')),
            'role_payment' => 'Pending',
            'created_at'   => date('Y-m-d H:i:s')
        ];

        $insertId = $paymentModel->insert($data);

        if ($insertId) {
            return redirect()->to('/payment/' . $insertId)->with('success', 'Pemesanan berhasil!');
        }

        return redirect()->to('/booking')->with('error', 'Gagal memproses pemesanan. Silakan coba lagi.');
    }



    // Fungsi untuk menghitung total biaya
    private function hitungTotalBiaya($jumlahOrang)
    {
        $hargaPerOrang = 650000; // Harga per orang
        return $jumlahOrang * $hargaPerOrang;
    }
}
