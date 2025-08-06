<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Midtrans extends BaseConfig
{
    // Konfigurasi Server Key dan Client Key dari akun Midtrans
    public $serverKey = 'Mid-server-7njA7YduAIY2ZsHEbDeSTi_Z';
    public $clientKey = 'Mid-client-4mhaXFgcaESuozJS';
    public $isProduction = false; // Atur ke 'true' jika mode live
    public $isSanitized = true;
    public $is3ds = true;
}