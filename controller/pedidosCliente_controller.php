<?php 

session_start();

$ci = $_SESSION['ci'];

?>
<?php

	//Llamada al modelo

	require_once("../model/pedidos_model.php");
	
	//Creamos un objeto de la clase personas_model
	$pedidos = new pedidos_model();

	$datos = $pedidos->getPedidosCliente($ci);
	//print_r($datos); exit;
	//Mediante el objeto invocamos al metodo getPersonas y guardamos
	//el resultado dentro de $datos
	
	//Llamada a la vista
	require_once("../view/pedidoscliente_CRUD.php");

 	if(isset($_POST['delete'])){

		$id=$_POST['delete_id'];
		$pedidos->CancelarPedido($id);
		echo "<script> location.href = location.href;</script>";
		
 	}	
?>

