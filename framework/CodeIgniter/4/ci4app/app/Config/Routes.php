<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// jika ada yang akses root
// akan diarahkan ke controller Home dan method index
$routes->get('/', 'Home::index');
// apapun di bagian any, akan di "lompati"
// jadi tidak perlu ketik about di url langsung masuk ke about
// $routes->get('/coba/(:any)/(:num)', 'Coba::about/$1/$2');
$routes->get('/coba/(:any)', 'Coba::about/$1');

// lompati tanpa harus ketik di url admin/users
$routes->get('/users', 'Admin\Users::index');
