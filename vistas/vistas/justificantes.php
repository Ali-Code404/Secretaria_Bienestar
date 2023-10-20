<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Página de justificantes</h1>
    
        <?php 
    include("conexion.php");
    $con=conectar();
    $idAlumno      = ($_REQUEST['id']);
    //$idAlumno      = (int) filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
    $sqlAlumnos   = ("SELECT * FROM alumnos WHERE id='$idAlumno' LIMIT 1");
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
                                <label for="exampleInputEmail1">Fecha de expedición:</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">Seleccione la fecha.</small>
                              </div>

                              <div class="form-group">
                                <label for="exampleInputPassword1">Nombre del alumno:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $dataAlumno['nombre']; ?> ">
                              </div>

                              <div class="form-group">
                                <label for="exampleInputPassword1">Apellidos del alumno:</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $dataAlumno['apellidos']; ?> ">
                              </div>

                              <div class="form-group">
                                <label for="exampleFormControlTextarea1">Causa o motivo:</label>
                                <textarea class="form-control" id="causa" name="causa" rows="3"></textarea>
                              </div>

                             <div class="form-group">
                                <label for="exampleInputPassword1">Grupo:</label>
                                <input type="text" class="form-control" id="grupo" name="grupo" value="<?php echo $dataAlumno['grupo']; ?> ">
                              </div>

                             <div class="form-group">
                                <label for="exampleInputPassword1">Turno:</label>
                                <input type="text" class="form-control" id="turno" name="turno" value="<?php echo $dataAlumno['turno']; ?> ">
                              </div>

                             <div class="form-group">
                                <label for="exampleInputPassword1">Dia(s):</label>
                                <input type="text" class="form-control" id="dias" name="dias">
                              </div>

                             <div class="form-group">
                                <label for="exampleFormControlSelect1">Mes:</label>
                                <select class="form-control" id="mes" name="mes">
                                  <option>Enero</option>
                                  <option>Febrero</option>
                                  <option>Marzo</option>
                                  <option>Abril</option>
                                  <option>Mayo</option>
                                  <option>Junio</option>
                                  <option>Julio</option>
                                  <option>Agosto</option>
                                  <option>Septiembre</option>
                                  <option>Octubre</option>
                                  <option>Noviembre</option>
                                  <option>Diciembre</option>
                                </select>
                              </div>

                             <div class="form-group">
                                <label for="exampleInputPassword1">Año:</label>
                                <input type="text" class="form-control" id="año" name="año">
                              </div>

                              <div class="form-group">
                                <label for="exampleInputPassword1">Horas:</label>
                                <input type="text" class="form-control" id="horas" name="horas">
                              </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Paraescolar:</label>
                                <input type="text" class="form-control" id="paraescolar" name="paraescolar">
                              </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Capacitación:</label>
                                <input type="text" class="form-control" id="capacitacion" name="capacitacion">
                              </div>

                              <input type="submit" class="btn btn-danger" value="GENERAR Y DESCARGAR PDF">
                            </form>
                        
                                <?php } ?>
                    </div>
                </div>
        </div>    
    </div>

<?php require_once "vistas/parte_inferior.php"?>