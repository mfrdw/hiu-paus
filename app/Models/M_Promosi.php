<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Promosi extends Model
{
    protected $table = 'promosi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_promosi', 'harga_normal', 'harga_diskon', 'status', 'masa_berlaku_start', 'masa_berlaku_end'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
