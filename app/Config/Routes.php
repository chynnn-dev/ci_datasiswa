<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'pages::index');
$routes->get('/sekolah', 'Sekolah::index');
$routes->get('/home', 'home::index');

$routes->get('/sekolah/tambah', 'Sekolah::tambah');
$routes->put('/sekolah/update/(:any)', 'Sekolah::update/$1');
$routes->get('/sekolah/ubah/(:num)', 'Sekolah::ubah/$1');
$routes->post('/sekolah/simpan', 'Sekolah::simpan');
$routes->delete('/sekolah/(:num)', 'Sekolah::hapus/$1');
$routes->get('/sekolah/(:any)', 'Sekolah::detail/$1');
$routes->post('sekolah', 'Sekolah::index');

$routes->post('/sekolah/cari', 'Sekolah::index');