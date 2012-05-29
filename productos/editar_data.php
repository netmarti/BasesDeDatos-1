<?php

	//incluimos la conexion a la base de datos
	include '../db_connect.php';
	
	//Rescatamos los datos
	$modelo = $_POST['modelo'];
	$descripcion = $_POST['descripcion'];
	$nombre = $_POST['nombre'];
	
	//Generamos la consulta
	$query = "UPDATE producto SET descripcion = '$descripcion',
								nombre = '$nombre', 
								modelo = '$modelo'
								WHERE modelo = '$modelo';";
								
	// la ejecutamos
	$db->exec($query);
	
	//nos desconectamos de la BD
	$db = null;
	
	//redireccionamos a la lista de productos
	
	header("Location: listar.php");



?>