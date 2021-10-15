<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <title>Gestion Uusuarios</title>
</head>

<body>

    <!-- Cabecera del listado de choferes "buscar mostrar y ocultar formulario" -->
    <div class="contenedor">

    </div>

    <div class="tabla-pendientes">
        <?php include 'funciones/funcionesEmp.php'; ?>

        <h2>Listado Empleados sin Usuario</h2>
        <div class="lChoferes">
            <table id="listado-usuarios">
                <thead>
                    <tr>

                        <th>IdEmpleado</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Agregar Usuario</th>

                    </tr>
                </thead>

                <tbody>
                    <tr>

                        <?php
                        $empleados = obtenerEmp();
                        if ($empleados->num_rows) {
                            foreach ($empleados as $empleado) { ?>
                    <tr>


                        <td><?php echo $empleado['idEmpleado']; ?></td>
                        <td><?php echo $empleado['nombre'] . " " . $empleado['apellidos']; ?></td>
                        <td><?php echo $empleado['correo']; ?></td>

                        <td>
                            <a href="pestañas/usuarios/agregarUser.php?id=<?php echo $empleado['idEmpleado']; ?>" class="btn_nuevoChofer btn"><i class="far fa-plus-square"></i></a>
                        </td>
                    </tr>

            <?php }
                        } ?>


            </tr>

                </tbody>
            </table>
        </div>
    </div>