<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <title>Gestion Empleados</title>
</head>

<body>

    <div class="contenedor">
        <div class="campos2">

            <!-- <div>
                <label for="">Buscar empleado</label>
                <input class="cajaTexto" type="text" id="buscar">
            </div> -->

            <div class="nuevoChofer">
                <label for="btn_nuevoChofer">Agregar Nuevo</label>
                <a href="pestañas/empleados/nuevoEmpleado.php" class="btn_nuevoChofer btn"><i class="far fa-plus-square"></i></a>
            </div>
        </div>

    </div>

    <div class="tabla-pendientes">

        <h2>Listado de Empleados</h2>
        <div class="lEmpleados">
            <table id="listado-empleados">
                <thead>
                    <tr>

                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Correo Electrónico</th>
                        <th class="exportar">Exportar</th>
                        <!--Si el usuario = sin usuario CREAR USUARIO sino no mostrar nada-->
                        <th>Acciones</th>

                    </tr>
                </thead>

                <tbody>
                    <tr>

                        <?php include 'funciones/funcionesEmpleados.php';
                        $empleados = obtenerEmpleados();
                        if ($empleados->num_rows) {
                            foreach ($empleados as $empleado) {
                        ?>


                            <td><?php echo $empleado['idEmpleado']; ?></td>
                            <td><?php echo $empleado['nombre']; ?></td>
                            <td><?php echo $empleado['apellidos']; ?></td>
                            <td><?php echo $empleado['telefono']; ?></td>
                            <td><?php echo $empleado['correo']; ?></td>

                            <td class="exportar">
                                <a href="#">
                                    <img src="img/Microsoft-Excel-2013-icon.png" alt="" style="width: 40%; cursor: pointer;">
                                </a>
                            </td>

                            <td>
                                <a href="pestañas/empleados/editarEmpleado.php?id=<?php echo $empleado['idEmpleado']; ?>" class="btn-editar btn">
                                    <i class="fas fa-pen-square"></i>
                                </a>

                                <button data-id="<?php echo $empleado['idEmpleado']; ?>" type="button" class="btn-borrar btn">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
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

    <script type="text/javascript">
        const listadoEmpleados = document.querySelector('#listado-empleados  tbody');
        // const inputBuscador = document.querySelector('#buscar');


        eventListeners();

        function eventListeners() {
            listadoEmpleados.addEventListener('click', eliminarEmpleado);

        }

        function eliminarEmpleado(e) {
            if (e.target.parentElement.classList.contains('btn-borrar')) {
                //Tomar el id que se va eliminar
                const id = e.target.parentElement.getAttribute('data-id');

                const respuesta = confirm('Esta seguro que desea eliminar al Empleado');

                if (respuesta) {
                    //LLAMADO AJAX
                    //CREO EL OBJETO
                    const xhr = new XMLHttpRequest();

                    //ABRO LA CONEXION              
                    xhr.open('GET', `pestañas/empleados/modelo/modelo-empleado.php?id=${id}&accion=borrar`, true);

                    //LEO RESPUESTA
                    xhr.onload = function() {
                        if (this.status == 200) {
                            const resultado = JSON.parse(xhr.responseText);
                            console.log(resultado);

                            if (resultado.respuesta == 'correcto') {

                                //Lo elimino del DOM (Tabla)
                                console.log(e.target.parentElement.parentElement.parentElement);
                                e.target.parentElement.parentElement.parentElement.remove();


                                //Muestro Notificacion de que se elimino correctamente
                                console.log("Se elimino correctamente")
                            }
                        }
                    }
                    //ENVIO PETICION
                    xhr.send();
                }

            }
        }
    </script>
</body>