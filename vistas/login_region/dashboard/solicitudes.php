<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container-fluid">
    <h1>Ver todas las solicitudes de permisos laborales en el sistema</h1>
    
    
    
 <?php
include_once './bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, folio, nombre, servidor, area, motivo, fecha, fundamentacion, archivo, status FROM documento";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container-fluid">
        <div class="row">
              
        </div>    
    </div>    
    <br>  
<div class="container-fluid">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaRegion" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Folio</th>
                                <th>Nombre</th>                                
                                <th>ServidorID</th>
                                <th>Área</th>
                                <th>Motivo</th>
                                <th>Fecha</th> 
                                <th>Fundamentación</th>
                                <th>Archivo</th>
                                <th>Status</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['folio'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['servidor'] ?></td> 
                                <td><?php echo $dat['area'] ?></td> 
                                <td><?php echo $dat['motivo'] ?></td>    
                                <td><?php echo $dat['fecha'] ?></td> 
                                <td><?php echo $dat['fundamentacion'] ?></td>
                                <td>
                                    <a href="./includes/dowload.php?id= <?php echo $dat['id'] ;?>" class="btn btn-primary">
                                  <i class="fas fa-download"></i></a>
                                </td> 
                                <td><?php echo $dat['status'] ?></td> 
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>      
      
</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php"?>