<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\APIController;
use MVC\Router;
use Controllers\AuthController;
use Controllers\PaginasController;

$router = new Router();


// Login
/* $router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']); */

// Index

$router->get('/', [PaginasController::class, 'index']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);
$router->get('/reporta', [PaginasController::class, 'reporta']);
$router->post('/reporta', [PaginasController::class, 'reporta']);
$router->get('/dashboard', [PaginasController::class, 'dashboard']);

//API

$router->get('/api/incidencia', [APIController::class, 'incidencia']);
// 404

$router->get('/404', [PaginasController::class, 'error']);

$router->comprobarRutas();