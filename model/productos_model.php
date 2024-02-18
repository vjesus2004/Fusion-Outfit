<?php
	class productos_model{
		
		//Declaramos atributos privados
		private $db;
		private $productos;
		private $precios;
		//Declaramos un constructor que sirve para incializar los atributos
		public function __construct(){
			require_once("conexion.php");
			//Asignamos al atributo db el valor del metodo conexion() de la clase Conectar
			//Conectar es la clase y conexion es el metodo
			$this->db = Conectar::conexion();
			//Determinamos que el atributo personas será un array
			$this->productos = array();
			$this->precios = array();
		}
		
		//Declaramos un metodo para obtener todos los registros de personas
		public function getProducto()
{
    $sql = "SELECT p.id_producto, p.nombre, p.precio, p.stock, p.id_categoria, c.tipo, p.baja, p.imagen
            FROM productos p
            INNER JOIN categoria c ON p.id_categoria=c.id_categoria
            WHERE p.baja='0'";
    $consulta = $this->db->query($sql);

    // Verificar si la consulta se ejecutó correctamente
    if (!$consulta) {
        // Manejar el error de consulta
        echo "Error en la consulta: " . $this->db->error;
        return array(); // Devolver un array vacío en caso de error
    }

    $productos = array();

    while ($filas = $consulta->fetch_assoc()) {
        // Asignamos al array productos el resultado de la consulta
        $productos[] = $filas;
    }

    // El método devuelve el array resultante
    return $productos;
}

public function getProductoCat($cat)
{
	
    $sql = "SELECT p.id_producto, p.nombre, p.precio, p.stock, p.id_categoria, c.tipo, p.baja, p.imagen
            FROM productos p
            INNER JOIN categoria c ON p.id_categoria=c.id_categoria
            WHERE p.baja='0' AND p.id_categoria='$cat'";
    $consulta = $this->db->query($sql);

    // Verificar si la consulta se ejecutó correctamente
    if (!$consulta) {
        // Manejar el error de consulta
        echo "Error en la consulta: " . $this->db->error;
        return array(); // Devolver un array vacío en caso de error
    }

    $productos = array();

    while ($filas = $consulta->fetch_assoc()) {
        // Asignamos al array productos el resultado de la consulta
        $productos[] = $filas;
    }

    // El método devuelve el array resultante
    return $productos;
}






public function getProductoBaja()
{
    $sql = "SELECT p.id_producto, p.nombre, p.precio, p.stock, p.id_categoria, c.tipo, p.baja, p.imagen
            FROM productos p
            INNER JOIN categoria c ON p.id_categoria=c.id_categoria
            WHERE p.baja='1'";
    $consulta = $this->db->query($sql);

    // Verificar si la consulta se ejecutó correctamente
    if (!$consulta) {
        // Manejar el error de consulta
        echo "Error en la consulta: " . $this->db->error;
        return array(); // Devolver un array vacío en caso de error
    }

    $productos = array();

    while ($filas = $consulta->fetch_assoc()) {
        // Asignamos al array productos el resultado de la consulta
        $productos[] = $filas;
    }

    // El método devuelve el array resultante
    return $productos;
}

		public function getCantPerCat(){
					
			$sql = "SELECT c.tipo AS categoria, COUNT(*) AS total_productos
			FROM categoria c
			JOIN productos p ON c.id_categoria = p.id_categoria
			WHERE p.baja = false
			GROUP BY c.tipo;";
			$consulta = $this->db->query($sql);
			
			while($filas=$consulta->fetch_assoc()){
				//Asignamos al atributo personas el resultado de la consulta
				$this->productos[]=$filas;
			}
			//El método devuelve el array resultante
			return $this->productos;
			
		}
		public function ProdVendidosyCant(){
			
			$sql = "SELECT p.id_producto, p.nombre, SUM(c.cantidad) AS cantidad_total
			FROM productos p
			JOIN contiene c ON p.id_producto = c.id_producto
			JOIN pedido pe ON c.id_pedido = pe.id_pedido
			WHERE pe.estado = 'Realizado' -- Puedes ajustar esta condición según tu estructura de estados de pedido
			GROUP BY p.id_producto, p.nombre;";
			$consulta = $this->db->query($sql);
			
			while($filas=$consulta->fetch_assoc()){
				//Asignamos al atributo personas el resultado de la consulta
				$this->productos[]=$filas;
			}
			//El método devuelve el array resultante
			return $this->productos;
			
		}

		public function getProductos3()
		{
		$sql = "SELECT p.nombre AS producto, SUM(c.cantidad) AS cantidad_total_vendida
		FROM productos p
		JOIN contiene c ON p.id_producto = c.id_producto
		GROUP BY p.id_producto
		ORDER BY cantidad_total_vendida DESC
		LIMIT 1;";

		$consulta = $this->db->query($sql);

		$this->pedido = array();

		while ($filas = $consulta->fetch_assoc()) {
			$this->pedido[] = $filas;
		}

		return $this->pedido;
		}

		public function getProductos4()
		{
			$sql = "SELECT p.id_producto, p.nombre, p.precio, p.stock, c.tipo
			FROM productos p
			join categoria c on c.id_categoria = p.id_categoria 
			WHERE id_producto NOT IN (
				SELECT id_producto
				FROM contiene
			);";
		
			$consulta = $this->db->query($sql);
		
			$this->pedido = array();
		
			while ($filas = $consulta->fetch_assoc()) {
				$this->pedido[] = $filas;
			}
		
			return $this->pedido;
		}

		public function getProductos5()
		{
			$sql = "SELECT AVG(cantidad) AS promedio_cantidad
			FROM contiene;";

			$consulta = $this->db->query($sql);

			$this->pedido = array();

			while ($filas = $consulta->fetch_assoc()) {
				$this->pedido[] = $filas;
			}

			return $this->pedido;
		}

		public function getProductos6()
		{
			$sql = "SELECT p.nombre, pe.fecha AS fecha_entrega
					FROM productos p
					JOIN contiene c ON p.id_producto = c.id_producto
					JOIN pedido pe ON c.id_pedido = pe.id_pedido
					WHERE pe.reembolso = '1';";

			$consulta = $this->db->query($sql);

			if ($consulta) { // Verificar si la consulta se ejecutó correctamente
				$productos = array();

				while ($filas = $consulta->fetch_assoc()) {
					$productos[] = $filas;
				}

				return $productos;
			} else {
				// Manejar el error en caso de que la consulta falle
				// Por ejemplo, puedes lanzar una excepción o devolver un mensaje de error
				throw new Exception("Error en la consulta: " . $this->db->error);
			}
		}


		//BAJARSTOCK
		public function reducirStock($id_producto, $cantidad) {
			// Consultar el stock actual del producto
			$sql = "SELECT stock FROM productos WHERE id_producto = $id_producto";
			$result = $this->db->query($sql);
			$row = mysqli_fetch_assoc($result);
			$stockActual = $row['stock'];
		
			// Verificar si hay suficiente stock disponible
			if ($stockActual >= $cantidad) {
				// Calcular el nuevo stock
				$nuevoStock = $stockActual - $cantidad;
		
				// Actualizar el stock en la base de datos
				$sqlUpdate = "UPDATE productos SET stock = $nuevoStock WHERE id_producto = $id_producto";
				if ($this->db->query($sqlUpdate)) {
					// La actualización fue exitosa
					return true;
				} else {
					// Hubo un error al actualizar el stock
					return false;
				}
			} else {
				// No hay suficiente stock disponible
				return false;
			}
		}



		public function getPrecios(){
			$sql = "SELECT precio FROM productos";
			$resultado = $this->db->query($sql);
			
			// Verificar si la consulta tuvo éxito
			if ($resultado) {
				// Crear un array para almacenar los precios
				$precios = array();
			
				// Recorrer los resultados y almacenar cada precio en el array
				while ($fila = mysqli_fetch_assoc($resultado)) {
					$precios[] = $fila['precio'];
				}
			
				// Liberar el resultado
				mysqli_free_result($resultado);
			} else {
				echo "Error en la consulta: " . mysqli_error($conexion);
			}
			return $precios;
		}

		public function verificarProducto($ci){
			
			$sql = "SELECT * FROM productos WHERE id_producto='$id'";
			$this->db->query($sql);
			$num_rows = mysql_num_rows($sql);
			
			if($num_rows>0){
				activarProducto($ci);				
			}

			return $num_rows;
			
		}

		//Declaramos un metodo para crear nuevos registros en la tabla
		public function insertProductos($id, $nombre, $precio, $stock, $categoria, $directorio_destino, $nombre_fichero)
		{
			if (is_dir($directorio_destino) && isset($_FILES[$nombre_fichero]['tmp_name'])) {
				$tmp_name = $_FILES[$nombre_fichero]['tmp_name'];
				$img_file = $_FILES[$nombre_fichero]['name'];
				$img_type = $_FILES[$nombre_fichero]['type'];
		
				if (strpos($img_type, "gif") !== false || strpos($img_type, "jpeg") !== false || strpos($img_type, "jpg") !== false || strpos($img_type, "png") !== false) {
					if (move_uploaded_file($tmp_name, $directorio_destino . '/' . $img_file)) {
						$ruta = $directorio_destino . '/' . $img_file;
		
						$sql = "INSERT INTO productos (id_producto, nombre, precio, stock, id_categoria, imagen) VALUES ('$id', '$nombre', '$precio', '$stock', '$categoria', '$ruta')";
		
						if ($this->db->query($sql)) {
							
							echo "Error: " . mysqli_error($this->db);
							return true;
						} else {echo "Error: " . mysqli_error($this->db);
							return false;
						}
					}
				}
			}
		
			return false;
		}
		//MODIFICAR

		public function modificarProductoSinImagen($id_producto, $nombre, $precio, $stock, $id_categoria) {
			// Generar la consulta SQL para modificar el producto sin imagen
			$sql = "UPDATE productos
					SET nombre = '$nombre',
						precio = '$precio',
						stock = '$stock',
						id_categoria = '$id_categoria'
					WHERE id_producto = '$id_producto'";
		
			// Ejecutar la consulta
			if ($this->db->query($sql)) {
				// La modificación fue exitosa
				echo "<script>alert('Modificación aplicada sin cambiar la imagen.');</script>";
				return true;
			} else {
				// Hubo un error al modificar el producto
				echo "<script>alert('Error al modificar el producto sin cambiar la imagen.');</script>";
				return false;
			}
		}


		public function modificarProducto($id_producto, $nombre, $precio, $stock, $id_categoria, $directorio_destino, $imagen) {
			// Verificar el tipo de imagen permitido
		
			if (is_dir($directorio_destino) && isset($_FILES[$imagen]['tmp_name'])) {
				$tmp_name = $_FILES[$imagen]['tmp_name'];
				$img_file = $_FILES[$imagen]['name'];
				$img_type = $_FILES[$imagen]['type'];
		
				if (strpos($img_type, "gif") !== false && strpos($img_type, "jpeg") !== false && strpos($img_type, "jpg") !== false || strpos($img_type, "png") !== false) {
					if (move_uploaded_file($tmp_name, $directorio_destino . '/' . $img_file)) {
						$ruta = $directorio_destino . '/' . $img_file;
		
						// Consulta SQL para modificar el producto
						$sql = "UPDATE productos
								SET nombre = '$nombre',
									precio = '$precio',
									stock = '$stock',
									id_categoria = '$id_categoria',
									imagen = '$ruta'
								WHERE id_producto = '$id_producto'";
		
						// Ejecutar la consulta
						if ($this->db->query($sql)) {
							// La modificación fue exitosa
							return true;
						} else {
							// Hubo un error al modificar el producto
							return false;
						}
					}
				}
			}
		}
		

		//Declaramos un metodo para eliminar registros en la tabla
		public function deleteProductos($id){
	
			$sql = "UPDATE productos SET baja=1 WHERE id_producto = $id";
			if($this->db->query($sql)){
				return true;
			}else{
				return false;
			}
			
		}
	
		//Declaramos un metodo para modificar registros en la tabla
		public function updateProductos($id,$nombre,$precio,$stock,$categoria){
	
			$sql = "UPDATE productos SET nombre = '$nombre',precio = '$precio',stock = '$stock',caategoria = '$categoria' WHERE id_producto = $id";
			if($this->db->query($sql)){
				return true;
			}else{
				return false;
			}
			
		}		
	}
	 

?>