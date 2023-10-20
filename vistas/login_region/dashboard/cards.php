<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Formulario de solicitud para mantenimiento de PC en sucursal</h1><br><br>
    <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Encargado(a):</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Nombre y Apellidos">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Correo electrónico:</label>
      <input type="email" class="form-control" id="inputPassword4" placeholder="Correo electrónico">
    </div>
  </div>
  <div class="form-group">
      <label for="inputState">Sucursal:</label>
      <select id="inputState" class="form-control">
        <option selected>Selecciona tu sucursal...</option>
        <option>...</option>
        <option>...</option>
        <option>...</option>
        <option>...</option>
      </select>
    </div>
  <div class="form-group">
    <label for="inputAddress">Anydesk:</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Introduce tu Anydesk.">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descripción del problema:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
    <div class="form-group">
      <label for="inputCity">Status:</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
 
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
</div>

<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php"?>