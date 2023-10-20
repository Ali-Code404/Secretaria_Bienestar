<?php
include("conexion.php");
$con=conectar();
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL, 'es_ES');

 
$metodoAction  = (int) filter_var($_REQUEST['metodo'], FILTER_SANITIZE_NUMBER_INT);  
   if($metodoAction == 1){
 
    $folio          = filter_var($_POST['folio'], FILTER_SANITIZE_STRING);
    $encargado       = filter_var($_POST['encargado'], FILTER_SANITIZE_STRING);
    $email         = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $sucursal         = filter_var($_POST['sucursal'], FILTER_SANITIZE_STRING);
    $fecha         = filter_var($_POST['fecha'], FILTER_SANITIZE_STRING);
    $anydesk           = filter_var($_POST['anydesk'], FILTER_SANITIZE_STRING);
    $descripcion        = filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
    $status        = filter_var($_POST['status'], FILTER_SANITIZE_STRING);
    //$motivo         = (int) filter_var($_POST['motivo'], FILTER_SANITIZE_STRING);
    
    //Muevo la foto a mi directorio.
    
        $SqlInsertAlumno = ("INSERT INTO solicitudes(
            folio,
            encargado,
            email,
            sucursal,
            fecha,
            anydesk,
            descripcion,
            status
        )
        VALUES(
            '".$folio."',
            '".$encargado."',
            '".$email."',
            '".$sucursal."',
            '".$fecha."',
            '".$anydesk."',
            '".$descripcion."',
            '".$status."'
        )");
        $resulInsert = mysqli_query($con, $SqlInsertAlumno);
        ///print_r( $SqlInsertAlumno);

        $SqlInsertAl = ("INSERT INTO informe(
            folio,
            encargado,
            sucursal,
            status
        )
        VALUES(
            '".$folio."',
            '".$encargado."',
            '".$sucursal."',
            '".$status."'
        )");
        $resulIn = mysqli_query($con, $SqlInsertAl);

    header("Location:success.php?a=1");
}
//FIN DE DONDE ESTOY AÑADIENDO


//$metodoAction ==1, es crear un registro nuevo

 

//Actualizar registro del Alumno
if($metodoAction == 2){
    $idAlumno      = (int) filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);

    $folio       = filter_var($_POST['folio'], FILTER_SANITIZE_STRING);
    $nombre         = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $area           = filter_var($_POST['area'], FILTER_SANITIZE_STRING);
    $puesto        = filter_var($_POST['puesto'], FILTER_SANITIZE_STRING);
    $concepto        = filter_var($_POST['concepto'], FILTER_SANITIZE_STRING);
    
    $motivo         = filter_var($_POST['motivo'], FILTER_SANITIZE_STRING);
    $corte_hrs        = filter_var($_POST['corte_hrs'], FILTER_SANITIZE_STRING);
    $status         = (int) filter_var($_POST['status'], FILTER_SANITIZE_NUMBER_INT);

    $UpdateAlumno    = ("UPDATE table_alumnos
        SET folio='$folio',
        nombre='$nombre', 
        area='$area', 
        puesto='$puesto',
        concepto='$concepto',
        
        motivo='$motivo',
        corte_hrs='$corte_hrs'
        WHERE id='$idAlumno' ");
    $resultadoUpdate = mysqli_query($con, $UpdateAlumno);


    //Verificando si existe foto del alumno para actualizar
    if (!empty($_FILES["foto"]["name"])){
            $filename       = $_FILES["foto"]["name"]; //nombre de la foto
            $tipo_foto      = $_FILES['foto']['type']; //tipo de archivo
            $sourceFoto     = $_FILES["foto"]["tmp_name"]; //url temporal de la foto
            $tamano_foto    = $_FILES['foto']['size']; //tamaño del archivo (foto)

            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
        if (!((strpos($tipo_foto, "PNG") || strpos($tipo_foto, "jpg") && ($tamano_foto < 100000)))) {
            $logitudPass 	        = 8;
            $newNameFoto            = substr( md5(microtime()), 1, $logitudPass);
            $explode                = explode('.', $filename);
            $extension_foto         = array_pop($explode);
            $nuevoNameFoto          = $newNameFoto.'.'.$extension_foto;

            //Verificando si existe el directorio, de lo contrario lo creo
            $dirLocal       = "fotosAlumnos";
            $miDir 		      = opendir($dirLocal); //Habro mi  directorio
            $urlFotoAlumno    = $dirLocal.'/'.$nuevoNameFoto; //Ruta donde se almacena la factura.

            //Muevo la foto a mi directorio.
        if(move_uploaded_file($sourceFoto, $urlFotoAlumno)){
            $updateFoto = ("UPDATE table_alumnos SET foto2='$nuevoNameFoto' WHERE id='$idAlumno' ");
            $resultFoto = mysqli_query($con, $updateFoto);
        }
    }else{
        header("Location:index.php?errorimg=1");
    }
  }else
        if (!empty($_FILES["foto2"]["name"])){
            $filename       = $_FILES["foto2"]["name"]; //nombre de la foto
            $tipo_foto      = $_FILES['foto2']['type']; //tipo de archivo
            $sourceFoto     = $_FILES["foto2"]["tmp_name"]; //url temporal de la foto
            $tamano_foto    = $_FILES['foto2']['size']; //tamaño del archivo (foto)

            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
        if (!((strpos($tipo_foto, "PNG") || strpos($tipo_foto, "jpg") && ($tamano_foto < 100000)))) {
            $logitudPass 	        = 8;
            $newNameFoto            = substr( md5(microtime()), 1, $logitudPass);
            $explode                = explode('.', $filename);
            $extension_foto         = array_pop($explode);
            $nuevoNameFoto          = $newNameFoto.'.'.$extension_foto;

            //Verificando si existe el directorio, de lo contrario lo creo
            $dirLocal       = "fotosAlumnos";
            $miDir 		      = opendir($dirLocal); //Habro mi  directorio
            $urlFotoAlumno    = $dirLocal.'/'.$nuevoNameFoto; //Ruta donde se almacena la factura.

            //Muevo la foto a mi directorio.
        if(move_uploaded_file($sourceFoto, $urlFotoAlumno)){
            $updateFoto = ("UPDATE table_alumnos SET firma='$nuevoNameFoto' WHERE id='$idAlumno' ");
            $resultFoto = mysqli_query($con, $updateFoto);
        }
    }else{
        header("Location:index.php?errorimg=1");
    }
  }
    else
        if (!empty($_FILES["firma"]["name"])){
            $filename       = $_FILES["firma"]["name"]; //nombre de la foto
            $tipo_foto      = $_FILES['firma']['type']; //tipo de archivo
            $sourceFoto     = $_FILES["firma"]["tmp_name"]; //url temporal de la foto
            $tamano_foto    = $_FILES['firma']['size']; //tamaño del archivo (foto)

            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
        if (!((strpos($tipo_foto, "PNG") || strpos($tipo_foto, "jpg") && ($tamano_foto < 100000)))) {
            $logitudPass 	        = 8;
            $newNameFoto            = substr( md5(microtime()), 1, $logitudPass);
            $explode                = explode('.', $filename);
            $extension_foto         = array_pop($explode);
            $nuevoNameFoto          = $newNameFoto.'.'.$extension_foto;

            //Verificando si existe el directorio, de lo contrario lo creo
            $dirLocal       = "fotosAlumnos";
            $miDir 		      = opendir($dirLocal); //Habro mi  directorio
            $urlFotoAlumno    = $dirLocal.'/'.$nuevoNameFoto; //Ruta donde se almacena la factura.

            //Muevo la foto a mi directorio.
        if(move_uploaded_file($sourceFoto, $urlFotoAlumno)){
            $updateFoto = ("UPDATE table_alumnos SET fjefe='$nuevoNameFoto' WHERE id='$idAlumno' ");
            $resultFoto = mysqli_query($con, $updateFoto);
        }
    }else{
        header("Location:index.php?errorimg=1");
    }
  }
 
  header("Location:modificar.php?update=1&id=$idAlumno");
    
 }



//Eliminar Alumno
if($metodoAction == 3){
    $idAlumno  = (int) filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
    $namePhoto = filter_var($_REQUEST['namePhoto'], FILTER_SANITIZE_STRING);

    $SqlDeleteAlumno = ("DELETE FROM table_alumnos WHERE  id='$idAlumno'");
    $resultDeleteAlumno = mysqli_query($con, $SqlDeleteAlumno);
    
    if($resultDeleteAlumno !=0){
        $fotoAlumno = "fotosAlumnos/".$namePhoto;
        unlink($fotoAlumno);
    }
    
    $msj ="Alumno Borrado correctamente.";
    header("Location:modificar.php?deletAlumno=1&mensaje=".$msj);
 
}

//RESTABLECER PASES DE SALIDA USUARIO DOCENTE
if($metodoAction == 4){
    $idAlumno  = (int) filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
    
    $SqlDeleteAlumno = ("UPDATE tbl_docente SET permisos='3' WHERE  id='$idAlumno'");
    $resultDeleteAlumno = mysqli_query($con, $SqlDeleteAlumno);
    
    header("Location:permisos.php");
 
}

//RESTABLECER PASES DE SALIDA DEL ARE DOCENTE
if($metodoAction == 5){
    
    $SqlDeleteAlumno = ("UPDATE tbl_docente SET permisos_area='3'");
    $resultDeleteAlumno = mysqli_query($con, $SqlDeleteAlumno);
    
    header("Location:permisos.php");
 
}
//RESTABLECER SA
if($metodoAction == 6){
    
    $SqlDeleteAlumno = ("UPDATE tbl_sa SET permisos='3'");
    $resultDeleteAlumno = mysqli_query($con, $SqlDeleteAlumno);
    
    header("Location:permisos.php");
 
}
//RESTABLECER DA
if($metodoAction == 7){
    
    $SqlDeleteAlumno = ("UPDATE tbl_da SET permisos='3'");
    $resultDeleteAlumno = mysqli_query($con, $SqlDeleteAlumno);
    
    header("Location:permisos.php");
 
}
//RESTABLECER JD
if($metodoAction == 8){
    
    $SqlDeleteAlumno = ("UPDATE tbl_jd SET permisos='3'");
    $resultDeleteAlumno = mysqli_query($con, $SqlDeleteAlumno);
    
    header("Location:permisos.php");
 
}
//RESTABLECER DP
if($metodoAction == 9){
    
    $SqlDeleteAlumno = ("UPDATE tbl_dp SET permisos='3'");
    $resultDeleteAlumno = mysqli_query($con, $SqlDeleteAlumno);
    
    header("Location:permisos.php");
 
}
//RESTABLECER SP
if($metodoAction == 10){
    
    $SqlDeleteAlumno = ("UPDATE tbl_sp SET permisos='3'");
    $resultDeleteAlumno = mysqli_query($con, $SqlDeleteAlumno);
    
    header("Location:permisos.php");
 
}
//RESTABLECER ADTIVO
if($metodoAction == 11){
    
    $SqlDeleteAlumno = ("UPDATE tbl_adtivo SET permisos='3'");
    $resultDeleteAlumno = mysqli_query($con, $SqlDeleteAlumno);
    
    header("Location:permisos.php");
 
}
?>