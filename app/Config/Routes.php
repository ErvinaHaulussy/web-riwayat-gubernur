<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'riwayat::landing_page');
// $routes->get('/gubernur', 'riwayat::coba');
$routes->get('/', 'riwayat::home');
$routes->get('/about', 'riwayat::about');
$routes->get('/landing', 'riwayat::landing_page');
$routes->get('/riwayat', 'riwayat::index');
$routes->get('/riwayat/create', 'riwayat::create');
$routes->post('/riwayat/save', 'riwayat::save'); // Tambahkan rute POST untuk aksi 'save'
$routes->get('/riwayat/(:segment)', 'riwayat::detail/$1');
$routes->delete('/riwayat/(:num)', 'riwayat::delete/$1');
$routes->post('/riwayat/update/(:num)', 'riwayat::update/$1');
$routes->get('/riwayat/edit/(:segment)', 'riwayat::edit/$1');
$routes->get('/home', 'riwayat::home');
$routes->get('/rmh', 'riwayat::rmh');

service('auth')->routes($routes);

