<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/normalize.css">
    <link rel="stylesheet" href="../../estilos/styleTablero.css">
    <title>Gestion Choferes</title>
</head>

<body>

    <header class="header">
        <img class="logo" src="../../../img/logo.png" alt="">

        <p>Zoraya Ruiz</p>
        <p>Cerrar Sesión</p>
    </header>

    <div class="contenedor">
        <form action="#" class="form_choferes" id="form_choferes">
            <fieldset>
                <legend>Datos del Chofer</legend>

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

                <div class="campos4 abajo">
                    <div class="campo">
                        <select name="tipoLicencia" id="tipoLicencia">
                            <option value="" disabled selected>-- Seleccione Tipo de Licencia</option>
                            <option value="Licencia tipo A">Licencia tipo A</option>
                            <option value="Licencia tipo B">Licencia tipo B</option>
                            <option value="Licencia tipo C">Licencia tipo C</option>
                            <option value="Licencia tipo D">Licencia tipo D</option>
                            <option value="Licencia tipo E">Licencia tipo E</option>
                            <option value="Licencia tipo E1">Licencia tipo E1</option>
                        </select>
                    </div>

                    <div class="campo">
                        <label for="numLicencia">Número Licencia</label>
                        <input class="cajaTexto" type="text" id="numLicencia" name="numLicencia">
                    </div>

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
                        <textarea name="direccion" placeholder="Ingrese la dirección completa del chofer" id="direccion"></textarea>
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
        
        const formularioChoferes = document.querySelector('#form_choferes');

        eventListeners();

        function eventListeners(){
            formularioChoferes.addEventListener('submit', leerFormulario);
        }

        function leerFormulario(e){
            e.preventDefault();

            const nombre = document.querySelector('#nombre').value;
            const apellidos = document.querySelector('#apellidos').value;
            const telefono = document.querySelector('#telefono').value;
            const tipoLicencia = document.querySelector('#tipoLicencia').value;
            const numLicencia = document.querySelector('#numLicencia').value;
            const correo = document.querySelector('#correo').value;
            const fechaNac = document.querySelector('#fechaNac').value;
            const direccion = document.querySelector('#direccion').value;

            if(nombre === '' || apellidos === '' || telefono === '' || numLicencia === '' || tipoLicencia === '' || correo === '' || fechaNac === '' || direccion === ''){
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