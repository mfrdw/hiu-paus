<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::login');
$routes->post('/auth/dologin', 'Auth::doLogin');
$routes->get('/logout', 'Auth::logout');

$routes->get('registration', 'Home::registration');
$routes->post('/auth/doregistration', 'Auth::doRegistration');


$routes->get('dashboard', 'Administrator::dashboard');
$routes->get('kelola_pesanan', 'Administrator::kelola_pesanan');
$routes->get('kelola_jadwal', 'Administrator::kelola_jadwal');
$routes->get('kelola_paket_wisata', 'Administrator::kelola_paket_wisata');
$routes->post('/kelola-wisata/create', 'KelolaWisata::create');

$routes->post('kelola-wisata/create', 'KelolaWisata::create');

$routes->get('kelola-wisata/create', 'KelolaWisata::create');
$routes->post('kelola-wisata/create', 'KelolaWisata::create');