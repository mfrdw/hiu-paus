<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {

        $data = [
            'title' => '',
        ];

        return view('pages/homepage', $data);
    }
    public function login(): string
    {
        $data = [
            'title' => 'Login',
        ];
        return view('authentication/login', $data);
    }

    public function registration(): string
    {
        $data = [
            'title' => 'Registration',
        ];
        return view('authentication/registration', $data);
    }
}
