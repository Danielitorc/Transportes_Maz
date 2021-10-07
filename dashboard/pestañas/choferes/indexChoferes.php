<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <title>Gestion Choferes</title>
</head>

<body>

    <!-- Cabecera del listado de choferes "buscar mostrar y ocultar formulario" -->
    <div class="contenedor">
        <div class="campos2">

            <div>
                <label for="">Buscar Chofer</label>
                <input class="cajaTexto" type="text" id="buscar">
            </div>

            <div class="nuevoChofer">
                <label for="btn_nuevoChofer">Agregar Nuevo</label>
                <a href="pestañas/choferes/formChoferes.php" class="btn_nuevoChofer btn"><i class="far fa-plus-square" ></i></a>
            </div>
        </div>

    </div>

    <div class="tabla-pendientes">
        <h2>Listado de Choferes</h2>
        <div class="lChoferes">
            <table id="listado-contactos ">
                <thead>
                    <tr>

                        <th>IdChofer</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Tipo Licencia</th>
                        <th>Numero Licencia</th>
                        <th>Correo</th>
                        <th>Exportar</th>
                        <th>Acciones</th>

                    </tr>
                </thead>

                <tbody>
                    <tr>

                        <td>Hola</td>
                        <td>Hola</td>
                        <td>Hola</td>
                        <td>Hola</td>
                        <td>Hola</td>
                        <td>Hola</td>
                        <td>Hola</td>
                        <td>
                            <a href="#" class="btn-editar btn">
                                <i class="fas fa-pen-square"></i>
                            </a>
                            <button data-id="1" type="button" class="btn-borrar btn">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>