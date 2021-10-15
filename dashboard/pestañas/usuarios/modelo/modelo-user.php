

<?php
    if(isset($_POST['accion']) == 'crear'){

        require_once('../funciones/db.php');
        $id = filter_var($_POST['idEmp'], FILTER_SANITIZE_NUMBER_INT);
        $idRol = filter_var($_POST['idRol'], FILTER_SANITIZE_NUMBER_INT);
        $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    
        try {
            $stmt = $conexion->prepare("INSERT INTO usuario (idRol, idEmpleado, usuario, pass) VALUES (?,?,?,?)");
            $stmt->bind_param("iiss", $idRol, $id, $usuario, $password);
            $stmt->execute();

            $stmt2 = "UPDATE empleados SET usuario = 'creado' WHERE empleados.IdEmpleado = $id";
            $resultado3 = mysqli_query($conexion, $stmt2);

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


        
        echo json_encode($respuesta);
    }
?>