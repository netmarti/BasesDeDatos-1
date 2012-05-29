<?php

//Incluimos el archivo de conexion a la base de datos
include '../db_connect.php';

//Extraemos los valores para la tabla participante
$nombres = $_POST['nombres'];
$ap_paterno = $_POST['ap_paterno'];
$ap_materno = $_POST['ap_materno'];
$rut = $_POST['rut'];
$nacionalidad = $_POST['nacionalidad'];
$fecha_nac = $_POST['fecha_nacimiento'];
$genero = $_POST['genero'];
$telefono = $_POST['telefono'];

//valores para la tabla email
$email = $_POST['email'];

//valores para la tabla direccion
$codigo_postal = $_POST['codigo_postal'];
$pais = $_POST['pais'];
$ciudad = $_POST['ciudad'];
$calle = $_POST['calle'];

//Generamos la consulta para la tabla participante
$query_participante = "INSERT INTO participante VALUES ('$nombres','$ap_paterno','$ap_materno','$rut','$nacionalidad','$fecha_nac','$genero','$telefono');";

//Generamos la consulta para la tabla direccion
$query_direccion = "INSERT INTO direccion VALUES ('$rut','$nacionalidad','$codigo_postal','$pais','$ciudad','$calle');";

//Generamos la consulta para la tabla email
$query_email = "INSERT INTO email VALUES ('$email','$rut','$nacionalidad');";

//die($query);

//Ejecutamos la insercion a la tabla participante
try
{
	$db->exec($query_participante);
}
catch(PDOException $e)
{
	die($query_participante);
}
//Ejecutamos la insercion a la tabla direccion
try
{
	$db->exec($query_direccion);
}
catch(PDOException $e)
{
	die($query_direccion);
}
//Ejecutamos la insercion a la tabla email
try
{
	$db->exec($query_email);
}
catch(PDOException $e)
{
	die($query_email);
}
//Nos desconectamos de la base de datos
$db = null;

//Redirigimos a la lista de fabricantes
header("Location: listar.php");

?>
