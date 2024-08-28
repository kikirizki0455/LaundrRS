<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('create-db', function () {
    $forge = \config\Database::forge();
    if ($forge->createDatabase('dustira'));
});

$routes->get('/', 'Login::index');

$routes->get('/home', 'Home::index');
$routes->post('/home', 'Home::store');
$routes->delete('/home/delete_pegawai/(:num)', 'Home::delete_pegawai/$1');
$routes->delete('/home/delete_barang/(:num)', 'Home::delete_barang/$1');
$routes->get('/home/edit_pegawai/(:num)', 'Home::edit_pegawai/$1');
$routes->get('/home/edit_barang/(:num)', 'Home::edit_barang/$1');
$routes->post('/home/update', 'Home::update');
$routes->post('/home/store_barang', 'Home::store_barang');
$routes->post('/home/store_bahan', 'Home::store_bahan');



$routes->get('/tambah_pegawai', 'Home::tambah_pegawai');
$routes->get('/tambah_barang', 'Home::tambah_barang');
$routes->get('/tambah_bahan', 'Home::tambah_bahan');


$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::index');
$routes->get('/register', 'Register::index');


$routes->group('pengelolaan', ['namespace' => 'App\Controllers\Pengelolaan'], function ($routes) {
    $routes->get('', 'Pengelolaan::index'); // Rute untuk halaman utama Pengelolaan
    $routes->get('timbangan', 'Pengelolaan::timbangan'); // Rute untuk halaman Timbangan
    $routes->get('create', 'Pengelolaan::create'); // Rute untuk halaman create
});




$routes->get('/distribusi', 'distribusi::index');
