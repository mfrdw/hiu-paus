<?php

namespace App\Controllers;

use App\Models\M_BookingDetails;
use App\Models\M_JadwalTrip;

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
}
