<?php

	//incluimos la conexion a la base de datos
	include '../db_connect.php';
	
	//Rescatamos los datos
	$descripcion = $_POST['descripcion'];
	$nombre = $_POST['nombre'];
	
	//Generamos la consulta
	$query = "UPDATE auspiciador SET descripcion = '$descripcion',
								nombre = '$nombre'
								WHERE nombre = '$nombre';";
							
	// la ejecutamos
	$db->exec($query);
	
	//nos desconectamos de la BD
	$db = null;
	
	//redireccionamos a la lista de auspiciadores	
	header("Location: listar.php");

?>