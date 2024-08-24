<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('create-db', function () {
    $forge = \config\Database::forge();
    if ($forge->createDatabase('dustira'));
    echo "database created";
});

$routes->get('/', 'Login::index');

$routes->get('/home', 'Home::index');
$routes->post('/home', 'Home::store');
$routes->delete('/home/delete/(:num)', 'Home::delete/$1');
$routes->get('/home/edit/(:num)', 'Home::edit/$1');
$routes->post('/home/update', 'Home::update');



$routes->get('/tambah_pegawai', 'Home::tambah_pegawai');

$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::index');
$routes->get('/register', 'Register::index');
$routes->get('/pengelolaan', 'Pengelolaan::index');
$routes->get('/distribusi', 'distribusi::index');
