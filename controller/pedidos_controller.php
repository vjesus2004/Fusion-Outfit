<?php

require_once("../model/pedidos_model.php");

$pedidos = new pedidos_model();


	
	
	if(isset($_POST['todos'])){
		$datos = $pedidos->getPedidos();
	}if(isset($_POST['cancelado'])){
		$estado='Cancelado';
		$datos = $pedidos->getPedidosEstado($estado);
	}if(isset($_POST['realizados'])){
		$estado='Realizado';
		$datos = $pedidos->getPedidosEstado($estado);
	}if(isset($_POST['pendiente'])){
		$estado='Pendiente';
		$datos = $pedidos->getPedidosEstado($estado);
	}if(isset($_POST['procesando'])){
		$estado='Procesando';
		$datos = $pedidos->getPedidosEstado($estado);
	}

	require_once("../view/pedidos_CRUD.php");
	if(isset($_POST['delete'])){

		$id=$_POST['delete_id'];
		$pedidos->CancelarPedido($id);
		echo "<script> location.href = location.href;</script>";
		
 	}
	 if(isset($_POST['modificar'])){

		$id=$_POST['id'];
		$estado=$_POST['estado'];
		$reembolso=$_POST['reembolso'];
		$pedidos->ModificarPedido($id,$estado);
		$pedidos->Reembolso($id,$reembolso);
		echo "<script> location.href = location.href;</script>";
		
 	}
	
	
	
	
?>



