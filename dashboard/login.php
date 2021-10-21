<?php


session_start();

    if (isset($_SESSION['rol'])) {
        switch ($_SESSION['rol']) {
            case 1:
                header("location: dashboard.php");
                break;

            case 2:
                header("location: dash-empleado.php");
                break;

            default:
        }
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        error_reporting(0);
        include("funciones/db.php");

        $sql = "SELECT * FROM usuario WHERE usuario = '$username' AND pass = '$password'";
        $resultado = mysqli_query($conexion, $sql);
        $_SESSION['username'] = $username;

        $row = mysqli_fetch_array($resultado);
        if ($row == true & $row) {
            $rol = $row[1];
            $_SESSION['rol'] = $rol;

            switch ($_SESSION['rol']) {
                case 1:
                    header("location: dashboard.php");
                    break;

                case 2:
                    header("location: dash-empleado.php");
                    break;

                default:
            }
        } else {             echo "<h2>Usuario o contraseña Incorrectos</h2>";
        }
    } ?> 

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="estilos/estilosL.css">
    <title>Inicio de Sesión</title>
</head>

<body>

    <div class="login-box">
        <img class="avatar" src="../img/TM.png" alt="Logo transportes MAZ">
        <h1>Iniciar Sesión</h1>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

            <label for="username">Usuario</label>
            <input type="text" id="username" name="username" placeholder="Ingrese Usuario">


            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Ingrese contraseña">


            <input type="submit" class="formulario__submit" name="enviar" value="entrar">
        </form>

    </div>


</body>
    

        