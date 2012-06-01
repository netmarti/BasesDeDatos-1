<?php

//Revisamos que exista un id como parametro
if(!isset($_GET['rut']) || !isset($_GET['nacionalidad']) || !isset($_GET['modelo'])){
	echo "No ha especificado una evaluacion";
} else {

	//Incluimos la conexion a la base de datos
	include '../db_connect.php';

	//Obtenemos los datos y generamos la consulta
	$rut = $_GET['rut'];
	$nacionalidad = $_GET['nacionalidad'];
	$modelo = $_GET['modelo'];

	$sql_evaluacion = "SELECT * FROM evalua WHERE rut = '$rut' AND nacionalidad = '$nacionalidad' AND modelo = '$modelo';";
	
	//Extraemos los datos
	
	//die($sql_evaluacion);
	foreach ($db->query($sql_evaluacion) as $row){

		$evaluacion = $row;

	}

	//Nos desconectamos de la base de datos
	$db = null;

	//Si no hay un evento con ese id, lo informamos
	if(!isset($evaluacion)){

		echo "No existe esa evaluacion";

	} else {

		?>
<!-- Formulario que edita a un evento -->

<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<?php include "../navbar.php"?>
<div class="container">
<h1>Editar Evaluacion</h1>

<p>Indique los nuevos datos de la evaluacion:


<p>


<form class="well" method='post' action='editar_data.php'>
	<input type="hidden" name="rut" value="<?php echo $rut ?>" />
	<input type="hidden" name="nacionalidad" value="<?php echo $nacionalidad ?>" />
	<input type="hidden" name="modelo" value="<?php echo $modelo ?>" />
	<h3>Datos:</h3>
	<p>
		Rut: <?php echo $evaluacion['rut']?>
	</p>
	<p>
		Nacionalidad: <?php echo $evaluacion['nacionalidad']?>
	</p>
	<p>
		Modelo: <?php echo $evaluacion['modelo']?>
	</p>
	<p>Nota: 
			<select name="nota">
				<?php 
				/*
				 * Imprime las opciones de las notas con la nota de la BD seleccionada por defecto
				 * */
					for($i = 1 ; $i <= 7 ; $i++) {
						if($evaluacion['nota'] == $i) { ?>
							<option selected value="<?php echo $i?>"><?php echo $i?></option>
				<?php 	} else { ?>
							<option value="<?php echo $i?>"><?php echo $i?></option>
				<?php
						}
					}
				?>
			</select>
	</p>
	<p>Descripcion:</p>
	<p>
		<textarea name="descripcion" rows="6" cols = "30"><?php echo $evaluacion['descripcion']?></textarea>
	</p>
	<br />
	<p>
		<input type="submit" value="Enviar">
	</p>
</form>
</div>
</html>
<?php
	
	}
}
?>