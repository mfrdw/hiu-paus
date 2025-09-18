<?php

namespace App\Controllers;

use App\Models\M_BookingDetails;
use App\Models\M_JadwalTrip;
use App\Models\M_UlasanUsers;
use App\Models\M_Users;

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
        $jadwals = $jadwalModel->findAll();

        $data = [
            'title' => 'Kelola Jadwal',
            'jadwals' => $jadwals,
        ];

        return view('administrator/kelola_jadwal', $data);
    }

    public function kelola_pesanan(): string
    {
        $bookingModel = new M_BookingDetails();

        $bookings = $bookingModel->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'title'   => 'Kelola Pesanan',
            'bookings' => $bookings,
        ];

        return view('administrator/kelola_pesanan', $data);
    }


    public function kelola_paket_wisata(): string
    {
        $data = [
            'title' => 'Kelola Paket Wisata',
        ];
        return view('administrator/kelola_paket_wisata', $data);
    }
    public function kelola_ulasan(): string
    {
        $model = new M_UlasanUsers();
        $ulasan = $model->getUlasanWithUserAdmin();
        $totalReviews = count($ulasan);

        if ($totalReviews === 0) {
            $ulasan = null;
        }

        $data = [
            'title' => 'Kelola Ulasan',
            'ulasan' => $ulasan,
        ];

        return view('administrator/kelola_ulasan', $data);
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
        $data = [
            'title' => 'Setting Payments ',
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
    public function doLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (!$username || !$password) {
            return redirect()->to('/administrator')->with('error', 'Username dan password harus diisi.');
        }

        $model = new M_Users();
        $user = $model->where('username', $username)->first();

        if (!$user) {
            return redirect()->to('/administrator')->with('error', 'Username tidak ditemukan.');
        }

        if ($user['password'] !== $password) {
            return redirect()->to('/administrator')->with('error', 'Password salah.');
        }

        session()->set([
            'id'         => $user['id'],
            'username'   => $user['username'],
            'role_user'  => $user['role_user'],
            'isLoggedIn' => true
        ]);

        if ($user['role_user'] == '2') {
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('error', 'User tidak ditemukan atau tidak memiliki akses');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/administrator');
    }
}
