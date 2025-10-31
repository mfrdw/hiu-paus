<?php

namespace App\Controllers;

use App\Models\M_BookingDetails;
use App\Models\M_BookingDetailsVisitors;
use App\Models\M_Promosi;
use App\Models\M_JadwalTrip;
use CodeIgniter\Controller;

class BookingController extends Controller
{

    protected $db;

    public function __construct()
    {
        // Load database service
        $this->db = \Config\Database::connect();
    }
    public function proses_booking()
    {
        // Pastikan user sudah login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Memulai transaksi
        $this->db->transStart();

        try {
            // Membuat ID booking baru
            $paymentModel = new M_BookingDetails();
            $generateID = $paymentModel->generateIdBooking();

            // Menyiapkan data untuk tabel booking_details
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

            // Insert ke tabel booking_details
            $insertId = $paymentModel->insert($data);

            // Debugging untuk memastikan apakah insert berhasil
            log_message('debug', 'Booking Details Insert ID: ' . $insertId);

            // Jika insert booking_details gagal, rollback dan tampilkan error
            if (!$insertId) {
                $this->db->transRollback();
                return redirect()->to('/booking')->with('error', 'Gagal memproses pemesanan. Silakan coba lagi.');
            }

            // Ambil data pengunjung
            $visitors = $this->request->getPost('visitors');
            log_message('debug', 'Data pengunjung yang diterima: ' . print_r($visitors, true)); // Debugging data pengunjung

            // Model untuk tabel bookings_details_visitors
            $visitorModel = new M_BookingDetailsVisitors();

            // Siapkan array untuk insert data pengunjung
            $visitorData = [];
            foreach ($visitors as $index => $visitor) {
                $visitorData[] = [
                    'id_bookings'      => $generateID,
                    'nama_visitors'    => $visitor['fullName'],
                    'usia'             => $visitor['age'],
                    'jenis_kelamin'    => $visitor['gender'],
                    'kewarganegaraan'  => $visitor['citizenship'],
                    'created_at'       => date('Y-m-d H:i:s'),
                    'updated_at'       => date('Y-m-d H:i:s')
                ];
            }

            // Debugging untuk memastikan array data pengunjung sudah benar
            log_message('debug', 'Visitor Data: ' . print_r($visitorData, true));

            // Insert data pengunjung ke tabel bookings_details_visitors
            if ($visitorModel->insertBatch($visitorData)) {
                // Commit transaksi jika semua berhasil
                $this->db->transCommit();
                return redirect()->to('/booking_jadwal/' . $insertId)->with('success', 'Pemesanan berhasil!');
            } else {
                // Jika gagal menyimpan data pengunjung, rollback transaksi
                $this->db->transRollback();
                return redirect()->to('/booking')->with('error', 'Gagal menyimpan data pengunjung. Silakan coba lagi.');
            }
        } catch (\Exception $e) {
            // Jika terjadi error, rollback transaksi
            $this->db->transRollback();
            log_message('error', 'Error occurred: ' . $e->getMessage()); // Log error
            return redirect()->to('/booking')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }






    private function hitungTotalBiaya($jumlahOrang)
    {
        $hargaPerOrang = 650000;
        return $jumlahOrang * $hargaPerOrang;
    }





    public function add_jadwal()
    {
        // Ambil data dari request POST
        $id = $this->request->getPost('id');
        $tripDate = $this->request->getPost('tripDate');
        $departureTime = $this->request->getPost('departureTime');
        $jumlahOrang = $this->request->getPost('jumlahOrang');  // Menangkap jumlah orang

        // Model untuk Booking Details
        $model_booking = new M_BookingDetails();
        // Model untuk Jadwal Trip
        $model_jadwal_trip = new M_JadwalTrip();

        // Ambil booking berdasarkan ID
        $booking = $model_booking->where('id', $id)->first();

        if (!$booking) {
            return redirect()->to('/booking')->with('error', 'Booking tidak ditemukan.');
        }

        // Data yang akan diupdate di booking
        $data = [
            'tanggal_trip' => $tripDate,
            'jam_trip'     => $departureTime,
            'updated_at'   => date('Y-m-d H:i:s')
        ];

        // Update data booking
        $updateStatus = $model_booking->update($id, $data);

        if ($updateStatus) {
            // Setelah berhasil update booking, kita akan update M_JadwalTrip
            // Cari trip dengan paket dan tanggal trip yang sesuai
            $jadwalTrip = $model_jadwal_trip->where('paket', $booking['paket'])
                ->where('tanggal', $tripDate)
                ->first();

            if ($jadwalTrip) {
                // Hitung nilai terisi baru (jumlah orang ditambah dengan terisi sebelumnya)
                $terisi = $jadwalTrip['terisi'] + $jumlahOrang;
                $sisa = $jadwalTrip['kapasitas'] - $terisi;

                // Update kolom 'terisi' dan 'sisa' secara manual
                $model_jadwal_trip->update($jadwalTrip['id'], [
                    'terisi'    => $terisi,
                    'sisa'      => $sisa,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

                // Redirect dengan sukses
                return redirect()->to('/booking_payment/' . $id)->with('success', 'Pemesanan berhasil diperbarui!');
            }

            return redirect()->to('/booking_jadwal/' . $id)->with('error', 'Jadwal tidak ditemukan atau tidak tersedia.');
        }

        return redirect()->to('/booking')->with('error', 'Gagal memperbarui pemesanan. Silakan coba lagi.');
    }




    public function add_payments()
    {
        $model = new M_BookingDetails();
        $promo = new M_Promosi();  // Model untuk mengambil data promosi (voucher)

        $id = $this->request->getPost('id');  // Booking ID
        $payment_channel = $this->request->getPost('payment_channel');  // Payment method
        $voucherData = $this->request->getPost('voucher');  // Array of selected vouchers

        // Ambil data booking berdasarkan ID
        $booking = $model->where('id', $id)->first();

        if (!$booking) {
            return redirect()->to('/booking_payment/' . $id)->with('error', 'Booking tidak ditemukan.');
        }

        // Inisialisasi data voucher yang dipilih
        $voucherId = null;
        $voucherDiskon = 0;

        // Periksa apakah ada voucher yang dipilih
        if (!empty($voucherData)) {
            foreach ($voucherData as $voucher) {
                $voucherId = $voucher['id'];  // ID Voucher
                $voucherDiskon = $voucher['diskon'];  // Nilai diskon voucher
            }
        }

        // Hitung total biaya setelah diskon
        $totalBiaya = $booking['total_biaya'];  // Total biaya sebelum diskon
        $totalBiayaSetelahDiskon = $totalBiaya - $voucherDiskon;  // Total biaya setelah dikurangi diskon

        // Siapkan data untuk update pembayaran
        $data = [
            'mode_pembayaran' => $payment_channel,
            'voucher' => $voucherId,  // Simpan ID voucher yang dipilih
            'nilai_voucher' => $voucherDiskon,  // Simpan nilai diskon
            'total_biaya' => $totalBiayaSetelahDiskon,  // Update total biaya setelah diskon
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Update data pembayaran di booking_details
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




    // private
    public function proses_booking_private()
    {
        // Pastikan user sudah login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Memulai transaksi
        $this->db->transStart();

        try {
            // Membuat ID booking baru
            $paymentModel = new M_BookingDetails();
            $generateID = $paymentModel->generateIdBooking(); // Pastikan Anda memiliki metode generateIdBooking()

            // Menyiapkan data untuk tabel booking_details
            $data = [
                'user_id'      => session()->get('id'),
                'full_name'    => $this->request->getPost('fullName'),
                'email'        => $this->request->getPost('email'),
                'kontak'       => $this->request->getPost('mobile'),
                'jumlah_orang' => (int) $this->request->getPost('peopleCount'),
                'paket'        => 'Private Trip Whale Shark Teluk Saleh',
                'id_bookings'  => $generateID,
                'total_biaya'  => $this->hitungTotalBiayaPrivate($this->request->getPost('peopleCount')),
                'created_at'   => date('Y-m-d H:i:s')
            ];

            // Insert ke tabel booking_details
            $insertId = $paymentModel->insert($data);

            // Debugging untuk memastikan apakah insert berhasil
            log_message('debug', 'Booking Details Insert ID: ' . $insertId);

            // Jika insert booking_details gagal, rollback dan tampilkan error
            if (!$insertId) {
                $this->db->transRollback();
                return redirect()->to('/booking_private')->with('error', 'Gagal memproses pemesanan. Silakan coba lagi.');
            }

            // Ambil data pengunjung
            $visitors = $this->request->getPost('visitors');
            log_message('debug', 'Data pengunjung yang diterima: ' . print_r($visitors, true)); // Debugging data pengunjung

            // Model untuk tabel bookings_details_visitors
            $visitorModel = new M_BookingDetailsVisitors();

            // Siapkan array untuk insert data pengunjung
            $visitorData = [];
            foreach ($visitors as $index => $visitor) {
                $visitorData[] = [
                    'id_bookings'      => $generateID,
                    'nama_visitors'    => $visitor['fullName'],
                    'usia'             => $visitor['age'],
                    'jenis_kelamin'    => $visitor['gender'],
                    'kewarganegaraan'  => $visitor['citizenship'],
                    'created_at'       => date('Y-m-d H:i:s'),
                    'updated_at'       => date('Y-m-d H:i:s')
                ];
            }

            // Debugging untuk memastikan array data pengunjung sudah benar
            log_message('debug', 'Visitor Data: ' . print_r($visitorData, true));

            // Insert data pengunjung ke tabel bookings_details_visitors
            if ($visitorModel->insertBatch($visitorData)) {
                // Commit transaksi jika semua berhasil
                $this->db->transCommit();
                return redirect()->to('/booking_jadwal/' . $insertId)->with('success', 'Pemesanan berhasil!');
            } else {
                // Jika gagal menyimpan data pengunjung, rollback transaksi
                $this->db->transRollback();
                return redirect()->to('/booking_private')->with('error', 'Gagal menyimpan data pengunjung. Silakan coba lagi.');
            }
        } catch (\Exception $e) {
            // Jika terjadi error, rollback transaksi
            $this->db->transRollback();
            log_message('error', 'Error occurred: ' . $e->getMessage()); // Log error
            return redirect()->to('/booking_private')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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
