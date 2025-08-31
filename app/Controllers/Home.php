<?php

namespace App\Controllers;

use App\Models\M_BookingDetails;
use App\Models\M_Users;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    public function index(): string
    {

        $data = [
            'title' => 'Beranda ',
        ];

        return view('pages/homepage', $data);
    }

    public function detail(): string
    {

        $data = [
            'title' => 'Detail ',
        ];

        return view('pages/detail_wisata', $data);
    }

    public function detail_wisata_private(): string
    {

        $data = [
            'title' => 'Detail ',
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

    public function keranjang(): string
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

        return view('pages/keranjang', $data);
    }

    public function payments_success($bookingId): string
    {
        $data = [
            'title' => 'Pembayaran Berhasil',
            'bookingId' => $bookingId,
        ];

        return view('pages/payment_success', $data);
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
