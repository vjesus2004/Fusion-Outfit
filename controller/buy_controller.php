<?php

	//Llamada al modelo

	require_once("../view/startCart.php");
	require_once("../model/productos_model.php");
	require_once("../model/personas_model.php");
	require_once("../model/pedidos_model.php");
	//Creamos un objeto de la clase personas_model
	$producto = new productos_model();
	$personas = new personas_model();
	$pedidos = new pedidos_model();

	//Llamada a la vista
	require_once("../view/buy.php");
	if (isset($_POST['finalizar'])) {
		$carrito_mio = $_SESSION['carrito'];
		unset($carrito_mio['']);
		$metodoP = $_POST['metodoP'];
		$metodoE = $_POST['metodoE'];
		$ci      = $_SESSION['ci'];
		// Insertar el pedido una vez y obtener el ID del último pedido
		$pedidos->insertPedidos($metodoP, $metodoE);
		$id = $pedidos->getUltimoPedido();
		
		foreach ($carrito_mio as $item) {
			if (!empty($item)) {
				$titulo = isset($item['titulo']) ? $item['titulo'] : '';
				$precio = isset($item['precio']) ? $item['precio'] : '';
				$cantidad = isset($item['cantidad']) ? $item['cantidad'] : '';
				$ref = isset($item['ref']) ? $item['ref'] : '';
				// Insertar en la tabla "contiene" con el ID obtenido previamente
				$pedidos->InsertContiene($id, $ref, $cantidad);
				$pedidos->insertRealizan($ci, $id, $ref);
				$producto->reducirStock($ref,$cantidad);
				echo "<script>document.location.href = '../view/inicio.php';</script>";
			}
		}
	}
	
	

	
?>



