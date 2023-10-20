<?php
include("conexion.php");
$con=conectar();
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL, 'es_ES');
?>

<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container-fluid">
    <h1>Ver solicitudes de permisos realizadas mediante tu clave de servidor.</h1><br><br>

    <form class="form-search content-search navbar-form" action="" method="post">
    <div class="input-group">
        <input placeholder="Buscar" class="form-control form-text" type="text" size="15" maxlength="255" name="buscar" id="buscar" />
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary"><span class="icon glyphicon glyphicon-search" aria-hidden="true" ><i class="fas fa-search"></i></span></button>
        </span>
    </div>
    </form><br><br>

    <?php
    $buscar = (isset($_POST['buscar'])) ? $_POST['buscar'] : '';
    ?>

    <?php
    include_once './bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT id, folio, encargado, email, sucursal, fecha, anydesk, descripcion FROM solicitudes WHERE anydesk='$buscar'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>

        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Folio</th>
                                <th>Nombre</th>                                
                                <th>Área</th>
                                <th>Motivo</th>
                                <th>Puesto</th>
                                <th>ServidorID</th>
                                <th>Fundamentación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['folio'] ?></td>
                                <td><?php echo $dat['encargado'] ?></td>
                                <td><?php echo $dat['email'] ?></td> 
                                <td><?php echo $dat['sucursal'] ?></td>
                                <td><?php echo $dat['fecha'] ?></td>
                                <td><?php echo $dat['anydesk'] ?></td>
                                <td><?php echo $dat['descripcion'] ?></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>

</form>

   

    
</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php"?>