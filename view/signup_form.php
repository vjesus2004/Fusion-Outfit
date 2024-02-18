<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse | FUSION OUTFIT Uruguay</title>
    <link rel="stylesheet" href="../view/css/bootstrap.min.css">
    <link rel="stylesheet" href="../view/css/estilos.css">
    <link href="../view/img/fo.png" rel="icon">
    <script src="https://kit.fontawesome.com/3ee734fc3f.js" crossorigin="anonymous"></script>
</head>

    <body>

    <div class="conteiner-fluid">

    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div class="container justify-content-center d-flex">
                        <img src="../view/img/fo.png" alt="" id="logo-login">
                    </div>
                    <div id="login-box" class="col-md-12 register">
                        <form action="" method="POST" onsubmit="return validarFormulario()" id="form-register">
                            <h3 class="text-center text">Registrarse</h3>
                            <div class="form-group">
                                <label for="username" class="text mb-2">Cedula:</label><br>
                                <input type="text" minlength="8" maxlength="8" name="ci" id="ci" class="form-control register" onkeypress="return valideKey(event);">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text mb-2">Nombre:</label><br>
                                <input type="text" name="nom" id="nom" maxlength="50" class="form-control register" onkeypress="return soloLetras(event)">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text mb-2">Apellido:</label><br>
                                <input type="text" name="ape" id="ape" maxlength="50" class="form-control register" onkeypress="return soloLetras(event)">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text mb-2">Teléfono:</label><br>
                                <input type="text" id="tel" name="tel" maxlength="8" class="form-control register" onkeypress="return valideKey(event);">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text mb-2">Correo:</label><br>
                                <input type="email" id="email" name="email" maxlength="50" class="form-control register">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text mb-2">Clave:</label><br>
                                <input type="password" name="pass" id="pass" maxlength="20" class="form-control register">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text mb-2">Repita la clave:</label><br>
                                <input type="password" name="pass1" id="pass1" maxlength="20" class="form-control register">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text mb-2">Calle:</label><br>
                                <input type="text" name="calle" id="calle" class="form-control register">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text mb-2">Nº Puerta:</label><br>
                                <input type="text" name="npuerta" id="npuerta" maxlength="4" class="form-control register"  onkeypress="return valideKey(event);">
                            </div>
                            <div class="form-group d-flex justify-content-end">
                                <input type="submit" value="Crear Cuenta" class="btn btn-guardar" name="guardar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

</body>

    <script src="../view/js/bootstrap.bundle.min.js"></script>
    <script src="../view/js/plugins.js"></script>
    <script src="../view/js/validaciones.js"></script>   
    <script src="../view/js/functions.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function validarFormulario() {
        // Obtener los valores de los campos de entrada
        var nombre = document.getElementById('nom').value;
        var ape = document.getElementById('ape').value;
        var tel = document.getElementById('tel').value;
        var pass = document.getElementById('pass').value;
        var pass1 = document.getElementById('pass1').value;
        var email = document.getElementById('email').value;
        var calle = document.getElementById('calle').value;
        var npuerta = document.getElementById('npuerta').value;
        var ci = document.getElementById('ci').value;

        // Verificar si los campos están en blanco
        if (nombre === '' || ape === ''|| tel === ''|| pass === ''|| pass1 === '' ||  email === ''|| calle === ''|| npuerta === ''|| ci === '') {
            alert('Por favor, completa todos los campos.');
            return false; // Evita que el formulario se envíe
        }

        // El formulario se enviará si todos los campos tienen valores
        return true;
    }
    </script>                                           
</html>