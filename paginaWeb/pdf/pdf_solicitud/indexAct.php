<?php



  function getPlantilla($solicitud){

    date_default_timezone_set("America/Mexico_City");
    $date = date('d-m-Y');  
    
    
  $plantilla = '
  <body>
  <div class="header">
    <h1>Solicitud de cotización <span class="modificada">Modificada</span></h1>
  </div>
    <header class="clearfix">
      <div id="logo">
        <img src="../../img/logo.png" width="40%" height="44">
      </div>

      <div id="company">
        <!--<h2 class="name">Company Name</h2>-->
        <div>Raúl Salinas 195, CP. 15670<div>
        </div>Col. Adolfo López Mateos, Ciudad de México</div>
        <div>Tel.- 4613-88-09</div>
        <div><a href="mailto:company@example.com">transportes_maz@hotmail.com</a></div>
      </div>
      </div>
    </header>
    <main>
      
      <div id="details" class="clearfix">
        
        <div id="client">';
          foreach($solicitud as $sol){
            if($sol["asegurar"]=='Sin seguro'){
              $sol["valorMercancia"]="No requiere Seguro";
            }else{
              $sol["valorMercancia"]="$ ".$sol["valorMercancia"];
            }

            if($sol["maniobras"]=='No Requieridas'){
              $sol["comentariosManiobras"]="No Requeridas";
            }else{
              $sol["comentariosManiobras"]=$sol["comentariosManiobras"];
            }


          $plantilla .= '
          
          <h2 class="name">'. $sol["nombre"].' '. $sol["apellidos"].'</h2>
          <div class="address">'. $sol["empresa"].'</div>
          <div class="email"><a href="mailto:company@example.com">'. $sol["correo"].'</a></div>
        </div>
      

        <div id="invoice">
          <h1>FOLIO DE SOLICITUD '. $sol["id"].'</h1>
          <div class="date">Fecha: '.$date.'</div>
        </div>
      </div>

      <table border="0" cellspacing="0" cellpadding="0">
      <!-- Titulos tabla  -->
      <thead>
        <tr>
          <th class="titulo_tabla">Datos de recolección</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td class="contenido_tabla datos">'.$sol["datosRec"].'</td>
        </tr>
      </tbody>
    </table>


      <table border="0" cellspacing="0" cellpadding="0">
        <!-- Titulos  -->
        <thead>
          <tr>
            <th class="titulo_tabla">FECHA RECOLECCIÓN</th>
            <th class="titulo_tabla">HORA</th>
            <th class="titulo_tabla">TIPO DE UNIDAD</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td class="contenido_tabla">'.$sol["fecha"].'</td>
            <td class="contenido_tabla">'.$sol["hora"].'</td>
            <td class="contenido_tabla">'.$sol["unidad"].'</td>
          </tr>
          
        </tbody>

      </table>

      <table border="0" cellspacing="0" cellpadding="0">
      <!-- Titulos tabla  -->
      <thead>
        <tr>
          <th class="titulo_tabla">Datos de entrega</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td class="contenido_tabla datos">'.$sol["datosEnt"].'</td>
        </tr>
      </tbody>
    </table>

    <table border="0" cellspacing="0" cellpadding="0">
    <!-- Titulos  -->
    <thead>
      <tr>
        <th class="titulo_tabla">maniobras</th>
        <th class="titulo_tabla">seguro (valor de la mercancía)</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td class="contenido_tabla">'.$sol["comentariosManiobras"].'</td>
        <td class="contenido_tabla">'.$sol["valorMercancia"].'</td>
      </tr>
      
    </tbody>

  </table>

  <table border="0" cellspacing="0" cellpadding="0">
  <!-- Titulos tabla  -->
  <thead>
    <tr>
      <th class="titulo_tabla">Sobre su mercancía</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td class="contenido_tabla datos">'.$sol["adicionales"].'</td>
    </tr>
  </tbody>
</table>


      <div id="thanks">Gracias!</div>
      <div id="notices">
        <div class="notice">Uno de nuestros asesores procesará su solicitud y se pondrá en contacto con usted a la brevedad.</div>
      </div>
    </main>
    <footer>
      Transportes MAZ. Todos los Derechos Reservados &copy; 2021
    </footer>
  </body>';
          }
  return $plantilla;
}
?>
