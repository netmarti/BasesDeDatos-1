<?php
	
	//Revisamos que exista un id como parametro
	if(!isset($_GET['modelo'])){
		echo "No ha especificado un producto";
	}
	else {
		
		//Incluimos la conexion a la BD
		include '../db_connect.php';
		
		//Obtenemos los datos y generamos la consulta
		$modelo = $_GET['modelo'];
		$sql = "SELECT * FROM producto WHERE modelo = '$modelo';";
		
		//Extraemos los datos
		foreach ($db->query($sql) as $row) {
			
			$producto = $row;
			
		}
		
		//Nos desconectamos de la BD
		$db = null;
		
		//Si no hay un evento con ese id, lo informamos
		if (!isset($producto)) {
			
			echo "No existe ese producto";
			
		} else {
			
			?>
			
<!-- Formulario que edita un producto -->

<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
	<h1>Editar Producto</h1>
	<p>Indique los nuevos datos del producto:</p>
	
	<form class="well" method='post' action='editar_data.php'>
		<input type="hidden" name="id_producto" value="<?php echo $modelo ?>" />
		<p>
			Descripcion: <input type="text" name="descripcion"
				value="<?php echo $producto['descripcion']?>" />
		</p>
		<p>
			Nombre: <input type="text" name="nombre"
				value="<?php echo $producto['nombre']?>" />
		</p>
		<p>
			Modelo: <input type="text" name="modelo"
				value="<?php echo $producto['modelo']?>" />
		</p>
		<p>
			<input type="submit" value="Editar" />
		</p>
	</form>
	
</html>
<?php

		}
	}
		
?>