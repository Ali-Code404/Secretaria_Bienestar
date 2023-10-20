<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container-fluid">
    <h1>Imprimir solicitud de permiso laboral</h1>
    
    
    
 <?php
include_once './bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, folio, encargado, servidor, sucursal, status, recomendaciones FROM informe";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>    
    <br>  
<div class="container-fluid">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaCitatorios" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Folio</th>
                                <th>Encargado</th>                                
                                <th>ServidorID</th>
                                <th>Área</th>
                                <th>Status</th>
                                <th>Comentarios</th>
                                <th>Acciones</th>
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
                                <td><?php echo $dat['servidor'] ?></td>
                                <td><?php echo $dat['sucursal'] ?></td>
                                <td><?php echo $dat['status'] ?></td>
                                <td><?php echo $dat['recomendaciones'] ?></td>
                                <td><a href="archivo.php?id=<?php echo $dat['id']; ?>" class="btn btn-success mb-2"   title="Generar justificante de <?php echo $dat['encargado']; ?>">
                  <i class="fas-fa home"></i>Generar justificante</a></td>
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