<?php
        include 'db.php';

        $solicitud = array();

            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $stmtn = $conexion->prepare("SELECT * FROM solicitudcotizacion WHERE id = ?");
            $stmtn->bind_param("i", $id);
            $stmtn->execute();
            $resultado = $stmtn->get_result();
            while($row = $resultado->fetch_assoc()) $solicitud[] = $row;
        

    
?>