<?php require_once("startCart.php");

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
                            <a class="nav-link nav-link-3" href="../view/about.php">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-4" href="../view/contact.php">Contactanos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-4" href="">Administrar</a>
                            <ul class="admin">
                                    <li><a class="nav-link nav-link-1" href="../controller/personas_controller.php">Personas</a></li>
                                    <li><a class="nav-link nav-link-2" href="../controller/productos_controller.php">Productos</a></li>
                                    <li><a class="nav-link nav-link-3"href="">Categorias</a></li>
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

    
   <!-- MODAL CARRITO -->
                <div class="container-fluid d-flex">
                    <div class="row d-flex align-items-center justify-content-center mt-5 mb-5 text-center">
                    <h1 class="mb-4">Finalizar compra</h1>
                        <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Pedido</h5>
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
                                                   <!--  
                                                    <input type="hidden" name="cant"><?php echo $carrito_mio[$i]['cantidad'] ?></input>
                                                    <input type="hidden" name="id"><?php echo $carrito_mio[$i]['ref'] ?></input>
                                                    <input type="hidden" name="precio"><?php echo $carrito_mio[$i]['precio'] ?></input>
                                                    <input type="hidden" name="nombre"><?php echo $carrito_mio[$i]['titulo'] ?></input>
                                                    
                                                    -->

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
                       </div>
                    </div>
                    <div class="row d-flex align-items-center justify-content-center finalizar-compra text-center">
                    <form method="POST">
                        <div class="row d-flex">
                                <h5 class="mb-3">Metodo de pago</h5>
                                        <select name="metodoE" id="metodoE" class="mb-3">
                                            <option value="">Ninguna opcion seleccionada</option>
                                            <option value="Envio">Envio a domicilio</option>
                                            <option value="Retiro">Retiro en sucursal</option>
                                        </select>
                            </div>
                            <div class="row">
                                <h5 class="mb-3">Froma de envio</h5>
                                        <select name="metodoP" id="metodoP" class="mb-4">
                                            <option value="">Ninguna opcion seleccionada</option>
                                            <option value="Debito">Debito</option>
                                            <option value="Efectivo">Efectivo al momento de la entrega</option>
                                            <option value="Credito">Credito</option>
                                        </select>
                            </div>
                                <div class="row">
                                <input type="submit" name="finalizar" value="Finalizar Compra" class="btn btn-primary btn-crud btn-finalizar">
                                </div>
                        </div>
                    
                    </form>
                        

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

