<?php

	//incluyo la conexion a la base de datos
	include '../db_connect.php';
	
	//Buscamos los datos de la tabla participante
	$sql_auspiciador = "SELECT * FROM auspiciador;";
	
	$auspiciadores = array();
	foreach ($db->query($sql_auspiciador) as $row) {
		
		$auspiciadores[] = $row;
		
	}
	
	//Obtenemos los datos de la tabla eventos
	$sql_evento = "SELECT * FROM evento;";
	
	$eventos = array();
	foreach($db->query($sql_evento) as $row){
		
		$eventos[] = $row;
		
	}
	
	//Nos desconectamos de la base de datos
	
	$db = null;

?>



<!-- Formulario que crea una inscripcion nueva-->
<html>
	<head>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<title>Creando una asociacion</title>
	</head>
	<body>
	<?php include "../navbar.php"?>

	<h1>Crear asociacion</h1>

	<p>Ingrese los datos de la nueva asociacion</p>
	
	<form class="well" method='post' action="crear_data.php">
	<h3>Datos:</h3>
		<p> Auspiciador: 
			<select name="auspiciador">
				<?php
					//para cada participante agregamos una opcion
					foreach ($auspiciadores as $auspiciador) {
						$nombre = $auspiciador['nombre'];
				?>
				
				<option value="<?php echo $nombre ?>"><?php echo $nombre ?></option>
				<?php
					}
				?>
			</select>
		</p>
		
		<p> Evento:
			<select name="evento">
				<?php
					//para cada evento agregamos una opcion
					foreach($eventos as $evento){
						$fecha = $evento['fecha'];
						$pais = $evento['pais'];
						$ciudad	= $evento['ciudad'];
						$calle = $evento['calle'];
				?>
				<option value="<?php echo $fecha ?>#<?php echo $pais ?>#<?php echo $ciudad ?>#<?php echo $calle?>">
					<?php echo $fecha ?>  <?php echo $pais ?>  <?php echo $ciudad ?> <?php echo $calle?>
				</option>
				
				<?php
					}
				?>
			</select>
		</p>
		
		<p> Monto:
			<input type="text" name="monto" />
		</p>
		<input type="submit" value="Crear" />
		
	</form>
	</body>
</html>