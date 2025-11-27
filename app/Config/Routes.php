<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->post('/login/auth', 'Auth::loginProcess');
$routes->get('/logout', 'Auth::logout');

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/dashboard', 'Dashboard::index');
    $routes->get('/mahasiswa', 'Mahasiswa::index');
    $routes->get('/mahasiswa/create', 'Mahasiswa::create');
    $routes->post('/mahasiswa/store', 'Mahasiswa::store');
    $routes->get('/mahasiswa/edit/(:segment)', 'Mahasiswa::edit/$1');
    $routes->post('/mahasiswa/update/(:segment)', 'Mahasiswa::update/$1');
    $routes->delete('/mahasiswa/(:segment)', 'Mahasiswa::delete/$1');
    $routes->get('/dosen', 'Dosen::index');
    $routes->get('/dosen/create', 'Dosen::create');
    $routes->post('/dosen/store', 'Dosen::store');
    $routes->get('/dosen/edit/(:segment)', 'Dosen::edit/$1');
    $routes->post('/dosen/update/(:segment)', 'Dosen::update/$1');
    $routes->delete('/dosen/(:segment)', 'Dosen::delete/$1');
    $routes->get('/ruangan', 'Ruangan::index');
    $routes->post('/ruangan/store', 'Ruangan::store');
    $routes->delete('/ruangan/(:num)', 'Ruangan::delete/$1');
    $routes->get('/matakuliah', 'MataKuliah::index');
    $routes->post('/matakuliah/store', 'MataKuliah::store');
    $routes->delete('/matakuliah/(:num)', 'MataKuliah::delete/$1');
    $routes->get('/jadwal', 'Jadwal::index');
    $routes->get('/jadwal/create', 'Jadwal::create');
    $routes->post('/jadwal/store', 'Jadwal::store');
    $routes->delete('/jadwal/(:num)', 'Jadwal::delete/$1');
    $routes->get('/krs', 'KrsKhs::index_krs');
    $routes->get('/krs/ambil/(:num)', 'KrsKhs::ambil_jadwal/$1');
    $routes->get('/krs/batal/(:num)', 'KrsKhs::batal_jadwal/$1');
    $routes->get('/khs', 'KrsKhs::index_khs');
    $routes->get('/dosen/jadwal', 'Penilaian::index');
    $routes->get('/dosen/input/(:num)', 'Penilaian::input/$1');
    $routes->post('/dosen/simpan_nilai', 'Penilaian::simpan');
});
