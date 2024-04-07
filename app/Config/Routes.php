<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Proyectos;

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

// Proyectos:
$routes->get('/proyectos', 'Proyectos::index');
$routes->get('/crearProyecto', 'Proyectos::agregarNuevoProyecto');
$routes->post('/guardarProyecto', 'Proyectos::guardarProyecto');
$routes->get('/verProyecto/(:num)', [[Proyectos::class,'visualizarProyecto'],'$1']);
$routes->get('/eliminarProyecto/(:num)', 'Proyectos::eliminarProyecto/$1');


//tarea 
$routes->group('/tarea/',function($routes){   
    $routes->get('agregar/(:num)','Proyectos::agregarTarea/$1');
});









