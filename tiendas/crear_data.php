<?php

//Incluimos el archivo de conexion a la base de datos
include '../db_connect.php';

//Extraemos los valores
$nombre = $_POST['nombre'];
$calle = $_POST['calle'];
$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];

//Generamos la consulta la insercion en tabla tienda
$query_tienda = "INSERT INTO tienda VALUES ('$pais','$ciudad','$calle','$nombre');";

//die($query_juvenil);

//Ejecutamos las consultas
try
{
	$db->exec($query_tienda);
}
catch(PDOException $e)
{
	die($query_tienda);
}
//Nos desconectamos de la base de datos
$db = null;

//Redirigimos a la lista de fabricantes
header("Location: listar.php");

?>