<?php

    //Funcion para mostrar las solicitudes pendientes por cotizar en el dashboard
    function obtenerEmpleados(){
        include 'funciones/db.php';
        try{
            return $conexion->query("SELECT * FROM empleados WHERE estatus = 'activo' ");

        }catch(Exception $e){
            echo "Error!!! " . $e->getMessage() . "br";
            return false;
        }
    }