<?php

namespace App\Controllers;

use App\Models\M_Users;
use CodeIgniter\Controller;

class Auth extends Controller
{
   public function doLogin()
{
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $model = new M_Users();

    $user = $model->where('username', $username)->first();

    if (!$user) {
        return redirect()->to('/login')->with('error', 'Username tidak ditemukan.');
    }

    if ($user['password'] !== $password) {
        return redirect()->to('/login')->with('error', 'Password salah.');
    }

    session()->set([
        'id'         => $user['id'],
        'username'   => $user['username'],
        'role_user'  => $user['role_user'],
        'isLoggedIn' => true
    ]);

    if ($user['role_user'] == '1') {
        return redirect()->to('/');
    } else {
        return redirect()->to('/dashboard');
    }
}
    public function doRegistration()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $nama_lengkap = $this->request->getPost('nama_lengkap');
        $kontak = $this->request->getPost('kontak');
        $email = $this->request->getPost('email');
        $role_user = '1';

        $model = new M_Users();
        $model->insert([
            'username'    => $username,
            'password'    => $password,
            'nama_lengkap'=> $nama_lengkap,
            'kontak'      => $kontak,
            'email'       => $email,
            'role_user'   => $role_user,
        ]);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}