<?php

    if(isset($_POST['accion']) == 'crear'){

        require_once('../../../funciones/db.php');
        //Se creara nuevo registro en la BD

        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $apellidos = filter_var($_POST['apellidos'], FILTER_SANITIZE_STRING);
        $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
        $tipoLicencia = filter_var($_POST['tipoLicencia'], FILTER_SANITIZE_STRING);
        $numLicencia = filter_var($_POST['numLicencia'], FILTER_SANITIZE_STRING);
        $correo = filter_var($_POST['correo'], FILTER_SANITIZE_STRING);
        $fechaNac = filter_var($_POST['fechaNac'], FILTER_SANITIZE_STRING);
        $direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);

        try {
            $stmt = $conexion->prepare("INSERT INTO choferes (nombre, apellidos, telefono, tipoLicencia, numLicencia, correo, fechaNac, direccion) VALUES (?,?,?,?,?,?,?,?)");

            $stmt->bind_param("ssssssss", $nombre, $apellidos, $telefono, $tipoLicencia, $numLicencia, $correo, $fechaNac, $direccion);

            $stmt->execute();

            if($stmt->affected_rows == 1){
                $respuesta = array(
                    'respuesta' => 'correcto',
                    'datos' => array(
                        'nombre' => $nombre,
                        'apellidos' => $apellidos,
                        'telefono' => $telefono,
                        'tipoLicencia' => $tipoLicencia,
                        'numLicencia' => $numLicencia,
                        'correo' => $correo,
                        'fechaNac' => $fechaNac,
                        'direccion' => $direccion,
                        'id_insert_chofer' => $stmt->insert_id
                    )
                );
            }

            
        $stmt->close();
        $conexion->close();
            
        } catch (Exception $e) {
            $respuesta = array(
                'error' => $e->getMessage()
            );
        }
        echo json_encode($respuesta);
    }

    if(isset($_GET['accion']) == 'borrar'){
        require_once('../../../funciones/db.php');

        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        try {
            $stmt = $conexion->prepare("DELETE FROM choferes WHERE idChofer = ?");
            $stmt->bind_param('i', $id);
            $stmt->execute();

            if($stmt->affected_rows == 1){
                $respuesta = array(
                    'respuesta' => 'correcto'
                );
            }

            $stmt->close();
            $conexion->close();
        } catch (Exception $e) {
            $respuesta = array(
                'error'=>$e->getMessage()
            );
        }
        echo json_encode($respuesta);
    }


            
            
        

    