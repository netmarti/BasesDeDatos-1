<?php

//Revisamos que exista un id como parametro
if(!isset($_GET['rut']) ||!isset($_GET['nacionalidad'])){
	echo "No ha especificado un participante";
} else {

	//Incluimos la conexion a la base de datos
	include '../db_connect.php';

	//Obtenemos los datos y generamos la consulta
	$rut = $_GET['rut'];
	$nacionalidad = $_GET['nacionalidad'];
	$ciudad = $_GET['ciudad'];
	$calle = $_GET['calle'];
	$sql_participante = "SELECT * FROM participante WHERE rut = '$rut' AND nacionalidad = '$nacionalidad';";
	$sql_direccion = "SELECT * FROM direccion WHERE rut = '$rut' AND nacionalidad = '$nacionalidad';";
	$sql_email = "SELECT * FROM email WHERE rut = '$rut' AND nacionalidad = '$nacionalidad';";
	
	//echo $sql_participante;
	//echo $sql_direccion;
	//echo $sql_email;
	//Extraemos los datos de participante
	foreach ($db->query($sql_participante) as $row){

		$participante = $row;

	}
	
	//Extraemos los datos de direccion
	foreach ($db->query($sql_direccion) as $row){
	
		$direccion = $row;
	
	}
	
	//Extraemos los datos de email
	foreach ($db->query($sql_email) as $row){
	
		$email = $row;
	
	}

	//Nos desconectamos de la base de datos
	$db = null;

	//Si no hay un evento con ese id, lo informamos
	if(!isset($participante)){

		echo "No existe ese participante";

	} else {

		?>
<!-- Formulario que edita a un participante -->

<html>
<head>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<h1>Editar Participante</h1>

<p>Indique los nuevos datos del participante:


<p>


<form class="well" method='post' action='editar_data.php'>
	<input type="hidden" name="id_participante" value="<?php echo $rut ?>" />
	<h3>Datos personales:</h3>
	<p>
		Nombres: <input type="text" name="nombres"
			value="<?php echo $participante['nombres']?>" />
	</p>
	<p>
		Apellido Paterno: <input type="text" name="ap_paterno"
			value="<?php echo $participante['ap_paterno']?>" />
	</p>
	<p>
		Apellido Materno: <input type="text" name="ap_materno"
			value="<?php echo $participante['ap_materno']?>" />
	</p>
	<p>
		Rut: <input type="text" name="rut"
			value="<?php echo $participante['rut']?>" />
	</p>
	<p>
		Nacionalidad: <input type="text" name="nacionalidad"
			value="<?php echo $participante['nacionalidad']?>" />
	</p>
	<p>
		Fecha de Nacimiento: <input type="text" name="fecha_nacimiento"
			value="<?php echo $participante['fecha_nacimiento']?>" />
	</p>
	<p>
		Genero: <input type="text" name="genero"
			value="<?php echo $participante['genero']?>" />
	</p>
	<p>
		Telefono: <input type="text" name="telefono"
			value="<?php echo $participante['telefono']?>" />
	</p>
	<h3>Direccion:</h3>
	<p>
		Codigo Postal: <input type="text" name="codigo_postal"
			value="<?php echo $direccion['codigo_postal']?>" />
	</p>
	<p>
		Pais: <input type="text" name="pais"
			value="<?php echo $direccion['pais']?>" />
	</p>
	<p>
		Ciudad: <input type="text" name="ciudad"
			value="<?php echo $direccion['ciudad']?>" />
	</p>
	<p>
		Calle: <input type="text" name="calle"
			value="<?php echo $direccion['calle']?>" />
	</p>
	<h3>Contacto:</h3>
	<p>
		Email: <input type="text" name="email"
			value="<?php echo $email['email']?>" />
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