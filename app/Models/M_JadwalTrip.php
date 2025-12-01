<?php

namespace App\Models;

use CodeIgniter\Model;

class M_JadwalTrip extends Model
{
    protected $table = 'jadwal_trip';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'paket',
        'kapasitas',
        'terisi',
        'sisa',
        'status',
        'created_at',
        'updated_at'
    ];
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getJadwalByMonth($month, $year)
    {
        return $this->where('MONTH(tanggal)', $month)
            ->where('YEAR(tanggal)', $year)
            ->findAll(); // Mengambil semua jadwal dalam bulan dan tahun tertentu
    }

    public function getByTanggal($tanggal)
    {
        return $this->where('tanggal', $tanggal)->first();
    }

    public function getAllJadwal()
    {
        return $this->findAll();
    }

    public function getByStatus($status)
    {
        return $this->where('status', $status)->findAll();
    }

    public function addJadwal($data)
    {
        return $this->insert($data);
    }

    public function updateJadwal($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteJadwal($id)
    {
        return $this->delete($id);
    }
}
