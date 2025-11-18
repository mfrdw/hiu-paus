<?php

namespace App\Controllers;

use App\Models\M_Promosi;

class Promosi extends BaseController
{

    public function create()
    {
        if (!$this->request->is('post')) {
            return redirect()->back();
        }

        $rules = [
            'nama_promosi' => 'required',
            'harga_normal' => 'required|numeric',
            'harga_diskon' => 'required|numeric'
        ];

        if (! $this->validate($rules)) {
            session()->setFlashdata('error', implode(', ', $this->validator->getErrors()));
            return redirect()->back()->withInput();
        }

        $model = new M_Promosi();
        $data = [
            'nama_promosi' => $this->request->getPost('nama_promosi'),
            'harga_normal' => $this->request->getPost('harga_normal'),
            'harga_diskon' => $this->request->getPost('harga_diskon'),
            'masa_berlaku_start' => $this->request->getPost('masa_berlaku_start'),
            'masa_berlaku_end'   => $this->request->getPost('masa_berlaku_end'),
        ];

        if ($model->insert($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to(site_url('promosi'));
        }

        session()->setFlashdata('error', 'Gagal menambahkan data');
        return redirect()->back()->withInput();
    }

    public function update()
    {
        if (!$this->request->is('post')) {
            return redirect()->back();
        }

        $rules = [
            'nama_promosi' => 'required',
            'harga_normal' => 'required|numeric',
            'harga_diskon' => 'required|numeric',
            'masa_berlaku_start' => 'required|valid_date',
            'masa_berlaku_end' => 'required|valid_date'
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', implode(', ', $this->validator->getErrors()));
            return redirect()->back()->withInput();
        }

        $model = new M_Promosi();
        $id = $this->request->getPost('id_promosi');
        $data = [
            'nama_promosi' => $this->request->getPost('nama_promosi'),
            'harga_normal' => $this->request->getPost('harga_normal'),
            'harga_diskon' => $this->request->getPost('harga_diskon'),
            'masa_berlaku_start' => $this->request->getPost('masa_berlaku_start'),
            'masa_berlaku_end'   => $this->request->getPost('masa_berlaku_end'),
        ];

        if ($model->update($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diperbarui');
            return redirect()->to(site_url('promosi'));
        }

        session()->setFlashdata('error', 'Gagal memperbarui data');
        return redirect()->back()->withInput();
    }

    // Function untuk delete promosi
    public function delete($id)
    {
        $model = new M_Promosi();
        if ($model->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data');
        }
        return redirect()->to(site_url('promosi'));
    }
}
