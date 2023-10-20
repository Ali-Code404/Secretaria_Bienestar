<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Registrar permiso laboral</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">
                
                <?php
                    function claveThree($length = 12) { 
                        return substr(str_shuffle("0123456789"), 0, $length); 
                    } 
                    $miClaveThree  = claveThree();
                  ?>
                        
                    <?php
                        $conexion=mysqli_connect('localhost','root','','bienestar');
                        ?>
                    <?php
                        $sql="SELECT * FROM solicitudes";
                        $result=mysqli_query($conexion,$sql);
                        $mostrar=mysqli_fetch_array($result);{
                    ?>

                <form action="./includes/upload.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                                <label for="nombre" class="form-label">Folio</label>
                                <input type="text" id="folio" name="folio" class="form-control" value=<?php echo $miClaveThree; ?> required>

                            </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required>

                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">ServidorID</label>
                                <input type="text" id="servidor" name="servidor" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                    <label for="status" class="col-form-label">Área:</label>
                <select  id="area" name="area" class="form-control" placeholder="x">
                                <option value="Director regional">Director regional</option>
                                <option value="Área de recursos humanos">Área de recursos humanos</option>
                                <option value="Área de adultos mayores">Área de adultos mayores</option>
                                <option value="Área de becas">Área de becas</option>
                                <option value="Servidores de la nación">Servidores de la nación</option>
                        </select>
                    
                </div>


                        <div class="col-sm-6">
                    <label for="status" class="col-form-label">Motivo:</label>
                <select  id="motivo" name="motivo" class="form-control" placeholder="x">
                                <option value="Motivo personal">Motivo personal</option>
                                <option value="Motivo de salud">Motivo de salud</option>
                                <option value="Motivo particular">Motivo particular</option>
                                <option value="Motivo de comisión">Motivo de comisión</option>
                        </select>
                    
                </div>
                    </div><br>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Fecha:</label>
                                <input type="date" id="fecha" name="fecha" class="form-control" required>

                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Fudamentación:</label>
                                <input type="text" id="fundamentacion" name="fundamentacion" class="form-control" required>
                            </div>
                        </div>
                    </div>




                    <div class="col-12">
                        <label for="yourPassword" class="form-label">Archivo (WORD, PDF, PNG y JPG)</label>
                        <input type="file" name="archivo" id="archivo" class="form-control" required>

                    </div>
                    
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="status" name="status" value="Pendiente de revisión">
                      </div>

                    <br>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="register" name="registrar">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

            </div>

            </form>
            <?php
}
?>
        </div>
    </div>
</div>