<!DOCTYPE html>
<html lang="en">
<head>
    <title>Iniciar Sesion | FUSION OUTFIT Uruguay</title>
    <link href="view/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="view/css/estilos.css">
    <link href="view/img/fo.png" rel="icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>

    <div id="login" class="sign-in">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div class="container justify-content-center d-flex">
                        <img src="view/img/fo.png" alt="" id="logo-login">
                    </div>
                    <div id="login-box" class="col-md-12" >
                        <form id="login-form" method="POST" action="controller/inicio_controller.php">
                            <h3 class="text-center text">Iniciar Sesión</h3>
                            <div class="form-group">
                                <label for="username" class="text mb-2">Cedula:</label><br>
                                <input type="text" name="login_ci" id="username" class="form-control" maxlength="8">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text mb-2">Contraseña:</label><br>
                                <input type="password" name="login_pass" id="password" class="form-control">
                            </div>
                            <div class="form-group d-flex">
                                <div class="col-6">
                                    <button class="btn btn-default" type="submit" name="btn-ingresar">Ingresar</button>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-end">
                                    <a  href="controller/signup_controller.php" class="text text-right">Registrarme</a>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="view/js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>

</html>