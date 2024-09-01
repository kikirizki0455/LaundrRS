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


$routes->get('dashboard', 'Dashboard::index');

// data pegawai
$routes->get('data_pegawai', 'DataManagement\DataPegawai::index');
$routes->get('tambah_pegawai', 'DataManagement\DataPegawai::tambah_pegawai');
$routes->post('store_pegawai', 'DataManagement\DataPegawai::store');
$routes->get('edit_pegawai/(:num)', 'DataManagement\DataPegawai::edit_pegawai/$1');
$routes->post('update_pegawai', 'DataManagement\DataPegawai::update_pegawai');
$routes->delete('/delete_pegawai/(:num)', 'DataManagement\DataPegawai::delete_pegawai/$1');

//data barang
$routes->get('data_barang', 'DataManagement\DataBarang::index');
$routes->get('/tambah_barang', 'DataManagement\DataBarang::tambah_barang');
$routes->post('store_barang', 'DataManagement\DataBarang::store_barang');
$routes->get('edit_barang/(:num)', 'DataManagement\DataBarang::edit_barang/$1');
$routes->post('update_barang', 'DataManagement\DataBarang::update_barang');
$routes->delete('/delete_barang/(:num)', 'DataManagement\DataBarang::delete_barang/$1');


//data bahan
$routes->get('data_bahan', 'DataManagement\DataBahan::index');
$routes->get('/tambah_bahan', 'DataManagement\DataBahan::tambah_bahan');
$routes->post('store_bahan', 'DataManagement\DataBahan::store_bahan');
$routes->get('edit_bahan/(:num)', 'DataManagement\DataBahan::edit_bahan/$1');
$routes->post('update_bahan', 'DataManagement\DataBahan::update_bahan');
$routes->delete('/delete_bahan/(:num)', 'DataManagement\DataBahan::delete_bahan/$1');

$routes->get('dashboard/show_modal/(:num)', 'Dashboard::show_modal/$1');
$routes->post('dashboard/tambah_stok', 'Dashboard::tambah_stok');


$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::index');
$routes->get('/register', 'Register::index');

// $routes->group('pengelolaan', function ($routes) {
//     $routes->get('pencucian', 'Pengelolaan\Pencucian::index');
// });

$routes->group('pengelolaan', function ($routes) {
    $routes->get('pencucian', 'Pengelolaan\Pencucian::index');
    // $routes->get('pencucian/tambah_pencucian', 'Pengelolaan\Pencucian::tambah_pencucian');
    //     $routes->post('pencucian/store', 'Pengelolaan\Pencucian::store');
    //     $routes->get('pencucian/edit/(:num)', 'Pengelolaan\Pencucian::edit/$1');
    //     $routes->post('pencucian/update/(:num)', 'Pengelolaan\Pencucian::update/$1');
    //     $routes->get('pencucian/delete/(:num)', 'Pengelolaan\Pencucian::delete/$1');
});





$routes->get('/distribusi', 'distribusi::index');
