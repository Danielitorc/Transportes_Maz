<?php

require_once('../../vendor/autoload.php');

//Plantilla HTML
require_once('pdf_cotizacion/index.php');



require_once ('../funciones/folio_cot.php');

//Codigo css de la plantilla
$css = file_get_contents('pdf_cotizacion/style.css');


$id = ($_GET['id']);

// var_dump($cotizacion);
// die();

$mpdf = new \Mpdf\Mpdf([

]);

$plantilla = getPlantilla($cotizacion);

$mpdf->writeHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->Output("TM_Solicitud_$id", "I");