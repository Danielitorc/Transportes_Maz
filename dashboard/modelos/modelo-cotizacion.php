<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php

if(isset($_POST['accion']) == 'cotizar'){
    require_once('../funciones/db.php');

    //Evitar inyeccion SQL
    $id = filter_var($_POST['idSolicitud'], FILTER_SANITIZE_NUMBER_INT);
    $costoFlete = filter_var($_POST['costoFlete'], FILTER_SANITIZE_NUMBER_FLOAT);
    $costoManiobras = filter_var($_POST['costoManiobras'], FILTER_SANITIZE_NUMBER_FLOAT);
    $costoSeguro = filter_var($_POST['costoSeguro'], FILTER_SANITIZE_NUMBER_FLOAT);
    $comentariosTM = filter_var($_POST['comentariosTM'], FILTER_SANITIZE_STRING);


    //Evitar que la pagina se caiga por un posible error de inserccion de datos
    try{
        $stmt = $conexion->prepare("INSERT INTO cotizacion (idSolicitud, costoFlete, costoManiobras, costoSeguro, comentariosTM) VALUES (?,?,?,?,?)");
        $stmt->bind_param("iddds", $id, $costoFlete, $costoManiobras, $costoSeguro, $comentariosTM);
        $stmt->execute();

        $stmt1 = ("UPDATE `solicitudcotizacion` SET `estatus` = 'cotizado' WHERE `solicitudcotizacion`.`id` = $id;");
        $resultado3 = mysqli_query($conexion, $stmt1);

        //Presento los datos en forma de Json
        if($stmt->affected_rows){
            $res = array(
                'respuesta' => 'correcto',
                'datos' => array(
                  'idSolicitud' => $id,
                  'costoFlete' => $costoFlete,
                  'costoManiobras' => $costoManiobras,
                  'costoSeguro' => $costoSeguro,
                  'comentariosTM' => $comentariosTM,
                  'id_insert_cot' => $stmt->insert_id
                )
            );
        }

        $stmt->close();
        $conexion->close();

    }catch(Exception $e){
        $respuesta = array(
            'error' => $e->getMessage()
        );
    }

    //Convierto la respuesta en Json como un medio de transporte
    echo json_encode($res);


}
