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
    <title>FUSION OUTFIT Uruguay | Tienda Online</title>
    <link href="../view/img/fo.png" rel="icon">
    <link rel="stylesheet" href="../view/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/3ee734fc3f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../view/css/estilos.css">
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
                            <a class="nav-link nav-link-4 active" href="">Administrar</a>
                            <ul class="admin">
                                    <li><a class="nav-link nav-link-1" href="../controller/personas_controller.php">Personas</a></li>
                                    <li><a class="nav-link nav-link-2 active" href="../controller/productos_controller.php">Productos</a></li>
                                    <li><a class="nav-link nav-link-3"href="../controller/consulta_controller.php">Consultas</a></li>
                                    <li><a class="nav-link nav-link-4" href="../controller/pedidos_controller.php">Pedidos</a></li>
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
                            <h6 id="nProd" class="ml-3">Nuevo producto</h6>
                        </div>
                        <div id="crud-box" style="height: 450px;">
                    <form action=""  enctype="multipart/form-data"  method="POST" onsubmit="return validarFormulario()">
                    <div class="row mb-4">
                        <div class="col-3">
                            <label class="text">ID</label>
                        </div>
                        <div class="col-9">
                            <input type="text" maxlength="3" name="id" id="id" class="form-control form-control-crud" onkeypress="return valideKey(event);">
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
                            <label class="text">Precio</label>
                        </div>
                        <div class="col-9">
                            <input type="text" name="precio" id="precio" maxlength="10" class="form-control form-control-crud" onkeypress="return valideKey(event);">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-3">
                            <label class="text">Stock</label>
                        </div>
                        <div class="col-9">
                            <input type="text" name="stock" id="stcok" maxlength="10" class="form-control form-control-crud" onkeypress="return valideKey(event);">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-3">
                            <label class="text">Categoria</label>
                        </div>
                        <div class="col-9">
                            <select name="categoria">
                                <option value="4">Pantalones</option>
                                <option value="1">Camperas</option>
                                <option value="3">Remeras</option>
                                <option value="2">Buzos</option>
                                <option value="5">Zapatillas</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-3">
                            <label class="text">Subir imagen</label>
                        </div>
                        <div class="col-9 d-flex flex-column">
                            <input name="campoimagen" class="mb-2" type="file" />
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
                            <h6 class="mb-2">Editar producto</h6>
                            <button id="toggleButton" class="toggle-button" onclick="toggleIcon()">
                                <i id="toggleIcon" class="fas fa-toggle-off"></i>
                            </button>


                            <h6 class="mt-4 mb-4">Eliminar producto</h6>
                            <button onclick="openPopup()" class="btn btn-primary btn-crud">Eliminar</button>
                            <div class="popup-overlay" id="popupOverlay">
                                <div class="container popup-content">
                                    <div class="row-4 box-eliminar d-flex justify-content-center"><h2>Eliminar producto</h2></div>
                                    <div class="row-4 box-eliminar d-flex justify-content-center align-items-center">
                                        <form method="POST">
                                        <select style='padding:20px;' id='prodID' name='prodID'>
                                        <?php
                                        foreach ($datos as $dato) {
                                            echo "<option value='".$dato["id_producto"]."'>".$dato["id_producto"]." - ".$dato["nombre"]."</option>";
                                        }
                                        ?>
                                        </select>

                                    </div>
                                    <div class="row-4 box-eliminar align-items-end d-flex justify-content-around">
                                        <button class="btn btn-primary btn-crud" onclick="closePopup()">Cancelar</button>
                                            <input type="submit" class="btn btn-primary btn-crud mt-3" name="eliminar" onclick="closePopup();" value="Eliminar"/>
                                        </form>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <div class="row">
            <div class="d-flex flex-column align-items-center justify-content-center">
                    <div class="mt-4 d-flex mb-3">
                         <form method="POST">
                                    <input type="submit" id="btnG" value="Ver productos de baja" name="baja" class="btn btn-primary btn-crud btn-productos mr-2">
                                    <input type="submit" id="btnG" value="Ver poductos de Alta" name="alta" class="btn btn-primary btn-crud btn-productos mr-2">
                                    <select name="consultacat" class="mr-2">
                                <option value="4">Pantalones</option>
                                <option value="1">Camperas</option>
                                <option value="3">Remeras</option>
                                <option value="2">Buzos</option>
                                <option value="5">Zapatillas</option>
                             </select>
                             <input type="submit" id="btnG" value="Buscar por Categoria" name="catbtn" class="btn btn-primary btn-crud btn-productos">
                            </form >
                    </div>
                    <div class="mt-3 d-flex">
                        <div id="lista-box" class="lista-productos">
                            <div class="form-group d-flex">
                                    <table id="tabla-productos">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Categoria</th>
                                        <th>Imagen</th>
                                    </tr>
                                        <?php
                                        if(isset($datos)){


                                       
                                            foreach ($datos as $dato) {
                                                echo "<tr><td>".$dato["id_producto"]."</td><td>".$dato["nombre"]."</td><td>".$dato["precio"]."</td><td>".
                                                $dato["stock"]."</td><td>".$dato["tipo"]."</td><td><img src='".$dato["imagen"]."' alt='Imagen'></td></tr>";
                                            } }
                                        ?>
                                    </table>
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
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
    
</html>