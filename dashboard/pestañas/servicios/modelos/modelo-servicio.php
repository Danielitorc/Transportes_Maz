<?php

if(isset($_POST['accion']) == 'crearServicio'){
    require_once('../funciones/db.php');

    $idCotizacion = filter_var($_POST['idCotizacion'], FILTER_VALIDATE_INT );
    $idSolicitud = filter_var($_POST['idSolicitud'], FILTER_VALIDATE_INT);
    $empresaEntrega = filter_var($_POST['empresaEntrega'], FILTER_SANITIZE_STRING );
    $nombreEntrega = filter_var($_POST['nombreEntrega'], FILTER_SANITIZE_STRING);
    $puesto = filter_var($_POST['puesto'], FILTER_SANITIZE_STRING);
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
    $placas = filter_var($_POST['placas'], FILTER_SANITIZE_STRING);
    $idChofer = filter_var($_POST['chofer'], FILTER_VALIDATE_INT);

    try {
        $stmt = $conexion->prepare("INSERT INTO servicios (idCotizacion, idSolicitud, empresaEntrega, nombreEntrega, puesto, telefonoEnt, idChofer, placas) 
        VALUES (?,?,?,?,?,?,?,?)");

        $stmt->bind_param("iissssis", $idCotizacion, $idSolicitud, $empresaEntrega, $nombreEntrega, $puesto, $telefono, $idChofer, $placas);

        $stmt->execute();
        
        $stmt1 = ("UPDATE cotizacion SET estatus = 'servicio generado' WHERE cotizacion.idCotizacion = $idCotizacion;");
        $resultado = mysqli_query($conexion, $stmt1);

        if($stmt->affected_rows == 1){
            $respuesta = array(
                'respuesta' => 'correcto',
                'datos' => array(
                  'idCotizacion' => $idCotizacion,
                  'idSolicitud' => $idSolicitud,
                  'empresaEntrega' => $empresaEntrega,
                  'nombreEntrega' => $nombreEntrega,
                  'puesto' => $puesto,
                  'telefono' => $telefono,
                  'idChofer' => $idChofer,
                  'placas' => $placas,
                  'id_insert_servicio' => $stmt->insert_id
                )
            );
        }

        $stmt->close();
        $conexion->close();

    } catch(Exception $e){
        $respuesta = array(
            'error' => $e->getMessage()
        );
    }

    echo json_encode($respuesta);
}   