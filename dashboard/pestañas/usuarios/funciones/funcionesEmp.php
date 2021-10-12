<?php

function obtenerEmp(){
    include 'funciones/db.php';
    try{
        return $conexion->query("SELECT * FROM empleados WHERE usuario = 'sin usuario' ");

    }catch(Exception $e){
        echo "Error!!! " . $e->getMessage() . "br";
        return false;
    }
}

function idEmp($id){
    include 'funciones/db.php';
    try{
        return $conexion->query("SELECT * FROM empleados WHERE idEmpleado = $id ");

    }catch(Exception $e){
        echo "Error!!! " . $e->getMessage() . "br";
        return false;
    }
}