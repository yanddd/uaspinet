<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'User::index');

$routes->get('/penjualan/pdf', 'Penjualan::pdf');
$routes->get('/penjualan', 'Penjualan::index');
$routes->get('/penjualan/(:any)', 'Penjualan::index', ['filter' => 'role:admin']);
$routes->delete('/penjualan/(:num)', 'Penjualan::delete/$1');

$routes->get('/laporan', 'Laporan::index');
$routes->delete('/laporan/(:num)', 'Laporan::delete/$1');

$routes->get('/order', 'Order::index');
$routes->get('/cart', 'cart::index');
$routes->delete('/cart/(:num)', 'Cart::delete/$1');

$routes->get('/sepatu/create', 'Sepatu::create');
$routes->get('/sepatu/beli/(:segment)', 'Sepatu::beli/$1');
$routes->get('/sepatu/edit/(:segment)', 'Sepatu::edit/$1');
$routes->delete('/sepatu/(:num)', 'Sepatu::delete/$1');
$routes->get('/sepatu/(:any)', 'Sepatu::detail/$1');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
