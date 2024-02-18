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
                                    <li><a class="nav-link nav-link-2 " href="../controller/productos_controller.php">Productos</a></li>
                                    <li><a class="nav-link nav-link-3"href="../controller/consulta_controller.php">Consultas</a></li>
                                    <li><a class="nav-link nav-link-4 active" href="../controller/pedidos_controller.php">Pedidos</a></li>
                                </ul>
                        </li>
                    </ul>
                    </div>
                </nav>
                </div>
                
            </div>

        </div>
        
    </header>

    <div class="container-fluid">
        <div class="row mt-5 mb-5">
            <div class="d-flex justify-content-center align-items-center">
                    <div class="d-flex flex-column mt-4 mb-3 crear">
                        <div id="crud-box-header">
                            <h6 id="nProd" class="ml-3">Editar pedido</h6>
                        </div>
                        <div id="crud-box" style="height: 230px;">
                    <form method="POST" onsubmit="return validarFormulario()">
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
                                <label class="text">Estado</label>
                            </div>
                            <div class="col-9">
                                <select name="estado">
                                    <option value="pendiente">Pendiente</option>
                                    <option value="procesando">Procesando</option>
                                    <option value="Realizado">Entregado</option>
                                    <option value="cancelado">Cancelado</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-3">
                                <label class="text">Reembolsado</label>
                            </div>
                            <div class="col-9 d-flex flex-column">
                                <select name="reembolso">
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                    
                                </select>

                            </div>
                    </div>
                    
                        <div class="d-flex justify-content-end">
                            <input type="submit" name="modificar" value="Modificar" class="btn btn-primary btn-crud btn-pedidos"/>
                        </div>
                    </div>
                </div>



                    <div class="ml-5 crear">
                        <div id="crud-box-header" class="acciones">
                            <h6 class="ml-3">Acciones</h6>
                        </div>

                        <div id="crud-box" class="acciones d-flex align-items-center flex-column justify-content-center">
                        <h6 class="mt-4 mb-4">Eliminar pedido</h6>
                        <input type="text" name="delete_id" minlenght="3" class="mb-4"></input>
                            <input type="submit" name="delete" value="Eliminar pedido" class="btn btn-primary btn-crud btn-pedidos"></input>
                                </div>
                                  </div>
                                  </form>
                        </div>
                    </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <form method="POST">
                <div class="d-flex justify-content-center mb-4">
                        <input type="submit" name="todos" value="Ver Todos" class="btn btn-primary btn-crud btn-pedidos" />
                        <input type="submit" name="cancelado" value="Pedidos Cancelados" class="btn btn-primary btn-crud btn-pedidos" />
                        <input type="submit" name="realizados" value="Pedidos Realizados" class="btn btn-primary btn-crud btn-pedidos" />
                        <input type="submit" name="pendiente" value="Pedidos pendientes" class="btn btn-primary btn-crud btn-pedidos" />
                        <input type="submit" name="procesando" value="Pedidos procesando" class="btn btn-primary btn-crud btn-pedidos" />
                    </div>
            </form>
                    

        <table style="width: 1500px;">
            <tr>
                <th>CI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>ID de pedido </th>
                <th>Nombre del Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Fecha</th>
                <th>Metodo de pago</th>
                <th>Metodo de envio</th>
                <th>Estado</th>
                <th>Reembolso</th>
            </tr> 

            <?php
              if(isset($datos)){
                foreach ($datos as $dato) {
                    echo "<tr><td>".$dato["ci"]."</td><td>".$dato["usuario"]."</td><td>".$dato["apellido"]."</td><td>".$dato["id_pedido"]."</td><td>".$dato["nombre"]."</td><td>".$dato["cantidad"]."</td><td>".
                    $dato["precio"]."</td><td>".$dato["fecha"]."</td><td>".$dato["metodoP"]."</td><td>".$dato["metodoE"]."</td><td>".$dato["estado"]."</td><td>".$dato["reembolso"]."</td></tr>";
                }
            }
            ?>
        </table>
        </div>
    </div>
        
    </body>

    <script src="../view/js/bootstrap.bundle.min.js"></script>
    <script src="../view/js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
    
</html>