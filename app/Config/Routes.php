<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/login_form', 'Home::iniciarSession');
$routes->get('/cerrar', 'Home::cerrarSession');
$routes->get('/usuarios', 'Usuario::index');
$routes->get('/personal', 'Personal::index');
$routes->post('/addPersonal', 'Personal::nuevoPersonal');
$routes->get('/eliminar/(:num)', 'Personal::eliminarPersonal/$1');
$routes->get('/personal/buscar', 'Personal::filtroPersonalConRoles');
$routes->get('/personal/busqueda', 'Personal::busqueda');



