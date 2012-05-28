<?php

//Revisamos que exista un id como parametro
if(!isset($_GET['fecha']) ||!isset($_GET['pais']) || !isset($_GET['ciudad']) || !isset($_GET['calle'])){
	echo "No ha especificado un evento";
} else {

	//Incluimos la conexion a la base de datos
	include '../db_connect.php';

	//Obtenemos los datos y generamos la consulta
	$fecha = $_GET['fecha'];
	$pais = $_GET['pais'];
	$ciudad = $_GET['ciudad'];
	$calle = $_GET['calle'];
	$sql = "SELECT * FROM evento WHERE fecha = '$fecha' AND pais = '$pais' AND ciudad = '$ciudad' AND calle = '$calle';";

	//Extraemos los datos
	foreach ($db->query($sql) as $row){

		$evento = $row;

	}

	//Nos desconectamos de la base de datos
	$db = null;

	//Si no hay un evento con ese id, lo informamos
	if(!isset($evento)){

		echo "No existe ese evento";

	} else {

		?>
<!-- Formulario que edita a un evento -->

<html>

<h1>Editar Evento</h1>

<p>Indique los nuevos datos de los evento:


<p>


<form method='post' action='editar_data.php'>
	<input type="hidden" name="id_fabricante" value="<?php echo $fecha ?>" />
	<p>
		Nombre: <input type="text" name="nombre"
			value="<?php echo $evento['nombre']?>" />
	</p>
	<p>
		Tipo: <input type="text" name="tipo_de_evento"
			value="<?php echo $evento['tipo_de_evento']?>" />
	</p>
	<p>
		Recaudacion: <input type="text" name="recaudacion"
			value="<?php echo $evento['recaudacion']?>" />
	</p>
	<p>
		Fecha: <input type="text" name="fecha"
			value="<?php echo $evento['fecha']?>" />
	</p>
	<p>
		Pais: <input type="text" name="pais"
			value="<?php echo $evento['pais']?>" />
	</p>
	<p>
		Ciudad: <input type="text" name="ciudad"
			value="<?php echo $evento['ciudad']?>" />
	</p>
	<p>
		Calle: <input type="text" name="calle"
			value="<?php echo $evento['calle']?>" />
	</p>
	<p>
		<input type="submit" value="Enviar">
	</p>
</form>

</html>
<?php
	
	}
}
?>


