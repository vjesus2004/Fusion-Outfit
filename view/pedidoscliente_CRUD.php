<?php 

$rol = $_SESSION['rol'];
$ci = $_SESSION['ci'];


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
                            <a class="nav-link nav-link-2 active" aria-current="page" href="../controller/pedidosCliente_controller.php">Pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-3" href="../view/about.php">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-4" href="../view/contact.php">Contactanos</a>
                        </li>
                        
                    </ul>
                    </div>
                </nav>
                </div>
                
            </div>

        </div>
        
    </header>

    <div class="container-fluid">
        <div class="row mt-5">
            <form action="../controller/pedidosCliente_controller.php" method="POST">
            <div class="d-flex justify-content-center align-items-center">
                    <div class="d-flex flex-column mt-4 mb-3 crear">
                        <div id="crud-box-header" class="pedido-cliente">
                            <h6 id="nProd" class="ml-3">Historial de pedido</h6>
                        </div>
                        <div id="crud-box">

                        
                        <table width="1100px">
                        <tr>
                            <th>CI</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>ID de pedido</th>
                            <th>Nombre del Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Fecha</th>
                            <th>Método de pago</th>
                            <th>Método de envío</th>
                            <th>Estado</th>
                            <th>Reembolso</th>
                        </tr>

                        <?php
                            foreach ($datos as $dato) {
                                echo "<tr>";
                                echo "<td>" . $dato["ci"] . "</td>";
                                echo "<td>" . $dato["usuario"] . "</td>";
                                echo "<td>" . $dato["apellido"] . "</td>";
                                echo "<td>" . $dato["id_pedido"] . "</td>";
                                echo "<td>" . $dato["nombre"] . "</td>";
                                echo "<td>" . $dato["cantidad"] . "</td>";
                                echo "<td>" . $dato["precio"] . "</td>";
                                echo "<td>" . $dato["fecha"] . "</td>";
                                echo "<td>" . $dato["metodoP"] . "</td>";
                                echo "<td>" . $dato["metodoE"] . "</td>";
                                echo "<td>" . $dato["estado"] . "</td>";
                                echo "<td>" . $dato["reembolso"] . "</td>";
                                echo "</tr>";
                            }

                        ?>
                    </table>
                        </div>
                    </div>



                    <div class="ml-5 crear" style="height: 350px;">
                        <div id="crud-box-header" class="acciones">
                            <h6 class="ml-3">Cancelar pedido</h6>
                        </div>

                        <div id="crud-box" class="acciones d-flex align-items-center flex-column justify-content-center">
                            <h6>Id pedido</h6>
                            <input type="text" name="delete_id" minlenght="3" class="mt-3"></input >
                            <input type="submit" name="delete" class="mb-3 mt-3 btn btn-primary btn-crud" value="Cancelar"></input >
                            <div class="popup-overlay" id="popupOverlay">
                                <div class="container popup-content">
                                    <div class="row-4 box-eliminar d-flex justify-content-center"><h2>Eliminar producto</h2></div>
                                    <div class="row-4 box-eliminar d-flex justify-content-center align-items-center">
                                        <form method="POST">
                                        <select style='padding:20px;' id='prodID' name='pedidoID'>
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