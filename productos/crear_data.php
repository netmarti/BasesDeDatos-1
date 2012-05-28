<?php

	//Incluimos el archivo de conexion a la base de datos
	include '../db_connect.php';

	//Extraemos los valores
	$descripcion = $_POST['descripcion'];
	$nombre = $_POST['nombre'];
	$modelo = $_POST['modelo'];

	//Generamos la consulta
	$query = "INSERT INTO producto VALUES ('$descripcion', '$nombre', '$modelo');";
	//die($query);

	//Ejecutamos la consulta
	$db->exec($query);

	//Nos desconectamos de la base de datos
	$db = null;

	//Redirigimos a la lista de productos
	header("Location: listar.php");

?>
