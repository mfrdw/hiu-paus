<?php

namespace App\Controllers;

use App\Models\M_Users;

class PromoController extends BaseController
{
    public function get_promo()
    {
        // Cek apakah user sudah login
        if (!session()->get('id')) {
            // Jika belum login, tampilkan SweetAlert2 untuk login
            return $this->response->setJSON(['error' => 'Anda harus login terlebih dahulu.']);
        }

        // Ambil promo_id yang dikirimkan dari form
        $promo_id = $this->request->getPost('promo_id');

        // Ambil id yang sedang login
        $id = session()->get('id');

        // Load model M_Users
        $model_user = new M_Users();

        // Data untuk mengupdate kolom promo
        $data = [
            'promo' => 2, // Promo aktif
        ];

        // Update promo untuk user yang sedang login
        $updateStatus = $model_user->update($id, $data);

        if ($updateStatus) {
            // Jika update berhasil, redirect ke halaman utama dengan pesan sukses
            return redirect()->to('/')->with('success', 'Promo telah diaktifkan!');
        } else {
            // Jika update gagal, redirect ke halaman utama dengan pesan error
            return redirect()->to('/')->with('error', 'Gagal mengaktifkan promo.');
        }
    }
}
