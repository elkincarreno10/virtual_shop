<?php

namespace Controllers;

use MVC\Router;

class AdminController {

    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /');
        }

        $router->render('admin/index', [
            'titulo' => 'Dashboard',
            'nombre' => $_SESSION['nombre']
        ]);
    }
    public static function logout() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION = [];
            header('Location: /');
        }
    }

    public static function perfil(Router $router) {
        if(!is_admin()) {
            header('Location: /');
        }

        $router->render('admin/perfil', [
            'titulo' => 'Dashboard - Perfil',
            'nombre' => $_SESSION['nombre']
        ]);
    }
}