<?php

//Incluimos la conexion a la base de datos
include '../db_connect.php';

//Verificamos que exista un id como parametros
if(!isset($_GET['rut']) ||!isset($_GET['nacionalidad'])){
	echo "No ha especificado un participante";
}
else{
	//Obtenemos los datos y generamos la consulta
	$rut = $_GET['rut'];
	$nacionalidad = $_GET['nacionalidad'];
	$ciudad = $_GET['ciudad'];
	$calle = $_GET['calle'];
	
	//Generamos las sentencias SQL
	$sql_participante = "DELETE FROM participante WHERE rut = '$rut' AND nacionalidad = '$nacionalidad';";
	$sql = $sql_participante;
	include 'xml_log.php';
	//Estas se deberian borrar automaticamente por el ON DELETE CASCADE
	//$sql_direccion = "DELETE FROM direccion WHERE rut = '$rut' AND nacionalidad = '$nacionalidad';";
	//$sql_email = "DELETE FROM email WHERE rut = '$rut' AND nacionalidad = '$nacionalidad';";
	
	//La ejecutamos
	try {
		$db->exec($sql_participante);
		
	} catch (PDOException $e) {
		die($sql_participante);
	}

	//Nos desconectamos de la base de datos
	$db = null;

	//Redireccionamos a la lista de fabricantes
	header("Location: listar.php");
}
?>
