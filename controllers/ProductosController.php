<?php

namespace Controllers;

use MVC\Router;
use Model\Producto;
use Intervention\Image\ImageManagerStatic as Image;

class ProductosController {

    public static function productos(Router $router) {
        if(!is_admin()) {
            header('Location: /');
        }

        $productos = Producto::all('ASC');
        

        $router->render('admin/productos/productos', [
            'titulo' => 'Dashboard - Productos',
            'nombre' => $_SESSION['nombre'],
            'productos' => $productos
        ]);
    }

    public static function crear(Router $router) {
        if(!is_admin()) {
            header('Location: /');
        }
        $alertas = [];
        $producto = new Producto();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /');
            }
            if(!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/img/productos';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0777, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5( uniqid( rand(), true));

                $_POST['imagen'] = $nombre_imagen;
            }

            $producto->sincronizar($_POST);
            $alertas = $producto->validar_producto();

            if(empty($alertas)) {

                // Guardar las imagenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');

                // Guaradr en la BD
                $resultado = $producto->guardar();

                if($resultado) {
                    header('Location: /admin/productos');
                }
            }
        }

        $router->render('admin/productos/crear', [
            'titulo' => 'Productos - Crear',
            'alertas' => $alertas,
            'nombre' => $_SESSION['nombre'],
            'producto' => $producto
        ]);
    }

    public static function actualizar(Router $router) {
        if(!is_admin()) {
            header('Location: /');
        }
        $alertas = [];
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/productos');
        }

        $producto = Producto::find($id);
        
        $producto->imagen_actual = $producto->imagen;
        if(!$producto) {
            header('Location: /admin/productos');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /');
            }

            if(!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/img/productos';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0777, true);
                }

                unlink($carpeta_imagenes . '/' . $producto->imagen_actual . '.png');
                unlink($carpeta_imagenes . '/' . $producto->imagen_actual . '.webp');

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5( uniqid( rand(), true));

                $_POST['imagen'] = $nombre_imagen;
            } else {
                $_POST['imagen'] = $producto->imagen_actual;
            }

            $producto->sincronizar($_POST);
            $alertas = $producto->validar_producto();

            if(empty($alertas)) {

                if(isset($nombre_imagen)) {
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');
                }

                // Guaradr en la BD
                $resultado = $producto->guardar();

                if($resultado) {
                    header('Location: /admin/productos');
                }
            }
        }

        $router->render('admin/productos/actualizar', [
            'titulo' => 'Productos - Actualizar',
            'alertas' => $alertas,
            'nombre' => $_SESSION['nombre'],
            'producto' => $producto
        ]);
    }

    public static function eliminar() {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /');
            }
            $carpeta_imagenes = '../public/img/productos';
            $id = $_POST['id'];
            $producto = Producto::find($id);
            if(!isset($producto)) header('Location: /admin/productos');

            unlink($carpeta_imagenes . '/' . $producto->imagen . '.png');
            unlink($carpeta_imagenes . '/' . $producto->imagen . '.webp');

            $resultado = $producto->eliminar();
            if($resultado) header('Location: /admin/productos');
        }
    }
}