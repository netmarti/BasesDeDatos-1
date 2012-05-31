<?php
	//incluimos la conexion a la BD
	include '../db_connect.php';
	
	//Verificamos que exista un id como parametro
	if (!isset($_GET['rut']) || !isset($_GET['nacionalidad']) || !isset($_GET['modelo']) ||
	    !isset($_GET['fecha_compra']) || !isset($_GET['pais']) || !isset($_GET['ciudad'])
		|| !isset($_GET['calle'])) {
			
		echo "No ha especificado una compra";
	}
		
	else {
		//Obtenemos la llave y generamos la consulta
		
		$rut = $_GET['rut'];
		$nacionalidad = $_GET['nacionalidad'];
		$modelo = $_GET['modelo'];
		$pais = $_GET['pais'];
		$ciudad = $_GET['ciudad'];
		$calle = $_GET['calle'];
		$fecha = $_GET['fecha_compra'];
		
		$sql = "DELETE FROM compra WHERE rut = '$rut' AND nacionalidad = '$nacionalidad' 
		AND fecha_compra = '$fecha' AND pais = '$pais' AND ciudad = '$ciudad' 
		AND calle = '$calle' AND fecha_compra = '$fecha'; ";
		
		//La eje{cutamos
		try {
			$db->exec($sql);
		
		} catch (PDOException $e) {
			die($sql);
		}
		
		//Nos desconectamos de la base de datos
		$db = null;

		//Redireccionamos a la lista de compras
		header("Location: listar.php");
	}
?>