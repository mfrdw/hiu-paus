<?php

namespace App\Models;

use CodeIgniter\Model;

class M_BookingDetailsVisitors extends Model
{
    protected $table = 'bookings_details_visitors';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id_bookings',
        'nama_visitors',
        'usia',
        'jenis_kelamin',
        'kewarganegaraan',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getBookingDetails($id)
    {
        return $this->db->table($this->table)
            ->select('bookings_details_visitors.*, booking_details.*')
            ->join('booking_details', 'booking_details.id = bookings_details_visitors.id_bookings')
            ->where('bookings_details_visitors.id', $id)
            ->get()
            ->getRowArray();
    }
}
