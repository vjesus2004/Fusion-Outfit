<?php

	//Llamada al modelo

	require_once("../model/personas_model.php");
	
	//Creamos un objeto de la clase personas_model
	$persona = new personas_model();

	if (isset($_POST['baja'])){
		$datos = $persona->getPersonasBaja();
	
	} else{
		
	}if (isset($_POST['alta'])) {
		$datos = $persona->getPersonas();
	
	}
	if (isset($_POST['buscarci'])) {
		$ci=$_POST['buscar'];
		$datos = $persona->getPersonasCI($ci);
	
	}
	

	require_once("../view/personas_CRUD.php");

	if(isset($_POST['guardar'])){
		$ci = $_POST['ci'];
		$nombre = $_POST['nom'];
		$apellido = $_POST['ape'];
		$tel = $_POST['tel'];
		$correo = $_POST['email'];
		$calle = $_POST['calle'];
		$nPuerta = $_POST['npuerta'];
		$tipo = $_POST['tipo'];
		$clave = $_POST['pass'];
	
		$persona->insertPersonas($ci,$nombre,$apellido,$tel,$correo,$calle,$nPuerta,$tipo,$clave);
		
		echo "<script> location.href = location.href;</script>";

	}

	if(isset($_POST['eliminar'])){
		$ci = $_POST['cidel'];
			
			$persona->deletePersonas($ci);
			
			echo "<script> location.href = location.href;</script>";
		}

	
	

	if (isset($_POST['modificar'])) {
		
		$ci = $_POST['ci'];
		$nombre = $_POST['nom'];
		$apellido = $_POST['ape'];
		$tel = $_POST['tel'];
		$correo = $_POST['email'];
		$calle = $_POST['calle'];
		$nPuerta = $_POST['npuerta'];
		$tipo = $_POST['tipo'];
		$clave = $_POST['pass'];

			$persona->modificarUsuario($ci, $nombre, $apellido, $tel, $correo, $calle, $nPuerta, $tipo, $clave);
		
		
		echo "<script> location.href = location.href;</script>";
	}
?>



