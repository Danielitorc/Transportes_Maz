<?php
        include 'db.php';

        $solicitud = array();

            $id = ($_GET['id']);
            $stmtn = $conexion->prepare("SELECT * FROM solicitudcotizacion WHERE id = $id");
            $stmtn->execute();
            $resultado = $stmtn->get_result();
            while($row = $resultado->fetch_assoc()) $solicitud[] = $row;
        

    
?>