<?php

namespace App\Controllers;

use App\Models\M_BookingDetails;
use App\Models\M_JadwalTrip;
use App\Models\M_Feedback;
use App\Models\M_SettingPayments;
use App\Models\M_KelolaWisata;
use App\Models\M_Promosi;

class Administrator extends BaseController
{
    public function dashboard(): string
    {
        $data = [
            'title' => 'Dashboard',
        ];
        return view('administrator/dashboard', $data);
    }

    public function kelola_jadwal(): string
    {
        $jadwalModel = new M_JadwalTrip();
        $jadwals = $jadwalModel->orderBy('created_at', 'DESC')->findAll();
        $currentMonth = date('m');
        $currentYear = date('Y');
        $jadwal = $jadwalModel->getJadwalByMonth($currentMonth, $currentYear);

        $data = [
            'title' => 'Kelola Jadwal',
            'jadwals' => $jadwals,
            'jadwal' => $jadwal,
            'currentMonth' => $currentMonth,
            'currentYear' => $currentYear
        ];

        return view('administrator/kelola_jadwal', $data);
    }

    public function kelola_pesanan(): string
    {
        $bookingModel = new M_BookingDetails();

        $bookings = $bookingModel->orderBy('updated_at', 'DESC')->findAll();

        $data = [
            'title'   => 'Kelola Pesanan',
            'bookings' => $bookings,
        ];

        return view('administrator/kelola_pesanan', $data);
    }

    public function update_booking($bookingCode)
    {
        $model = new M_BookingDetails();

        // Cari berdasarkan id_bookings (bukan primary key id)
        $booking = $model->where('id_bookings', $bookingCode)->first();

        if (!$booking) {
            return redirect()->to('/kelola_pesanan')
                ->with('error', 'Pemesanan tidak ditemukan.');
        }

        // Data dari form (sesuai name= di input)
        $updatedData = [
            'full_name'    => $this->request->getPost('fullName'),
            'paket'        => $this->request->getPost('paket'),
            'jumlah_orang' => $this->request->getPost('jumlah_orang'),
            'total_biaya'  => $this->request->getPost('total_biaya'),
            'role_payment' => $this->request->getPost('rolePayment'),
            'updated_at'   => date('Y-m-d H:i:s'),
        ];

        // Update pakai primary key (id) milik row yang ketemu
        $updated = $model->update($booking['id'], $updatedData);

        if ($updated) {
            return redirect()->to('/kelola_pesanan')
                ->with('success', 'Pemesanan berhasil diperbarui!');
        }

        return redirect()->to('/kelola_pesanan')
            ->with('error', 'Gagal memperbarui pemesanan. Silakan coba lagi.');
    }

    public function delete_booking($booking_id)
    {
        $model = new M_BookingDetails();

        $deleted = $model->delete($booking_id);

        if ($deleted) {
            return redirect()->to('/kelola_pesanan')->with('success', 'Pemesanan berhasil dihapus!');
        }

        return redirect()->to('/kelola_pesanan')->with('error', 'Gagal menghapus pemesanan. Silakan coba lagi.');
    }





    public function kelola_paket_wisata(): string
    {
        $model = new M_KelolaWisata();

        $data = [
            'title' => 'Kelola Wisata',
            'wisata' => $model->findAll(),
        ];

        return view('administrator/kelola_paket_wisata', $data);
    }

    public function update_wisata()
    {
        $model = new M_KelolaWisata();
        $id = $this->request->getPost('id');


        $data = [
            'nama_wisata' => $this->request->getPost('nama_wisata'),
            'kategori' => $this->request->getPost('kategori'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $this->request->getFileMultiple('gambar')
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/kelola_wisata')->with('success', 'Wisata berhasil diperbarui!');
        } else {
            return redirect()->to('/kelola_wisata')->with('error', 'Gagal memperbarui wisata, silakan coba lagi.');
        }
    }

    public function delete_wisata($id)
    {
        $model = new M_KelolaWisata();

        $wisata = $model->find($id);


        if ($model->delete($id)) {
            return redirect()->to('/kelola_wisata')->with('success', 'Wisata berhasil dihapus!');
        } else {
            return redirect()->to('/kelola_wisata')->with('error', 'Gagal menghapus wisata, silakan coba lagi.');
        }
    }



    public function data_wisatawan(): string
    {
        $model = new M_BookingDetails();

        $data = [
            'title' => 'Data Wisatawan',
            'wisatawan' => $model->findAll(),
        ];

        return view('administrator/data_wisatawan', $data);
    }

    public function promosi()
    {
        $model = new M_Promosi();
        $data = [
            'title' => 'Promosi ',
            'promosi' => $model->findAll(),
        ];
        return view('administrator/promosi', $data);
    }


    public function feedback(): string
    {
        $model = new M_Feedback();
        $feedback = $model->findAll();

        $data = [
            'title' => 'Kelola Ulasan',
            'feedbacks' => $feedback,  // Kirim data ulasan ke view
        ];

        return view('administrator/feedback', $data);
    }


    public function update_ulasan()
    {
        // Membuat instance dari model M_Feedback
        $model = new M_Feedback();

        // Mendapatkan data dari form yang dikirim
        $id = $this->request->getPost('id');
        $ulasan = $this->request->getPost('ulasan');
        $pengalaman_rating = $this->request->getPost('pengalaman_rating');
        $pemandu_rating = $this->request->getPost('pemandu_rating');
        $fasilitas_rating = $this->request->getPost('fasilitas_rating');

        // Validasi input rating (harus antara 1 dan 5)
        if ($pengalaman_rating < 1 || $pengalaman_rating > 5 || $pemandu_rating < 1 || $pemandu_rating > 5 || $fasilitas_rating < 1 || $fasilitas_rating > 5) {
            return redirect()->back()->with('error', 'Rating harus antara 1 dan 5.');
        }

        // Siapkan data untuk diperbarui
        $data = [
            'ulasan' => $ulasan,
            'pengalaman_rating' => $pengalaman_rating,
            'pemandu_rating' => $pemandu_rating,
            'fasilitas_rating' => $fasilitas_rating
        ];

        // Update ulasan di database
        if ($model->update($id, $data)) {
            return redirect()->to('/kelola_ulasan')->with('success', 'Ulasan berhasil diperbarui!');
        } else {
            return redirect()->to('/kelola_ulasan')->with('error', 'Gagal memperbarui ulasan, silakan coba lagi.');
        }
    }

    public function delete_ulasan($id)
    {
        $model = new M_Feedback();

        $ulasan = $model->find($id);

        if (!$ulasan) {
            return redirect()->to('/kelola_ulasan')->with('error', 'Ulasan tidak ditemukan.');
        }

        // Lakukan penghapusan
        if ($model->delete($id)) {
            return redirect()->to('/kelola_ulasan')->with('success', 'Ulasan berhasil dihapus!');
        } else {
            return redirect()->to('/kelola_ulasan')->with('error', 'Gagal menghapus ulasan, silakan coba lagi.');
        }
    }



    public function setting(): string
    {
        $data = [
            'title' => 'Setting ',
        ];
        return view('administrator/setting', $data);
    }

    public function setting_payments(): string
    {
        $model = new M_SettingPayments();
        $data = [
            'title' => 'Setting Payments',
            'payments' => $model->findAll()
        ];

        return view('administrator/setting_payments', $data);
    }


    public function login(): string
    {
        $data = [
            'title' => 'Login Administrator',
        ];
        return view('administrator/login', $data);
    }
}