<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class UsuariosController {

    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /');
        }

        $usuarios = Usuario::all('ASC');
        

        $router->render('admin/usuarios/index', [
            'titulo' => 'Usuarios',
            'nombre' => $_SESSION['nombre'],
            'usuarios' => $usuarios
        ]);
    }
    public static function eliminar() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /');
            }
            $id = $_POST['id'];
            $usuario = Usuario::find($id);
            if(!isset($usuario)) header('Location: /admin/usuarios');
            
            $resultado = $usuario->eliminar();
            if($resultado) header('Location: /admin/usuarios');
        }
    }
}