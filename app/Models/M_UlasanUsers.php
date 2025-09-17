<?php

namespace App\Models;

use CodeIgniter\Model;

class M_UlasanUsers extends Model
{
    protected $table = 'ulasan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_user', 'id_trip', 'ulasan', 'pengalaman_rating', 'pemandu_rating', 'fasilitas_rating'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';


    public function getUlasanWithUser()
    {
        return $this->select('ulasan.*, users.nama_lengkap')
            ->join('users', 'users.id = ulasan.id_user', 'left')
            ->where('ulasan.id_trip', 1)
            ->findAll();
    }
    public function getUlasanWithUserPrivate()
    {
        return $this->select('ulasan.*, users.nama_lengkap')
            ->join('users', 'users.id = ulasan.id_user', 'left')
            ->where('ulasan.id_trip', 2)
            ->findAll();
    }
    public function getUlasanWithUserAdmin()
    {
        return $this->select('ulasan.*, users.nama_lengkap')
            ->join('users', 'users.id = ulasan.id_user', 'left')
            ->findAll();
    }
}
