<?php
    require_once('../../vendor/autoload.php');

    //Plantilla HTML
    require_once('pdf_solicitud/indexAct.php');



    require_once ('../funciones/funciones.php');

    //Codigo css de la plantilla
    $css = file_get_contents('pdf_solicitud/style.css');

    $id = ($_GET['idSolicitud']);

    $mpdf = new \Mpdf\Mpdf([

    ]);

    $plantilla = getPlantilla($solicitud);

    $mpdf->writeHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->writeHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);
    
    $mpdf->Output("TM_Solicitud_$id", "I");