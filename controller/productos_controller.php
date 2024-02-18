<?php

	//Llamada al modelo

	require_once("../model/productos_model.php");
	
	//Creamos un objeto de la clase personas_model
	$productos = new productos_model();
	
	//Mediante el objeto invocamos al metodo getPersonas y guardamos
	//el resultado dentro de $datosc
	$datos = $productos->getProducto();
	if (isset($_POST['baja'])){
		$datos = $productos->getProductoBaja();
	
	} else{
		
	}if (isset($_POST['alta'])) {
		
	
	}
	if (isset($_POST['catbtn'])) {
		$cat = $_POST['consultacat'];
		$datos = $productos->getProductoCat($cat);
	

			}
	
	//Llamada a la vista
	require_once("../view/productos_CRUD.php");


	if (isset($_POST['guardar'])) {
		$id = $_POST['id'];
		$nombre = $_POST['nom'];
		$precio = $_POST['precio'];
		$stock = $_POST['stock'];
		$categoria = $_POST['categoria'];
		$directorio_destino = '../view/img/catalogo';
		$nombre_fichero = "campoimagen";

		$resultado = $productos->insertProductos($id, $nombre, $precio, $stock, $categoria, $directorio_destino, $nombre_fichero);
	
		if ($resultado) {
			
			echo "<script> alert('El producto se ha insertado correctamente');</script>";
			echo "<script> location.href = location.href;</script>";
		} else {
			echo "<script> alert('El producto no se inserto correctamente');</script>";
			echo "<script> location.href = location.href;</script>";
		}
	}

	


	if(isset($_POST['eliminar'])){
		$id = $_POST['prodID'];
		
			$productos->deleteProductos($id);
			echo "<script> location.href = location.href;</script>";
		
		}

	

	if (isset($_POST['modificar'])) {
		$id_producto = $_POST['id'];
		$nombre = $_POST['nom'];
		$precio = $_POST['precio'];
		$stock = $_POST['stock'];
		$id_categoria = $_POST['categoria'];
		$directorio_destino = '../view/img/catalogo';
		$varimagen = $_FILES['campoimagen']['name'];
		$imagen = "campoimagen";



		// Verificar si se seleccionó una imagen
		if (!empty($varimagen)) {
			$productos->modificarProducto($id_producto, $nombre, $precio, $stock, $id_categoria, $directorio_destino ,$imagen);
		} else {
			// Manejar el caso cuando no se selecciona una nueva imagen
			$productos->modificarProductoSinImagen($id_producto, $nombre, $precio, $stock, $id_categoria);
		}
	
		echo "<script> location.href = location.href;</script>";
	}
	
	
?>



