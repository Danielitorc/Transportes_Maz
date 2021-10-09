<?php 
    function obtenerChofer($id){
        include 'funciones/db.php';
        try{
            return $conexion->query("SELECT * FROM choferes WHERE idChofer = $id");

        }catch(Exception $e){
            echo "Error!!! " . $e->getMessage() . "br";
            return false;
        }
    }