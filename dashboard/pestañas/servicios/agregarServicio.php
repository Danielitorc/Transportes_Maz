<link rel="stylesheet" href="../../../css/normalize.css">
<link rel="stylesheet" href="../../estilos/styleTablero.css">

<header class="header">
    <img class="logo" src="../../../img/logo.png" alt="">

    <p>Zoraya Ruiz</p>
    <p>Cerrar Sesión</p>
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

    
    <div class="CampoId">
        <label class="idChofer">IdCotización:</label>
        <input class="id" type="text" value="<?php echo $cotizacion["idCotizacion"]; ?>">
        </input>
    </div>

    <form action="#" class="formServ" id="datosCot">
        <fieldset>
            <div class="campos4">
                <div class="campo">
                    <label>Nombre Cliente:</label>
                    <input readonly="readonly"  class="cajaTexto" type="text" value="<?php echo $cotizacion["nombre"] ." ".$cotizacion["apellidos"]; ?>">
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
    </form>

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

            <div class="campos3">
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

                <div class="campo">
                    <label for="">Seleccione Chofer:</label>
                    <select name="" id="">
                    <?php 
                        $choferes =  chofer();
                            foreach($choferes as $chofer){
                    ?>
                    
                        <option value="<?php echo $chofer['idChofer']?>"><?php echo $chofer['nombre']?></option>
                        
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
