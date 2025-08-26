<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Payments extends Model
{
    protected $table = 'payments';
    protected $allowedFields = ['user_id', 'payment', 'total_payment', 'gambar_payment'];
    protected $useTimestamps = true;
    protected $primaryKey = 'id';
    protected $useSoftDeletes = false;
    protected $dateFormat = 'datetime';


    public function getPaymentsByUser($user_id)
    {
        return $this->where('user_id', $user_id)->findAll();
    }
}
