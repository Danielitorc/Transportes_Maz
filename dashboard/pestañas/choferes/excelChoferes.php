<?php

    require ('../../Librerias/PHPExcel.php');
    include ('../../funciones/db.php');

    $idChofer = $_GET['idChofer'];

    $sql = "SELECT * FROM choferes WHERE idChofer = $idChofer";
    $resultado = mysqli_query($conexion, $sql);

    $chofer = mysqli_fetch_assoc($resultado);

    $objPHPExcel = new PHPExcel();

    $objPHPExcel -> setActiveSheetIndex(0);
    $objPHPExcel -> getActiveSheet()->setTitle("Datos_Chofer");

    $objPHPExcel -> getActiveSheet()->setCellValue('A1','ID_CHOFER');
    $objPHPExcel -> getActiveSheet()->setCellValue('A2','NOMBRE');
    $objPHPExcel -> getActiveSheet()->setCellValue('A3','APELLIDOS');
    $objPHPExcel -> getActiveSheet()->setCellValue('A4','TELEFONO');
    $objPHPExcel -> getActiveSheet()->setCellValue('A5','TIPO_LICENCIA');
    $objPHPExcel -> getActiveSheet()->setCellValue('A6','NUMERO DE LICENCIA');
    $objPHPExcel -> getActiveSheet()->setCellValue('A7','CORREO');
    $objPHPExcel -> getActiveSheet()->setCellValue('A8','FECHA DE NACIMIENTO');
    $objPHPExcel -> getActiveSheet()->setCellValue('A9','DIRECCION');

    $objPHPExcel -> getActiveSheet()->setCellValue('B1',$chofer['idChofer']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B2',$chofer['nombreCh']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B3',$chofer['apellidosCh']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B4',$chofer['telefonoCh']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B5',$chofer['tipoLicencia']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B6',$chofer['numLicencia']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B7',$chofer['correoCh']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B8',$chofer['fechaNacCh']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B9',$chofer['direccionCh']);

    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Disposition: attachment;filename = "Datos_Chofer.xlsx" ');
    header('Cache-Control: max-age=0');


    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter -> save('php://output');

    // echo "<pre>";
    //     var_dump($idChofer);
    // echo "</pre>";
