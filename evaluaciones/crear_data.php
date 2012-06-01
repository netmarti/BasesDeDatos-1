<?php
	
//Incluimos el archivo de conexion a la base de datos
include '../db_connect.php';

//Extraemos la nota y descripcion
$nota = $_POST['nota'];
$descripcion = $_POST['descripcion'];

//llave foranea participante
$participante = $_POST['participante'];

$aux = explode("#", $participante);
$rut = $aux[0];
$nacionalidad = $aux[1];

//llave foranea producto
$producto = $_POST['producto'];

//generamos la consulta
$sql = "INSERT INTO evalua VALUES ('$rut', '$nacionalidad','$producto', '$nota', '$descripcion');"; 

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

//Redirigimos a la lista de resultados
header("Location: listar.php");	
?>