<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// jika ada yang akses root
// akan diarahkan ke controller Home dan method index
$routes->get('/', 'Home::index');
$routes->get('/coba', function () {
  echo "Coba";
});
