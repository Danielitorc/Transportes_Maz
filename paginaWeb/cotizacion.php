<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Solicitud de Cotización | TM</title>
</head>

<body>
    <header class="pag_anexa">
      <a href="../index.php" class="brand">
      	<img src="../img/logo.png" alt="Logo TM">
      </a>
      
      <nav class="menu">
        <div class="btn">
          <i class="fas fa-times close-btn"></i>
        </div>
        <ul>
        	<li><a href="../index.php">Nosotros</a></li>
        	<li><a href="../index.php#services">Servicios</a></li>
        	<li><a href="paginaWeb/cotizacion.php">Cotización</a></li>
        </ul>
      </nav>
      <div class="btn">
        <i class="fas fa-bars menu-btn"></i>
      </div>
    </header>

    

    <div class="contenedor frm">
        <form action="#" id="solicitud">
            <fieldset>
                <legend><img src="../img/delivery.png" alt="Author Kiranshastry"><h1>  Datos de Contacto</h1> </legend>
                <div class="campos3">
                    <div class="campo">
                        <label for="nombre">Nombre</label>
                        <input type="text" placeholder="Nombre(s)" id="nombre">
                    </div>

                    <div class="campo">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" placeholder="Apellidos" id="apellidos">
                    </div>

                    <div class="campo">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" placeholder="Teléfono" id="telefono">
                    </div>
                </div>

                <div class="campos2">
                    <div class="campo">
                        <label for="empresa">Empresa</label>
                        <input type="text" placeholder="Empresa" id="empresa">
                    </div>

                    <div class="campo">
                        <label for="correo">E-mail</label>
                        <input type="email" placeholder="E-mail" id="correo">
                    </div>
                </div>

                <div class="input_100 campo">
                    <label for="datosRec">Datos de Recolección: </label>
                    <textarea name="datosRec" id="datosRec" placeholder="Porfavor ingrese la dirección completa donde se requiere la unidad para recolectar su mercancía"></textarea>
                </div>

                <div class="campos3">
                    <div class="campo">
                        <label for="fecha">Fecha</label>
                        <input name="fecha" id="fecha" type="date"></input>
                    </div>

                    <div class="campo">
                        <label for="hora">Hora</label>
                        <input id="hora" type="time">
                    </div>

                    <div class="campo">
                        <select name="unidad" id="unidad">
                            <option value="" disabled selected>-- Seleccione Tipo de Unidad</option>
                            <option value="Trailer">Trailer</option>
                            <option value="Torton">Torton</option>
                            <option value="Camioneta 3/2">Camioneta 3/2</option>
                            <option value="Camioneta Chica">Camioneta Chica</option>
                        </select>
                    </div>
                </div>

                <div class="input_100 campo">
                    <label for="datosEnt">Datos de Entrega: </label>
                    <textarea name="datosEnt" id="datosEnt" placeholder="Porfavor ingrese la dirección completa donde se desea que se entregue la mercancía"></textarea>
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
                        <span>Ingrese solo Números*</span>
                        <input class="valorMercancia" name="valorMercancia" id="valorMercancia" type="text" placeholder="Ingrese el valor de la mercancia">
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
                        <textarea name="comentariosManiobras" id="comentariosManiobras" placeholder="Porfavor platiquenos la naturaleza de las maniobras requeridas"></textarea>
                    </div>


                    <div class="input_100 campo">
                        <p>Comentarios Adicionales</p>

                        <textarea name="adiocionales" id="adicionales" placeholder="Porfavor platiquenos Un poco mas de mercancía"></textarea>
                    </div>

                </div>
            </fieldset>
            
            <div class="contenedor input_100">
                <div class="frmOfertas">
                    <input name="ofertas" id="ofertas" type="checkbox" value="SI">
                    <label for="ofertas">Recibir Ofertas</label>
                </div> 
        
                <div class="frmOfertas">
                    <input name="terminos" id="terminos" type="checkbox" >
                    <label for="terminos">Acepto <a href="">Términos y Condiciones</a></label>
                </div>
            </div>

            <div class="errors"></div>
            <div class="corrects"></div>

            <div class="campo enviar">
                <input type="hidden" id="accion" value="crear">
                <input type="submit" value="ENVIAR">
            </div>

        </form>
    </div>
    <footer>
        <div class="footer">
            <div class="contenido-footer">
                <div>
                    <p class="centrar-texto">Transportes MAZ. Todos los Derechos Reservados &copy; 2021</p>
                </div>
                <div>
                    <p class="centrar-texto">Raúl Salinas 195, Col. Adolfo López Mateos Ciudad de México, cp 15670</p>
                </div>

                <div><p class="centrar-texto"> E-mail: transportesmaz_hotmail.com</p></div>
                <div><p class="centrar-texto"> Tel. 46-13-88-09</p></div>

            </div>
        </div>
    </footer>
    <script src="../js/app.js"></script>

    <script type="text/javascript">
        //javascript for navigation bar effect on scroll
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle('down', window.scrollY > 0);

            //change logo
            var logo = document.querySelector(".brand img");
            if (window.scrollY > 0) {
                logo.setAttribute('src', '../img/logo.png');
            } else {
                logo.setAttribute('src', '../img/logo.png');
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



</body>
</html>