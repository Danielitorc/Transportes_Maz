<?php


if (isset($_GET['accion']) == 'borrar') {
    require_once('../funciones/db.php');

    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    try {
        $stmt = $conexion->prepare("UPDATE empleados SET estatus = 'deshabilitado' WHERE idEmpleado = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if ($stmt->affected_rows == 1) {
            $respuesta = array(
                'respuesta' => 'correcto'
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
