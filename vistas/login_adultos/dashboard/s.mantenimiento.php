<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container-fluid">
    <h1>Formulario para realizar una solicitud de permiso laboral.</h1><br><br>
    
    <form method="POST" action="action.php" enctype="multipart/form-data">
    <input type="text" name="metodo" value="1" hidden>
  
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


    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputAddress">Folio:</label>
        <input type="text" class="form-control" id="" name="folio" value=<?php echo $miClaveThree; ?>>
      </div>
   </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Nombre:</label>
        <input type="text" class="form-control" id="" name="encargado" placeholder="Nombre y Apellidos" required>
      </div>

      <div class="form-group col-md-6">
        <label for="inputPassword" class="">Área:</label>
        
        <select class="form-control" id="" name="email" required>
          <option value="Director regional">Director regional</option>
          <option value="Area de recursos humanos">Área de recursos humanos</option>
          <option value="Area de adulto mayor">Área de adulto mayor</option>
          <option value="Area de becas">Área de becas</option>
      </select>
  </div>
    </div>
  
  <div class="form-row">

  <div class="form-group col-md-6">
        <label for="inputPassword" class="">Motivo de permiso:</label>
        
        <select class="form-control" id="" name="sucursal" required>
          <option value="Personal">Personal</option>
          <option value="Salud">Salud</option>
          <option value="Particular">Particular</option>
          <option value="Comision">Comisión</option>
      </select>
  </div>
  <div class="form-group col-md-6">
        <label for="inputPassword" class="">Puesto:</label>
        
        <select class="form-control" id="" name="fecha" required>
          <option value="Jefe de area">Jefe de área</option>
          <option value="Servidor de la nacion">Servidor de la nación</option>
      </select>
  </div>
</div>

  <div class="form-group">
    <label for="inputAddress">ServidorID:</label>
    <input type="text" class="form-control" id="" name="anydesk" placeholder="Introduce tu clave de servidor." required>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Fundamentación:</label>
    <textarea class="form-control" id="" name="descripcion" placeholder="Describe el problema." rows="3"></textarea>
  </div>

  <div class="form-group">
    <input type="hidden" class="form-control" id="" name="status" value="Pendiente de revisión"><br>
  </div>
 
  <div class="form-group">
    <button type="submit" name="pase_salida" class="btn btn-success">Enviar formulario</button>
  </div>

</form>
</div>

<!--FIN del cont principal-->
<?php
                        }
                    ?>
<?php require_once 

"vistas/parte_inferior.php"?>