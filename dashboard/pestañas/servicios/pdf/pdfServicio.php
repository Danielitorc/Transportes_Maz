<?php
    require_once('../../../../vendor/autoload.php');

    //Plantilla HTML
    require_once('pdf_servicio/index.php');

    //Codigo css de la plantilla
    $css = file_get_contents('pdf_servicio/style.css');

    //Traigo la consulta del folio del servicio que se acaba de generar
    require_once('../funciones/folioServicio.php');

    $id = ($_GET['idServicio']);

    // echo "<pre>";
    // var_dump($servicio);
    // die();
    // echo "</pre>";

    $mpdf = new \Mpdf\Mpdf([

    ]);

    $plantilla = getPlantilla($servicio);

    $mpdf->writeHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->writeHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

    $mpdf->Output("TM_Solicitud_$id", "I");