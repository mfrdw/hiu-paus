<?php

namespace App\Controllers;

use App\Models\M_JadwalTrip;
use CodeIgniter\Controller;

class JadwalTripController extends Controller
{
    public function tambah()
    {
        $validation = \Config\Services::validation();
        if (!$this->validate([
            'tanggal' => 'required',
            'paket' => 'required',
            'kapasitas' => 'required|integer',
        ])) {
            return redirect()->back()->with('error', 'Silakan lengkapi semua data dengan benar.');
        }

        $tanggal = $this->request->getPost('tanggal');
        $paket = $this->request->getPost('paket');
        $kapasitas = $this->request->getPost('kapasitas');
        $status = 'tersedia';
        $terisi = 0;
        $sisa = $kapasitas;

        $model = new M_JadwalTrip();
        $data = [
            'tanggal' => $tanggal,
            'paket' => $paket,
            'kapasitas' => $kapasitas,
            'terisi' => $terisi,
            'sisa' => $sisa,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if ($model->save($data)) {
            return redirect()->to('/kelola_jadwal')->with('success', 'Jadwal Trip berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('error', 'Gagal menambah jadwal, silakan coba lagi.');
        }
    }
}
