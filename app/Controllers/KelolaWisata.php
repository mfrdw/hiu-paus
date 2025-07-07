<?php

namespace App\Controllers;

use App\Models\M_KelolaWisata;

class KelolaWisata extends BaseController
{
    public function create()
    {
        if ($this->request->getMethod() == 'post') {
            $model = new M_KelolaWisata();

            $gambar = $this->request->getFile('gambar');
            if ($gambar->isValid() && !$gambar->hasMoved()) {
                $newName = $gambar->getRandomName();
                $gambar->move(WRITEPATH . '/uploads', $newName);
            } else {
                $newName = null;
            }

            $data = [
                'nama_paket' => $this->request->getPost('nama_paket'),
                'kategori'   => $this->request->getPost('kategori'),
                'harga'      => $this->request->getPost('harga'),
                'durasi'     => $this->request->getPost('durasi'),
                'status'     => $this->request->getPost('status')
            ];

            if ($model->save($data)) {
                return redirect()->to('/kelola_paket_wisata')->with('message', 'Paket wisata berhasil ditambahkan.');
            } else {
                return redirect()->back()->with('errors', $model->errors())->withInput();
            }
        }

        // Kalau GET langsung, redirect ke halaman utama
        return redirect()->to('/kelola_paket_wisata');
    }


    // public function create()
    // {
    //     $model = new M_KelolaWisata();

    //     $data = [
    //         'nama_paket' => 'Tes Hardcode OK',
    //         'kategori'   => 'Tes',
    //         'harga'      => 12345,
    //         'durasi'     => '1D1N',
    //         'status'     => 1,
    //         'gambar'     => 'tes.jpg'
    //     ];

    //     if ($model->save($data)) {
    //         echo "SUKSES MASUK DB";
    //     } else {
    //         print_r($model->errors());
    //     }
    // }
}
