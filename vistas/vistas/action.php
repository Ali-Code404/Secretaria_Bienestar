<?php
include("conexion.php");
$con=conectar();
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL, 'es_ES');

 
$metodoAction  = (int) filter_var($_REQUEST['metodo'], FILTER_SANITIZE_NUMBER_INT);
  
   if($metodoAction == 1){
 
     
    $fecha       = filter_var($_POST['fecha'], FILTER_SANITIZE_STRING);
    $nombre         = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $apellidos         = filter_var($_POST['apellidos'], FILTER_SANITIZE_STRING);
    $matricula         = filter_var($_POST['matricula'], FILTER_SANITIZE_STRING);
    $semestre         = filter_var($_POST['semestre'], FILTER_SANITIZE_STRING);
    $grupo           = filter_var($_POST['grupo'], FILTER_SANITIZE_STRING);
    $turno        = filter_var($_POST['turno'], FILTER_SANITIZE_STRING);
    $causa        = filter_var($_POST['causa'], FILTER_SANITIZE_STRING);
    //$motivo         = (int) filter_var($_POST['motivo'], FILTER_SANITIZE_STRING);
        $SqlInsertAlumno = ("INSERT INTO reportes(
            fecha,
            nombre,
            apellidos,
            matricula,
            semestre,
            grupo,
            turno,
            causa
        )
        VALUES(
            '".$fecha."',
            '".$nombre."',
            '".$apellidos."',
            '".$matricula."',
            '".$semestre."',
            '".$grupo."',
            '".$turno."',
            '".$causa."'
        )");
        $resulInsert = mysqli_query($con, $SqlInsertAlumno);
        ///print_r( $SqlInsertAlumno);

    header("Location:tbl_reportes.php");

  }
?>