<?php

	//Llamada al modelo

	require_once("../model/pedidos_model.php");
	require_once("../model/personas_model.php");
	require_once("../model/productos_model.php");	



	//Creamos un objeto de la clase personas_model
	$productos = new productos_model();
	$productos1 = new productos_model();
	$productos2 = new productos_model();
	$productos3 = new productos_model();
	$productos4 = new productos_model();
	$productos5 = new productos_model();
	$persona = new personas_model();
	$persona1 = new personas_model();
	$persona2 = new personas_model();
	$persona3 = new personas_model();
	$persona4 = new personas_model();
	$persona6 = new personas_model();
	$pedidos = new pedidos_model();
	$pedidos2 = new pedidos_model();
	//Mediante el objeto invocamos al metodo getPersonas y guardamos
	//el resultado dentro de $datosc
    
		$datos1 = $productos->getCantPerCat();
		$datos2 = $productos1->ProdVendidosyCant();
		$datos3 = $pedidos->getPedidos2();
		$datos4 = $productos2->getProductos3();
		$datos5 = $pedidos->getPedidos4();
		$datos6 = $persona->getPersonas2();
		$datos7 = $persona1->getPersonas3();
		$datos8 = $persona2->getPersonas4();
		$datos9 = $productos3->getProductos4();
		$datos10 = $persona3->getPersonas5();
		$datos11 = $persona4->getPersonas6();
		$datos12 = $pedidos->getPedidos5();
		$datos13 = $productos4->getProductos5();
		$datos14 = $pedidos2->getPedidosC();
		$datos15 = $productos5->getProductos6();
		$datos16 = $persona6->getPersonas8();


	require_once("../view/consultas.php");
	
?>



