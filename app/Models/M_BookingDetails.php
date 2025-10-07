<?php

namespace App\Models;

use CodeIgniter\Model;

class M_BookingDetails extends Model
{
    protected $table = 'booking_details';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'id_bookings',
        'full_name',
        'email',
        'kontak',
        'paket',
        'jumlah_orang',
        'tanggal_trip',
        'jam_trip',
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

    public function generateIdBooking()
    {

        $currentDate = date('Ymd');
        $today = date('Y-m-d');

        $builder = $this->builder();
        $builder->select('id_bookings');
        $builder->like('id_bookings', 'WS' . $currentDate);
        $builder->orderBy('id_bookings', 'DESC');
        $query = $builder->get();
        $lastBooking = $query->getRow();

        if ($lastBooking) {
            $lastSequence = (int) substr($lastBooking->id_bookings, -3);
            $nextSequence = str_pad($lastSequence + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextSequence = '001';
        }

        $idBooking = 'WS' . $currentDate . $nextSequence;

        return $idBooking;
    }
}
