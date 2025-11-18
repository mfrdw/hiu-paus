<?php

namespace App\Controllers;

use App\Models\M_SettingPayments;

class SettingPayment extends BaseController
{
    // Menambahkan data pembayaran baru
    public function create()
    {
        if (!$this->request->is('post')) {
            return redirect()->back();
        }

        // Validasi input
        $rules = [
            'paymentMethod' => 'required',
            'paymentNumber' => 'required',
            'status' => 'required',
            'metode' => 'required',
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', implode(', ', $this->validator->getErrors()));
            return redirect()->back()->withInput();
        }

        $model = new M_SettingPayments();
        $data = [
            'payments' => $this->request->getPost('paymentMethod'),
            'number' => $this->request->getPost('paymentNumber'),
            'status' => $this->request->getPost('status'),
            'metode' => $this->request->getPost('paymentMethodType'),
        ];

        // Insert data
        if ($model->insert($data)) {
            session()->setFlashdata('success', 'Data pembayaran berhasil ditambahkan');
            return redirect()->to(site_url('setting_payments'));
        }

        session()->setFlashdata('error', 'Gagal menambahkan data pembayaran');
        return redirect()->back()->withInput();
    }

    // Mengupdate data pembayaran
    public function update()
    {
        if (!$this->request->is('post')) {
            return redirect()->back();
        }

        // Validasi input
        $rules = [
            'paymentMethod' => 'required',
            'paymentNumber' => 'required',
            'status' => 'required',
            'metode' => 'metode'
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', implode(', ', $this->validator->getErrors()));
            return redirect()->back()->withInput();
        }

        $id = $this->request->getPost('id_payment'); // Ambil ID untuk update
        $model = new M_SettingPayments();
        $data = [
            'payments' => $this->request->getPost('paymentMethod'),
            'number' => $this->request->getPost('paymentNumber'),
            'status' => $this->request->getPost('status'),
            'metode' => $this->request->getPost('paymentMethodType'),
        ];

        // Update data
        if ($model->update($id, $data)) {
            session()->setFlashdata('success', 'Data pembayaran berhasil diperbarui');
            return redirect()->to(site_url('setting_payments'));
        }

        session()->setFlashdata('error', 'Gagal memperbarui data pembayaran');
        return redirect()->back()->withInput();
    }

    // Menghapus data pembayaran
    public function delete($id)
    {
        $model = new M_SettingPayments();

        // Menghapus data berdasarkan ID
        if ($model->delete($id)) {
            session()->setFlashdata('success', 'Data pembayaran berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data pembayaran');
        }

        return redirect()->to(site_url('setting_payments'));
    }
}
