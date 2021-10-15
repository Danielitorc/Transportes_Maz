<?php
include 'funciones/funcionesEmpleados.php';
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
if (!$id) {
    die('No valido');
}

$resultado =  idEmpleado($id);

$empleado = $resultado->fetch_assoc();
?>

<link rel="stylesheet" href="../../../css/normalize.css">
<link rel="stylesheet" href="../../estilos/styleTablero.css">

<header class="header">
    <img class="logo" src="../../../img/logo.png" alt="">

    <p>Zoraya Ruiz</p>
    <p>Cerrar Sesión</p>
</header>

<div class="contenedor">
    <form action="#" class="form_empleados" id="actualizar_empleado">
        <fieldset>
            <legend>Datos del Empleado</legend>

            <div class="CampoId">
                <label for="" class="idChofer">Id del Empleado:</label>
                <input class="id" type="text" id="idEmpleado" name="idEmpleado" value="<?php echo $empleado["idEmpleado"] ? $empleado["idEmpleado"] : ''; ?>">

                </input>
            </div>

            <div class="campos3">
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input class="cajaTexto" type="text" id="nombre" name="nombre" value="<?php echo $empleado["nombre"] ? $empleado["nombre"] : ''; ?>">
                </div>

                <div class="campo">
                    <label for="apellidos">Apellidos</label>
                    <input class="cajaTexto" type="text" id="apellidos" name="apellidos" value="<?php echo $empleado["apellidos"] ? $empleado["apellidos"] : ''; ?>">
                </div>

                <div class="campo">
                    <label for="telefono">Teléfono</label>
                    <input class="cajaTexto" type="tel" id="telefono" name="telefono" value="<?php echo $empleado["telefono"] ? $empleado["telefono"] : ''; ?>">
                </div>


            </div>
            <div class="campos2">
                <div class="campo">
                    <label for="correo">Correo Electrónico</label>
                    <input class="cajaTexto" type="email" id="correo" name="correo" value="<?php echo $empleado["correo"] ? $empleado["correo"] : ''; ?>">
                </div>

                <div class="campo">
                    <label for="fechaNac">Fecha Nacimiento</label>
                    <input name="fechaNac" type="date" onclick="this.value = '1970-01-01';" id="fechaNac" value="<?php echo $empleado["fechaNac"] ? $empleado["fechaNac"] : ''; ?>">
                </div>
            </div>


            <div class="input_100">
                <div class="campo">
                    <label for="direccion">Dirección Completa</label>
                    <textarea name="direccion" placeholder="Ingrese la dirección completa del chofer" id="direccion" value="<?php echo $empleado["direccion"] ? $empleado["direccion"] : ''; ?>">
                        <?php echo $empleado["direccion"] ? $empleado["direccion"] : ''; ?></textarea>
                </div>

            </div>
        </fieldset>

        <div class="campo enviar">
            <input type="hidden" id="accion" value="actualizar">
            <input type="submit" value="actualizar">
        </div>
    </form>
</div>


<script type="text/javascript">
    const formEmpleados = document.querySelector('#actualizar_empleado');

    eventListeners();

    function eventListeners() {
        formEmpleados.addEventListener('submit', leerFormulario);
    }

    function leerFormulario(e) {
        e.preventDefault();

        const idEmpleado = document.querySelector('#idEmpleado').value;
        const nombre = document.querySelector('#nombre').value;
        const apellidos = document.querySelector('#apellidos').value;
        const telefono = document.querySelector('#telefono').value;
        const correo = document.querySelector('#correo').value;
        const fechaNac = document.querySelector('#fechaNac').value;
        const direccion = document.querySelector('#direccion').value;
        const accion = document.querySelector('#accion').value;

        if (nombre === '' || apellidos === '' || telefono === '' || correo === '' || fechaNac === '' || direccion === '') {
            mostrarNotificacion('Todos los campos son obligatorios', 'error');
        } else {

            const infoEmpleado = new FormData();

            infoEmpleado.append('idEmpleado', idEmpleado);
            infoEmpleado.append('nombre', nombre);
            infoEmpleado.append('apellidos', apellidos);
            infoEmpleado.append('telefono', telefono);
            infoEmpleado.append('correo', correo);
            infoEmpleado.append('fechaNac', fechaNac);
            infoEmpleado.append('direccion', direccion.trim(direccion));
            infoEmpleado.append('accion', accion);

            let id = parseInt(idEmpleado)
                console.log(id)

            mostrarNotificacion('Los datos se guardaron Correctamente', 'correcto');
            if (accion === 'actualizar') {
                actualizarEmpleado(infoEmpleado);
            }
            document.querySelector('form').reset();
        }

    }

    function actualizarEmpleado(datos) {
        //llamado ajax

        //creo el objeto
        const xhr = new XMLHttpRequest();

        //abro la conexion
        xhr.open('POST', 'modelo/actualizarEmp.php', true);

        //paso los datos
        xhr.onload = function() {
            if (this.status === 200) {
                //leo la respuesta de PHP

                const respuesta = JSON.parse(xhr.responseText);

                console.log(respuesta)

                setTimeout(() => {
                    window.location.replace('../../dashboard.php')
                }, 3000);

            }
        }

        //envio los datos
        xhr.send(datos);
    }

    function mostrarNotificacion(mensaje, clase) {
        const notificacion = document.createElement('DIV');
        notificacion.classList.add(clase, 'notificacion');
        notificacion.textContent = mensaje;

        formEmpleados.insertBefore(notificacion, document.querySelector('form fieldset'));

        setTimeout(() => {
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