<?php
	class pedidos_model{
		
		//Declaramos atributos privados
		private $db;
		private $pedido;
		private $id_pedido;
	 
		//Declaramos un constructor que sirve para incializar los atributos
		public function __construct(){
			require_once("conexion.php");
			//Asignamos al atributo db el valor del metodo conexion() de la clase Conectar
			//Conectar es la clase y conexion es el metodo
			$this->db = Conectar::conexion();
			//Determinamos que el atributo personas será un array
			$this->pedido = array();
			
			
		}
		
		//Declaramos un metodo para obtener todos los registros de personas
		public function getPedidos()
{
    $sql = "SELECT r.ci, ps.nombre as usuario, ps.apellido, pe.id_pedido, p.nombre, c.cantidad, p.precio, pe.fecha, pe.metodoP, pe.metodoE, pe.estado, pe.reembolso
            FROM productos p
            INNER JOIN contiene c ON p.id_producto = c.id_producto
            INNER JOIN pedido pe ON c.id_pedido = pe.id_pedido
            INNER JOIN realizan r ON r.id_producto = p.id_producto
            INNER JOIN persona ps ON r.ci = ps.ci
			GROUP BY r.ci
            ORDER BY pe.fecha DESC
			";

    $consulta = $this->db->query($sql);

    $this->pedido = array();

    while ($filas = $consulta->fetch_assoc()) {
        $this->pedido[] = $filas;
    }

    return $this->pedido;
}

public function getPedidosCliente($ci)
{
    $sql = "SELECT r.ci, ps.nombre as usuario, ps.apellido, pe.id_pedido, p.nombre, c.cantidad, p.precio, pe.fecha, pe.metodoP, pe.metodoE, pe.estado, pe.reembolso
	FROM productos p
	INNER JOIN contiene c ON p.id_producto = c.id_producto
	INNER JOIN pedido pe ON c.id_pedido = pe.id_pedido
	INNER JOIN realizan r ON r.id_pedido = pe.id_pedido
	INNER JOIN persona ps ON r.ci = ps.ci
	WHERE r.ci='$ci'
	GROUP BY pe.id_pedido
	ORDER BY pe.fecha DESC
	";

$consulta = $this->db->query($sql);

$this->pedido = array();

while ($filas = $consulta->fetch_assoc()) {
	$this->pedido[] = $filas;
}
return $this->pedido;
	
}

public function getPedidosEstado($estado)
{
    $sql = "SELECT r.ci, ps.nombre as usuario, ps.apellido, pe.id_pedido, p.nombre, c.cantidad, p.precio, pe.fecha, pe.metodoP, pe.metodoE, pe.estado, pe.reembolso
	FROM productos p
	INNER JOIN contiene c ON p.id_producto = c.id_producto
	INNER JOIN pedido pe ON c.id_pedido = pe.id_pedido
	INNER JOIN realizan r ON r.id_pedido = pe.id_pedido
	INNER JOIN persona ps ON r.ci = ps.ci
	WHERE pe.estado='$estado'
	GROUP BY pe.id_pedido
	ORDER BY pe.fecha DESC
	";

$consulta = $this->db->query($sql);

$this->pedido = array();

while ($filas = $consulta->fetch_assoc()) {
	$this->pedido[] = $filas;
}
return $this->pedido;
	
}


public function CancelarPedido($id)
{
    $sql = "UPDATE pedido SET estado = 'Cancelado' WHERE id_pedido='$id' ";
    $consulta = $this->db->query($sql);
    
    if ($this->db->affected_rows > 0) {
		echo "<script>alert('Pedido correctamente cancelado');</script>";
        // Se realizó la actualización correctamente
        return true;
    } else {
        // La ID del pedido no existe, muestra una alerta
        echo "<script>alert('La ID del pedido no existe');</script>";
        return false;
    }
}

public function Reembolso($id,$reembolso)
{
    $sql = "UPDATE pedido SET  reembolso= '$reembolso' WHERE id_pedido='$id' ";
    $consulta = $this->db->query($sql);
    
    if ($this->db->affected_rows > 0) {
        // Se realizó la actualización correctamente
        return true;
    } else {
        // La ID del pedido no existe, muestra una alerta
        return false;
    }
}


public function ModificarPedido($id,$estado)
{
    $sql = "UPDATE pedido SET estado = '$estado' WHERE id_pedido='$id' ";
    $consulta = $this->db->query($sql);
    
    if ($this->db->affected_rows > 0) {
		echo "<script>alert('Funcion realizada correctamente');</script>";
        // Se realizó la actualización correctamente
        return true;
    } else {
        // La ID del pedido no existe, muestra una alerta
        echo "<script>alert('La ID del pedido no existe');</script>";
        return false;
    }
}




public function getPedidos2()
{
    $sql = "SELECT p.id_pedido, pr.nombre AS producto_vendido
	FROM pedido p
	INNER JOIN contiene c ON p.id_pedido = c.id_pedido
	INNER JOIN productos pr ON c.id_producto = pr.id_producto
	WHERE p.estado = 'Realizado';";

    $consulta = $this->db->query($sql);

    $this->pedido = array();

    while ($filas = $consulta->fetch_assoc()) {
        $this->pedido[] = $filas;
    }

    return $this->pedido;
}

public function getPedidos4()
{
    $sql = "SELECT MONTH(p.fecha) AS mes, COUNT(c.id_producto) AS cantidad_vendida
	FROM pedido p
	JOIN contiene c ON p.id_pedido = c.id_pedido
	GROUP BY mes;";

    $consulta = $this->db->query($sql);

    $this->pedido = array();

    while ($filas = $consulta->fetch_assoc()) {
        $this->pedido[] = $filas;
    }

    return $this->pedido;
}

public function getPedidos5()
{
    $sql = "SELECT MONTH(p.fecha) AS mes, COUNT(p.id_pedido) AS cantidad_pedidos
	FROM pedido p
	GROUP BY mes";

    $consulta = $this->db->query($sql);

    $this->pedido = array();

    while ($filas = $consulta->fetch_assoc()) {
        $this->pedido[] = $filas;
    }

    return $this->pedido;
}

public function getPedidosC(){
	$sql = "SELECT p.ci, COUNT(*) AS num_pedidos_cancelados
	FROM persona p
	JOIN realizan r ON p.ci = r.ci
	JOIN pedido pd ON r.id_pedido = pd.id_pedido
	WHERE pd.estado = 'cancelado'
	GROUP BY p.ci;";
	$consulta = $this->db->query($sql);
	while($filas=$consulta->fetch_assoc()){
		//Asignamos al atributo personas el resultado de la consulta
		
		$this->personas[]=$filas;
	}
	//El método devuelve el array resultante
	return $this->personas;
	
}


		public function getUltimoPedido()
{
    $fechaHoraActual = date('Y-m-d H:i:s');
    $sql = "SELECT id_pedido FROM pedido WHERE fecha='$fechaHoraActual'";
    $consulta = $this->db->query($sql);

    if ($consulta) {
        $columna = $consulta->fetch_assoc();

        if ($columna && isset($columna['id_pedido'])) {
            $id = $columna['id_pedido'];
            return $id;
        } else {
            // No se encontró ningún resultado
            return null;
        }
    } else {
        // Error en la consulta
        return null;
    }
}


		public function verificarDelete($id){
			
			$sql = "SELECT baja FROM pedido WHERE id_pedido='$id'";
			$result =$this->db->query($sql);
			$num_rows = mysqli_num_rows($sql);
			
			if($num_rows==0){
				echo "<script>alert('El pedido no existe');</script>";				
			}else{
                deleteProductos($id);
            }
			return $num_rows;
			
		}

		//Declaramos un metodo para crear nuevos registros en la tabla

		public function insertPedidos($metodoP,$metodoE){
			
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$fechaHoraActual = date('Y-m-d H:i:s');
			$sql = "INSERT INTO pedido (fecha, metodoP, metodoE, reembolso, estado) 
			VALUES ('$fechaHoraActual',  '$metodoP', '$metodoE', '0', 'Pendiente')";
			if($this->db->query($sql)){
				return true;
			}else{
				return false;
			}
			
		}
		public function insertContiene($id,$ref,$cant){
			$sql = "INSERT INTO contiene(id_pedido,id_producto,cantidad) 
			VALUE ('$id','$ref','$cant')";
			if($this->db->query($sql)){
				return true;
			}else{
				return false;
			}
			
		}
		
		public function insertRealizan($ci,$id_pedido,$ref){
	
			$sql = "INSERT INTO realizan(ci,id_pedido,id_producto) 
			VALUE ('$ci','$id_pedido','$ref')";
			if($this->db->query($sql)){
				return true;
			}else{
				return false;
			}
			
		}




		}
	 

?>