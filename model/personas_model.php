<?php
	class personas_model{
		
		//Declaramos atributos privados
		private $db;
		private $personas;
		private $rol;
	 
		//Declaramos un constructor que sirve para incializar los atributos
		public function __construct(){
			require_once("conexion.php");
			//Asignamos al atributo db el valor del metodo conexion() de la clase Conectar
			//Conectar es la clase y conexion es el metodo
			$this->db = Conectar::conexion();
			//Determinamos que el atributo personas será un array
			$this->personas = array();


		}
		
		//Declaramos un metodo para obtener todos los registros de personas
		public function getPersonas(){
			$sql = "SELECT ci,nombre,apellido,telefono,correo,calle,nPuerta,tipo,baja FROM persona WHERE baja='0'ORDER BY nombre";
			$consulta = $this->db->query($sql);
			while($filas=$consulta->fetch_assoc()){
				//Asignamos al atributo personas el resultado de la consulta
				
				$this->personas[]=$filas;
			}
			//El método devuelve el array resultante
			return $this->personas;
			
		}

		public function getPersonasCI($ci){
			$sql = "SELECT ci, nombre, apellido, telefono, correo, calle, nPuerta, tipo, baja FROM persona WHERE ci='$ci' ORDER BY nombre";
			$consulta = $this->db->query($sql);
		
			// Check if any rows were returned
			if ($consulta->num_rows == 0) {
				echo "<script>alert('CI no existente');</script>";
				return []; // Return an empty array
			}
		
			while($filas = $consulta->fetch_assoc()){
				// Assign the result of the query to the 'personas' attribute
				$this->personas[] = $filas;
			}
		
			// Return the resulting array
			return $this->personas;
		}
		


		public function getPersonasBaja(){
			$sql = "SELECT ci,nombre,apellido,telefono,correo,calle,nPuerta,tipo,baja FROM persona  WHERE baja='1' ORDER BY nombre";
			$consulta = $this->db->query($sql);
			while($filas=$consulta->fetch_assoc()){
				//Asignamos al atributo personas el resultado de la consulta
				
				$this->personas[]=$filas;
			}
			//El método devuelve el array resultante
			return $this->personas;
			
		}

		public function getPersonas2(){
			$sql = "SELECT DISTINCT p.ci, p.nombre, p.apellido
			FROM persona p
			JOIN realizan r ON p.ci = r.ci";
			$consulta = $this->db->query($sql);
			while($filas=$consulta->fetch_assoc()){
				//Asignamos al atributo personas el resultado de la consulta
				
				$this->personas[]=$filas;
			}
			//El método devuelve el array resultante
			return $this->personas;
			
		}
		public function getPersonas3(){
			$sql = "SELECT p.ci, COUNT(*) AS total_pedidos
			FROM persona p
			JOIN realizan r ON p.ci = r.ci
			GROUP BY p.ci;";
			$consulta = $this->db->query($sql);
			while($filas=$consulta->fetch_assoc()){
				//Asignamos al atributo personas el resultado de la consulta
				
				$this->personas[]=$filas;
			}
			//El método devuelve el array resultante
			return $this->personas;
			
		}
		public function getPersonas4() {
			$sql = "SELECT p.ci, p.nombre, p.apellido
					FROM persona p
					INNER JOIN realizan r ON p.ci = r.ci
					INNER JOIN pedido pd ON r.id_pedido = pd.id_pedido
					INNER JOIN contiene c ON pd.id_pedido = c.id_pedido
					INNER JOIN productos pr ON c.id_producto = pr.id_producto
					GROUP BY p.ci, p.nombre, p.apellido
					HAVING SUM(pr.precio * c.cantidad) = (
						SELECT MAX(total_pedido)
						FROM (
							SELECT pd.id_pedido, SUM(pr.precio * c.cantidad) AS total_pedido
							FROM persona p
							INNER JOIN realizan r ON p.ci = r.ci
							INNER JOIN pedido pd ON r.id_pedido = pd.id_pedido
							INNER JOIN contiene c ON pd.id_pedido = c.id_pedido
							INNER JOIN productos pr ON c.id_producto = pr.id_producto
							GROUP BY pd.id_pedido
						) AS subquery
					)";
		
			$consulta = $this->db->query($sql);
		
			if ($consulta) { // Verificar si la consulta se ejecutó correctamente
				$personas = array();
		
				while ($filas = $consulta->fetch_assoc()) {
					$personas[] = $filas;
				}
		
				return $personas;
			} else {
				// Manejar el error en caso de que la consulta falle
				// Por ejemplo, puedes lanzar una excepción o devolver un mensaje de error
				throw new Exception("Error en la consulta: " . $this->db->error);
			}
		}
		public function getPersonas5(){
			$sql = "SELECT DISTINCT p.ci, p.nombre, p.apellido
			FROM persona p
			JOIN realizan r ON p.ci = r.ci
			JOIN pedido pe ON r.id_pedido = pe.id_pedido
			WHERE pe.estado = 'pendiente';";
			$consulta = $this->db->query($sql);
			while($filas=$consulta->fetch_assoc()){
				//Asignamos al atributo personas el resultado de la consulta
				
				$this->personas[]=$filas;
			}
			//El método devuelve el array resultante
			return $this->personas;
			
		}
		
		public function getPersonas6(){
			$sql = "SELECT p.ci, p.nombre, p.apellido
			FROM persona p
			INNER JOIN realizan r ON p.ci = r.ci
			INNER JOIN pedido pd ON r.id_pedido = pd.id_pedido
			WHERE pd.fecha >= DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH)
			GROUP BY p.ci, p.nombre, p.apellido;";
			$consulta = $this->db->query($sql);
			while($filas=$consulta->fetch_assoc()){
				//Asignamos al atributo personas el resultado de la consulta
				
				$this->personas[]=$filas;
			}
			//El método devuelve el array resultante
			return $this->personas;
			
		}

		public function getPersonas8()
		{
			$sql = "SELECT p.ci AS ci_cliente, COUNT(c.id_producto) AS cantidad_productos_vendidos
					FROM persona p
					JOIN realizan r ON p.ci = r.ci
					JOIN contiene c ON r.id_pedido = c.id_pedido
					GROUP BY p.ci
					HAVING COUNT(c.id_producto) > (
					SELECT AVG(total_productos_vendidos)
					FROM (
						SELECT COUNT(id_producto) AS total_productos_vendidos
						FROM realizan
						GROUP BY ci
					) AS subquery
					)";
			$consulta = $this->db->query($sql);

			if ($consulta) { // Verificar si la consulta se ejecutó correctamente
				$personas = array();

				while ($filas = $consulta->fetch_assoc()) {
					$personas[] = $filas;
				}

				return $personas;
			} else {
				// Manejar el error en caso de que la consulta falle
				// Por ejemplo, puedes lanzar una excepción o devolver un mensaje de error
				throw new Exception("Error en la consulta: " . $this->db->error);
			}
		}


		public function activarPersonas($ci){
	
			$sql = "UPDATE persona SET baja=0 WHERE ci = $ci ";
			if($this->db->query($sql)){
				return true;
			}else{
				return false;
			}
		}

		public function verificarPersonas($ci) {
			$sql = "SELECT baja FROM persona WHERE ci='$ci'";
			$result = $this->db->query($sql);
			$num_rows = mysqli_num_rows($result);
		
			if ($num_rows > 0) {
				$this->activarPersonas($ci);
			}
		
			// Devolver el número de filas devueltas por la consulta
			return $num_rows;

		}

	
		//Declaramos un metodo para crear nuevos registros en la tabla
		public function insertPersonas($ci, $nombre, $apellido, $tel, $correo, $calle, $nPuerta, $tipo, $clave)
			{
    // Verificar si la CI ya existe
    $sqlVerificar = "SELECT ci FROM persona WHERE ci = '$ci'";
    $consultaVerificar = $this->db->query($sqlVerificar);

    if ($consultaVerificar->num_rows > 0) {
        // La CI ya existe en la base de datos

        // Obtener el valor actual del atributo "baja"
        $sqlBaja = "SELECT baja FROM persona WHERE ci = '$ci'";
        $consultaBaja = $this->db->query($sqlBaja);
        $fila = $consultaBaja->fetch_assoc();
        $bajaActual = $fila['baja'];

        if ($bajaActual == 1) {
            // Si el atributo "baja" es igual a 1, actualizarlo a 0 sin mostrar alerta
            $sqlActualizarBaja = "UPDATE persona SET baja = 0 WHERE ci = '$ci'";
            $this->db->query($sqlActualizarBaja);
			echo "<script>alert('Usuario de baja nuevamente activado');</script>";
        } else {
            // Si el atributo "baja" no es igual a 1, mostrar alerta
            echo "<script>alert('La CI ya existe');</script>";
        }

        return false;
    } else {
        // La CI no existe en la base de datos, realizar la inserción
        $sql = "INSERT INTO persona(ci, nombre, apellido, telefono, correo, calle, nPuerta, tipo, clave) VALUE ('$ci', '$nombre', '$apellido', '$tel', '$correo', '$calle', '$nPuerta', '$tipo', '$clave')";
        if ($this->db->query($sql)) {
			echo "<script>alert('Usuario agregado correctamente');</script>";
            return true;
			
        } else {
            return false;
        }
    }
}

		//Declaramos un metodo para eliminar registros en la tabla
		public function deletePersonas($ci){
	
			$sql = "UPDATE persona SET baja=1 WHERE ci = $ci";
			if($this->db->query($sql)){
				echo "<script>alert('Usuario dado de baja correctamente');</script>";
				return true;
			}else{
				return false;
			}
			
		}
		

		//Declaramos un metodo para modificar registros en la tabla
		public function modificarUsuario($ci, $nombre, $apellido, $telefono, $correo, $calle, $nPuerta, $tipo, $clave) {
		
			// Generar la consulta SQL para modificar el usuario
			$sql = "UPDATE persona
					SET nombre = '$nombre',
						apellido = '$apellido',
						telefono = '$telefono',
						correo = '$correo',
						calle = '$calle',
						nPuerta = '$nPuerta',
						tipo = '$tipo',
						clave = '$clave'
					WHERE ci = '$ci'";
		
			// Ejecutar la consulta
			if ($this->db->query($sql)) {
				// La modificación fue exitosa
				
				echo "<script>alert('modificacion aplicada');</script>";
				return true;
			} else {
				// Hubo un error al modificar el usuario
				return false;
			}
		}
		
		public function getRol($ci){
			
			$sql = "SELECT tipo FROM persona WHERE ci='$ci'";
			$consulta = $this->db->query($sql);
			$columna = $consulta->fetch_assoc();
			$rol = $columna['tipo'];
			//El método devuelve el array resultante
			return $rol;
			
		}

		public function InsertContiene($id_pedido,$id_prod,$cant){
			
			$sql = "INSERT INTO contiene VALUES('$id_pedido','$id_prod','$cant')";
			$consulta = $this->db->query($sql);

			//El método devuelve el array resultante
			return true;
			
		}
	
		public function verificarUser($ci,$clave){
		
			$sql = "SELECT * FROM persona WHERE ci='$ci' AND clave='$clave';";
			$result = $this->db->query($sql);
			
			$num_rows = mysqli_num_rows($result);
			if($num_rows>0){
				$this->getRol($ci);				
			}else{
				
				echo "<script>alert(\"Los datos son incorrectos, intente de nuevo.\");document.location='../'</script>";
				
			}
			//El método devuelve cantidad de filas
			return $num_rows;
			
		}
	}
	 

?>