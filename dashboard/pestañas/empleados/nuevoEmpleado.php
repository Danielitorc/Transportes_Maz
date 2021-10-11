<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/normalize.css">
    <link rel="stylesheet" href="../../estilos/styleTablero.css">
    <title>Gestion Empleados</title>
</head>

<body>
    <header class="header">
        <img class="logo" src="../../../img/logo.png" alt="">

        <p>Zoraya Ruiz</p>
        <p>Cerrar Sesión</p>
    </header>

    <div class="contenedor">
        <form action="#" class="form_empleados" id="form_empleados">
            <fieldset>
                <legend>Datos del Empleado</legend>

                <div class="campos3">
                    <div class="campo">
                        <label for="nombre">Nombre</label>
                        <input class="cajaTexto" type="text" id="nombre" name="nombre">
                    </div>

                    <div class="campo">
                        <label for="apellidos">Apellidos</label>
                        <input class="cajaTexto" type="text" id="apellidos" name="apellidos">
                    </div>

                    <div class="campo">
                        <label for="telefono">Teléfono</label>
                        <input class="cajaTexto" type="tel" id="telefono" name="telefono">
                    </div>

                </div>

                <div class="campos2">

                    <div class="campo">
                        <label for="correo">Correo Electrónico</label>
                        <input class="cajaTexto" type="email" id="correo" name="correo">
                    </div>

                    <div class="campo">
                        <label for="fechaNac">Fecha Nacimiento</label>
                        <input name="fechaNac" type="date" onclick="this.value = '1970-01-01';" id="fechaNac" />
                    </div>
                </div>

                <div class="input_100">
                    <div class="campo">
                        <label for="direccion">Dirección Completa</label>
                        <textarea name="direccion" placeholder="Ingrese la dirección completa del empleado" id="direccion"></textarea>
                    </div>

                </div>
            </fieldset>

            <div class="campo enviar">
                <input type="hidden" id="accion" value="crear">
                <input type="submit" value="GUARDAR">
            </div>
        </form>
    </div>

    <script type="text/javascript">
        
        const formularioEmpleados = document.querySelector('#form_empleados');

        eventListeners();

        function eventListeners(){
            formularioEmpleados.addEventListener('submit', leerFormulario);
        }

        function leerFormulario(e){
            e.preventDefault();

            const nombre = document.querySelector('#nombre').value;
            const apellidos = document.querySelector('#apellidos').value;
            const telefono = document.querySelector('#telefono').value;
            const correo = document.querySelector('#correo').value;
            const fechaNac = document.querySelector('#fechaNac').value;
            const direccion = document.querySelector('#direccion').value;
            const accion= document.querySelector('#accion').value;

            if(nombre === '' || apellidos === '' || telefono === '' || correo === '' || fechaNac === '' || direccion === ''){
                mostrarNotificacion('Todos los campos son Obligatorios', 'error');
            }else{
                mostrarNotificacion('Los datos se guardaron Correctamente', 'exito');
            }
            
        }

        function mostrarNotificacion(mensaje, clase){
            const notificacion = document.createElement('DIV');
            notificacion.classList.add(clase, 'notificacion');
            notificacion.textContent = mensaje

            formularioChoferes.insertBefore(notificacion, document.querySelector('form fieldset'));

            setTimeout(() =>{
                notificacion.classList.add('visible');
                setTimeout(() => {
                    notificacion.classList.remove('visible');
                    setTimeout(() => {
                        notificacion.remove();
                    }, 500);
                    notificacion.remove();
                }, 3000)
            }, 100);
        }

    </script>
</body>

</html>