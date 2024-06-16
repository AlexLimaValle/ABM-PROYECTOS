<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Proyectos;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/login_form', 'Home::iniciarSession');
$routes->get('/cerrar', 'Home::cerrarSession');

$routes->group('personal',['filter'=>'auth'],static function($routes){
    $routes->get('', 'Personal::index');
    $routes->get('editarPersonal', 'Personal::agregarPersonal');
    $routes->post('guardarPersonal', 'Personal::guardarPersonal');
    $routes->get('eliminarPersonal', 'Personal::eliminarPersonal');
    $routes->get('actulizarPersonal/(:num)', 'Personal::actualizarPersonal/$1');
    $routes->post('actualizar', 'Personal::actualizacionDePersonal');
    $routes->get('buscador', 'Personal::personalResultado');
    $routes->get('resultados', 'Personal::buscarPorNombre');
});

// Proyectos:


$routes->group('proyectos',['filter'=>'auth'],static function($routes){
    $routes->get('/', 'Proyectos::index');
    $routes->get('consulta','Proyectos::buscarTodoProyecto');
    $routes->get('crearProyecto', 'Proyectos::agregarNuevoProyecto');
    $routes->post('guardarProyecto', 'Proyectos::guardarProyecto');
    $routes->get('verProyecto/(:num)', [[Proyectos::class,'visualizarProyecto'],'$1']);
    $routes->get('eliminarProyecto/(:num)', 'Proyectos::eliminarProyecto/$1');
});

//tarea 
$routes->group('tarea',['filter'=>'auth'],static function($routes){   
    $routes->get('','Tarea::index');
    $routes->get('agregar/(:num)','Proyectos::agregarTarea/$1');
    $routes->get('borrar/(:num)','Tarea::borrarTarea/$1');
    $routes->get('buscar','Tarea::buscarTarea');
    $routes->get('actualizar/(:num)','Tarea::actualizarItemTarea/$1');
    $routes->get('guardarActualizacion/(:num)','Tarea::guardarActualizacion/$1');
});


//usuario

$routes->group('/usuario',['filter'=>'auth'],function($routes){
    $routes->get('/','Usuario::index');
    $routes->post('crear','Usuario::validarUser');
});



$routes->group('api',['namespace'=>'App\Controllers\API'],function($routes){
    $routes->get('personas','Personas::index');
    
});



