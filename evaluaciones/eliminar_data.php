<?php
	//incluimos la conexion a la BD
	include '../db_connect.php';
	
	//Verificamos que exista un id como parametro
	if (!isset($_GET['rut']) || !isset($_GET['nacionalidad']) ||
	    !isset($_GET['modelo'])) {
		echo "No ha especificado una evaluacion";
	}
		
	else {
		//Obtenemos los datos y generamos la consulta
		$rut = $_GET['rut'];
		$nacionalidad = $_GET['nacionalidad'];
		$modelo = $_GET['modelo'];
		
		$sql = "DELETE FROM evalua WHERE rut = '$rut' 
		AND nacionalidad = '$nacionalidad' AND modelo = '$modelo' ; ";
		//die($sql);
		//La eje{cutamos
		try {
			$db->exec($sql);
		
		} catch (PDOException $e) {
			die($sql);
		}
		
		//Nos desconectamos de la base de datos
	$db = null;

	//Redireccionamos a la lista de resultados
	header("Location: listar.php");
	}
?>