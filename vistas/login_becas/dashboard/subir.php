<?php
include("conexion.php");
$con=conectar();
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL, 'es_ES');
?>

<?php require_once "vistas/parte_superior.php"?>

<div class="container-fluid">
    <h1>Subir y visualizar documento de evidencia para permiso laboral.</h1><br><br>

    <form class="form-search content-search navbar-form" action="" method="post">
    <div>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar"> Agregar </button>
                <br><br><h5>Visualiza tu información escribiendo tu id de trabajador en el campo de buscar.</h5><br>
            </div>
    <div class="input-group">
        <input placeholder="Buscar" class="form-control form-text" type="text" size="15" maxlength="10" name="buscar" id="buscar" />
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary"><span class="icon glyphicon glyphicon-search" aria-hidden="true" ><i class="fas fa-search"></i></span></button>
        </span>
    </div>
    </form><br><br>

    <?php
    $buscar = (isset($_POST['buscar'])) ? $_POST['buscar'] : '';
    ?>

    <?php
    include_once './includes/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT id, nombre, descripcion, archivo FROM documento WHERE id='$buscar'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>

<div class="container-fluid">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="solicitudes" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>ServidorID</th>
                            <th>Archivo</th>
                            <th>Descargar</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                       require_once "./includes/db.php";
                       $consulta = mysqli_query($conexion, "SELECT id, nombre, descripcion, archivo FROM documento WHERE descripcion='$buscar'");
                       while ($fila = mysqli_fetch_assoc($consulta)):
                    

                       ?>
                            <tr>
                            <td><?php echo $fila['id'] ;?></td>
                            <td><?php echo $fila['nombre'] ;?></td>
                            <td><?php echo $fila['descripcion'] ;?></td>
                            <td><?php echo $fila['archivo'] ;?></td>
                                <td>
                                    <a href="./includes/download.php?id= <?php echo $fila['id'] ;?>" class="btn btn-primary">
                                  <i class="fas fa-download"></i></a>
                                </td>
                                <?php endwhile ;?>

                            </tr>
                    </tbody>
                </table>

            </div>

</form>

   

    
</div>
<?php include "agregar.php"; ?>

<?php require_once "vistas/parte_inferior.php"?>

