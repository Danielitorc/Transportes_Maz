<?php
    function obtenerCotizaciones(){
        include 'funciones/db.php';
        try{
            return $conexion->query("SELECT solicitudcotizacion.id, cotizacion.idCotizacion, solicitudcotizacion.nombre,solicitudcotizacion.apellidos,  solicitudcotizacion.empresa, solicitudcotizacion.unidad, solicitudcotizacion.fecha, solicitudcotizacion.hora FROM cotizacion INNER JOIN solicitudcotizacion ON solicitudcotizacion.id = cotizacion.idSolicitud WHERE cotizacion.estatus = 'standby' ");

        }catch(Exception $e){
            echo "Error!!! " . $e->getMessage() . "br";
            return false;
        }
    }

    function obtenerCotizacion($id){
        include 'funciones/db.php';
        try{
            return $conexion->query("SELECT solicitudcotizacion.id, cotizacion.idCotizacion, solicitudcotizacion.nombre, solicitudcotizacion.apellidos, solicitudcotizacion.telefono, solicitudcotizacion.correo,  solicitudcotizacion.empresa, solicitudcotizacion.unidad, solicitudcotizacion.datosRec,solicitudcotizacion.datosEnt, solicitudcotizacion.fecha, solicitudcotizacion.hora FROM cotizacion INNER JOIN solicitudcotizacion ON solicitudcotizacion.id = cotizacion.idSolicitud WHERE idCotizacion =  $id");

        }catch(Exception $e){
            echo "Error!!! " . $e->getMessage() . "br";
            return false;
        }
    }

    function chofer(){
        include 'funciones/db.php';
        try{
            return $conexion->query("SELECT * FROM choferes");

        }catch(Exception $e){
            echo "Error!!! " . $e->getMessage() . "br";
            return false;
        }
    }