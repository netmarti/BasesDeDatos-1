<?php

//Incluimos el archivo de conexion a la base de datos
include '../db_connect.php';

//Extraemos los valores
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo_de_evento'];
$recaudacion = 0;
$fecha = $_POST['fecha'];
$pais = $_POST['pais'];
$ciudad = $_POST['ciudad'];
$calle = $_POST['calle'];

//Generamos la consulta
$query = "INSERT INTO evento VALUES ('$nombre','$tipo',0,'$fecha','$pais','$ciudad','$calle');";

//die($query);

//Ejecutamos la consulta
try
{
	$db->exec($query);
}
catch(PDOException $e)
{
	die($query);
}
//Nos desconectamos de la base de datos
$db = null;

//Redirigimos a la lista de fabricantes
header("Location: listar.php");

?>
