<link rel="stylesheet" href="../../../css/normalize.css">
<link rel="stylesheet" href="../../estilos/styleTablero.css">

<body>
<?php

    include 'funciones/folioAct.php';

    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if(!$id){
        die('No valido');
    }

    $resultado = obtenerChofer($id);

    $chofer = $resultado->fetch_assoc();
    

?>



    <div class="contenedor">
        <form action="#" class="form_choferes" id="actualizar_chofer">

            <fieldset>
                <legend>Datos del Chofer</legend>

                <div class="CampoId">
                    <label for="" class="idChofer">Id del Chofer:</label>
                        <input class="cajaTexto" type="text" id="idChofer" name="idChofer" 
                        value="<?php echo $chofer["idChofer"] ? $chofer["idChofer"]:'';?>">
                    </input>
                </div>

                <div class="campos3">
                    <div class="campo">
                        <label for="nombre">Nombre</label>
                        <input class="cajaTexto" type="text" id="nombre" name="nombre" value="<?php echo $chofer["nombre"] ? $chofer["nombre"]:'';?>"></input>
                    </div>

                    <div class="campo">
                        <label for="apellidos">Apellidos</label>
                        <input class="cajaTexto" type="text" id="apellidos" name="apellidos" value="<?php echo $chofer["apellidos"] ? $chofer["apellidos"]:'';?>">
                    </div>

                    <div class="campo">
                        <label for="telefono">Teléfono</label>
                        <input class="cajaTexto" type="tel" id="telefono" name="telefono" 
                        value="<?php echo $chofer["telefono"] ? $chofer["telefono"]:'';?>">
                    </div>
                    

                </div>

                <div class="campos4 abajo">
                    <div class="campo">
                    <label for="">Elija Tipo de Licencia</label>
                        <select name="licencia" id="tipoLicencia" >
                            <option value="<?php echo $chofer["tipoLicencia"] ? $chofer["tipoLicencia"]:''; ?>" disabled selected><?php echo $chofer["tipoLicencia"] ? $chofer["tipoLicencia"]:''; ?></option>
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
                        <input class="cajaTexto" type="text" id="numLicencia" name="numLicencia" value="<?php echo $chofer["numLicencia"] ? $chofer["numLicencia"]:'' ; ?>">
                    </div>

                    <div class="campo">
                        <label for="correo">Correo Electrónico</label>
                        <input class="cajaTexto" type="email" id="correo" name="correo" value="<?php echo $chofer["correo"]? $chofer["correo"]:''; ?>">
                    </div>

                    <div class="campo">
                        <label for="fechaNac">Fecha Nacimiento</label>
                        <input name="fechaNac" type="date" onclick="this.value = '1970-01-01';" id="fechaNac" value="<?php echo $chofer["fechaNac"]? $chofer["fechaNac"]:''; ?>"/>
                    </div>
                </div>

                <div class="input_100">
                    <div class="campo">
                        <label for="direccion">Dirección Completa</label>
                        <textarea name="direccion" id="direccion" value="<?php echo $chofer["direccion"]? $chofer["direccion"]:'';?>"><?php echo $chofer["direccion"]? $chofer["direccion"]:'';?></textarea>
                    </div>

                </div>
        
            </fieldset>

            <div class="campo enviar">
                <input type="hidden" id="accion" value="actualizar">
                <input type="submit" value="ACTUALIZAR">
            </div>
        </form>
    </div>

    <script type="text/javascript">
        
        const formularioChoferes = document.querySelector('#actualizar_chofer');

        eventListeners();

        function eventListeners(){
            formularioChoferes.addEventListener('submit', leerFormulario);
        }

        function leerFormulario(e){
            e.preventDefault();

     
            const idChofer = document.querySelector('#idChofer').value;
            const nombre = document.querySelector('#nombre').value;
            const apellidos = document.querySelector('#apellidos').value;
            const telefono = document.querySelector('#telefono').value;
            const tipoLicencia = document.querySelector('#tipoLicencia').value;
            const numLicencia = document.querySelector('#numLicencia').value;
            const correo = document.querySelector('#correo').value;
            const fechaNac = document.querySelector('#fechaNac').value;
            const direccion = document.querySelector('#direccion').value;
            const accion= document.querySelector('#accion').value;

            if(nombre === '' || apellidos === '' || telefono === '' || numLicencia === '' || correo === '' || direccion === '' || tipoLicencia === ''){
                mostrarNotificacion('Todos los Campos Son Obligatorios', 'error');
            }else{
                
                const infoChofer = new FormData();

                
                infoChofer.append('idChofer', idChofer);
                infoChofer.append('nombre', nombre);
                infoChofer.append('apellidos', apellidos);
                infoChofer.append('telefono', telefono);
                infoChofer.append('tipoLicencia', tipoLicencia);
                infoChofer.append('numLicencia', numLicencia);
                infoChofer.append('correo', correo);
                infoChofer.append('fechaNac', fechaNac);
                infoChofer.append('direccion', direccion);
                infoChofer.append('accion', accion);
                
                mostrarNotificacion('Los datos se guardaron Correctamente', 'correcto');

             
                let id = parseInt(idChofer)
                console.log(id)

                if(accion === 'actualizar'){
                    insertarDB(infoChofer);
                    console.log('DATOS ENVIADOS PARA JSON');
                }
            }
            
        }

        function insertarDB(datos){
            //llamado ajax

            //creo el objeto
            const xhr = new XMLHttpRequest();

            //abro la conexion
            xhr.open('POST', `modelo/actualizar.php`, true);
            
            //paso los datos
            xhr.onload = function(){
                if(this.status === 200){
                    //leo la respuesta de PHP
                    const respuesta = JSON.parse ( xhr.responseText );

                    console.log(respuesta)

                     setTimeout(() => {
                        window.location.replace('../../dashboard.php')
                     }, 3000);

                }
            }

            //envio los datos
            xhr.send(datos);
        }

        function mostrarNotificacion(mensaje, clase){
            const notificacion = document.createElement('DIV');
            notificacion.classList.add(clase, 'notificacion');
            notificacion.textContent = mensaje;

            formularioChoferes.insertBefore(notificacion, document.querySelector('form fieldset'));

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
</body>
