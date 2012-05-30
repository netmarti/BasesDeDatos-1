<?php

	//incluyo la conexion a la base de datos
	include '../db_connect.php';
	
	//Buscamos los datos de la tabla participante
	$sql_participante = "SELECT * FROM participante;";
	
	$participantes = array();
	foreach ($db->query($sql_participante) as $row) {
		
		$participantes[] = $row;
		
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



<!-- Formulario que crea un resultado nuevo-->
<html>
	
	<title>Creando un resultado</title>
	
	<h1>Crear resultado</h1>
	
	<p>Ingrese los datos del nuevo resultado</p>
	
	<form method='post' action="crear_data.php">
		<h3>Datos:</h3>
		<p>Posicion: <input type="text" name="posicion" /></p>
		<p>Horas: <input type="text" name="horas" /></p>
		<p>Minutos: <input type="text" name="minutos" /></p>
		<p>Segundos: <input type="text" name="segundos" /></p>
		
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
		
		<input type="submit" value="Crear" />
		
	</form>
</html>