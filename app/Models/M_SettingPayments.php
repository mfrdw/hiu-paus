<?php

namespace App\Models;

use CodeIgniter\Model;

class M_SettingPayments extends Model
{
    protected $table = 'setting_payments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['payments', 'number', 'status', 'logo'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
