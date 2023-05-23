<?php

namespace Controllers;

use Model\Cita;
use Model\CitaServicio;
use Model\Servicio;

class APIController {
    public static function index() {
       $servicios = Servicio::all();
        echo json_encode($servicios);
        
    }

    public static function guardar() {
        // Almacena la cita y devuelve el id
        $cita = new Cita($_POST);

        $resultado = $cita->guardar();
        
        $id = $resultado['id'];
                // Almacena la cita y el servicio
        
                //almacena los servicios con el id de cita
        $idServicios = explode(",", $_POST['servicios']);

        foreach($idServicios as $idServicio) {
            $args = [
                'citaId' => $id,
                'servicioId' => $idServicio
            ];

            $citaServicio = new CitaServicio($args);
            $citaServicio->guardar();
        }
        // Retornamos una respuesta
        
        echo json_encode(['resultado' => $resultado]);
    }


    public static function eliminar() {
        
        $id = $_POST['id'];
        $cita = Cita::find($id);
        
        if($cita) {

            $cita->eliminar();
        }

        header('Location:' . $_SERVER['HTTP_REFERER']);
    }
}