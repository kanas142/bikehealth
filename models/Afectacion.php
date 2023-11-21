<?php

namespace Model;

class Afectacion extends ActiveRecord {
    protected static $tabla = 'afectacion';
    protected static $columnasDB = ['id', 'nivel'];

    public $id;
    public $nivel;

    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nivel = $args['nivel'] ?? '';

    }

}