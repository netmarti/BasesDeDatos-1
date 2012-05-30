<?php

//Incluimos la conexion a la base de datos
include '../db_connect.php';

//Verificamos que exista un id como parametros
if(!isset($_GET['pais']) || !isset($_GET['ciudad']) || !isset($_GET['calle'])){
	echo "No ha especificado una tienda";
}
else{
	//Rescatamos el valor
	$pais = $_GET['pais'];
	$ciudad = $_GET['ciudad'];
	$calle = $_GET['calle'];
	//Generamos la consulta
	$query = "DELETE FROM tienda WHERE pais = '$pais' AND ciudad = '$ciudad' AND calle = '$calle';";

	//La ejecutamos
	$db->exec($query);

	//Nos desconectamos de la base de datos
	$db = null;

	//Redireccionamos a la lista de fabricantes
	header("Location: listar.php");
}
?>