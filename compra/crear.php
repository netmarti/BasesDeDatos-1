<?php

	//incluyo la conexion a la base de datos
	include '../db_connect.php';
	
	//Buscamos los datos de la tabla participante
	$sql_participante = "SELECT * FROM participante;";
	
	$participantes = array();
	foreach ($db->query($sql_participante) as $row) {
		
		$participantes[] = $row;
		
	}
	
	//Obtenemos los datos de la tabla productos
	$sql_productos = "SELECT * FROM producto;";
	
	$productos = array();
	foreach($db->query($sql_productos) as $row){
		
		$productos[] = $row;
		
	}
	
	//Obtenemos los datos de la tabla tienda
	$sql_tiendas = "SELECT * FROM tienda;";
	
	$tiendas = array();
	foreach($db->query($sql_tiendas) as $row){
		
		$tiendas[] = $row;
		
	}
	
	//Nos desconectamos de la base de datos
	
	$db = null;

?>

<!-- Formulario que crea una compra nueva-->
<html>
	<head>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<title>Creando una compra nueva</title>
	</head>
	<h1>Crear Compra</h1>
	
	<p>Ingrese los datos de la nueva compra</p>
	
	<form class="well" method='post' action="crear_data.php">
		<h3>Datos:</h3>
		
		
		<p> Participante: 
			<select name="participante">
				<?php
					//para cada participante agregamos una opcion
					foreach ($participantes as $participante) {
						$rut = $participante['rut'];
						$nacionalidad = $participante['nacionalidad'];
				?>
				
				<option value="<?php echo $rut ?>#<?php echo $nacionalidad?>"><?php echo $rut ?> <?php echo $nacionalidad ?></option>
				<?php
					}
				?>
			</select>
		</p>
		
		<p> Tienda:
			<select name="tienda">
				<?php
					//para cada tienda agregamos una opcion
					foreach($tiendas as $tienda){
						$pais = $tienda['pais'];
						$ciudad	= $tienda['ciudad'];
						$calle = $tienda['calle'];
				?>
				<option value="<?php echo $pais ?>#<?php echo $ciudad ?>#<?php echo $calle?>">
					<?php echo $pais ?>  <?php echo $ciudad ?> <?php echo $calle?>
				</option>
				
				<?php
					}
				?>
			</select>
		</p>
		
		<p> Producto:
			<select name = "modelo">
				<?php
					//para cada producto agrgamos una opcion
					foreach($productos as $producto){
						$modelo = $producto['modelo'];
						$nombre = $producto['nombre'];
				?>
				<option value="<?php echo $modelo?>"><?php $nombre ?>  Modelo: <?php echo $modelo?></option>
				<?php
					}
				?>
				
			</select>
		</p>
		
		<p>Cantidad: <input type="text" name="cantidad" /></p>
		<p>Fecha Compra: <input type="text" name="fecha_compra" /></p>	
		
		<input type="submit" value="Crear" />
		
	</form>
</html>