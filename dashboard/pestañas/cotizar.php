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

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/normalize.css">
        <link rel="stylesheet" href="../estilos/styleTablero.css">
        <title>Generar Cotización</title>
</head>

<body>
        <header class="header">
                <img class="logo" src="../../img/logo.png" alt="">

                <?php $varsesion = $_SESSION['username']; echo "<p>$varsesion</p>" ?>
        </header>

        <div class="contenedor">


                <fieldset>
                        <?php require_once('../funciones/obtenerFolio.php');
                        foreach ($solicitud as $sol) {
                        ?>

                                <div class="campos4">
                                        <div class="campo">
                                                <label for="idSolicitud">Folio Solicitud</label>
                                                <input name="idSolicitud" id="idSolicitud" type="text" value="<?php echo $sol["id"]; ?>"></input>
                                                <!-- <h1>FOLIO DE SOLICITUD '. $sol["id"].'</h1> -->
                                        </div>
                                        <div class="campo">
                                                <label for="nombre">Nombre Cliente</label>
                                                <!--Concatenar nombre y apellidos-->
                                                <input name="nombre" id="nombre" type="text" value="<?php echo $sol["nombre"] . " " . $sol["apellidos"] ?>"></input>
                                        </div>
                                        <div class="campo">
                                                <label for="empresa">Empresa</label>
                                                <input name="empresa" id="empresa" type="text" value="<?php echo $sol["empresa"]; ?>"></input>
                                        </div>
                                        <div class="campo">
                                                <label for="correo">Correo Cliente</label>
                                                <input name="correo" id="correo" type="text" value="<?php echo $sol["correo"]; ?>"></input>
                                        </div>

                                </div>
                       

                </fieldset>
        </div>


        <div class="contenedor">

                <form action="#" id="cotizacion">

                        <fieldset>
                                <legend>Cotización</legend>
                                <div class="campos3">
                                        <div class="campo">
                                                <label for="costoFlete">Costo del flete</label>
                                                <input name="costoFlete" id="costoFlete" type="text"></input>
                                        </div>


                                        <div class="campo">
                                        
                                        <?php
                                                if($sol["maniobras"] =='No Requieridas'){
                                                        $costoSeguro="No requiere Maniobras";?>
                                                        <label for="costoManiobras"><span>Maniobras No Requeridas</span></label>
                                                        <input name="costoManiobras" id="costoManiobras" type="text" readonly="readonly"  value="0">
                                                <?php      
                                                }else{
                                                        $sol["costoManiobras"]= '';?>
                                                        <label for="costoManiobras">Costo de las maniobras</label>
                                                        <input name="costoSeguro" id="costoManiobras"  type="text">
                                                        <?php }?>
                                        </div>

                                        <div class="campo">
                                        
                                        <?php
                                                if($sol["asegurar"] =='Sin seguro'){
                                                        $costoSeguro="No requiere Seguro";?>
                                                        <label for="costoSeguro"><span>Seguro No Requerido</span></label>
                                                        <input name="costoSeguro" id="costoSeguro" type="text" readonly="readonly" value="0">
                                                <?php      
                                                }else{
                                                        $sol["valorMercancia"]= '';?>
                                                        <label for="costoSeguro">Costo del Seguro</label>
                                                        <input name="costoSeguro" id="costoSeguro" type="text">
                                                        <?php }?>
                                        
                                                
                                                
                                        </div>
                                </div>

                                <div class="input_100 campo">
                                        <label for="comentariosTM">Comentarios Adicionales para el Cliente </label>
                                        <textarea name="comentariosTM" id="comentariosTM" placeholder="Agregue indicaciones y/o retroalimentación al cliente"></textarea>
                                </div>



                        </fieldset>
                        <?php }
                        ?>
                        <div class="campo enviar">
                                <input type="hidden" id="accion" value="cotizar">
                                <input type="submit" value="GENERAR" name="enviar-cot">
                        </div>
                </form>
        </div>

        <script src="../js/sistema.js"></script>
</body>

</html>