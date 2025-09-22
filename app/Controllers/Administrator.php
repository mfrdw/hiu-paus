<?php

namespace App\Controllers;

use App\Models\M_BookingDetails;
use App\Models\M_JadwalTrip;
use App\Models\M_UlasanUsers;
use App\Models\M_Users;
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

    public function update_booking($id)
    {
        $model = new M_BookingDetails();

        if ($this->request->getMethod() === 'post') {
            $data = [
                'full_name' => $this->request->getPost('full_name'),
                'paket' => $this->request->getPost('paket'),
                'jumlah_orang' => $this->request->getPost('jumlah_orang'),
                'total_biaya' => $this->request->getPost('total_biaya'),
                'role_payment' => $this->request->getPost('role_payment'),
            ];

            if ($model->update($id, $data)) {
                session()->setFlashdata('success', 'Data berhasil diperbarui');
                return redirect()->to('/kelola_pemesanan');
            } else {
                session()->setFlashdata('error', 'Gagal memperbarui data');
                return redirect()->back();
            }
        }
    }


    public function kelola_paket_wisata(): string
    {
        $model = new M_KelolaWisata();

        $data = [
            'title' => 'Kelola Wisata',
            'wisata' => $model->findAll(),
        ];

        // Kirim data ke view
        return view('administrator/kelola_paket_wisata', $data);
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
