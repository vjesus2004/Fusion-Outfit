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
    <title>Sobre Nosotros | FUSION OUTFIT Uruguay</title>
    <link href="img/fo.png" rel="icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/3ee734fc3f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilos.css">
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

    <header>
        <div class="container">
            <div class="top-right-strip row">
                <ul class="top-hnt-right-content col-lg-12">
                        <li class="button-log usernhy mr-4" style="list-style: none;">
                        <a class="btn-open" href="logout.php">
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
                    <img src="img/logo.png" alt="logo" class="navbar-brand">
                </div>
                <div class="col-8">
                    <nav class="navbar navbar-expand-lg">
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-link-1" aria-current="page" href="inicio.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-2" aria-current="page" href="../controller/catalogo_controller.php">Comprar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-2" aria-current="page" href="../controller/pedidosCliente_controller.php">Pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-3 active" href="about.php">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-4" href="contact.php">Contactanos</a>
                        </li>
                        <li class="nav-item div-oculto">
                            <a class="nav-link nav-link-5">Administrar</a>
                                <ul class="admin">
                                    <li><a class="nav-link nav-link-1" href="../controller/personas_controller.php">Personas</a></li>
                                    <li><a class="nav-link nav-link-2" href="../controller/productos_controller.php">Productos</a></li>
                                    <li><a class="nav-link nav-link-3"href="../controller/consulta_controller.php">Consultas</a></li>
                                    <li><a class="nav-link nav-link-4" href="../controller/pedidos_controller.php">Pedidos</a></li>
                                </ul>
                        </li>
                    </ul>
                    </div>
                </nav>
                </div>
            </div>
            <div class="row">
                <nav aria-label="breadcrumb">
                    <h2 class="hny-title text-center">SOBRE NOSOTROS</h2>
                    <ol class="breadcrumb mb-0 justify-content-center" style="background-color: transparent;">
                      <li><a href="inicio.php">Inicio</a>
                        <span class="fa fa-angle-double-right" style="margin: 0 10px;"></span></li>
                      <li class="active">Sobre Nosotros</li>
                    </ol>
                  </nav>
            </div>
        </div>
    </header>

    <div class="container-fluid tm-mt-60 d-flex">
        <div class="row tm-mb-90 align-items-center">            
            <div class="col-6">
                <div>
                    <h2 class="col-12 tm-text-primary mb-3">SOBRE FUSION OUTFIT</h2>
                    <p class="mb-4">Fusion outfit es una tienda de ropa importada directamente desde<br> las grandes tiendas de Norte America y Europa, la misma cuenta<br> con el respaldo de una larga trayectoria y profundo conocimiento<br> del mercado. Somos una empresa dinámica, que entiende los<br> cambios en la moda y los cambios culturales, y a lo largo de<br> nuestra historia nos fuimos adaptando y reconstruyendo junto a ellos.</p>
                        <div class="read">
							<a href="shop.php" class="read-more btn">COMPRAR AHORA</a>
						</div>
                </div>                
            </div>
            <div class="col-6">
                <img src="img/about.jpg" alt="image" class="img-fluid" style="height: 350px;">
            </div>
        </div>
        <div class="row tm-mb-90">
            <div class="col-md-6 col-12">
                <div class="tm-about-2-col">
                    <h2 class="tm-text-primary mb-4">
                        QUE OFRECEMOS
                    </h2>
                    <h5>1. Visita Nuestro Local</h5>
                    <p class="mb-4">
                        Estamos ubiucados en Av. 8 de Octubre 3233, 11600 Montevideo, Departamento de Montevideo, Uruguay.
                    </p>
                    <h5>2. Agrega Productos Al Carrito</h5>
                    <p class="mb-4">
                        Elije el outfit que mas te guste y abona en una sola compra.
                    </p>
                </div>                
            </div> 
            <div class="col-md-6 col-12">
                <div class="tm-about-2-col">
                    <br><br>
                    <h5>3. Tarjetas De Regalo</h5>
                    <p class="mb-4">
                        Ideal para no pensar que iria bien con el estilo de esa persona especial.
                    </p>
                    <h5>4. Tienda Única</h5>
                    <p class="mb-4">
                        Lider en el mercado de moda importada, prendas exclusivas que no encontraras en ninguna otra tienda en el pais.
                    </p>
                </div>                
            </div>     
        </div> <!-- row -->
        <div class="row tm-mb-50">
            <div class="col-md-4 col-12">
                <div class="tm-about-3-col">
                    <div class="tm-about-icon-container mb-5">
                        <span class="fa fa-bullhorn icon-fea4" aria-hidden="true"></span>
                    </div>                
                    <h2 class="tm-text-primary mb-4">LLAMANOS CUANDO SEA</h2>
                    <p class="mb-4">Atencion al cliente de Lunes a Sabado.</p>
                </div>                
            </div>
            <div class="col-md-4 col-12">
                <div class="tm-about-3-col">
                    <div class="tm-about-icon-container mb-5">
                        <span class="fa fa-truck icon-fea4" aria-hidden="true"></span>
                    </div>                
                    <h2 class="tm-text-primary mb-4">ENVIOS GRATIS</h2>
                    <p class="tm-mb-50">Envios sin costo dentro de montevideo metropolitano</p>                
                </div>                
            </div>
            <div class="col-md-4 col-12">
                <div class="tm-about-3-col">
                    <div class="tm-about-icon-container mb-5">
                        <span class="fa fa-recycle icon-fea4" aria-hidden="true"></span>
                    </div>                
                    <h2 class="tm-text-primary mb-4">DEVOLUCIONES Y CAMBIOS</h2>
                    <p class="mb-4">Devolucion y cambio de talles o colo hasta 30 dias despues de la compra.</p>
                </div>                
            </div>
        </div>
    </div>

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
                        <li><a href="inicio.php">Inicio</a></li>
                        <li><a href="../controller/catalogo_controller.php">Comprar</a></li>
                        <li><a href="about.php">Sobre Nosotros</a></li>
                        <li><a href="contact.php">Contactanos</a></li>
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
    
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>
</html>