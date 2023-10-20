<?php 
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM usuarios WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);
 
    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: index.php");
        exit(0);
    }
} 

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $puesto = mysqli_real_escape_string($con, $_POST['puesto']);
    $area = mysqli_real_escape_string($con, $_POST['area']);
    $usuario = mysqli_real_escape_string($con, $_POST['usuario']);

    $query = "UPDATE usuarios SET nombre='$nombre', puesto='$puesto', area='$area', usuario='$usuario' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: index.php");
        exit(0);
    }

}
 

if(isset($_POST['save_student']))
{
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $apellidos = mysqli_real_escape_string($con, $_POST['apellidos']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "INSERT INTO usuarios (FirstName, LastName, Email, Password) VALUES ('$nombre','$apellidos','$email','$password',md5('$password'))";
    
    
 
    $query_run = mysqli_query($con, $query);
   
    
    if($idRol == 2){
        $sys_log = "INSERT INTO usuarios (FirstName,LastName,Email,Password) VALUES ('$nombre','$apellidos','$email','$password')";
         $query_syslog = mysqli_query($con, $sys_log);
    }else{
        $_SESSION['message'] = "La cuenta no se creó satisfactoriamente.";
        header("Location: registro.php");
        exit(0);
    }
    
   
}
 
