<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="estilos/styleTablero.css">
    <title>Dashboar | Transportes MAZ </title>
</head>
<body>

    <header class="header">
        <!-- <img class="logo" src="../img/logo.png" alt=""> -->

        <p>Zoraya Ruiz</p>
        <p>Cerrar Sesión</p>
    </header>

    <aside class="aside">
        <section class="menu-lateral">
            <ul class="tabs">
                <a class="btn-lateral" ><li data-paso="1">Solicitudes</li> </a>
                <a class="btn-lateral" ><li data-paso="2">Asignar Ruta</li> </a>
                <a class="btn-lateral" ><li data-paso="3">Choferes</li> </a>
                <a class="btn-lateral" ><li data-paso="4">Empleados</li> </a>
                <a class="btn-lateral" ><li data-paso="5">Clientes</li> </a>
            </ul>
        </section>



    </aside>

    <div  class="tablero">
        <div id="paso-1" class="tabla-pendientes seccion">
            <?php include 'pestañas/tablaSolicitudes.php' ?>
        </div>

        <div id="paso-2" class="ruta seccion">
            <h2>Asignar Ruta</h2>
        </div>

        <div id="paso-3" class="choferes seccion">
            <h2>Choferes</h2>
        </div>
        
        <div id="paso-4" class="empleados seccion">
            <h2>Empleados</h2>
        </div>

        <div id="paso-5" class="clientes seccion">
            <h2>Clientes</h2>
           
        </div>
    </div>

    <script src="js/paginacion.js"></script>
    <script src="../js/app.js"></script>



</body>
</html>