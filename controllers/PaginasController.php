<?php

namespace Controllers;

use Model\Afectacion;
use Model\Genero;
use Model\Incidencia;
use Model\Localidad;
use Model\Usuario_Reg;
use MVC\Router;

class PaginasController
{

    public static function index(Router $router)
    {

        // Render a la vista
        $router->render('pages/index', [
            'titulo' => 'Conoce Sobre Nosotros'
        ]);
    }

    public static function contacto(Router $router){

        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario_Reg($_POST);
            $usuario->fecha = date("Y-m-d");

            $alertas = $usuario->validar_cuenta();
            $alertas = $usuario->validarEmail();
            

            if(empty($alertas)){

                $resultado = $usuario->guardar();

                if($resultado){
                    Usuario_Reg::setAlerta('exito', 'Solicitud enviada con exito');
                    $usuario = [];
                }
            }
            
            $alertas = Usuario_Reg::getAlertas();
            
        }

        $router->render('pages/contacto', [
            'titulo' => 'Contáctanos',
            'usuario' => $usuario,
            'alertas' => $alertas

        ]);


    }

    public static function reporta(Router $router){

        $localidades = Localidad::all();
        $generos = Genero::all();
        $afectacion = Afectacion::all();

        $incidencia = new Incidencia();
        $incidencia->fecha = date("Y-m-d");    
        
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $incidencia->sincronizar($_POST);
            $incidencia->generoid =  Genero::where('genero',$_POST['genero'])->id;
            $incidencia->afectacionid = Afectacion::where('nivel',$_POST['afectacion'])->id;
            $incidencia->localidadid = Localidad::where('nombre',$_POST['localidad'])->id;

            $alertas = $incidencia->validarPunto();

            if(empty($alertas)) {
                $incidencia->guardar();
                $incidencia = [];
                $alertas = Incidencia::setAlerta('exito','El punto de incidencia fue guardado con éxito');
            }    

        }

        $alertas = Incidencia::getAlertas();

        $router->render('pages/reporta', [
            'titulo' => 'Reporta Incidencia',
            'localidades' => $localidades,
            'generos' => $generos,
            'afectacion' => $afectacion,
            'incidencia' => $incidencia,
            'alertas' => $alertas
        ]);


    }

    public static function dashboard(Router $router){


        $router->render('pages/dashboard', [
            'titulo' => 'Dashboard'
        ]);


    }

    public static function error(Router $router){


        $router->render('ui/404', [
            'titulo' => '404_Pagina No Encontrada'
        ]);


    }
}
