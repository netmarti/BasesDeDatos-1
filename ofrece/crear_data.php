<?php
	
//Incluimos el archivo de conexion a la base de datos
include '../db_connect.php';

//Extraemos los valores de la oferta
$stock = $_POST['stock'];
$precio = $_POST['precio'];


//llave foranea tienda
$tienda = $_POST['tienda'];

$aux = explode("#", $tienda);
$pais = $aux[0];
$ciudad = $aux[1];
$calle = $aux[2];

//llave foranea producto
$modelo = $_POST['modelo'];

//generamos la consulta
$sql = "INSERT INTO ofrece VALUES ('$modelo', '$pais', '$ciudad',
				'$calle', '$stock', '$precio');"; 

//ejecutamos
try
{
	$db->exec($sql);
}
catch(PDOException $e)
{
	die($sql);
}
	
//nos desconectamos de la BD
$db = null;

//Redirigimos a la lista de ofertas
header("Location: listar.php");	
?>