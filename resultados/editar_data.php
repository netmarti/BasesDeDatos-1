<?php
	
	//incluimos la conexion a la base de datos
	include '../db_connect.php';
	
	//Rescatamos los datos
	$rut = $_POST['rut_participante'];
	$nacionalidad = $_POST['nacionalidad_participante'];
	$fecha = $_POST['fecha_evento'];
	$pais = $_POST['pais'];
	$ciudad = $_POST['ciudad'];
	$calle = $_POST['calle'];
	
	$posicion = $_POST['posicion'];
	$horas = $_POST['horas'];
	$minutos = $_POST['minutos'];
	$segundos = $_POST['segundos'];
	
	//Generamos la consulta
	$query = "UPDATE resultado SET posicion = '$posicion', horas = '$horas', minutos = '$minutos', segundos = '$segundos'
						WHERE rut_participante = '$rut' AND nacionalidad_participante = '$nacionalidad' AND fecha_evento = '$fecha'
						AND pais = '$pais' AND ciudad = '$ciudad' AND calle = '$calle';";
	
	// la ejecutamos
	$db->exec($query);
	
	//nos desconectamos de la BD
	$db = null;
	
	//redireccionamos a la lista de resultados	
	header("Location: listar.php");
?>