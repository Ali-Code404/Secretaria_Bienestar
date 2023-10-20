<!doctype html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="#" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login con  PHP - Bootstrap 4</title>
    
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
    
    <link rel="stylesheet" href="plugins/sweet_alert2/sweetalert2.min.css">
</head>
<body>


<section class="vh-100" style="background-color: #e6b68b;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
           
          <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="./img/logo.png" 
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                <img src="./img/bienestar.png" 
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>

            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form id="" class="form" action="code.php" method="post">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <img src="./img/logo.png" align="center" width="390">
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Llena el formulario para registrar una cuenta nueva e iniciar sesión para realizar el llenado del formulario.</h5>

                  <div class="row">
                  
                  <div class="col-md-6 mb-a">
                    <input type="text" name="nombre" id="nombre" class="form-control form-control-lg" placeholder="Nombre completo" />
                    <label class="form-label" for="form2Example17">Nombre:</label>
                  </div>

                  <div class="col-md-6 mb-a">
                    <input type="text" name="telefono" id="telefono" class="form-control form-control-lg" placeholder="442 125 2265" />
                    <label class="form-label" for="form2Example27">Teléfono:</label>
                  </div>
                </div>

                <div class="row">
                  
                  <div class="col-md-6 mb-a">
                    <input type="email" name="usuario" id="usuario" class="form-control form-control-lg" placeholder="example@micorreo.com" />
                    <label class="form-label" for="form2Example17">Correo:</label>
                  </div>

                  <div class="col-md-6 mb-a">
                    <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="********" />
                    <label class="form-label" for="form2Example27">Contraseña:</label>
                  </div>
                </div>

                <div class="form-outline mb-4">
                <select name="idRol" id="idRol" class="form-control">
                                <option value="">Seleccione un área:</option>
                                <option value="1">Director regional</option>
                                <option value="2">Área de recursos humanos</option>
                                <option value="3">Área de adulto mayor</option>
                                <option value="4">Área de becas</option>
                        </select>
                    <label for="inputState">Área:</label>
                </div>

                <div class="form-outline mb-4">
                <select name="sucursal" id="sucursal" class="form-control">
                                <option value="">Seleccione un puesto:</option>
                                <option value="Servidor de la nación">Servidor de la nación</option>
                                <option value="Jefe del área">Jefe del área</option>
                        </select>
                    <label for="inputState">Puesto:</label>
                </div>

                  <div class="pt-1 mb-4">
                  <input type="submit" name="save_student" class="btn btn-success btn-lg btn-block" value="Conectar">
                  </div>

                  <p class="mb-5 pb-lg-2" style="color: #101010;">¿Ya tienes una cuenta? <a href="index.php"
                      style="color: #e6b68b;">Inicia sesión ahora mismo.</a></p>
                  <a href="#!" class="small text-muted">Condiciones de uso.</a>
                  <a href="#!" class="small text-muted">Politica de privacidad</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <script src="plugins/sweet_alert2/sweetalert2.all.min.js"></script>
    <script src="codigo.js"></script>
</body>
</html>