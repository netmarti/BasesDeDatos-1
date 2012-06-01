<?php

	//incluyo la conexion a la base de datos
	include '../db_connect.php';
	
	//Buscamos los datos de la tabla tienda
	$sql_tiendas = "SELECT * FROM tienda;";
	
	$tiendas = array();
	foreach ($db->query($sql_tiendas) as $row) {
		
		$tiendas[] = $row;
		
	}
	
	//Buscamos los datos de la tabla producto
	$sql_productos = "SELECT * FROM producto;";
	
	$productos = array();
	foreach ($db->query($sql_productos) as $row) {
		
		$productos[] = $row;
		
	}
	
	//Nos desconectamos de la base de datos
	
	$db = null;
?>

<!-- Formulario que crea una oferta nueva-->
<html>
	<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<title>Creando una oferta</title>
	</head>
	<h1>Crear oferta</h1>
	
	<p>Ingrese los datos de la nueva oferta</p>
	
	<form class="well" method='post' action="crear_data.php">
		<h3>Datos:</h3>
		<p>Stock: <input type="text" name="stock" /></p>
		<p>Precio: <input type="text" name="precio" /></p>
		
		<p> Tienda: 
			<select name="tienda">
				<?php
					//para cada tienda agregamos una opcion
					foreach ($tiendas as $tienda) {
						$pais = $tienda['pais'];
						$ciudad = $tienda['ciudad'];
						$calle = $tienda['calle'];
				?>
				
				<option value="<?php echo $pais ?>#<?php echo $ciudad?>#<?php echo $calle ?>">
					<?php echo $pais ?> <?php echo $ciudad ?> <?php echo $calle ?></option>
				<?php
					}
				?>
			</select>
		</p>
		
		<p> Producto:
			<select name="modelo">
				<?php
					//para cada producto agregamos una opcion
					foreach($productos as $producto){
						$modelo = $producto['modelo'];
						$nombre = $producto['nombre'];
				?>
				<option value="<?php echo $modelo ?>">
					<?php echo $nombre ?>  Modelo:<?php echo $modelo ?> 
				</option>
				
				<?php
					}
				?>
			</select>
		</p>
		
		<input type="submit" value="Crear" />
		
	</form>
</html>