<?php

namespace App\Controllers;

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
        $data = [
            'title' => 'Kelola Jadwal',
        ];
        return view('administrator/kelola_jadwal', $data);
    }

    public function kelola_pesanan(): string
    {
        $data = [
            'title' => 'Kelola Pesanan',
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
