<?php

namespace App\Controllers;

use App\Models\M_BookingDetails;
use App\Models\M_JadwalTrip;
use App\Models\M_Users;
use App\Models\M_UlasanUsers;
use App\Models\M_KelolaWisata;
use App\Models\M_Promosi;

class Home extends BaseController
{
    public function index(): string
    {


        $model = new M_KelolaWisata();
        $model_promosi = new M_Promosi();

        $data = [
            'title' => 'Beranda',
            'wisata_pilihan' => $model->where('kategori', 'wisata_pilihan')->findAll(),
            'wisata_unggulan' => $model->where('kategori', 'wisata_unggulan')->findAll(),
            'promosi' => $model_promosi->where('status', 1)
                ->orderBy('updated_at', 'DESC')
                ->first()
        ];

        return view('pages/homepage', $data);
    }

    public function detail(): string
    {
        $model = new M_UlasanUsers();
        $ulasan = $model->getUlasanWithUser();

        $totalReviews = count($ulasan);

        if ($totalReviews === 0) {
            $ulasan = null;
        }

        $totalPengalaman = 0;
        $totalPemandu = 0;
        $totalFasilitas = 0;

        if ($ulasan) {
            foreach ($ulasan as $item) {
                $totalPengalaman += $item['pengalaman_rating'];
                $totalPemandu += $item['pemandu_rating'];
                $totalFasilitas += $item['fasilitas_rating'];
            }
        }

        $averagePengalaman = ($totalReviews > 0) ? $totalPengalaman / $totalReviews : 0;
        $averagePemandu = ($totalReviews > 0) ? $totalPemandu / $totalReviews : 0;
        $averageFasilitas = ($totalReviews > 0) ? $totalFasilitas / $totalReviews : 0;
        $averageRating = ($averagePengalaman + $averagePemandu + $averageFasilitas) / 3;

        $data = [
            'title' => 'Detail ',
            'ulasan' => $ulasan,
            'totalReviews' => $totalReviews,
            'averageRating' => round($averageRating, 1),
            'averagePengalaman' => round($averagePengalaman, 1),
            'averagePemandu' => round($averagePemandu, 1),
            'averageFasilitas' => round($averageFasilitas, 1)
        ];

        return view('pages/detail_wisata', $data);
    }





    public function detail_wisata_private(): string
    {
        $model = new M_UlasanUsers();
        $ulasan = $model->getUlasanWithUserPrivate();

        $totalReviews = count($ulasan);

        if ($totalReviews === 0) {
            $ulasan = null;
        }

        $totalPengalaman = 0;
        $totalPemandu = 0;
        $totalFasilitas = 0;

        if ($ulasan) {
            foreach ($ulasan as $item) {
                $totalPengalaman += $item['pengalaman_rating'];
                $totalPemandu += $item['pemandu_rating'];
                $totalFasilitas += $item['fasilitas_rating'];
            }
        }

        $averagePengalaman = ($totalReviews > 0) ? $totalPengalaman / $totalReviews : 0;
        $averagePemandu = ($totalReviews > 0) ? $totalPemandu / $totalReviews : 0;
        $averageFasilitas = ($totalReviews > 0) ? $totalFasilitas / $totalReviews : 0;
        $averageRating = ($averagePengalaman + $averagePemandu + $averageFasilitas) / 3;

        $data = [
            'title' => 'Detail ',
            'ulasan' => $ulasan,
            'totalReviews' => $totalReviews,
            'averageRating' => round($averageRating, 1),
            'averagePengalaman' => round($averagePengalaman, 1),
            'averagePemandu' => round($averagePemandu, 1),
            'averageFasilitas' => round($averageFasilitas, 1)
        ];

        return view('pages/detail_wisata_private', $data);
    }



    public function booking(): string
    {

        $data = [
            'title' => 'Booking ',
        ];

        return view('pages/booking', $data);
    }

    public function booking_jadwal($id): string
    {
        $model = new M_BookingDetails();
        $model_jadwal = new M_JadwalTrip();

        $booking = $model->where('id', $id)->first();

        $jadwal = $model_jadwal->where('paket', '')->findAll();

        $data = [
            'title' => 'Booking Jadwal',
            'booking' => $booking,
            'jadwal' => $jadwal
        ];

        return view('pages/booking_jadwal', $data);
    }
    public function get_jadwal_by_date()
    {
        $tanggal = $this->request->getGet('tanggal');

        $model_jadwal = new M_JadwalTrip();

        $jadwal = $model_jadwal->where('tanggal', $tanggal)->findAll();

        if ($jadwal) {
            return $this->response->setJSON($jadwal);
        } else {
            return $this->response->setJSON(['error' => 'Jadwal tidak ditemukan.']);
        }
    }




    public function booking_payment($id): string
    {
        $model = new M_BookingDetails();
        $booking = $model->where('id', $id)->first();

        $data = [
            'title' => 'Metode Pembayaran',
            'booking' => $booking
        ];

        return view('pages/booking_payment', $data);
    }

    public function verifikasi_pembayaran($id): string
    {
        $model = new M_BookingDetails();
        $booking = $model->where('id', $id)->first();

        $data = [
            'title' => 'Verifikasi Pembayaran',
            'booking' => $booking
        ];

        return view('pages/booking_upload_bukti', $data);
    }

    public function booking_private(): string
    {

        $data = [
            'title' => 'Booking ',
        ];

        return view('pages/booking_private', $data);
    }

    public function payment($id): string
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $bookingModel = new M_BookingDetails();
        $bookingData  = $bookingModel->find($id);

        if (!$bookingData || (int)$bookingData['user_id'] !== (int)session()->get('id')) {
            return redirect()->to('/booking')->with('error', 'Data pemesanan tidak ditemukan atau tidak sesuai.');
        }

        $data = [
            'title'   => 'Payment ',
            'booking' => $bookingData
        ];

        return view('pages/payment', $data);
    }

    public function history(): string
    {
        $bookingModel = new M_BookingDetails();

        $user_id = session()->get('id');

        if ($user_id) {
            $orders = $bookingModel
                ->where('user_id', $user_id)
                ->orderBy('created_at', 'DESC')
                ->findAll();
        } else {
            $orders = [];
        }

        $data = [
            'title' => 'Riwayat Pesanan',
            'orders' => $orders,
        ];

        return view('pages/history', $data);
    }

    public function payments_success($bookingId): string
    {
        $data = [
            'title' => 'Pembayaran Berhasil',
            'bookingId' => $bookingId,
        ];

        return view('pages/payment_success', $data);
    }

    public function submitReview()
    {
        $pengalamanRating = $this->request->getPost('pengalaman_rating');
        $pemanduRating = $this->request->getPost('pemandu_rating');
        $fasilitasRating = $this->request->getPost('fasilitas_rating');
        $ulasanFasilitas = $this->request->getPost('ulasanFasilitas');
        $id_trip = $this->request->getPost('id_trip');


        $data = [
            'id_user' => session()->get('id'),
            'id_trip' => $id_trip,
            'pengalaman_rating' => $pengalamanRating,
            'pemandu_rating' => $pemanduRating,
            'fasilitas_rating' => $fasilitasRating,
            'ulasan' => $ulasanFasilitas,
        ];

        $model = new M_UlasanUsers();
        if ($model->save($data)) {
            return redirect()->back()->with('success', 'Ulasan Anda berhasil dikirim!');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim ulasan.');
        }
    }

    public function views_details($id): string
    {
        $model = new M_KelolaWisata();

        $wisata = $model->find($id);

        $data = [
            'title' => 'Detail Wisata',
            'wisata' => $wisata
        ];

        return view('pages/detail_deskripsi_wisata', $data);
    }




    public function login(): string
    {
        $data = [
            'title' => 'Login ',
        ];
        return view('authentication/login', $data);
    }

    public function registration(): string
    {
        $data = [
            'title' => 'Registration ',
        ];
        return view('authentication/registration', $data);
    }
}
