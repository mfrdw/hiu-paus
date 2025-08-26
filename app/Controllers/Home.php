<?php

namespace App\Controllers;

use App\Models\M_BookingDetails;
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
            'title' => 'Detail',
        ];

        return view('pages/detail_wisata', $data);
    }

    public function booking(): string
    {

        $data = [
            'title' => 'Booking ',
        ];

        return view('pages/booking', $data);
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
