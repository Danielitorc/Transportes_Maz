<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/normalize.css">
    <link rel="stylesheet" href="../../estilos/styleTablero.css">
    <title>Nuevo Usurio</title>
</head>

<body>
    <header class="header">
        <img class="logo" src="../../../img/logo.png" alt="">

        <p>Zoraya Ruiz</p>
        <p>Cerrar Sesión</p>
    </header>

    <div class="contenedor">


        <form action="#" class="form_usuario" id="form_usuario">
            <fieldset>
                <legend>Nuevo Usuario</legend>

                <div class="datosUser">
                    <div class="campos2">
                        <div class="campo">
                            <label for="">IdEmpleado:</label>
                        </div>

                        <div class="campo">
                            <label for="">Nombre:</label>
                        </div>
                    </div>
                </div>

                <div class="nuevoUsuario">

                    <div class="campo">
                        <select name="idRol" id="idRol">
                            <option value="" disabled selected>-- Seleccione Rol de Usuario</option>
                            <option value="1">Administrador</option>
                            <option value="2">Colaborador</option>
                        </select>
                    </div>

                    <div class="campo">
                        <label for="usuario">Usuario</label>
                        <input class="user" type="text" id="usuario" name="usuario">
                    </div>

                    <div class="campo">
                        <label for="">Password</label>
                        <input class="user" type="password" id="password" name="password">
                    </div>

                    <div class="campo">
                        <label for="">Confirma Password</label>
                        <input class="user" type="password" id="confirmPassword" name="confirmPassword">
                    </div>
                </div>

            </fieldset>

            <div class="campo enviar">
                <input type="hidden" id="accion" value="crear">
                <input type="submit" value="GUARDAR">
            </div>

        </form>
    </div>

</body>

</html>