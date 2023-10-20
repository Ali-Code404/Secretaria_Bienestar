<?php

// Comprobar si se ha cargado un archivo
if (isset($_FILES['archivo'])) {
    extract($_POST);
    $folio = $_POST['folio'];
    $nombre = $_POST['nombre'];
    $servidor = $_POST['servidor'];
    $area = $_POST['area'];
    $motivo = $_POST['motivo'];
    $fecha = $_POST['fecha'];
    $fundamentacion = $_POST['fundamentacion'];
    $status = $_POST['status'];

    // Definir la carpeta de destino
    $carpeta_destino = "files/";

    // Obtener el nombre y la extensión del archivo
    $nombre_archivo = basename($_FILES["archivo"]["name"]);
    $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

    // Validar la extensión del archivo
    if ($extension == "pdf" || $extension == "doc" || $extension == "docx" || $extension == "jpg" || $extension == "png") {


        // Mover el archivo a la carpeta de destino
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $carpeta_destino . $nombre_archivo)) {
            // Insertar la información del archivo en la base de datos
            include "db.php";
            $sql = "INSERT INTO documento (folio, nombre, servidor, area, motivo, fecha, fundamentacion, status, archivo) 
            VALUES ( '$folio', '$nombre', '$servidor', '$area', '$motivo', '$fecha', '$fundamentacion', '$status' ,'$nombre_archivo')";
            $resultado = mysqli_query($conexion, $sql);
            
            $sql2 = "INSERT INTO informe (folio, encargado,servidor, sucursal, status) 
            VALUES ( '$folio', '$nombre','$servidor', '$motivo', '$status')";
            $resultado2 = mysqli_query($conexion, $sql2);
            
            
            if ($resultado) {
                
                echo "<script language='JavaScript'>
                alert('Archivo Subido');
                location.assign('../subir.php');
                </script>";
            } else {

                echo "<script language='JavaScript'>
                alert('Error al subir el archivo: ');
                location.assign('../views/index.php');
                </script>";
            }
        } else {
            echo "<script language='JavaScript'>
            alert('Error al subir el archivo. ');
            location.assign('../views/index.php');
            </script>";
        }
    } else {
        echo "<script language='JavaScript'>
        alert('Solo se permiten archivos PDF, DOC y DOCX.');
        location.assign('../views/index.php');
        </script>";
    }
}
