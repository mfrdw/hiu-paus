<?php

namespace App\Controllers;

use App\Models\M_BookingDetails;

class InvoiceController extends BaseController
{

    public function view($id)
    {
        $model = new M_BookingDetails();
        $order = $model->find($id);

        if (!$order) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Invoice tidak ditemukan');
        }

        return view('pages/invoice', [
            'order' => $order,
        ]);
    }
    public function download($id)
    {
        // ambil data order dari DB
        $model = new M_BookingDetails();
        $order = $model->find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Invoice tidak ditemukan.');
        }

        // di sini kamu bisa:
        // - generate PDF
        // - atau tampilkan view invoice, lalu pakai library PDF

        return view('pages/invoice', ['order' => $order]);
    }
}
