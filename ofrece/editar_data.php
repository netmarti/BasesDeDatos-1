<?php
	
	//incluimos la conexion a la base de datos
	include '../db_connect.php';
	
	//Rescatamos la llave primaria
	$modelo = $_POST['modelo'];
	$pais = $_POST['pais'];
	$ciudad = $_POST['ciudad'];
	$calle = $_POST['calle'];
	
	// y los datos
	$stock = $_POST['stock'];
	$precio = $_POST['precio'];
	
	
	//Generamos la consulta
	$query = "UPDATE ofrece SET stock = '$stock', precio = '$precio'
						WHERE modelo = '$modelo' AND pais = '$pais' AND ciudad = '$ciudad'
						AND calle = '$calle';";
	
	// la ejecutamos
	$db->exec($query);
	
	//nos desconectamos de la BD
	$db = null;
	
	//redireccionamos a la lista de resultados	
	header("Location: listar.php");
?>