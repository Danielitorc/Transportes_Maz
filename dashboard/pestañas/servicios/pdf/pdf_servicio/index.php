<?php

  function getPlantilla($servicio){

    date_default_timezone_set("America/Mexico_City");
    $date = date('d-m-Y');  
    
    
  $plantilla = '

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
  <header class="clearfix">
  <div id="logo">
    <img src="../../../../img/logo.png" width="40%" height="44">
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
      foreach($servicio as $pdf){

      $plantilla .= '
      <div class="line_height">
        <h2 class="name"><span class="negrita">Cliente: </span>'. $pdf["nombre"].' '. $pdf["apellidos"].'</h2>
        <div class="address"><span class="negrita">Empresa: </span>'. $pdf["empresa"].'</div>
        <div class="address"><span class="negrita">Teléfono: </span>'. $pdf["telefono"].'</div>
      </div>
    </div>
  

    <div id="invoice">
      <h1>FOLIO DE SERVICIO: '. $pdf["idServicio"].'</h1>
      <div class="address">Solicitud: '. $pdf["idSolicitud"].'</div>
      <div class="address">Cotización: '. $pdf["idCotizacion"].'</div>
      <div class="date">Fecha: '.$date.'</div>
    </div>
  </div>



  <!-- Datos del chofer -->
  <table border="0" cellspacing="0" cellpadding="0" class="principal">

    <thead>
      <tr>
        <th class="titulo_tabla">Datos del Chofer</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td class="contenido_tabla datos"> 
        <span class="negrita"> Nombre del chofer: </span>'. $pdf["nombreCh"].' '. $pdf["apellidosCh"].'
        <p><span class="negrita">Número de licencia: </span>'.$pdf["numLicencia"].'</p>
        <p><span class="negrita">Unidad Tipo: </span>'.$pdf["unidad"].' <span class="negrita">Placas: </span>'.$pdf["placas"].' </p>
        </td>
      </tr>
    </tbody>

  </table>


  <!-- Datos de Recoleccion -->
  <table border="0" cellspacing="0" cellpadding="0" class="principal">

    <thead>
      <tr>
        <th class="titulo_tabla">Datos de recolección</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td class="contenido_tabla datos"> 
        <p>'.$pdf["datosRec"].' </p>
        <p>El día: '.$pdf["fecha"].' a las '.$pdf["hora"].'</p>
        <p><span class="negrita">Sobre la mercancía: </span>'.$pdf["adicionales"].'</p>
        </td>
      </tr>
    </tbody>

  </table>

  <!-- Tabla Datos de entrega-->
  <table border="0" cellspacing="0" cellpadding="0">
    <!-- Titulos tabla  -->
    <thead>
      <tr>
        <th class="titulo_tabla">Datos de entrega</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td class="contenido_tabla datos"> 
          <p>
            <span class="negrita">Entregar en: </span>'.$pdf["datosEnt"].'
            <p><span class="negrita">Seguro: </span>'.$pdf["asegurar"].'</p>';
            if($pdf["comentariosManiobras"] == ''){
              $plantilla .= '
              <span class="negrita">Maniobras: </span>No requeridas ';
            }else{
              $plantilla .= '
              <span class="negrita">Maniobras: </span>'.$pdf["adicionales"].' ';
            }
    
            $plantilla .= '

        </td>
      </tr>
    </tbody>
  </table>

        
  <!-- Datos de Referencia -->
  <table border="0" cellspacing="0" cellpadding="0">
    <!-- Titulos tabla  -->
    <thead>
      <tr>
        <th class="titulo_tabla">Referencias de Entrega</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td class="contenido_tabla datos"> 
        <span class="negrita">Empresa donde se entregara: </span>'.$pdf["empresaEntrega"].'
        <p><span class="negrita">Persona que recibira: </span>'.$pdf["nombreEntrega"].' <span class="negrita"> Puesto: </span>'.$pdf["puesto"].'<span class="negrita"> Teléfono: </span>'.$pdf["telefonoEnt"].'</p>
        </td>
      </tr>
    </tbody>
  </table>

      
    </main>
    <footer>
        Transportes MAZ. Todos los Derechos Reservados &copy; 2021
    </footer>
  </body>
</html>';
}
return $plantilla;
}
?>
