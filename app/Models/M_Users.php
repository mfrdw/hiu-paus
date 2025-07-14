<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Users extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false; 
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at'; 
    protected $allowedFields = [
        'username',
        'password',
        'nama_lengkap',
        'kontak',
        'email',
        'role_user',
    ];

    protected $useSoftDeletes = false;


}