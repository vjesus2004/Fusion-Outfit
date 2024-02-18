<?php

	//Llamada al modelo

	require_once("../model/personas_model.php");
	
	//Creamos un objeto de la clase personas_model
	$persona = new personas_model();
	
	//Mediante el objeto invocamos al metodo getPersonas y guardamos
	//el resultado dentro de $datosc
	$datos = $persona->getPersonas();
	
	//Llamada a la vista
	require_once("../view/signup_form.php");

	if(isset($_POST['guardar']))
	{
		$ci = $_POST['ci'];
		$nombre = $_POST['nom'];
		$apellido = $_POST['ape'];
		$tel = $_POST['tel'];
		$correo = $_POST['email'];
		$calle = $_POST['calle'];
		$nPuerta = $_POST['npuerta'];
		$tipo = "user";
		$clave = $_POST['pass'];
		$clave1 = $_POST['pass1'];
		if($clave == $clave1){
			$persona->insertPersonas($ci,$nombre,$apellido,$tel,$correo,$calle,$nPuerta,$tipo,$clave);
			
		}else{
				echo "<script>alert(\"Las contraseñas no coinciden\");document.location='signup_controller.php'</script>";
			}
	}
	
	
?>



