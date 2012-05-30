<?php
	
	//Incluimos el archivo de conexion a la BD
	include '../db_connect.php';
	
	//extraemos los valores 
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	
	//Generamos la consulta
	$query = "INSERT INTO auspiciador VALUES ('$nombre', '$descripcion');";
	
	//Ejecutamos la consulta
	$db->exec($query);
	
	//Nos desconectamos de la base de datos
	$db = null;
	
	//Redirigimos a la lista de productos
	header("Location: listar.php");
?>