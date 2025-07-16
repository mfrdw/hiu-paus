<?php

namespace App\Controllers;

use App\Models\M_KelolaPesan;

class KelolaPesanan extends BaseController
{
    public function index()
    {
        $model = new M_KelolaPesan();

        // Mengambil semua data pemesanan
        $data['pesanan'] = $model->getAllPesanan();

        return view('pesanan_view', $data);
    }

    public function detail($id)
    {
        $model = new M_KelolaPesan();

        // Mengambil data pesanan berdasarkan ID
        $data['pesanan'] = $model->getPesananById($id);

        return view('detail_pesanan', $data);
    }

    public function pesananByUser($userId)
    {
        $model = new M_KelolaPesan();

        // Mengambil pesanan berdasarkan id_users
        $data['pesanan'] = $model->getPesananByUserId($userId);

        return view('pesanan_by_user', $data);
    }

    public function totalBiayaByUser($userId)
    {
        $model = new M_KelolaPesan();

        // Mengambil total biaya berdasarkan id_users
        $data['total'] = $model->getTotalBiayaByUser($userId);

        return view('total_biaya', $data);
    }
}
