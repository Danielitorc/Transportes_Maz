<?php

    require ('../../Librerias/PHPExcel.php');
    include ('../../funciones/db.php');

    //Recibo el de del empleado para generar la consulta
    $idEmpleado = $_GET['idEmpleado'];

    $sql = "SELECT * FROM empleados WHERE idEmpleado = $idEmpleado";
    $resultado = mysqli_query($conexion, $sql);

    $empleado = mysqli_fetch_assoc($resultado);

    $objPHPExcel = new PHPExcel();

    $objPHPExcel -> setActiveSheetIndex(0);
    $objPHPExcel -> getActiveSheet()->setTitle("Datos_Empleado");

    $objPHPExcel -> getActiveSheet()->setCellValue('A1','ID_EMPLEADO');
    $objPHPExcel -> getActiveSheet()->setCellValue('A2','NOMBRE');
    $objPHPExcel -> getActiveSheet()->setCellValue('A3','APELLIDOS');
    $objPHPExcel -> getActiveSheet()->setCellValue('A4','CORREO');
    $objPHPExcel -> getActiveSheet()->setCellValue('A5','TELÉFONO');
    $objPHPExcel -> getActiveSheet()->setCellValue('A6','FECHA NACIOMIENTO');
    $objPHPExcel -> getActiveSheet()->setCellValue('A7','DIRECCIÓN');
    $objPHPExcel -> getActiveSheet()->setCellValue('A8','USUARIO_TM');


    $objPHPExcel -> getActiveSheet()->setCellValue('B1',$empleado['idEmpleado']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B2',$empleado['nombre']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B3',$empleado['apellidos']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B4',$empleado['correo']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B5',$empleado['telefono']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B6',$empleado['fechaNac']);
    $objPHPExcel -> getActiveSheet()->setCellValue('B7',$empleado['direccion']);

    if($empleado['usuario'] == 'creado'){
        $sqlUser = "SELECT * FROM usuario WHERE idEmpleado = $idEmpleado";
        $resultado2 = mysqli_query($conexion, $sqlUser);
        $empleadoUser = mysqli_fetch_assoc($resultado2);
        $objPHPExcel -> getActiveSheet()->setCellValue('B8',$empleadoUser['usuario']);
    }else{
        $objPHPExcel -> getActiveSheet()->setCellValue('B8',$empleado['usuario']);
    }


    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Disposition: attachment;filename = "Datos_Empleado.xlsx" ');
    header('Cache-Control: max-age=0');

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter -> save('php://output');

    // echo "<pre>"; 
    // var_dump($fila);
    // echo "</pre>"; 
?>