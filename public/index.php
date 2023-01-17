<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AdminController;
use Controllers\LoginController;
use Controllers\PaginasController;
use Controllers\UsuariosController;
use Controllers\ProductosController;

$router = new Router();

// Público
$router->get('/', [PaginasController::class, 'index']);
$router->get('/productos', [PaginasController::class, 'productos']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/contactanos', [PaginasController::class, 'contactanos']);

// Login
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/crear', [LoginController::class, 'crear']);
$router->post('/crear', [LoginController::class, 'crear']);
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/mensaje', [LoginController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [LoginController::class, 'confirmar']);
$router->get('/reestablecer', [LoginController::class, 'reestablecer']);
$router->post('/reestablecer', [LoginController::class, 'reestablecer']);

// Admin 
$router->get('/admin', [AdminController::class, 'index']);
$router->post('/admin/logout', [AdminController::class, 'logout']);

// CRUD Productos
$router->get('/admin/productos', [ProductosController::class, 'productos']);
$router->get('/admin/productos/crear', [ProductosController::class, 'crear']);
$router->post('/admin/productos/crear', [ProductosController::class, 'crear']);
$router->get('/admin/productos/actualizar', [ProductosController::class, 'actualizar']);
$router->post('/admin/productos/actualizar', [ProductosController::class, 'actualizar']);
$router->post('/admin/productos/eliminar', [ProductosController::class, 'eliminar']);

// Usuarios
$router->get('/admin/usuarios', [UsuariosController::class, 'index']);
$router->post('/admin/usuarios/eliminar', [UsuariosController::class, 'eliminar']);


$router->get('/admin/perfil', [AdminController::class, 'perfil']);


$router->comprobarRutas();