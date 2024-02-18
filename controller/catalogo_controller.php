<?php

	//Llamada al modelo

	require_once("../model/productos_model.php");
	
	//Creamos un objeto de la clase personas_model
	$productos = new productos_model();
	
	if(isset($_POST['pantalones']))
	{
		$id_cat = "4";
		$nom_cat = "Pantalones";
	}
	else if(isset($_POST['camperas']))
	{
		$id_cat = "1";
		$nom_cat = "Camperas";
	}
	else if(isset($_POST['remeras']))
	{
		$id_cat = "3";
		$nom_cat = "Remeras";
	}
	else if(isset($_POST['buzos']))
	{
		$id_cat = "2";
		$nom_cat = "Buzos";
	}
	else if(isset($_POST['zapatillas']))
	{
		$id_cat = "5";
		$nom_cat = "Zapatillas";
	}
	else if(isset($_POST['showall']))
	{
		$id_cat = null; // Mostrar todos los productos
	}
	else
	{
		$id_cat = null; // Valor predeterminado cuando no se envía ninguna categoría específica
	}

	$producto = $productos->getProductoCat($id_cat);
	if(!$producto)
	{
		$producto = $productos->getProducto();
	}

	require_once("../view/shop.php");

	
?>



