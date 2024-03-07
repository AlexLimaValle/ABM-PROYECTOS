<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/login_form', 'Home::iniciarSession');
$routes->get('/cerrar', 'Home::cerrarSession');
$routes->get('/personal', 'Personal::index');
$routes->get('/editarPersonal', 'Personal::agregarPersonal');
$routes->post('/guardarPersonal', 'Personal::guardarPersonal');
$routes->get('/eliminarPersonal', 'Personal::eliminarPersonal');
$routes->get('/actulizarPersonal/(:num)', 'Personal::actualizarPersonal/$1');
$routes->get('/actulizar', 'Personal::actualizacionDePersonal');
$routes->get('/buscador', 'Personal::buscarPorNombre');
$routes->get('/proyectos', 'Proyectos::index');






