<?php

namespace App\Models;

use CodeIgniter\Model;

class M_BookingDetails extends Model
{
    protected $table = 'booking_details';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'full_name',
        'email',
        'kontak',
        'paket',
        'jumlah_orang',
        'total_biaya',
        'role_payment',
        'mode_pembayaran',
        'upload_gambar',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
