<?php
	
	//incluimos la conexion a la base de datos
	include '../db_connect.php';
	
	//Rescatamos los datos
	$rut = $_POST['rut'];
	$nacionalidad = $_POST['nacionalidad'];
	
	$modelo = $_POST['modelo'];
	
	$pais = $_POST['pais'];
	$ciudad = $_POST['ciudad'];
	$calle = $_POST['calle'];
	
	$fecha = $_POST['fecha_compra'];
	$cantidad = $_POST['cantidad'];
	
	//Generamos la consulta
	$query = "UPDATE compra SET cantidad = '$cantidad'
						WHERE rut = '$rut' AND nacionalidad = '$nacionalidad' AND modelo = '$modelo' AND fecha_compra = '$fecha'
						AND pais = '$pais' AND ciudad = '$ciudad' AND calle = '$calle';";
	
	// la ejecutamos
	$db->exec($query);
	
	//nos desconectamos de la BD
	$db = null;
	
	//redireccionamos a la lista de resultados	
	header("Location: listar.php");
?>