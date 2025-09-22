<?php

namespace App\Models;

use CodeIgniter\Model;

class M_KelolaWisata extends Model
{
    protected $table = 'kelola_wisata';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_wisata', 'kategori', 'deskripsi', 'gambar'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
