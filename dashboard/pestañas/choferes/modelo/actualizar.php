<?php



if (isset($_POST['accion']) == 'actualizar') {
    include '../funciones/db.php';

    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $apellidos = filter_var($_POST['apellidos'], FILTER_SANITIZE_STRING);
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
    $tipoLicencia = filter_var($_POST['tipoLicencia'], FILTER_SANITIZE_STRING);
    $numLicencia = filter_var($_POST['numLicencia'], FILTER_SANITIZE_STRING);
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_STRING);
    $fechaNac = filter_var($_POST['fechaNac'], FILTER_SANITIZE_STRING);
    $direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);

    $id = filter_var($_POST['idChofer'], FILTER_VALIDATE_INT);
    try {
        $stmt = $conexion->prepare("UPDATE choferes SET nombre = ?, apellidos = ?, telefono = ?, tipoLicencia = ?, numLicencia = ?, correo = ?, fechaNac = ?, direccion = ? WHERE idChofer = ?");
        $stmt->bind_param('ssssssssi',$nombre, $apellidos, $telefono, $tipoLicencia, $numLicencia, $correo, $fechaNac, $direccion, $id);
        $stmt->execute();

        if($stmt->affected_rows == 1){
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }else{
            $respuesta = array(
                'respuesta' => 'error'
            );
        }

        $stmt->close();
        $conexion->close();
    } catch (Exception $e) {
        $respuesta = array(
            'error' => $e->getMessage()
        );
    }

    echo json_encode($_POST);
}

        
        
    
