<?php
session_start();
if(!isset($_SESSION['rol'])){
    header("location: login.php");
}else{
    if($_SESSION['rol'] != $_SESSION['rol'] ){
        header("location: login.php");
    }
}
?>

<link rel="stylesheet" href="../../../css/normalize.css">
<link rel="stylesheet" href="../../estilos/styleTablero.css">

<header class="header">
    <img class="logo" src="../../../img/logo.png" alt="">

    <?php $varsesion = $_SESSION['username']; echo "<p>$varsesion</p>" ?>
    
</header>

<?php
include 'funciones/funcionesServicios.php';

$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
if (!$id) {
    die('No valido');
}

$resultado =  obtenerCotizacion($id);

$cotizacion = $resultado->fetch_assoc();

?>

<div class="contenedor">


    <div class="campos2">
        <div class="CampoId">
            <label class="idChofer">Solicitud:</label>
            <input class="id" type="text"
            id="idSolicitud"
            value="<?php echo $cotizacion["id"]; ?>">
            </input>
        </div>
        <div class="CampoId">
            <label class="idChofer">Cotización:</label>
            <input class="id" type="text"
            id="idCotizacion"
            value="<?php echo $cotizacion["idCotizacion"]; ?>">
            </input>
        </div>
    </div>


    <div action="#" class="formServ" id="datosCot">
        <fieldset>
            <div class="campos4">
                <div class="campo">
                    <label>Nombre Cliente:</label>
                    <input readonly="readonly"  class="cajaTexto" type="text" 
                    value="<?php echo $cotizacion["nombre"] ." ".$cotizacion["apellidos"]; ?>">
                    </input>
                </div>

                <div class="campo">
                    <label>Empresa:</label>
                    <input readonly="readonly"  class="cajaTexto" type="text" value="<?php echo $cotizacion["empresa"]; ?>">
                    </input>
                </div>

                <div class="campo">
                    <label>Teléfono:</label>
                    <input readonly="readonly"  class="cajaTexto" type="text" value="<?php echo $cotizacion["telefono"]; ?>">
                    </input>
                </div>

                <div class="campo">
                    <label>Correo:</label>
                    <input readonly="readonly"  class="cajaTexto" type="text" value="<?php echo $cotizacion["correo"]; ?> ">
                    </input>
                </div>
            </div>
        </fieldset>
    </div>

    <form action="#" class="" id="servicio">
        <fieldset>
            <legend>Datos para Entrega</legend>

            <div class="campos2">
                <div class="campo">
                    <label for="empresaEntrega">Empresa donde se Entregara:</label>
                    <input class="cajaTexto" type="text" 
                    id="empresaEntrega" name="empresaEntrega">
                    </input>
                </div>

                <div class="campo">
                    <label for="nombreEntrega">Persona que Atendera:</label>
                    <input class="cajaTexto" type="text"
                    id="nombreEntrega" name="nombreEntrega">
                    </input>
                </div>
            </div>

            <div class="campos2">
                <div class="campo">
                    <label for="puesto">Puesto de la Persona:</label>
                    <input class="cajaTexto" type="text" 
                    id="puesto" name="puesto">
                    </input>
                </div>

                <div class="campo">
                    <label for="nombreEntrega">Teléfono:</label>
                    <input class="cajaTexto" type="text"
                    id="telefono" name="telefono">
                    </input>
                </div>

            </div>

            <div class="campos2">

                <div class="campo">
                    <label for="placas">Placas de la Unidad:</label>
                    <input class="cajaTexto" type="text"
                    id="placas" name="placas">
                    </input>
                </div>

                <div class="campo">
                    <label for="">Seleccione Chofer:</label>
                    <select name="chofer" id="chofer">
                    <?php 
                        $choferes =  chofer();
                            foreach($choferes as $chofer){
                    ?> 
                        <option value="<?php echo $chofer['idChofer']?>"><?php echo $chofer['nombreCh']?></option>
                        
                    <?php } ?>
                    </select>
                        
                </div>

            </div>


        </fieldset>
        <div class="campo enviar">
            <input type="hidden" id="accion" value="crearServicio">
            <input type="submit" value="GENERAR SERVICIO">
        </div>
    </form>

</div>

<script type="text/javascript">
    const formServicios = document.querySelector('#servicio');

    eventListeners();

    function eventListeners(){
        formServicios.addEventListener('submit', leerFormulario);
    }

    function leerFormulario(e){
        e.preventDefault();

        const empresaEntrega = document.querySelector('#empresaEntrega').value;
        const nombreEntrega = document.querySelector('#nombreEntrega').value;
        const puesto = document.querySelector('#puesto').value;
        const telefono = document.querySelector('#telefono').value;
        const placas = document.querySelector('#placas').value;
        const chofer = document.querySelector('#chofer').value;
        const idCotizacion = document.querySelector('#idCotizacion').value;
        const idSolicitud = document.querySelector('#idSolicitud').value;
        const accion = document.querySelector('#accion').value;
        
        if(empresaEntrega == '' || nombreEntrega== '' || puesto == '' || telefono == '' || chofer == '' || placas ==''){
            mostrarNotificacion('Todos los campos son obligatorios', 'error');
        }else{
            const infoServicio = new FormData();
            infoServicio.append('empresaEntrega', empresaEntrega);
            infoServicio.append('nombreEntrega', nombreEntrega);
            infoServicio.append('puesto', puesto);
            infoServicio.append('placas', placas);
            infoServicio.append('telefono', telefono);
            infoServicio.append('chofer', chofer);
            infoServicio.append('idCotizacion', idCotizacion);
            infoServicio.append('idSolicitud', idSolicitud);
            infoServicio.append('accion', accion);

            if(accion == 'crearServicio'){
                
                insertarDB(infoServicio);
            }

        }

    }

    function insertarDB(datos){
        //llamado ajax
        //Creo el objeto
        const xhr = new XMLHttpRequest();

        //abro la conexion
        xhr.open("POST", 'modelos/modelo-servicio.php', true);

        //paso los datos al modelo para insertarlos a la BD
        xhr.onload = function(){
            if(this.status === 200){
                mostrarNotificacion('Los datos se guardaron Correctamente', 'correcto');
                const respuesta = JSON.parse ( xhr.responseText );

                console.log(respuesta);

                location.assign(`pdf/pdfServicio.php?idServicio=${respuesta.datos.id_insert_servicio}`)

                //enviar primero a que se genere el PDF y despues redireccionar al dashboard
                 setTimeout(() => {
                     window.location.replace('pdf/pdfServicio.php');
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

            formServicios.insertBefore(notificacion, document.querySelector('form fieldset'));

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
