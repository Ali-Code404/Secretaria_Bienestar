<?php 
session_start();
require 'dbcon.php';

if(isset($_POST['save_student']))
{
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $sucursal = mysqli_real_escape_string($con, $_POST['sucursal']);
    $telefono = mysqli_real_escape_string($con, $_POST['telefono']);
    
    $usuario = mysqli_real_escape_string($con, $_POST['usuario']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $idRol = mysqli_real_escape_string($con, $_POST['idRol']);

    $query = "INSERT INTO usuarios (nombre,sucursal,telefono,usuario,password,idRol) VALUES ('$nombre','$sucursal','$telefono','$usuario',md5('$password'),'$idRol')";
    
    
 
    $query_run = mysqli_query($con, $query);

    {
        $_SESSION['message'] = "La cuenta no se creó satisfactoriamente.";
        header("Location: ./prism/index.html");
        exit(0);
    }
}
 
