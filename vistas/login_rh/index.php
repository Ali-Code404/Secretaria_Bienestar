<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Inicio de sesión</h3></div>
                                    <div class="card-body">
                                        
                                        <form id="formLogin" action="" method="post">
                                            <div class="form-floating mb-3" data-validate="Correo electrónico incorrecto">
                                                <input class="form-control" id="email" name="email" type="text" placeholder="name@example.com" />
                                                <label for="inputEmail">Correo electrónico</label>
                                            </div>
                                            <div class="form-floating mb-3" data-validate="Contraseña incorrecta">
                                                <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                                                <label for="inputPassword">Contraseña</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                
                                                <button class="btn btn-primary" type="submit" name="submit">Iniciar sesión</button>
                                            </div>
                                        </form>
                                        
              
                                        
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">¿No tienes una cuenta? Regístrate ahora</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Sistemas COBAEV</div>
                            <div>
                                <a href="#">Visita la página del cobaev</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="jquery/jquery-3.3.1.min.js"></script>    
        <script src="bootstrap/js/bootstrap.min.js"></script>    
        <script src="popper/popper.min.js"></script>    
        <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>    
        <script src="codigo.js"></script>   
    </body>
</html>
