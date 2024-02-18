<?php

	require_once("../model/personas_model.php");
	//Creamos un objeto de la clase personas_model
	$persona = new personas_model();

	session_start();
	unset($_SESSION['rol']);
		if(isset($_POST['btn-ingresar'])){
			$ci = $_POST['login_ci'];
			$_SESSION['ci'] =$ci;
			$clave = $_POST['login_pass'];
			if($persona->verificarUser($ci,$clave)==1){
				$rol = $persona->getRol($ci);
				$_SESSION['rol'] = $rol;
				$_SESSION['ci'] = $ci;
				
				echo "<script>document.location.href = '../view/inicio.php';</script>";
			}
		}













?>






