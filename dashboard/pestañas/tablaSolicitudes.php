

<h2>Solicitudes por Cotizar</h2>
<div class="scroll">
    <table id="listado-contactos">
        <thead>
            <tr>
                
                <th>Empresa</th>
                <th>Nombre</th>
                <th>Fecha Recolección</th>
                <th>Estado Origen</th>
                <th>Estado Entrega</th>
                <th>Unidad</th>
                
                <th>Exportar</th>
                <th>Cotizar</th>

            </tr>
        </thead>
        
            <tbody>

            <?php include 'funciones/funciones.php';
                $solicitudes = obtenerSolicitudes();
                if($solicitudes->num_rows){ 
                    foreach($solicitudes as $solicitud){?>
                        <tr>
                            
                            <td><?php echo $solicitud['empresa']; ?></td>
                            <td><?php echo $solicitud['nombre'] ;?></td>
                            <td><?php echo $solicitud['fecha'];?></td>
                            <td><?php echo $solicitud['datosRec'];?></td>
                            <td><?php echo $solicitud['datosEnt'];?></td>
                            <td><?php echo $solicitud['unidad'];?></td>

                            <!-- <td> <a href="pestañas/cotizar.php" target='_blank'>Cotizar</a> </td> -->
                            <td> <?php 
                                echo "<a class='cotSolicitud' target='_blank' href='pestañas/cotizar.php?idsolicitud=" . $solicitud['id'] . "'>Cotizar</a>";
                            ?> </td>
                        </tr>

                    <?php } 
            } ?>

        </tbody>
    </table>
</div>

