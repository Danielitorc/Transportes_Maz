<?php
require_once('../../funciones/funciones.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/normalize.css">
    <link rel="stylesheet" href="../../../css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Actualizar Solicitud | TM</title>
</head>

<header class="pag_anexa">
    <a href="../../../index.php" class="brand">
        <img src="../../../img/logo.png" alt="Logo TM">
    </a>

    <nav class="menu">
        <div class="btn">
            <i class="fas fa-times close-btn"></i>
        </div>
        <ul>
            <li><a class="negrita" href="../../../index.php">Inicio</a></li>
            <li><a class="negrita" href="../../../index.php#services">Servicios</a></li>
            <li><a class="negrita" href="../cancelar/">CANCELAR SOLICITUD</a></li>
        </ul>
    </nav>
    <div class="btn">
        <i class="fas fa-bars menu-btn"></i>
    </div>
</header>

<?php



if (!$solicitud) { ?>
    <div class="errors_folio">
        <li>este folio no existe, verifique y vuelva a intentarlo</li>
    </div>

    <div class="contenedor">
        <div class="imagen">
            <img src="../../../img/folioMarcado.png" alt="">
        </div>
    </div>

    <?php } else {
    foreach ($solicitud as $fol) {
        if ($fol['estatus'] == 'cotizado') { ?>

            <div class="errors_folio">
                <li>Este folio ya ha sido cotizado</li>
            </div>

        <?php }
        else if ($fol['estatus'] == 'cancelado') { ?>
         <div class="errors_folio">
                <li>Este folio fue cancelado, porfavor solicite una nueva cotización</li>
            </div>

<?php
        }else if($fol['id']){ ?>
        <body>

        

<div class="contenedor frm">
        <form action="#" id="solicitud">
    
        <fieldset>
            <legend><img src="../../../img/delivery.png" alt="Author Kiranshastry">
            <div class="CampoId">
                <label class="idChofer">IdSolicitud</label>
                <input class="id" type="text" id="idSolicitud" value="<?php echo $fol['id'];?>">
            </div>
            </legend>
            <div class="campos3">
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input type="text" 
                    value="<?php echo $fol['nombre'] ? $fol['nombre'] : '';?>"
                    id="nombre">
                </div>

                <div class="campo">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" 
                    value="<?php echo $fol['apellidos'] ? $fol['apellidos'] : '';?>"
                    id="apellidos">
                </div>

                <div class="campo">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" 
                    value="<?php echo $fol['telefono'] ? $fol['telefono'] : '';?>"
                    id="telefono">
                </div>
            </div>

            <div class="campos2">
                <div class="campo">
                    <label for="empresa">Empresa</label>
                    <input type="text"
                    value="<?php echo $fol['empresa'] ? $fol['empresa'] : '';?>"
                    id="empresa">
                </div>

                <div class="campo">
                    <label for="correo">E-mail</label>
                    <input type="email"
                    value="<?php echo $fol['correo'] ? $fol['correo'] : '';?>"
                    id="correo">
                </div>
            </div>

            <div class="input_100 campo">
                <label for="datosRec">Datos de Recolección: </label>
                <textarea name="datosRec" id="datosRec" 
                value="<?php echo $fol['datosRec'] ? $fol['datosRec'] : '';?>"><?php echo $fol['datosRec'] ? $fol['datosRec'] : '';?></textarea>
            </div>

            <div class="campos3">
                <div class="campo">
                    <label for="fecha">Fecha</label>
                    <input name="fecha" id="fecha" type="date" value="<?php echo $fol['fecha'] ? $fol['fecha'] : '';?>"></input>
                </div>

                <div class="campo">
                    <label for="hora">Hora</label>
                    <input id="hora" type="time" value="<?php echo $fol['hora'] ? $fol['hora'] : '';?>">
                </div>

                <div class="campo">
                    <select name="unidad" id="unidad">
                        <option value="<?php echo $fol['unidad'] ? $fol['unidad'] : '';?>" disabled selected><?php echo $fol['unidad'] ? $fol['unidad'] : '';?></option>
                        <option value="Trailer">Trailer</option>
                        <option value="Torton">Torton</option>
                        <option value="Camioneta 3/2">Camioneta 3/2</option>
                        <option value="Camioneta Chica">Camioneta Chica</option>
                    </select>
                </div>
            </div>

            <div class="input_100 campo">
                <label for="datosEnt">Datos de Entrega: </label>
                <textarea name="datosEnt" id="datosEnt" value="<?php echo $fol['datosEnt'] ? $fol['datosEnt'] : '';?>"><?php echo $fol['datosEnt'] ? $fol['datosEnt'] : '';?></textarea>
            </div>

            <div class="input_100 campo">
                <span>¿Desea asegurar su mercancía?</span>

                <p>Este servicio es opcional y se cobrará sobre el valor declarado de la mercancía, el cuál tendrá un costo de 1.5% del valor asegurado y la cantidad mínima de $50,000.00, cantidad máxima $500,000.00</p>

                <div class="frmRadio">
                    <div>
                        <label for="asegurar">Asegurar</label>
                        <input name="asegurar" id="asegurar" type="radio" value="asegurar">
                    </div>

                    <div>
                        <label for="noAsegurar">No Asegurar</label>
                        <input name="asegurar" id="noAsegurar" type="radio" value="noAsegurar">
                    </div>
                </div>

                <div class="mostrar" id="mostrar">
                    <p style="margin-left: 1.7rem;">Ingrese el valor de Mercancía <span style="font-size: 1rem;">Campo Obligatorio*</span></p>
                    <input class="valorMercancia" name="valorMercancia" id="valorMercancia" type="text" 
                    value="<?php echo $fol['valorMercancia'] ? $fol['valorMercancia'] : '';?>">
                </div>
            </div>

            <!-- Pregunta si se requiere maniobras -->
            <div class="input_100 campo campM">
                <span>¿Desea agragar maniobras a su servicio?</span>
                <div class="frmRadioM">
                    <div>
                        <label for="maniobras">Si</label>
                        <input name="maniobras" id="maniobras" type="radio" value="si">
                    </div>

                    <div>
                        <label for="noManiobras">No</label>
                        <input name="maniobras" id="noManiobras" type="radio" value="no">
                    </div>
                </div>

                <div class="mostrarManiobras">
                    <span>Campo Obligatorio*</span>
                    <textarea name="comentariosManiobras" id="comentariosManiobras" 
                    value="<?php echo $fol['comentariosManiobras'] ? $fol['comentariosManiobras'] : '';?>">
                    <?php echo $fol['comentariosManiobras'] ? $fol['comentariosManiobras'] : '';?></textarea>
                </div>

                <div class="input_100 campo">
                    <p>Comentarios Adicionales</p>

                    <textarea name="adiocionales" id="adicionales" 
                    value="<?php echo $fol['adicionales'] ? $fol['adicionales'] : '';?>">
                    <?php echo $fol['adicionales'] ? $fol['adicionales'] : '';?></textarea>
                </div>

            </div>
        </fieldset>

        <div class="contenedor input_100">
            <div class="frmOfertas">
                <input name="ofertas" id="ofertas" type="checkbox" value="SI">
                <label for="ofertas">Recibir Ofertas</label>
            </div>

            <div class="frmOfertas">
                <input name="terminos" id="terminos" type="checkbox">
                <label for="terminos">Acepto <a href="">Términos y Condiciones</a></label>
            </div>
        </div>

        <div class="errors"></div>
        <div class="corrects"></div>

        <div class="campo enviar">
            <input type="hidden" id="accion" value="actualizar">
            <input type="submit" value="ENVIAR">
        </div>

    </form>
</div>

<?php }
    }
}
?>

<script src="../../../js/actualizar.js"></script>

<script type="text/javascript">
        //javascript for navigation bar effect on scroll
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle('down', window.scrollY > 0);

            //change logo
            var logo = document.querySelector(".brand img");
            if (window.scrollY > 0) {
                logo.setAttribute('src', '../../../img/logo.png');
            } else {
                logo.setAttribute('src', '../../../img/logo.png');
            }

        });

        //Menu responsivo
        var menu = document.querySelector('.menu');
        var menuBtn = document.querySelector('.menu-btn');
        var closeBtn = document.querySelector('.close-btn');

        menuBtn.addEventListener("click", () => {
            menu.classList.add('active');
        });

        closeBtn.addEventListener("click", () => {
            menu.classList.remove('active');
        });
    </script>
</html>