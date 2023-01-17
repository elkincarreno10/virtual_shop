<?php

namespace Controllers;

use Model\Producto;
use MVC\Router;

class PaginasController {

    public static function index(Router $router) {
        $productos = Producto::getAsc(3);
        $router->render('paginas/inicio', [
            'titulo' => 'Inicio',
            'productos' => $productos
        ]);
    }

    public static function productos(Router $router) {
        $productos = Producto::all();

        $router->render('paginas/productos', [
            'titulo' => 'Producto',
            'productos' => $productos
        ]);
    }
    public static function nosotros(Router $router) {
        $router->render('paginas/nosotros', [
            'titulo' => 'Sobre Nosotros'
        ]);
    }
    public static function contactanos(Router $router) {
        $router->render('paginas/contactanos', [
            'titulo' => 'Contactanos'
        ]);
    }
}