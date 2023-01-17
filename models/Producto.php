<?php

namespace Model;

class Producto extends ActiveRecord {
    protected static $tabla = 'productos';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'precio', 'imagen'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
    }

        // Validación para cuentas nuevas
        public function validar_producto() {
            if(!$this->nombre) {
                self::$alertas['error'][] = 'El Nombre es Obligatorio';
            }
            if(!$this->descripcion) {
                self::$alertas['error'][] = 'La descripcion es Obligatoria';
            }
            if(!$this->precio) {
                self::$alertas['error'][] = 'El Precio es Obligatorio';
            }
            if(!$this->imagen) {
                self::$alertas['error'][] = 'La imagen es Obligatoria';
            }
            return self::$alertas;
        }
}