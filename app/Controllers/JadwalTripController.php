<?php

namespace App\Controllers;

use App\Models\M_JadwalTrip;
use CodeIgniter\Controller;

class JadwalTripController extends Controller
{
    public function tambah()
    {

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

    public function update($id)
    {

        $tanggal = $this->request->getPost('tanggal');
        $paket = $this->request->getPost('paket');
        $kapasitas = $this->request->getPost('kapasitas');
        $status = $this->request->getPost('status');
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
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/kelola_jadwal')->with('success', 'Jadwal Trip berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui jadwal, silakan coba lagi.');
        }
    }

    public function delete($id)
    {
        $model = new M_JadwalTrip();
        $jadwal = $model->find($id);

        if (!$jadwal) {
            return redirect()->to('/kelola_jadwal')->with('error', 'Jadwal tidak ditemukan.');
        }

        if ($model->delete($id)) {
            return redirect()->to('/kelola_jadwal')->with('success', 'Jadwal berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus jadwal, silakan coba lagi.');
        }
    }


    public function get_calendar_data()
    {
        $month = $this->request->getVar('month');  // bulan dalam format 1-12
        $year = $this->request->getVar('year');    // tahun

        $model_jadwal = new M_JadwalTrip();

        // Ambil data jadwal untuk bulan dan tahun yang diminta
        $jadwal = $model_jadwal->where('MONTH(tanggal)', $month)
            ->where('YEAR(tanggal)', $year)
            ->findAll();

        // Format data jadwal untuk dikirim ke frontend
        $result = [];
        foreach ($jadwal as $item) {
            $result[] = [
                'tanggal' => $item['tanggal'],
                'kapasitas' => $item['kapasitas'],
                'terisi' => $item['terisi'],
                'status' => $this->get_status($item['kapasitas'], $item['terisi'])
            ];
        }

        return $this->response->setJSON($result);
    }

    // Fungsi untuk menentukan status berdasarkan kapasitas dan terisi
    private function get_status($kapasitas, $terisi)
    {
        $sisa = $kapasitas - $terisi;

        if ($sisa == 0) {
            return 'full';  // Penuh
        } elseif ($sisa <= 5) {
            return 'almost-full';  // Hampir penuh
        } else {
            return 'available';  // Tersedia
        }
    }
}
