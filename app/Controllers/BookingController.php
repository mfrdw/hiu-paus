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
            // Debugging insertId
            var_dump($insertId);
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

    public function update_payments()
    {
        $bookingModel = new M_BookingDetails();

        // Ambil data dari form
        $bookingId     = $this->request->getPost('booking_id');
        $paymentMode   = $this->request->getPost('paymentMode');     // 'ewallet' | 'bank'
        $ewalletChoice = $this->request->getPost('ewalletChoice');    // 'gopay' | 'dana' | 'qris'
        $bankAccount   = $this->request->getPost('bankAccount');      // nomor rekening BNI
        $totalCost     = $this->request->getPost('totalCost');

        // Ambil data lama (untuk mempertahankan upload_gambar jika tidak upload baru)
        $old = $bookingModel->find($bookingId);
        if (!$old) {
            return redirect()->back()->with('error', 'Data booking tidak ditemukan.');
        }

        $file = $this->request->getFile('paymentProof');
        $fileName = $old['upload_gambar'] ?? null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/bukti_bayar', $fileName);
        }

        $finalMethod = null;
        $data = [
            'total_biaya'     => $totalCost,
            'upload_gambar'   => $fileName,
        ];

        if ($paymentMode === 'ewallet') {
            $allowed = ['gopay', 'dana', 'qris'];
            if (!in_array($ewalletChoice, $allowed, true)) {
                return redirect()->back()->with('error', 'E-wallet tidak valid.');
            }
            $finalMethod = $ewalletChoice;
        } elseif ($paymentMode === 'bank') {
            if (empty($bankAccount)) {
                return redirect()->back()->with('error', 'Nomor rekening BNI wajib diisi untuk pembayaran via bank.');
            }

            $finalMethod = 'bni';
            $data['bank_account'] = $bankAccount;
        } else {
            return redirect()->back()->with('error', 'Mode pembayaran tidak dikenal.');
        }

        $data['mode_pembayaran'] = $finalMethod;

        // Update data booking
        $bookingModel->update($bookingId, $data);

        // Redirect ke halaman sukses dengan menyertakan ID pemesanan
        return redirect()->to('/payment/success/' . $bookingId)->with('message', 'Pembayaran berhasil diperbarui.');
    }


    // private
    public function proses_booking_private()
    {
        // Pastikan user sudah login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $paymentModel = new M_BookingDetails();

        // Ambil data dari form
        $fullName    = $this->request->getPost('fullName');
        $email       = $this->request->getPost('email');
        $mobile      = $this->request->getPost('mobile');
        $peopleCount = (int) $this->request->getPost('peopleCount');

        // Validasi data
        if (empty($fullName) || empty($email) || empty($mobile) || empty($peopleCount)) {
            return redirect()->to('/booking')->with('error', 'Semua kolom harus diisi.');
        }

        // Hitung total biaya berdasarkan jumlah orang
        $totalBiaya = $this->hitungTotalBiayaPrivate($peopleCount);

        $data = [
            'user_id'      => session()->get('id'),
            'full_name'    => $fullName,
            'email'        => $email,
            'kontak'       => $mobile,
            'jumlah_orang' => $peopleCount,
            'total_biaya'  => $totalBiaya,
            'role_payment' => 'pending',
            'created_at'   => date('Y-m-d H:i:s')
        ];

        // Coba insert data ke database
        try {
            $insertId = $paymentModel->insert($data);

            if ($insertId) {
                // Jika berhasil insert, redirect ke halaman pembayaran
                return redirect()->to('/payment/' . $insertId)->with('success', 'Pemesanan berhasil!');
            } else {
                // Jika gagal insert
                return redirect()->to('/booking')->with('error', 'Gagal memproses pemesanan. Silakan coba lagi.');
            }
        } catch (\Exception $e) {
            // Menangani error
            return redirect()->to('/booking')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Fungsi untuk menghitung total biaya berdasarkan jumlah orang
    private function hitungTotalBiayaPrivate($peopleCount)
    {
        // Sesuaikan harga sesuai dengan jumlah pax berdasarkan gambar
        $priceMap = [
            1 => 2800000,
            2 => 1450000,
            3 => 1050000,
            4 => 850000,
            5 => 800000,
            6 => 750000,
            7 => 650000,
            8 => 600000,
            9 => 550000,
            10 => 500000
        ];

        // Mengambil harga per pax dan menghitung total biaya
        if (isset($priceMap[$peopleCount])) {
            return $priceMap[$peopleCount] * $peopleCount; // Total biaya adalah harga per pax * jumlah orang
        } else {
            return 0; // Jika tidak ditemukan, kembalikan 0
        }
    }
}
