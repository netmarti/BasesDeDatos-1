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

//Extraemos los valores de precios por categoria
$precio_juvenil = $_POST['precio_juvenil'];
$precio_adulto = $_POST['precio_adulto'];
$precio_senior = $_POST['precio_senior'];

//Generamos la consulta la insercion en tabla evento
$query_evento = "INSERT INTO evento VALUES ('$nombre','$tipo',0,'$fecha','$pais','$ciudad','$calle');";

//Generamos las consultas para insertar nuevos precios por categoria
$query_juvenil = "INSERT INTO precio_inscripcion VALUES ('$fecha','$pais','$ciudad','$calle','juvenil',$precio_juvenil);";
$query_adulto = "INSERT INTO precio_inscripcion VALUES ('$fecha','$pais','$ciudad','$calle','adulto',$precio_adulto);";
$query_senior = "INSERT INTO precio_inscripcion VALUES ('$fecha','$pais','$ciudad','$calle','senior',$precio_senior);";

//die($query_juvenil);

//Ejecutamos las consultas
try
{
	$db->exec($query_evento);
}
catch(PDOException $e)
{
	die($query_evento);
}

try
{
	$db->exec($query_juvenil);
}
catch(PDOException $e)
{
	die($query_juvenil);
}

try
{
	$db->exec($query_adulto);
}
catch(PDOException $e)
{
	die($query_adulto);
}

try
{
	$db->exec($query_senior);
}
catch(PDOException $e)
{
	die($query_senior);
}
//Nos desconectamos de la base de datos
$db = null;

//Redirigimos a la lista de fabricantes
header("Location: listar.php");

?>
