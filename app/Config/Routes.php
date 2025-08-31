<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::login');
$routes->post('/auth/dologin', 'Auth::doLogin');
$routes->get('/logout', 'Auth::logout');

$routes->get('detail', 'Home::detail');
$routes->get('detail_wisata', 'Home::detail_wisata_p
rivate');
$routes->get('booking', 'Home::booking');
$routes->get('booking_private', 'Home::booking_private');
$routes->get('keranjang', 'Home::keranjang');
$routes->get('payment/(:num)', 'Home::payment/$1');
$routes->get('payment/success/(:num)', 'Home::payments_success/$1');




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




// payment
$routes->post('/payment-notification', 'PaymentCallbackController::notification');

// Booking
$routes->post('booking/proses_booking', 'BookingController::proses_booking');
$routes->post('booking/proses_booking_private', 'BookingController::proses_booking_private');
$routes->post('payment/update', 'BookingController::update_payments');


// Jadwal Trip
$routes->post('jadwal_trip/tambah', 'JadwalTripController::tambah');
