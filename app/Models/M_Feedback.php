<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Feedback extends Model
{
    protected $table = 'feedback';
    protected $allowedFields = ['nama', 'email', 'subjek', 'pesan'];
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'nama'    => 'required|max_length[255]',
        'email'   => 'required|valid_email|max_length[255]',
        'subjek'  => 'required|max_length[255]',
        'pesan'   => 'required',
    ];

    protected $validationMessages = [
        'nama' => [
            'required' => 'Nama harus diisi.',
            'max_length' => 'Nama tidak boleh lebih dari 255 karakter.'
        ],
        'email' => [
            'required' => 'Email harus diisi.',
            'valid_email' => 'Format email tidak valid.',
            'max_length' => 'Email tidak boleh lebih dari 255 karakter.'
        ],
        'subjek' => [
            'required' => 'Subjek harus diisi.',
            'max_length' => 'Subjek tidak boleh lebih dari 255 karakter.'
        ],
        'pesan' => [
            'required' => 'Pesan harus diisi.',
        ]
    ];

    public function validateFeedback($data)
    {
        if (!$this->validate($data)) {
            return $this->errors();
        }
        return true;
    }
}