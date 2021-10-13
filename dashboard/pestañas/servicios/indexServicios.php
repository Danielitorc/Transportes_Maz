<body>

    <div class="tabla-pendientes">

        <h2>Cotizaciones para Asignar Servicio</h2>
        <div class="lEmpleados">
            <table id="listado-cotizaciones">
                <thead>
                    <tr>
                        <th>Solicitud</th>
                        <th>Cotizacion</th>
                        <th>Nombre</th>
                        <th>Empresa</th>
                        <th>Unidad</th>
                        <th>Fecha de Recolección</th>
                        <th>Hora</th>
                        <th>Generar Servicio</th>

                    </tr>
                </thead>

                <tbody>
                    <tr>

                        <?php include 'funciones/mostrarCotizaciones.php';
                        $cotizaciones = obtenerCotizaciones();
                        if ($cotizaciones->num_rows) {
                            foreach ($cotizaciones as $cotizacion) {
                        ?>


                            <td><?php echo $cotizacion['id']; ?></td>
                            <td><?php echo $cotizacion['idCotizacion']; ?></td>
                            <td><?php echo $cotizacion['nombre']." ". $cotizacion['apellidos']; ?></td>
                            <td><?php echo $cotizacion['empresa']; ?></td>
                            <td><?php echo $cotizacion['unidad']; ?></td>
                            <td><?php echo $cotizacion['fecha']; ?></td>
                            <td><?php echo $cotizacion['hora']; ?></td>
                            <td class="centrar-texto">
                                <a target='_blank' href="pestañas/servicios/agregarServicio.php?id=<?php echo $cotizacion['idCotizacion']; ?>" class="btn_nuevoChofer btn" style="font-weight: bold;"><i class="far fa-plus-square"></i></a>
                            </td>

                    </tr>
                    <?php
                            }
                        }
                    ?>

                </tbody>
            </table>

        </div>
    </div>