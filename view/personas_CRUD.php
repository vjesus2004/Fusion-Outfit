<?php session_start();

$rol = $_SESSION['rol'];

if($rol==""){
    header("Location: ../view/logout.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion | FUSION OUTFIT Uruguay</title>
    <link rel="stylesheet" href="../view/css/bootstrap.min.css">
    <link rel="stylesheet" href="../view/css/estilos.css">
    <link href="../view/img/fo.png" rel="icon">
    <script src="https://kit.fontawesome.com/3ee734fc3f.js" crossorigin="anonymous"></script>
</head>

    <body>

    <header style="height: 200px;">
        <div class="container">
            <div class="top-right-strip row">
                <ul class="top-hnt-right-content col-lg-12">
                    <li class="button-log usernhy mr-4" style="list-style: none;">
                            <a class="btn-open" href="../view/logout.php">
                                <i class="fa fa-solid fa-arrow-right-from-bracket"></i>
                                <label class="ml-1">Cerrar sesión</label>
                            </a>
                    </li>
                </ul>
            </div>
            <div class="row justify-content-between mb-5">
                <div class="col-4">
                    <img src="../view/img/logo.png" alt="logo" class="navbar-brand">
                </div>
                <div class="col-8">
                    <nav class="navbar navbar-expand-lg">
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link nav-link-1 " aria-current="page" href="../view/inicio.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-2" aria-current="page" href="catalogo_controller.php">Comprar</a>
                                
                            </li>
                            <li class="nav-item">
                            <a class="nav-link nav-link-2" aria-current="page" href="../controller/pedidosCliente_controller.php">Pedidos</a>
                        </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-3" href="../view/about.php">Sobre Nosotros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-4" href="../view/contact.php">Contactanos</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link nav-link-5 active">Administrar</a>
                                <ul class="admin">
                                    <li><a class="nav-link nav-link-1 active" href="personas_controller.php">Personas</a></li>
                                    <li><a class="nav-link nav-link-2" href="productos_controller.php">Productos</a></li>
                                    <li><a class="nav-link nav-link-3"href="../controller/consulta_controller.php">Consultas</a></li>
                                    <li><a class="nav-link nav-link-4" href="pedidos_controller.php">Pedidos</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    </nav>
                </div>
                
            </div>

        </div>
        
    </header>


    <div class="conteiner-fluid">
        <div class="row">
            <div class="d-flex justify-content-center align-items-center">
                    <div class="d-flex flex-column mt-4 mb-3 crear">
                    <div id="crud-box-header">
                            <h6 id="nPers" class="ml-3">Nueva persona</h6>
                        </div>
                        <div id="crud-box">
                            <form action="" method="POST" onsubmit="return validarFormulario()">
                                <div class="row mb-4">
                                    <div class="col-3">
                                        <label class="text">Cedula</label>
                                    </div>
                                    
                                    <div class="col-9">
                                        <input type="text" minlength="8" maxlength="8" name="ci" id="ci" class="form-control form-control-crud" onkeypress="return valideKey(event);">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-3">
                                        <label class="text">Nombre</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="nom" id="nom" maxlength="50" class="form-control form-control-crud" onkeypress="return soloLetras(event)">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-3">
                                        <label class="text">Apellido</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="ape" id="ape" maxlength="50" class="form-control form-control-crud" onkeypress="return soloLetras(event)">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-3">
                                        <label class="text">Teléfono</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="tel" id="tel" maxlength="9" class="form-control form-control-crud" onkeypress="return valideKey(event);">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-3">
                                        <label class="text">Correo</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="email" name="email" id="email" maxlength="50" class="form-control form-control-crud">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-3">
                                        <label class="text">Clave</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="password" name="pass" id="pass" maxlength="20" class="form-control form-control-crud">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-3">
                                        <label class="text">Calle</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="calle" id="calle" class="form-control form-control-crud">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-3">
                                        <label class="text">Nº Puerta</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="npuerta" id="npuerta" maxlength="4" class="form-control form-control-crud"  onkeypress="return valideKey(event);">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-3">
                                        <label class="text">Tipo</label>
                                    </div>
                                    <div class="col-9">
                                    <select name="tipo">
                                            <option value="admin">Administrador</option>
                                            <option value="user">Usuario</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 d-flex justify-content-end">
                                        <input type="submit" id="btnG" value="Guardar" class="btn btn-primary btn-crud" name="guardar" onclick="validarFormulario();">
                                     
                                    </div>
                                </div>
                            </form>
                        </div>
                       
                    </div>
                    <div class="ml-5 crear">
                        <div id="crud-box-header" class="acciones">
                            <h6 class="ml-3">Acciones</h6>
                        </div>

                        <div id="crud-box" class="acciones d-flex align-items-center flex-column justify-content-center">
                            <h6 class="mb-2">Editar persona</h6>
                            <button id="toggleButton" class="toggle-button" onclick="toggleIcon()">
                                <i id="toggleIcon" class="fas fa-toggle-off"></i>
                            </button>


                            <h6 class="mt-4 mb-4">Eliminar persona</h6>
                            <button onclick="openPopup()" class="btn btn-primary btn-crud">Eliminar</button>
                            <div class="popup-overlay" id="popupOverlay">
                                <div class="container popup-content">
                                    <div class="row-4 box-eliminar d-flex justify-content-center"><h2>Eliminar persona</h2></div>
                                    <div class="row-4 box-eliminar d-flex justify-content-center align-items-center">
                                        <form method="POST">
                                            <?php
                                        echo "<select style='position:absolute; padding:20px;' name='cidel'>";
                                        foreach ($datos as $dato) {
                                            echo "<option value='".$dato["ci"]."'>".$dato["ci"]." - ".$dato["nombre"]."</option>";
                                        }
                                        echo "</select>";
                                        ?>
                                    </div>
                                    <div class="row-4 box-eliminar align-items-end d-flex justify-content-around">
                                        <button class="btn btn-primary btn-crud" onclick="closePopup()">Cancelar</button>
                                        
                                            <input type="submit" class="btn btn-primary btn-crud mt-3" name="eliminar" onclick="deleteItem();" value="Eliminar"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        

        <div class="row">
            <div class="d-flex flex-column align-items-center">
                    <form action="" method="POST">
                    <div class="mt-4 d-flex flex-row align-items-center">
                        <label class="text mb-3 mr-3">Buscar CI</label>
                        <input type="text" name="buscar" minlength="8" maxlength="8" class="form-control form-control-crud text-buscar mb-3 mr-3" style="height:30px">
                        <input type="submit" id="baja" value="Buscar" name="buscarci" class="btn btn-primary btn-crud mb-4" style="padding:4px">
                    </div>
                    <div class="mt-3 d-flex">
                        <div id="lista-box">
                        <div class="mb-4 ">
                            <input type="submit" id="baja" value="Ver usuarios de Baja" name="baja" class="btn btn-primary btn-crud" style="padding:5px">
                            <input type="submit" id="baja" value="Ver usuarios Activos" name="alta" class="btn btn-primary btn-crud" style="padding:5px">
                        </div>
                        
                       
                            <div class="form-group d-flex">
                                    <table>
                                        <tr>
                                            <th>Ci</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Telefono</th>
                                            <th>Correo</th>
                                            <th>Calle</th>
                                            <th>Nº puerta</th>
                                            <th>Tipo</th>
                                        </tr>
                                        <?php
                                        if(isset($datos)){

                                               foreach ($datos as $dato) {
                                            echo "<tr><td>".$dato["ci"]."</td><td>".$dato["nombre"]."</td><td>".$dato["apellido"]
                                            ."</td><td>".$dato["telefono"]."</td><td>".$dato["correo"]."</td><td>".$dato["calle"]
                                            ."</td><td>".$dato["nPuerta"]."</td><td>".$dato["tipo"]."</td></tr>";}
                                        }
                                         
                                        ?>
                                </table> 
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
    <script src="../view/js/functions.js"></script>
    <script src="../view/js/validaciones.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>                                        

    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
   
    
</html>