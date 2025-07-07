<?php

namespace App\Models;

use CodeIgniter\Model;

class M_KelolaWisata extends Model
{
    protected $table = 'kelola_wisata';
    protected $allowedFields = [
        'nama_paket',
        'kategori',
        'harga',
        'durasi',
        'status',
        'gambar',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $errorSuffix = '';
}
