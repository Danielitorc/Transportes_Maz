<?php

    //Funcion para mostrar las solicitudes pendientes por cotizar en el dashboard
    function obtenerSolicitudes(){
        include 'db.php';
        try{
            return $conexion->query("SELECT * FROM solicitudcotizacion WHERE estatus = 'pendiente'");

        }catch(Exception $e){
            echo "Error!!! " . $e->getMessage() . "br";
            return false;
        }
    }

    function obtenerCotizacion(){
        include 'db.php';
        try{
            return $conexion->query("SELECT * FROM cotizacion");

        }catch(Exception $e){
            echo "Error!!! " . $e->getMessage() . "br";
            return false;
        }
    }
?>