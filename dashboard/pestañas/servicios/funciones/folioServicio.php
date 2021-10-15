<?php

    include('db.php');

    $servicio = array();

    $id = filter_var($_GET['idServicio'], FILTER_VALIDATE_INT);
    $stmt = $conexion->prepare('SELECT servicios.idServicio, servicios.idCotizacion, servicios.idSolicitud, choferes.nombreCh, choferes.apellidosCh, choferes.numLicencia, solicitudcotizacion.empresa, solicitudcotizacion.nombre, solicitudcotizacion.apellidos, solicitudcotizacion.telefono, solicitudcotizacion.unidad, solicitudcotizacion.datosRec, solicitudcotizacion.fecha, solicitudcotizacion.hora, solicitudcotizacion.adicionales, solicitudcotizacion.datosEnt, solicitudcotizacion.asegurar, solicitudcotizacion.comentariosManiobras, servicios.empresaEntrega, servicios.nombreEntrega, servicios.puesto, servicios.telefonoEnt, servicios.placas FROM servicios 
    INNER JOIN solicitudcotizacion ON servicios.idSolicitud = solicitudcotizacion.id 
    INNER JOIN choferes ON servicios.idChofer = choferes.idChofer 
    INNER JOIN cotizacion ON servicios.idCotizacion = cotizacion.idCotizacion WHERE servicios.idServicio = ?');

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    while($row = $resultado->fetch_assoc()) $servicio[] = $row;