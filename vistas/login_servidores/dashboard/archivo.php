<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Imprimir acuse</h1>
    
        <?php 
    include("conexion.php");
    $con=conectar();
    $idAlumno      = ($_REQUEST['id']);
    //$idAlumno      = (int) filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
    $sqlAlumnos   = ("SELECT id,folio,encargado,servidor, sucursal,status,recomendaciones FROM informe WHERE id='$idAlumno' LIMIT 1");
    $queryAlumnos = mysqli_query($con, $sqlAlumnos);
    $totalAlumnos = mysqli_num_rows($queryAlumnos);
    ?>
 
 <div class="col-md-8">
 <?php
    while ($dataAlumno = mysqli_fetch_array($queryAlumnos)) { ?>
    
    <!---------------------------------------------------------------------------------------------------------------------------->


<!--FIN del cont principal-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                           <form name="reporte" action="documento.php" method="post">
                             

                              <div class="form-group">
                                <label for="exampleInputPassword1">Folio:</label>
                                <input type="text" class="form-control" id="folio" name="folio" value="<?php echo $dataAlumno['folio']; ?> ">
                              </div>
                               
                               <div class="form-group">
                                <label for="exampleInputPassword1">Nombre:</label>
                                <input type="text" class="form-control" id="encargado" name="encargado" value="<?php echo $dataAlumno['encargado']; ?> ">
                              </div>
                               
                               <div class="form-group">
                                <label for="exampleInputPassword1">ServidorID:</label>
                                <input type="text" class="form-control" id="servidor" name="servidor" value="<?php echo $dataAlumno['servidor']; ?> ">
                              </div>
                               
                               <div class="form-group">
                                <label for="exampleInputPassword1">Motivo:</label>
                                <input type="text" class="form-control" id="sucursal" name="sucursal" value="<?php echo $dataAlumno['sucursal']; ?> ">
                              </div>
                               
                               <div class="form-group">
                                <label for="exampleInputPassword1">Status:</label>
                                <input type="text" class="form-control" id="status" name="status" value="<?php echo $dataAlumno['status']; ?> ">
                              </div>
                               
                               <div class="form-group">
                                <label for="exampleInputPassword1">Comentarios:</label>
                                <input type="text" class="form-control" id="recomendaciones" name="recomendaciones" value="<?php echo $dataAlumno['recomendaciones']; ?> ">
                              </div>


                              <input type="submit" class="btn btn-danger" value="GENERAR Y DESCARGAR PDF">
                            </form>
                        
                                <?php } ?>
                    </div>
                </div>
        </div>    
    </div>

<?php require_once "vistas/parte_inferior.php"?>