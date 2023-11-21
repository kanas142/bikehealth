<?php

namespace Controllers;

use Model\Genero;
use Model\Incidencia;
use MVC\Router;

class APIController {
    public static function incidencia() {

        $incidencia = Incidencia::all('ASC');

        echo json_encode($incidencia);

    }

}