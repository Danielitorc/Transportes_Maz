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

    <?php 
        include 'funciones/funcionesEmp.php';
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        if (!$id) {
            die('No valido');
        }

        $resultado =  idEmp($id);

        $empleado = $resultado->fetch_assoc();
?>
                    
        <form action="#" class="form_usuario" id="form_usuario">                   
            <fieldset>
                <legend>Nuevo Usuario</legend>
                
                <div class="campos2">
                        <div class="CampoId">
                            <label for="" class="idChofer">ID:</label>
                            <input type="text" name="idEmp" id="idEmp" class="id" 
                            value="<?php echo $empleado["idEmpleado"]; ?>"
                            readonly="readonly">
                        </div>

                        <div class="CampoId">
                        <label for="" class="idChofer">Nombre:</label>
                            <input type="text" name="" id="" style="border: none; color: rgb(21, 9, 196); font-weight: bold; font-size: 1.7rem"
                            value="<?php echo $empleado["nombre"]." ". $empleado["apellidos"]; ?>"
                            readonly="readonly">
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

<script type="text/javascript">
        
        const formularioUsuario = document.querySelector('#form_usuario');

        eventListeners();

        function eventListeners(){
            formularioUsuario.addEventListener('submit', leerFormulario);
        }

        function leerFormulario(e){
            e.preventDefault();

            const idEmp = document.querySelector('#idEmp').value;
            const idRol = document.querySelector('#idRol').value;
            const usuario = document.querySelector('#usuario').value;
            const password = document.querySelector('#password').value;
            const confirmPassword = document.querySelector('#confirmPassword').value;
            const accion= document.querySelector('#accion').value;

            
            if(password != confirmPassword){
                mostrarNotificacion('Las contraseñas no Coinciden', 'error');
            }else if(idRol === '' || usuario === '' || password === '' || confirmPassword === ''){
                mostrarNotificacion('Todos los campos son obligatorios', 'error');
            }else{
                
                const infoUsuario = new FormData();
                infoUsuario.append('idEmp', idEmp);
                infoUsuario.append('idRol', idRol);
                infoUsuario.append('usuario', usuario);
                infoUsuario.append('password', password);
                infoUsuario.append('accion', accion);
                
                mostrarNotificacion('Los datos se guardaron Correctamente', 'correcto');
                if(accion === 'crear'){
                    insertarUser(infoUsuario);
                }
            }
            
        }

        function insertarUser(datos){
            //llamado ajax

            //creo el objeto
            const xhr = new XMLHttpRequest();

            //abro la conexion
            xhr.open('POST', 'modelo/modelo-user.php', true);
            
            //paso los datos
            xhr.onload = function(){
                if(this.status === 200){
                    //leo la respuesta de PHP

                    const respuesta = JSON.parse( xhr.responseText );

                    setTimeout(() => {
                        window.location.replace('../../dashboard.php')
                    }, 3000);
                    document.querySelector('form').reset();
                }
            }

            //envio los datos
            xhr.send(datos);
        }

        function mostrarNotificacion(mensaje, clase){
            const notificacion = document.createElement('DIV');
            notificacion.classList.add(clase, 'notificacion');
            notificacion.textContent = mensaje;

            formularioUsuario.insertBefore(notificacion, document.querySelector('form fieldset'));

            setTimeout(() =>{
                notificacion.classList.add('visible');
                setTimeout(() => {
                    notificacion.classList.remove('visible');
                    setTimeout(() => {
                        notificacion.remove();
                    }, 500);
                }, 3000)
            }, 100);
        }

    </script>

</html>