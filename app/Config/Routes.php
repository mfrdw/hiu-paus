<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::login');
$routes->get('registration', 'Home::registration');

$routes->get('dashboard', 'Administrator::dashboard');
$routes->get('kelola_pesanan', 'Administrator::kelola_pesanan');
$routes->get('kelola_jadwal', 'Administrator::kelola_jadwal');
$routes->get('kelola_paket_wisata', 'Administrator::kelola_paket_wisata');
