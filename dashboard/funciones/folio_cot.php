<?php
    include 'db.php';

    //Obtengo el folio de la cotizacion creada y realizo la consulta para despues anexar los datos PDF

    $cotizacion = array();

    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $stmtn = $conexion->prepare("SELECT * FROM solicitudcotizacion INNER JOIN cotizacion ON solicitudcotizacion.id = cotizacion.idSolicitud WHERE idCotizacion = ?;
    ");

    $stmtn->bind_param("i", $id);
    $stmtn->execute();
    $resultado = $stmtn->get_result();
    while($row = $resultado->fetch_assoc()) $cotizacion[] = $row;
    

    
?>