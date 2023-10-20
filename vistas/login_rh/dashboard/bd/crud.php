<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : '';
$matricula = (isset($_POST['matricula'])) ? $_POST['matricula'] : '';
$semestre = (isset($_POST['semestre'])) ? $_POST['semestre'] : '';
$grupo = (isset($_POST['grupo'])) ? $_POST['grupo'] : '';
$turno = (isset($_POST['turno'])) ? $_POST['turno'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO alumnos (nombre, apellidos, matricula, semestre, grupo, turno) VALUES('$nombre', '$apellidos', '$matricula', '$semestre', '$grupo', '$turno') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id, nombre, apellidos, matricula, semestre, grupo, turno FROM alumnos ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE alumnos SET nombre='$nombre', apellidos='$apellidos', matricula='$matricula', semestre='$semestre', grupo='$grupo', turno='$turno' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id, nombre, apellidos, matricula, semestre, grupo, turno FROM alumnos WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM alumnos WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
