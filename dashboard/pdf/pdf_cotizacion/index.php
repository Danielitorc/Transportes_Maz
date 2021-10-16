<?php

  function getPlantilla($cotizacion){

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
      foreach($cotizacion as $sol){

      $plantilla .= '
      <div class="address">Folio de Solicitud: '. $sol["id"].'</div>
      <h2 class="name">'. $sol["nombre"].' '. $sol["apellidos"].'</h2>
      <div class="address">'. $sol["empresa"].'</div>
      <div class="email"><a href="mailto:company@example.com">'. $sol["correo"].'</a></div>
    </div>
  

    <div id="invoice">
      <h1>FOLIO DE COTIZACIÓN '. $sol["idCotizacion"].'</h1>
      <div class="date">Fecha: '.$date.'</div>
    </div>
  </div>

  <table border="0" cellspacing="0" cellpadding="0" class="principal">
  <!-- Titulos tabla  -->
  <thead>
    <tr>
      <th class="titulo_tabla">Datos de recolección</th>
    </tr>
  </thead>



  <tbody>
    <tr>
      <td class="contenido_tabla datos"> '.$sol["datosRec"].' 
      el día <span class="negrita">'.$sol["fecha"].' </span> 
      a las <span class="negrita">'.$sol["hora"].'</span> </p> 

      <span class="negrita">Sobre su Mercancía: </span>'.$sol["adicionales"].'
      
      
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
        <td class="contenido_tabla datos">'.$sol["datosEnt"].'</td>
      </tr>
    </tbody>
  </table>




<table border="0" cellspacing="0" cellpadding="0">
<thead>
  <tr class"negrita">
    <th class="no ">#</th>
    <th class="desc negrita">DESCRIPCIÓN</th>
    <th class="total negrita">COSTO</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="no">01</td>
    <td class="desc"><h3>Costo Flete</h3><p>Unidad tipo <span class="negrita">'.$sol["unidad"].' </span> </td>
    <td class="total negrita">$ '.number_format($sol["costoFlete"],2).' </td>
  </tr>

  <tr>
    <td class="no">02</td> ';

        $subtotal =  $sol["costoManiobras"] +  $sol["costoFlete"] +  $sol["costoSeguro"];
        $iva = ($subtotal * .16);
        $total = $subtotal + $iva;

    if($sol["maniobras"]=='No Requieridas'){
      $maniobras = "No requiere Maniobras";
      $sol["costoManiobras"]=0;
      $plantilla .='
      <td class="desc">'.$maniobras.'</td>
      <td class="total negrita">$ '.number_format($sol["costoManiobras"],2).'</td>';
    }else{
      $sol["costoManiobras"] = $sol["costoManiobras"];
      $plantilla .='
      <td class="desc"><h3>Maniobras</h3><p>'.$sol["comentariosManiobras"].'</p></td>
      <td class="total negrita">$ '.number_format($sol["costoManiobras"],2).'</td>';
    }
    $plantilla .='
  </tr>

  <tr>
  <td class="no">03</td> ';
  if($sol["asegurar"]=='Sin seguro'){
    $seguro = "No requiere Seguro";
    $sol["costoSeguro"]=0;
    $plantilla .='
    <td class="desc"><h3>Seguro</h3> '.$seguro.'</td>
    <td class="total negrita">$ '.number_format($sol["costoSeguro"],2).'</td>';
  }else{
    $sol["costoSeguro"] = $sol["costoSeguro"];
    $plantilla .='
    <td class="desc"><h3>Seguro</h3><p>El costo del seguro es del 1.5% sobre el valor de la mercancía</p></td>
    <td class="total negrita">$ '.number_format($sol["costoSeguro"],2).'</td>';
  }
  $plantilla .='
</tr>
</tbody>

<tfoot>
  <tr>
    <td class="izq" colspan="2">SUBTOTAL</td>
    <td>$ '.number_format($subtotal,2).'</td>
  </tr>
  <tr>

    <td colspan="2">IVA 16%</td>
    <td>$ '.number_format($iva,2).'</td>
  </tr>
  <tr>

    <td class="negrita" colspan="2">TOTAL</td>
    <td class="negrita" >$ '.number_format($total,2).'</td>
  </tr>
</tfoot>

</table>

<!-- Tabla Comentaios del cliente-->
<table border="0" cellspacing="0" cellpadding="0" class="dentro">
  <thead>
  <tr>
    <th class="titulo_tabla">Comentarios Para el cliente</th>
  </tr>
  </thead>

  <tbody>
  <tr>
    <td class="contenido_tabla datos">'.$sol["comentariosTM"].'</td>
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
