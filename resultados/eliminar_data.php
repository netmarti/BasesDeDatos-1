<?php
	//incluimos la conexion a la BD
	include '../db_connect.php';
	
	//Verificamos que exista un id como parametro
	if (!isset($_GET['rut_participante']) || !isset($_GET['nacionalidad_participante']) ||
	    !isset($_GET['fecha_evento']) || !isset($_GET['pais']) || !isset($_GET['ciudad'])
		|| !isset($_GET['calle'])) {
		echo "No ha especificado un resultado";
	}
		
	else {
		//Obtenemos los datos y generamos la consulta
		$rut = $_GET['rut_participante'];
		$nacionalidad = $_GET['nacionalidad_participante'];
		$fecha = $_GET['fecha_evento'];
		$pais = $_GET['pais'];
		$ciudad = $_GET['ciudad'];
		$calle = $_GET['calle'];
		
		$sql = "DELETE FROM resultado WHERE rut_participante = '$rut' 
		AND nacionalidad_participante = '$nacionalidad' AND fecha_evento = '$fecha'
		AND pais = '$pais' AND ciudad = '$ciudad' AND calle = '$calle' ; ";
		
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