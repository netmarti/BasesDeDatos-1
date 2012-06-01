<?php
	//incluimos la conexion a la BD
	include '../db_connect.php';
	
	//Verificamos que exista un id como parametro
	if (!isset($_GET['fecha_evento']) || !isset($_GET['pais']) || !isset($_GET['ciudad'])
		|| !isset($_GET['calle']) || !isset($_GET['nombre_auspiciador'])) {
		echo "No ha especificado una asociacion";
	}
		
	else {
		//Obtenemos los datos y generamos la consulta
		$nombre_auspiciador = $_GET['nombre_auspiciador'];
		$fecha = $_GET['fecha_evento'];
		$pais = $_GET['pais'];
		$ciudad = $_GET['ciudad'];
		$calle = $_GET['calle'];
		
		$sql = "DELETE FROM asociado WHERE fecha_evento = '$fecha'
		AND pais = '$pais' AND ciudad = '$ciudad' AND calle = '$calle'
		AND nombre_auspiciador = '$nombre_auspiciador' ; ";
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