<?php

namespace App\Models;

use CodeIgniter\Model;

class M_PaymentDetails extends Model
{
    protected $table = 'payment_details';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'full_name',
        'email',
        'kontak',
        'jumlah_orang',
        'total_biaya',
        'role_payment',
        'created_at'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


}