<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController {

    public static function login(Router $router) {

        $alertas = [];
        $usuario = new Usuario;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $usuario->validarLogin();
            if(empty($alertas)) {
                    $usuario = Usuario::where('email', $usuario->email);
                if(empty($usuario)) {
                    $alertas = Usuario::setAlerta('error', 'El usuario no existe o no ha sido confirmado');
                } else {
                    if(password_verify($_POST['password'], $usuario->password)) {
                        session_start();
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION['admin'] = $usuario->admin;
                        $_SESSION['estado'] = true;
                        header('Location: /admin');
                    } else {
                        $alertas = Usuario::setAlerta('error', 'Password Incorrecto');
                    }
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión',
            'alertas' => $alertas
        ]);
    }
    public static function crear(Router $router) {
        $alertas = [];
        $usuario = new Usuario;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validar_cuenta();

            if(empty($alertas)) {
                $existeUsuario = Usuario::where('email', $usuario->email);

                if($existeUsuario) {
                    Usuario::setAlerta('error', 'El Usuario ya está registrado');
                    $alertas = Usuario::getAlertas();
                } else {
                    // Hasheamos el password
                    $usuario->hashPassword();

                    // Generar el token
                    $usuario->crearToken();

                    // Crear un nuevo usuario
                    $resultado = $usuario->guardar();

                    // Enviar el eamil
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();

                    if($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
        }

        $router->render('auth/crear', [
            'titulo' => 'Crea una Cuenta',
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
    public static function mensaje(Router $router) {

        $router->render('auth/mensaje', [
            'titulo' => 'Cuenta Creada Exitosamente'
        ]);
    }
    public static function confirmar(Router $router) {
        $token = s($_GET['token']);
        if(!$token) header('Location: /');

        // Busacamos el usuario
        $usuario = Usuario::where('token', $token);
        
        if(empty($usuario)) {
            // No se encontró un usuario con ese token
            Usuario::setAlerta('error', 'Token no válido, la cuenta no se confirmó');
        } else {
            // Confirmar la cuenta
            $usuario->confirmado = 1;
            $usuario->token = '';

            // Guardar en la BD
            $usuario->guardar();

            Usuario::setAlerta('exito', 'Cuenta Conprobada Exitosamente');
        }
        $alertas = Usuario::getAlertas();

        $router->render('auth/confirmar', [
            'titulo' => 'Confirma Tu Cuenta',
            'alertas' => $alertas
        ]);
    }
    public static function olvide(Router $router) {

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario($_POST);
            $alertas = $usuario->validarEmail();

            if(empty($alertas)) {
                // Buscar el usuario
                $usuario = Usuario::where('email', $usuario->email);

                if($usuario && $usuario->confirmado) {

                    // Generar nuevo token
                    $usuario->crearToken();
                    // Actualizar el usuario
                    $usuario->guardar();
                    // Enviar el email
                    $email = new Email( $usuario->email, $usuario->nombre, $usuario->token );
                    $email->enviarInstrucciones();

                    $alertas['exito'][] = 'Hemos enviado las instrucciones a tu email';
                } else {
                    $alertas['error'][] = 'El Usuario no existe o no esta confirmado';
                }
            }
        }

        $router->render('auth/olvide', [
            'titulo' => 'Reestablece',
            'alertas' => $alertas
        ]);
    }
    public static function reestablecer(Router $router) {
        $alertas = [];
        $token = s($_GET['token']);

        $token_valido = true;

        $usuario = Usuario::where('token', $token);

        if(!$token) header('Location: /');

        if(empty($usuario)) {
            Usuario::setAlerta('error', 'Token No Válido, intenta de nuevo');
            $token_valido = false;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sincronizar el usuario
            $usuario->sincronizar($_POST);

            // Validar el password
            $alertas = $usuario->validarPassword();

            if(empty($alertas)) {
                // Hasheamos el nuevo password
                $usuario->hashPassword();

                // Eliminar el token
                $usuario->token = '';

                // Guardamos en la BD
                $resultado = $usuario->guardar();

                // Redireccionamos
                if($resultado) {
                    header('Location: /login');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/reestablecer', [
            'titulo' => 'Reestablece Password',
            'alertas' => $alertas,
            'token_valido' => $token_valido
        ]);
    }
}