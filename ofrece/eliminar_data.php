<?php

//Incluimos la conexion a la base de datos
include '../db_connect.php';

//Verificamos que exista un id como parametros
if(!isset($_GET['modelo']) || !isset($_GET['pais']) || !isset($_GET['ciudad']) || !isset($_GET['calle'])){
	echo "No ha especificado una oferta";
}
else{
	//Rescatamos el valor
	$modelo = $_GET['modelo'];
	$pais = $_GET['pais'];
	$ciudad = $_GET['ciudad'];
	$calle = $_GET['calle'];
	
	//Generamos la consulta
	$query = "DELETE FROM ofrece WHERE modelo = '$modelo' AND pais = '$pais' AND ciudad = '$ciudad' AND calle = '$calle';";

	//La ejecutamos
	$db->exec($query);

	//Nos desconectamos de la base de datos
	$db = null;

	//Redireccionamos a la lista 
	header("Location: listar.php");
}
?>