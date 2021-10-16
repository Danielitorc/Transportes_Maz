<?php     
    include ('../../funciones/db.php');

    $choferes = "SELECT * FROM choferes";
    header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=Listado_Empleados.xls");
    ?>

 <table border="1">
        <caption>Listado de Choferes</caption>
        <tr>
            <th>IdChofer</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Tipo de Licencia</th>
            <th>Numero de Licencia</th>
            <th>Correo</th>
            <th>Fecha de Nacimiento</th>
            <th>Direccion</th>
        </tr>
        <?php $resultado = mysqli_query($conexion, $choferes);
            while($row = mysqli_fetch_assoc($resultado)){
        ?>
        <tr>
            <td><?php echo $row['idChofer'];?></td>
            <td><?php echo $row['nombreCh'];?></td>
            <td><?php echo $row['apellidosCh'];?></td>
            <td><?php echo $row['telefonoCh'];?></td>
            <td><?php echo $row['tipoLicencia'];?></td>
            <td><?php echo $row['numLicencia'];?></td>
            <td><?php echo $row['correoCh'];?></td>
            <td><?php echo $row['fechaNacCh'];?></td>
            <td><?php echo $row['direccionCh'];?></td>

        </tr>
        <?php } mysqli_free_result($resultado);?>
    </table>