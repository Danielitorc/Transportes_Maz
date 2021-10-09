<?php

    //Funcion para mostrar las solicitudes pendientes por cotizar en el dashboard
    function obtenerChoferes(){
        include 'funciones/db.php';
        try{
            return $conexion->query("SELECT * FROM choferes");

        }catch(Exception $e){
            echo "Error!!! " . $e->getMessage() . "br";
            return false;
        }
    }
?>