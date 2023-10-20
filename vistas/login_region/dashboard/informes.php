<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container-fluid">
    <h1>Validar permisos laborales</h1>
    
     
    
 <?php
include_once './bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, folio, encargado,servidor, sucursal, status, recomendaciones FROM informe";
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
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Folio</th>
                                <th>Nombre</th> 
                                <th>ServidorID</th>                                
                                <th>Motivo</th>
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
                                <td></td>
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
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formPersonas">    
            <div class="modal-body">
                <div class="form-group">
                <label for="folio" class="col-form-label">Folio:</label>
                <input type="text" class="form-control" id="folio">
                </div>
                <div class="form-group">
                <label for="encargado" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="encargado">
                </div> 
                <div class="form-group">
                <label for="servidor" class="col-form-label">ServidorID:</label>
                <input type="text" class="form-control" id="servidor">
                </div>                
                
                <div class="form-outline mb-4">
                    <label for="sucursal" class="col-form-label">Motivo:</label>
                <select  id="sucursal" class="form-control">
                                <option value="Motivo personal">Motivo personal</option>
                                <option value="Motivo de salud">Motivo de salud</option>
                                <option value="Motivo particular">Motivo particular</option>
                                <option value="Motivo de comisión">Motivo de comisión</option>
                        </select>
                    
                </div>
                
                <div class="form-outline mb-4">
                    <label for="status" class="col-form-label">Status:</label>
                <select  id="status" class="form-control">
                                <option value="Permiso validado">Permiso validado</option>
                                <option value="Permiso denegado">Permiso denegado</option>
                                <option value="Permiso en revision">Permiso en revisión</option>
                        </select>
                    
                </div>
                <div class="form-group">
                <label for="recomendaciones" class="col-form-label">Comentarios:</label>
                <input type="text" class="form-control" id="recomendaciones">
                </div>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    
    
</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php"?>