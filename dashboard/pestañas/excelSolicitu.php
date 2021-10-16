<?php
require ('../Librerias/PHPExcel.php');
require ('../funciones/db.php');


    //Recibo el de del empleado para generar la consulta
    $idsolicitud = $_GET['idsolicitud'];

    $sql = "SELECT * FROM solicitudcotizacion WHERE id = $idsolicitud";
    $resultado = mysqli_query($conexion, $sql);

    $solicitud = mysqli_fetch_assoc($resultado);

    $objPHPExcel = new PHPExcel();

    $objPHPExcel -> setActiveSheetIndex(0);
    $objPHPExcel -> getActiveSheet()->setTitle("Datos_Solicitud");

    $objPHPExcel -> getActiveSheet()->setCellValue('A1','ID_SOLICITUD');
    $objPHPExcel -> getActiveSheet()->setCellValue('A2','NOMBRE');
    $objPHPExcel -> getActiveSheet()->setCellValue('A3','APELLIDOS');
    $objPHPExcel -> getActiveSheet()->setCellValue('A4','EMPRESA');
    $objPHPExcel -> getActiveSheet()->setCellValue('A5','CORREO');
    $objPHPExcel -> getActiveSheet()->setCellValue('A6','TELÉFONO');
    $objPHPExcel -> getActiveSheet()->setCellValue('A7','DATOS DE RECOLECCION');
    $objPHPExcel -> getActiveSheet()->setCellValue('A8','TIPO DE UNIDAD');
    $objPHPExcel -> getActiveSheet()->setCellValue('A9','FECHA RECOLECCION');
    $objPHPExcel -> getActiveSheet()->setCellValue('A10','HORA');
    $objPHPExcel -> getActiveSheet()->setCellValue('A11','DIRECCIÓN DE ENTREGA');
    $objPHPExcel -> getActiveSheet()->setCellValue('A12','SEGURO');
    $objPHPExcel -> getActiveSheet()->setCellValue('A13','VALOR SEGURO');
    $objPHPExcel -> getActiveSheet()->setCellValue('A14','MANIOBRAS');
    $objPHPExcel -> getActiveSheet()->setCellValue('A15','COMENTARIOS SOBRE LA MERCANCIA');


    $objPHPExcel -> getActiveSheet()->setCellValue('B1',$solicitud['id']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B2',$solicitud['nombre']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B3',$solicitud['apellidos']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B4',$solicitud['empresa']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B5',$solicitud['correo']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B6',$solicitud['telefono']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B7',$solicitud['datosRec']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B8',$solicitud['unidad']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B9',$solicitud['fecha']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B10',$solicitud['hora']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B11',$solicitud['datosEnt']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B12',$solicitud['asegurar']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B13',$solicitud['valorMercancia']);
    if($solicitud['comentariosManiobras'] == ''){
        $objPHPExcel -> getActiveSheet()->setCellValue('B14','No requeridas');
    }else{
        $objPHPExcel -> getActiveSheet()->setCellValue('B14',$solicitud['comentariosManiobras']);
    }
   
    $objPHPExcel -> getActiveSheet()->setCellValue('B15',$solicitud['adicionales']);

    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Disposition: attachment;filename = "Datos_Solicitud.xlsx" ');
    header('Cache-Control: max-age=0');

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter -> save('php://output');

    // echo "<pre>";
    // var_dump($empleado);
    // echo "</pre>";