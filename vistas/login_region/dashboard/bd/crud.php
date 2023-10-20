<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//ALTER TABLE nombre_tabla AUTO_INCREMENT = 1 "Se utiliza para restablecer el conteo del ID"
// Recepción de los datos enviados mediante POST desde el JS   

$folio = (isset($_POST['folio'])) ? $_POST['folio'] : '';
$encargado = (isset($_POST['encargado'])) ? $_POST['encargado'] : '';
$servidor = (isset($_POST['servidor'])) ? $_POST['servidor'] : '';
$sucursal = (isset($_POST['sucursal'])) ? $_POST['sucursal'] : '';
$status = (isset($_POST['status'])) ? $_POST['status'] : '';
$recomendaciones = (isset($_POST['recomendaciones'])) ? $_POST['recomendaciones'] : '';

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
 
switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO informe (folio, encargado,servidor, sucursal, status, recomendaciones) VALUES('$folio', '$encargado','$servidor', '$sucursal', '$status', '$recomendaciones') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id, folio, encargado,servidor, sucursal, status, recomendaciones FROM informe";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE informe SET folio='$folio', encargado='$encargado',servidor='$servidor', sucursal='$sucursal', status='$status', recomendaciones='$recomendaciones' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id, folio, encargado,servidor, sucursal, status, recomendaciones FROM informe WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        $consultax = "UPDATE documento SET status='$status' WHERE id='$id' ";		
        $resultadox = $conexion->prepare($consultax);
        $resultadox->execute();        
        
        $consultax = "SELECT id, folio, nombre, servidor, motivo, status  FROM documento WHERE id='$id' ";       
        $resultadox = $conexion->prepare($consultax);
        $resultadox->execute();
        $datax=$resultadox->fetchAll(PDO::FETCH_ASSOC);
        break;      
    case 3://baja
        $consulta = "DELETE FROM informe WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta1 = "DELETE FROM documento WHERE id='$id' ";		
        $resultado1 = $conexion->prepare($consulta1);
        $resultado1->execute();                           
        break; 
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
