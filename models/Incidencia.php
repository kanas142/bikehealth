<?php

namespace Model;

class Incidencia extends ActiveRecord {
    protected static $tabla = 'incidencia';
    protected static $columnasDB = ['id', 'fecha','generoid','afectacionid','hora','direccion','latitud','longitud','localidadid'];

    public $id;
    public $fecha;
    public $generoid;
    public $afectacionid;
    public $hora;
    public $direccion;
    public $latitud;
    public $longitud;
    public $localidadid;


    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
        $this->generoid = $args['generoid'] ?? '';
        $this->afectacionid = $args['afectacionid'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->latitud = $args['latitud'] ?? '';
        $this->longitud = $args['longitud'] ?? '';
        $this->localidadid = $args['localidadid'] ?? '';

    }


    // Validar el Login de Usuarios
    public function validarPunto() {
        if(!$this->generoid || !$this->afectacionid || !$this->hora || !$this->localidadid || !$this->direccion) {
            self::$alertas['error'][] = 'Todos los Datos son Necesarios';
        }
        return self::$alertas;

    }
}