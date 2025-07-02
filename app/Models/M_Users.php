<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Users extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;

    protected $allowedFields = [
        'username',
        'password',
        'nama_lengkap',
        'kontak',
        'email',
        'role_user',
    ];

    protected $validationRules = [
        'username'     => 'required|alpha_dash|min_length[3]|is_unique[users.username,id,{id}]',
        'password'     => 'required|min_length[4]',
        'nama_lengkap' => 'required|string|min_length[3]',
        'kontak'       => 'permit_empty|string|max_length[25]',
        'email'        => 'required|valid_email|is_unique[users.email,id,{id}]',
        'role_user'    => 'required|in_list[admin,user]',
    ];

    public function findPublic(int $id)
    {
        return $this->select('id, username, nama_lengkap, kontak, email, role_user')
            ->find($id);
    }

    public function authenticate(string $username, string $password): ?array
    {
        return $this->where([
            'username' => $username,
            'password' => $password,
        ])
            ->first();
    }
}
