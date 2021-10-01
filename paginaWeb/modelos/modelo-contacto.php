<?php error_reporting(E_ALL ^ E_NOTICE); ?>

<?php


    if(isset($_POST['accion']) == 'crear'){

        
        
        //Creara un nuevo registro en la BD
        require_once('../funciones/db.php');

        //Evitar inyeccion SQL
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $apellidos = filter_var($_POST['apellidos'], FILTER_SANITIZE_STRING);
        $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
        $empresa = filter_var($_POST['empresa'], FILTER_SANITIZE_STRING);
        $correo = filter_var($_POST['correo'], FILTER_SANITIZE_STRING);
        $datosRec = filter_var($_POST['datosRec'], FILTER_SANITIZE_STRING);
        $unidad = filter_var($_POST['unidad'], FILTER_SANITIZE_STRING);
        $fecha = filter_var($_POST['fecha'], FILTER_SANITIZE_STRING);
        $hora = filter_var($_POST['hora'], FILTER_SANITIZE_STRING);
        $datosEnt = filter_var($_POST['datosEnt'], FILTER_SANITIZE_STRING);
        $asegurar = filter_var($_POST['asegurar'], FILTER_SANITIZE_STRING);
        $valorMercancia = filter_var($_POST['valorMercancia'], FILTER_SANITIZE_STRING);
        $maniobras = filter_var($_POST['maniobras'], FILTER_SANITIZE_STRING);
        $comentariosManiobras = filter_var($_POST['comentariosManiobras'], FILTER_SANITIZE_STRING);
        $adicionales = filter_var($_POST['adicionales'], FILTER_SANITIZE_STRING);
        $ofertas = filter_var($_POST['ofertas'], FILTER_SANITIZE_STRING);

        try {
            $stmt = $conexion->prepare("INSERT INTO solicitudcotizacion (nombre, apellidos, telefono, empresa, correo, datosRec, unidad, fecha, hora, datosEnt, asegurar, valorMercancia, maniobras, comentariosManiobras, adicionales, ofertas) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

            $stmt->bind_param("ssssssssssssssss", $nombre, $apellidos, $telefono, $empresa, $correo, $datosRec,$unidad, $fecha, $hora, $datosEnt, $asegurar, $valorMercancia, $maniobras, $comentariosManiobras, $adicionales, $ofertas);
            
            $stmt->execute();

            if($stmt->affected_rows == 1){
                $respuesta = array(
                    'respuesta' => 'correcto',
                    'datos' => array(
                        'nombre' => $nombre,
                        'apellidos' => $apellidos,
                        'telefono' => $telefono,
                        'empresa' => $empresa,
                        'correo' => $correo,
                        'datosRec' => $datosRec,
                        'unidad' => $unidad,
                        'fecha' => $fecha,
                        'hora' => $hora,
                        'datosEnt' => $datosEnt,
                        'asegurar' => $asegurar,
                        'valorMercancia' => $valorMercancia,
                        'maniobras' => $maniobras,
                        'comentariosManiobras' => $comentariosManiobras,
                        'adicionales' => $adicionales,
                        'ofertas' => $ofertas,
                        'id_insertado' => $stmt->insert_id
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
    
?>