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
                                    <li><a class="nav-link nav-link-3 active"href="../controller/consulta_controller.php">Consultas</a></li>
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

    <div class="container-fluid d-flex jtext-center">
        <div class="row mt-5 mb-5 text-center">
            <h2 class="mb-5">Consultas</h2>
            <form method="POST">
                <select id="consulta" name="consulta">
                    <option value="0">Ninguna consulta seleccionada</option>
                    <option value="1">Total de prod. por categoría</option>
                    <option value="2">Todos los productos vendidos</option>
                    <option value="3"> Productos vendidos en cada pedido</option>
                    <option value="4">Prod. más vendido, cantidad total vendida.</option>
                    <option value="5"> Cant. de prod. vendidos por mes en el año actual</option>
                    <option value="6">Clientes que han realizado al menos un pedido</option>
                    <option value="7">Total de pedidos realizado por cada cliente</option>
                    <option value="8">Cliente que ha realizado el pedido de mayor valor</option>
                    <option value="9">Productos que nunca han sido vendidos</option>
                    <option value="10">Clientes que tienen pedidos en estado "pendiente"</option>
                    <option value="11">Clientes que han realizado al menos un pedido en el último mes</option>
                    <option value="12">Cantidad de pedidos por cada mes del año actual</option>
                    <option value="13">Promedio de cant. de prod. vendidos por pedido.</option>
                    <option value="14">Pedidos cancelados por cada cliente</option>
                    <option value="15">Productos vendidos "entregados" con la fecha de entrega</option>
                    <option value="16">Cantidad de productos vendidos por cada cliente, cuya cantidad total de prod. vendidos supere la media de todos los clientes</option>

                </select>
            </form>
        </div>
        <div class="row tablas">

            <!--Tabla 1-->
            <div id="div-1" class="ocultar">
                <table>
                <?php
                echo "<tr>";
                echo "<th>Categoria</th>";
                echo "<th>Total de Productos</th>";
                echo "</tr>";
                
                foreach ($datos1 as $dato1) {
                    echo "<tr>";
                    echo "<td>" . $dato1["categoria"] . "</td>";
                    echo "<td>" . $dato1["total_productos"] . "</td>";
                    echo "</tr>";
                }
                ?>
                </table>
            </div>

            <!--Tabla 2-->
            <div id="div-2" class="ocultar">
                <table>
                    <?php
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Nombre prod.</th>";
                    echo "<th>Cantidad total</th>";
                    echo "</tr>";
                    
                    foreach ($datos2 as $dato2) {
                        echo "<tr>";
                        echo "<td>" . $dato2['id_producto'] . "</td>";
                        echo "<td>" . $dato2["nombre"] . "</td>";
                        echo "<td>" . $dato2["cantidad_total"] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>

            <!--Tabla 3-->
            <div id="div-3" class="ocultar">
                <table >
                <?php
                echo "<tr>";
                echo "<th>ID Pedido</th>";
                echo "<th>Producto vendido</th>";
                echo "</tr>";
                
                foreach ($datos3 as $dato3) {
                    echo "<tr>";
                    echo "<td>" . $dato3["id_pedido"] . "</td>";
                    echo "<td>" . $dato3["producto_vendido"] . "</td>";
                    echo "</tr>";
                }
                ?>
                </table>
            </div>

            <!--Tabla 4-->
            <div id="div-4" class="ocultar">
                <table >
                <?php
                echo "<tr>";
                echo "<th>Nombre</th>";
                echo "<th>Cantidad Total</th>";
                echo "</tr>";
                
                foreach ($datos4 as $dato4) {
                    echo "<tr>";
                    echo "<td>" . $dato4["producto"] . "</td>";
                    echo "<td>" . $dato4["cantidad_total_vendida"] . "</td>";
                    echo "</tr>";
                }
                ?>
                </table>
            </div>
            <!--Tabla 5-->
            <div id="div-5" class="ocultar">
                <table>
                <?php
                echo "<tr>";
                echo "<th>Mes</th>";
                echo "<th>Cantidad Total</th>";
                echo "</tr>";
                
                foreach ($datos5 as $dato5) {
                    echo "<tr>";
                    echo "<td>" . $dato5["mes"] . "</td>";
                    echo "<td>" . $dato5["cantidad_vendida"] . "</td>";
                    echo "</tr>";
                }
                ?>      
                </table>
            
            </div>
            <!--Tabla 6-->
            <div id="div-6" class="ocultar">
                <table>
                <?php
                echo "<tr>";
                echo "<th>Cedula</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido</th>";
                echo "</tr>";
                
                foreach ($datos6 as $dato6) {
                    echo "<tr>";
                    echo "<td>" . $dato6["ci"] . "</td>";
                    echo "<td>" . $dato6["nombre"] . "</td>";
                    echo "<td>" . $dato6["apellido"] . "</td>";
                    echo "</tr>";
                }
                ?>      
                </table>
            </div>
            <!--Tabla 7-->
            <div id="div-7" class="ocultar">
                <table>
                <?php
                echo "<tr>";
                echo "<th>Cedula</th>";
                echo "<th>Total pedidos</th>";
                echo "</tr>";
                
                foreach ($datos7 as $dato7) {
                    echo "<tr>";
                    echo "<td>" . $dato7["ci"] . "</td>";
                    echo "<td>" . $dato7["total_pedidos"] . "</td>";
                    echo "</tr>";
                }
                ?>      
                </table>
            </div>
            <!--Tabla 8-->
            <div id="div-8" class="ocultar">
                <table>
                <?php
                echo "<tr>";
                echo "<th>Cedula</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido</th>";
                echo "</tr>";
                
                foreach ($datos8 as $dato8) {
                    echo "<tr>";
                    echo "<td>" . $dato8["ci"] . "</td>";
                    echo "<td>" . $dato8["nombre"] . "</td>";
                    echo "<td>" . $dato8["apellido"] . "</td>";
                    echo "</tr>";
                }
                ?>      
                </table>
            </div>
            <!--Tabla 9-->
            <div id="div-9" class="ocultar">
            <table>
                <?php
                echo "<tr>";
                echo "<th>ID Prod.</th>";
                echo "<th>Nombre</th>";
                echo "<th>Precio</th>";
                echo "<th>Stock</th>";
                echo "<th>Categoria</th>";
                echo "</tr>";
                
                foreach ($datos9 as $dato9) {
                    echo "<tr>";
                    echo "<td>" . $dato9["id_producto"] . "</td>";
                    echo "<td>" . $dato9["nombre"] . "</td>";
                    echo "<td>" . $dato9["precio"] . "</td>";
                    echo "<td>" . $dato9["stock"] . "</td>";
                    echo "<td>" . $dato9["tipo"] . "</td>";
                    echo "</tr>";
                }
                ?>      
                </table>
            </div>
            <!--Tabla 10-->
            <div id="div-10" class="ocultar">
                <table>
                <?php
                echo "<tr>";
                echo "<th>Cedula</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido</th>";
                echo "</tr>";
                
                foreach ($datos10 as $dato10) {
                    echo "<tr>";
                    echo "<td>" . $dato10["ci"] . "</td>";
                    echo "<td>" . $dato10["nombre"] . "</td>";
                    echo "<td>" . $dato10["apellido"] . "</td>";
                    echo "</tr>";
                }
                ?>      
                </table>
            </div>
            <!--Tabla 11-->
            <div id="div-11" class="ocultar">
                <table>
                <?php
                echo "<tr>";
                echo "<th>Cedula</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido</th>";
                echo "</tr>";
                
                foreach ($datos11 as $dato11) {
                    echo "<tr>";
                    echo "<td>" . $dato11["ci"] . "</td>";
                    echo "<td>" . $dato11["nombre"] . "</td>";
                    echo "<td>" . $dato11["apellido"] . "</td>";
                    echo "</tr>";
                }
                ?>      
                </table>
            </div>
            <!--Tabla 12-->
            <div id="div-12" class="ocultar">
                <table>
                <?php
                echo "<tr>";
                echo "<th>Mes</th>";
                echo "<th>Cant. Pedidos</th>";
                echo "</tr>";
                
                foreach ($datos12 as $dato12) {
                    echo "<tr>";
                    echo "<td>" . $dato12["mes"] . "</td>";
                    echo "<td>" . $dato12["cantidad_pedidos"] . "</td>";
                    echo "</tr>";
                }
                ?>      
                </table>
            </div>
            <!--Tabla 13-->
            <div id="div-13" class="ocultar">
                <table>
                <?php
                echo "<tr>";
                echo "<th>Promedio Cantidad</th>";
                echo "</tr>";
                
                foreach ($datos13 as $dato13) {
                    echo "<tr>";
                    echo "<td>" . $dato13["promedio_cantidad"] . "</td>";
                    echo "</tr>";
                }
                ?>      
                </table>
            </div>
            <!--Tabla 14-->
            <div id="div-14" class="ocultar">
                <table>
                <?php
                echo "<tr>";
                echo "<th>Cedula</th>";
                echo "<th>Pedidos cancelados</th>";
                echo "</tr>";
                
                foreach ($datos14 as $dato14) {
                    echo "<tr>";
                    echo "<td>" . $dato14["ci"] . "</td>";
                    echo "<td>" . $dato14["num_pedidos_cancelados"] . "</td>";
                    echo "</tr>";
                }
                ?>      
                </table>
            </div>
            <!--Tabla 15-->
            <div id="div-15" class="ocultar">
                <table>
                <?php
                echo "<tr>";
                echo "<th>Nombre</th>";
                echo "<th>Fecha entrega</th>";
                echo "</tr>";
                
                foreach ($datos15 as $dato15) {
                    echo "<tr>";
                    echo "<td>" . $dato15["nombre"] . "</td>";
                    echo "<td>" . $dato15["fecha_entrega"] . "</td>";
                    echo "</tr>";
                }
                ?>      
                </table>
            </div>
            <!--Tabla 16-->
            <div id="div-16" class="ocultar">
                <table>
                <?php
                echo "<tr>";
                echo "<th>Cedula</th>";
                echo "<th>Cant. productos vendidos</th>";
                echo "</tr>";
                
                foreach ($datos16 as $dato16) {
                    echo "<tr>";
                    echo "<td>" . $dato16["ci_cliente"] . "</td>";
                    echo "<td>" . $dato16["cantidad_productos_vendidos"] . "</td>";
                    echo "</tr>";
                }
                ?>      
                </table>
            </div>
        </div>
    </div>
    

</body>
    <script src="../view/js/bootstrap.bundle.min.js"></script>
    <script src="../view/js/plugins.js"></script>
    <script src="../view/js/functions.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</script>

    
</html>