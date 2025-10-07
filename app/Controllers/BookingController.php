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
        $generateID = $paymentModel->generateIdBooking();

        $data = [
            'user_id'      => session()->get('id'),
            'full_name'    => $this->request->getPost('fullName'),
            'email'        => $this->request->getPost('email'),
            'kontak'       => $this->request->getPost('mobile'),
            'jumlah_orang' => $this->request->getPost('peopleCount'),
            'paket'        => 'Open Trip Whale Shark Teluk Saleh',
            'id_bookings'  => $generateID,
            'total_biaya'  => $this->hitungTotalBiaya($this->request->getPost('peopleCount')),
            'created_at'   => date('Y-m-d H:i:s')
        ];

        $insertId = $paymentModel->insert($data);

        if ($insertId) {
            return redirect()->to('/booking_jadwal/' . $insertId)->with('success', 'Pemesanan berhasil!');
        }

        return redirect()->to('/booking')->with('error', 'Gagal memproses pemesanan. Silakan coba lagi.');
    }



    private function hitungTotalBiaya($jumlahOrang)
    {
        $hargaPerOrang = 650000;
        return $jumlahOrang * $hargaPerOrang;
    }






    public function add_jadwal()
    {
        $id = $this->request->getPost('id');
        $tripDate = $this->request->getPost('tripDate');
        $departureTime = $this->request->getPost('departureTime');

        $model_booking = new M_BookingDetails();

        $booking = $model_booking->where('id', $id)->first();

        if (!$booking) {
            return redirect()->to('/booking')->with('error', 'Booking tidak ditemukan.');
        }

        $data = [
            'tanggal_trip' => $tripDate,
            'jam_trip'     => $departureTime,
            'updated_at'   => date('Y-m-d H:i:s')
        ];

        $updateStatus = $model_booking->update($id, $data);

        if ($updateStatus) {
            return redirect()->to('/booking_payment/' . $id)->with('success', 'Pemesanan berhasil diperbarui!');
        }

        return redirect()->to('/booking')->with('error', 'Gagal memperbarui pemesanan. Silakan coba lagi.');
    }

    public function add_payments()
    {
        $model = new M_BookingDetails();

        $id = $this->request->getPost('id');
        $payment_channel = $this->request->getPost('payment_channel');

        $booking = $model->where('id', $id)->first();

        if (!$booking) {
            return redirect()->to('/booking')->with('error', 'Booking tidak ditemukan.');
        }
        $data = [
            'mode_pembayaran' => $payment_channel,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $updatePayment = $model->update($id, $data);

        if ($updatePayment) {
            return redirect()->to('/verifikasi/' . $id)->with('success', 'Pembayaran Berhasil!');
        }

        return redirect()->to('/booking_payment/' . $id)->with('error', 'Gagal melakukan Pembayaran. Silakan coba lagi.');
    }
    public function add_bukti()
    {
        if (!$this->validate([
            'paymentProof' => 'uploaded[paymentProof]|max_size[paymentProof,1024]|ext_in[paymentProof,jpg,jpeg,png,pdf]' // Maksimal 1MB dan hanya ekstensi jpg, jpeg, png, pdf
        ])) {
            return redirect()->back()->with('error', 'File yang diupload tidak valid!')->withInput();
        }

        $file = $this->request->getFile('paymentProof');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();

            $file->move(FCPATH . 'uploads/bukti_bayar', $fileName);

            $idBooking = $this->request->getPost('id');

            $model = new M_BookingDetails();
            $model->update($idBooking, [
                'upload_gambar' => $fileName
            ]);

            // Berikan pesan sukses dan redirect
            session()->setFlashdata('success', 'Bukti pembayaran berhasil diupload.');
            return redirect()->to('payment/success/' . $idBooking)->with('success', 'Pembayaran Berhasil!');
        } else {
            // Jika upload gagal, tampilkan pesan error
            session()->setFlashdata('error', 'Terjadi kesalahan saat mengupload file.');
            return redirect()->back()->withInput();
        }
    }

    public function add_buki()
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
