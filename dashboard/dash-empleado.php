<?php
session_start();
if(!isset($_SESSION['rol'])){
    header("location: login.php");
}else{
    if($_SESSION['rol'] != 2){
        header("location: login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="estilos/styleTablero.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <title>Dashboar | Transportes MAZ </title>
</head>

<body>

    <header class="header">
        <img class="logo" src="../img/logo.png" alt="">

        <?php $varsesion = $_SESSION['username']; echo "<p>$varsesion</p>" ?>
        
        <a class="icono_exit" href="funciones/cerrarsesion.php">
            <div class="exit">
                <span> Cerrar Sesión</span> 
                <i class="fas fa-sign-out-alt"></i>
            </div>
        </a>
        
    </header>

    <aside class="aside">
        <section class="menu-lateral">
            <ul class="tabs">
                <a class="btn-lateral">
                    <li data-paso="1">Solicitudes</li>
                </a>
                <a class="btn-lateral">
                    <li data-paso="2">Asignar Ruta</li>
                </a>
            </ul>
        </section>



    </aside>

    <div class="tablero">
                    
        <div id="paso-1" class="tabla-pendientes seccion">
        <?php include 'pestañas/tablaSolicitudes.php';?>
        </div>

        <div id="paso-2" class="ruta seccion">
            <?php include 'pestañas/servicios/indexServicios.php';?>
        </div>

        <div id="paso-3" class="choferes seccion">
            <?php include 'pestañas/choferes/indexChoferes.php' ?>
        </div>

    </div>

    <script src="js/paginacion.js"></script>


</body>
</html>