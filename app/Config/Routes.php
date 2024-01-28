<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/login_form', 'Home::iniciarSession');
$routes->get('/cerrar', 'Home::cerrarSession');
$routes->get('/personal', 'Personal::index');




