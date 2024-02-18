<?php require_once("startCart.php");

$rol = $_SESSION['rol'];

if($rol==""){
    header("Location: logout.php");
}

if($rol == "admin"){
    $visible="block";
}else{
    $visible="none";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar | FUSION OUTFIT Uruguay</title>
    <link href="../view/img/fo.png" rel="icon">
    <link rel="stylesheet" href="../view/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/3ee734fc3f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../view/css/estilos.css">
    <style>
        .div-oculto {
            display: <?php echo $visible;?>;
            }
    </style>
</head>
<body>
    
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>

    <header style="height: 350px;">
        <div class="container">
            <div class="top-right-strip row">
                <ul class="top-hnt-right-content col-lg-12">
                        <li class="button-log usernhy mr-4" style="list-style: none;">
                        <a class="btn-open" href="../view/logout.php">
                                <i class="fa fa-solid fa-arrow-right-from-bracket"></i>
                                <label class="ml-1">Cerrar sesión</label>
                            </a>
                        </li>
                        <li class="transmitvcart galssescart2 cart cart box_1">
                            <form action="#" method="post" class="last">
                                <a class="btn-open" data-bs-toggle="modal" data-bs-target="#modal_cart">
                                    <span class="fa fa-shopping-cart"></span>
                                    <label class="ml-1">Carrito</label>
                                </a>
                            </form>
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
                            <a class="nav-link nav-link-1" aria-current="page" href="../view/inicio.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-2 active" aria-current="page" href="catalogo_controller.php">Comprar</a>
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
                        <li class="nav-item div-oculto">
                        <a class="nav-link nav-link-3">Administrar</a>
                                <ul class="admin">
                                    <li><a class="nav-link nav-link-3" href="personas_controller.php">Personas</a></li>
                                    <li><a class="nav-link nav-link-3" href="productos_controller.php">Productos</a></li>
                                    <li><a class="nav-link nav-link-3"href="../controller/consulta_controller.php">Consultas</a></li>
                                    <li><a class="nav-link nav-link-3" href="pedidos_controller.php">Pedidos</a></li>
                                </ul>
                        </li>
                    </ul>
                    </div>
                </nav>
                </div>
                
            </div>
        </div>
        
    </header>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row">
            <div class="col-2 d-flex flex-column text-center">
            <?php
            
                if($id_cat != null){
                    echo"<div class='d-flex justify-content-center align-items-center mb-3'>
                    <h5 class='mr-2'>Filtro:</h5>
                    <div class='d-flex'>
                        <a class='mr-2 text-muted'>".$nom_cat."</a>
                        <form method='POST'>
                        <button type='submit' name='showall' style='border:none; background-color:transparent;'><i class='fa-solid fa-x h6'></i></button>
                        </form>
                    </div>
                    
                    </div>";
                }
            ?>
                <div class="row">
                    <h4 class="mb-4">Categorías</h4>
                </div>
                <div class="row mr-2">
                <form method="POST">
                    <ul style="list-style: none" class="categorias-shop">

                        <li><input type="submit" value="Pantalones" name="pantalones"></li>
                        <li><input type="submit" value="Camperas" name="camperas"></li>
                        <li><input type="submit" value="Buzos" name="buzos"></li>
                        <li><input type="submit" value="Remeras" name="remeras"></li>
                        <li><input type="submit" value="Zapatillas" name="zapatillas"></li>
                   
                     </ul>
                    </form>
                
               
                </div>
                
            </div>

            <div class="col-10 d-flex flex-column">
                <div class='row'>
                <!--Articulos-->
                <?php
                // Recorrer el array de precios y mostrar cada uno en un div



             foreach ($producto as $product) {

                if($product['stock']!=0){

                echo "<div class='col-4 tm-mb-90 tm-gallery'>
                <div class='col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-5'>
                    <figure class='effect-ming tm-img-item'>
                        <img src='".$product['imagen']."' alt='Image' class='img-fluid'>                   
                    </figure>
                    <div class='d-flex tm-text-gray'>
                        <h6>".$product['nombre']."</h6>
                    </div>
                    <div class='d-flex'>
                        <h5>UYU ".$product['precio']."</h5>
                    </div>
                    <div class='d-flex'>
                        <form id='formulario' name='formulario' method='post' action='../view/cart.php'>
                            <button type='submit' class='btn btn-sm btn-outline-secondary'>Añadir al carrito</button>
                            <input name='ref' type='hidden' id='ref' value='".$product['id_producto']."' />                           
                            <input name='precio' type='hidden' id='precio' value='".$product['precio']."' />
                            <input name='titulo' type='hidden' id='titulo' value='".$product['nombre']."' />
                            <input name='cantidad' type='hidden' id='cantidad' value='1' class='pl-2' />
                        </form>
                    </div>
                </div>
                </div>";
                             } }
                      ?>
                </div>
            </div>

        </div> <!-- row --> 
</div> <!-- container-fluid-->

<footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="mb-4 tm-footer-title">NUESTRA TIENDA</h3>
                    <p>Av. 8 de Octubre 3233, 11600 Montevideo, Departamento de Montevideo, Uruguay</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <h3 class="mb-4 tm-footer-title">LINKS ÚTILES</h3>
                    <ul class="tm-footer-links pl-0">
                        <li><a href="../view/inicio.php">Inicio</a></li>
                        <li><a href="../controller/catalogo_controller.php">Comprar</a></li>
                        <li><a href="../view/about.php">Sobre Nosotros</a></li>
                        <li><a href="../view/contact.php">Contactanos</a></li>
                    </ul>
                </div>
                <div class="metodos col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <h3 class="mb-4 tm-footer-title">ACEPTAMOS</h3>
                    <ul class="tm-footer-links pl-0">
                    <li><i class="fa-brands fa-cc-visa"></i><a href="https://www.visa.com.uy/">Visa</li>
                        <li><i class="fa-brands fa-cc-mastercard"></i><a href="https://latam.mastercard.com/">MasterCard</a></li>
                        <li><i class="fa-brands fa-paypal"></i><a href="https://www.paypal.com/">PayPal</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div class="col-lg-9 col-md-7 col-12 px-5 mb-3">
                   <p>© 2023 FusionOutfit. Design by Elemental Software</p> 
                </div>
            </div>
        </div>
    </footer>

<!-- MODAL CARRITO -->
<div class="modal fade" id="modal_cart" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mi carrito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
			<div class="modal-body">
				<div>
					<div class="p-2">
						<ul class="list-group mb-3">
							<?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
                                if(isset($carrito_mio[$i])){
                                if($carrito_mio[$i]!=NULL){
							?>
						
                            <li class="list-group-item justify-content-between px-4">
								<div class="row" >
									<div class="col-10 p-0" style="text-align: left; color: #000000;"><h6 class="my-0">Cantidad: <?php echo $carrito_mio[$i]['cantidad'] ?> : <?php echo $carrito_mio[$i]['titulo']; ?></h6>
									</div>
									<div class="col-2 p-0"  style="text-align: right; color: #000000;" >
									<span class="text-muted"  style="text-align: right; color: #000000;"><?php echo $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];    ?> $</span>
									</div>
								</div>
							</li>
							<?php
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
							}
                            }
							}
							}
							?>
							<li class="list-group-item d-flex justify-content-between">
							<span  style="text-align: left; color: #000000;">Total (UY)</span>
							<strong  style="text-align: left; color: #000000;"><?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
                                if(isset($carrito_mio[$i])){
							if($carrito_mio[$i]!=NULL){ 
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                            }
							}}}
                            if(!isset($total)){$total = '0';}else{ $total = $total;}
							echo $total; ?> $</strong>
							</li>
						</ul>
					</div>
				</div>
			</div>
            <div class="modal-footer">
                  <a type="button" class="btn btn-primary carrito" href="../view/borrarcarro.php">Vaciar carrito</a>
                  <button type="button" class="btn btn-primary carrito" onclick="window.location.href='../controller/buy_controller.php'">Finalizar compra</button>
        </div>
    </div>
  </div>
</div>
<!-- END MODAL CARRITO -->
    
    <script src="../view/js/plugins.js"></script>
    <script src="../view/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>
</html>