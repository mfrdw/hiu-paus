<?php

namespace App\Controllers;

use App\Models\M_KelolaWisata;

class KelolaWisata extends BaseController
{
    public function create()
    {
        $model = new M_KelolaWisata();

        // Mengambil semua file gambar yang di-upload
        $gambarFiles = $this->request->getFiles();

        // Cek apakah gambar ada
        if (isset($gambarFiles['gambar']) && count($gambarFiles['gambar']) > 0) {
            $uploadedFiles = [];

            foreach ($gambarFiles['gambar'] as $gambar) {
                if ($gambar->isValid() && !$gambar->hasMoved()) {
                    $newName = $gambar->getRandomName();
                    $gambar->move('uploads/kelola_wisata', $newName);  // Menyimpan gambar di 'uploads/kelola_wisata'
                    $uploadedFiles[] = $newName;
                } else {
                    session()->setFlashdata('error', 'Gambar tidak valid atau gagal di-upload');
                    return redirect()->back();
                }
            }

            // Menyimpan nama gambar pertama di database
            $data = [
                'nama_wisata' => $this->request->getPost('nama_wisata'),
                'kategori' => $this->request->getPost('kategori'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'gambar' => $uploadedFiles[0],  // Menyimpan gambar pertama
            ];

            if ($model->insert($data)) {
                session()->setFlashdata('success', 'Data berhasil ditambahkan');
                return redirect()->to('/kelola_wisata');
            } else {
                session()->setFlashdata('error', 'Gagal menambahkan data');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Tidak ada gambar yang di-upload');
            return redirect()->back();
        }
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
