<?php     
    include ('../../funciones/db.php');

    $empleados = "SELECT * FROM empleados";
    header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=Listado_Empleados.xls");
    ?>

    <table border="1">
        <caption>Listado de Empleados</caption>
        <tr>
            <th>IdEmpleado</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha de Nacimiento</th>
            <th>Direccion</th>
            <th>Estatus</th>
            <th>Usuario</th>
        </tr>
        <?php $resultado = mysqli_query($conexion, $empleados);
            while($row = mysqli_fetch_assoc($resultado)){
        ?>
        <tr>
            <td><?php echo $row['idEmpleado'];?></td>
            <td><?php echo $row['nombre'];?></td>
            <td><?php echo $row['apellidos'];?></td>
            <td><?php echo $row['telefono'];?></td>
            <td><?php echo $row['correo'];?></td>
            <td><?php echo $row['fechaNac'];?></td>
            <td><?php echo $row['direccion'];?></td>
            <td><?php echo $row['estatus'];?></td>


            <?php
                $idEmpleado =  $row['idEmpleado']; $row['idEmpleado'];
               if($row['usuario'] == 'creado'){
                    $sqlUser = "SELECT * FROM usuario WHERE idEmpleado = $idEmpleado";
                    $resultado2 = mysqli_query($conexion, $sqlUser);
                    $empleadoUser = mysqli_fetch_assoc($resultado2);?>
                    <td><?php echo $empleadoUser['usuario'];?></td>
                <?php }if($row['usuario'] == 'sin usuario'){ ?>
                    <td><?php echo $row['usuario'];?></td>
                <?php }                
                    ?>

        </tr>
        <?php } mysqli_free_result($resultado);?>
    </table>


    

