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
$routes->get('detail_wisata', 'Home::detail_wisata_private');
$routes->get('booking', 'Home::booking');
$routes->get('booking_private', 'Home::booking_private');
$routes->get('history', 'Home::history');
$routes->get('payment/(:num)', 'Home::payment/$1');
$routes->get('payment/success/(:num)', 'Home::payments_success/$1');
$routes->post('submitReview', 'Home::submitReview');

$routes->get('registration', 'Home::registration');
$routes->post('/auth/doregistration', 'Auth::doRegistration');

$routes->get('administrator', 'Administrator::login');
$routes->post('/administrator/dologin', 'Administrator::doLogin');
$routes->get('/doLogout', 'Administrator::logout');


$routes->get('dashboard', 'Administrator::dashboard', ['filter' => 'auth']);
$routes->get('kelola_pesanan', 'Administrator::kelola_pesanan');
$routes->post('update_booking/(:num)', 'Administrator::update_booking/$1');


$routes->get('kelola_jadwal', 'Administrator::kelola_jadwal');
$routes->get('kelola_wisata', 'Administrator::kelola_paket_wisata');
$routes->get('data_wisatawan', 'Administrator::data_wisatawan');
$routes->get('promosi', 'Administrator::promosi');
$routes->post('promosi/create', 'Promosi::create');
$routes->post('/kelola-wisata/create', 'KelolaWisata::create');

$routes->get('kelola_ulasan', 'Administrator::kelola_ulasan');

$routes->post('kelola-wisata/create', 'KelolaWisata::create');

$routes->get('kelola-wisata/create', 'KelolaWisata::create');
$routes->post('kelola-wisata/create', 'KelolaWisata::create');

$routes->get('setting', 'Administrator::setting');
$routes->get('setting_payments', 'Administrator::setting_payments');




// payment
$routes->post('/payment-notification', 'PaymentCallbackController::notification');

// Booking
$routes->post('booking/proses_booking', 'BookingController::proses_booking');
$routes->post('booking/proses_booking_private', 'BookingController::proses_booking_private');
$routes->post('payment/update', 'BookingController::update_payments');


// Jadwal Trip
$routes->post('jadwal_trip/tambah', 'JadwalTripController::tambah');
