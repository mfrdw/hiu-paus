<?php

namespace App\Models;

use CodeIgniter\Model;

class M_KelolaPesan extends Model
{
    // Nama tabel yang digunakan
    protected $table      = 'kelola_pesanan';

    // Primary key
    protected $primaryKey = 'id';

    // Tanggal pembuatan dan pembaruan (opsional jika diperlukan)
    protected $useTimestamps = false;  // Atur sesuai dengan kebutuhan, jika menggunakan timestamps otomatis

    // Kolom yang dapat diisi (fillable)
    protected $allowedFields = [
        'id_users',
        'nama_pemesan',
        'paket_wisata',
        'tanggal',
        'jumlah',
        'total_biaya',
        'status',
        'created_at',
        'updated_at'
    ];

    // Menyediakan fungsi untuk mengambil semua pesanan
    public function getAllPesanan()
    {
        return $this->findAll();
    }

    // Fungsi untuk mengambil pesanan berdasarkan ID
    public function getPesananById($id)
    {
        return $this->find($id);
    }

    // Fungsi untuk mengambil pesanan berdasarkan id_users
    public function getPesananByUserId($userId)
    {
        return $this->where('id_users', $userId)->findAll();
    }

    // Fungsi untuk mengambil total biaya berdasarkan id_users
    public function getTotalBiayaByUser($userId)
    {
        return $this->selectSum('total_biaya')
            ->where('id_users', $userId)
            ->get()
            ->getRow();
    }
}
