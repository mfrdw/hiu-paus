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

        public function detail(): string
    {

        $data = [
            'title' => 'Detail',
        ];

        return view('pages/detail_wisata', $data);
    }

    public function booking(): string
    {

        $data = [
            'title' => 'Booking ',
        ];

        return view('pages/booking', $data);
    }

        public function payment(): string
    {

        $data = [
            'title' => 'Payment ',
        ];

        return view('pages/payment', $data);
    }
    public function login(): string
    {
        $data = [
            'title' => 'Login ',
        ];
        return view('authentication/login', $data);
    }

    public function registration(): string
    {
        $data = [
            'title' => 'Registration ',
        ];
        return view('authentication/registration', $data);
    }
}