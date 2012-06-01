<?php

	//incluyo la conexion a la base de datos
	include '../db_connect.php';
	
	//Buscamos los datos de la tabla participante
	$sql_participante = "SELECT * FROM participante;";
	
	$participantes = array();
	foreach ($db->query($sql_participante) as $row) {
		
		$participantes[] = $row;
		
	}
	
	//Obtenemos los datos de la tabla producto
	$sql_producto = "SELECT * FROM producto;";
	
	$productos = array();
	foreach($db->query($sql_producto) as $row){
		
		$productos[] = $row;
		
	}
	
	//Nos desconectamos de la base de datos
	
	$db = null;

?>



<!-- Formulario que crea una inscripcion nueva-->
<html>
	<head>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<title>Creando una evaluacion</title>
	</head>
	<h1>Crear evaluacion</h1>

	<p>Ingrese los datos de la nueva evaluacion</p>
	
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
		
		<p> Producto:
			<select name="producto">
				<?php
					//para cada producto agregamos una opcion
					foreach($productos as $producto){
						$modelo = $producto['modelo'];

				?>
				<option value="<?php echo $modelo ?>">
					<?php echo $modelo ?>
				</option>
				
				<?php
					}
				?>
			</select>
		</p>
		
		<p>Nota: 
			<select name="nota">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>			
			</select>
		</p>
		
		<p>Descripcion:</p>
		<p>
			<textarea name="descripcion" rows="6" cols = "30"></textarea>
		</p>
		<br />
		<input type="submit" value="Crear" />
		
	</form>
</html>