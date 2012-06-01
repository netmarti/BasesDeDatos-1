<?php
	
//Incluimos el archivo de conexion a la base de datos
include '../db_connect.php';

//Extraemos el monto
$monto = $_POST['monto'];

//llave foranea auspiciador
$nombre_auspiciador = $_POST['auspiciador'];

//llave foranea evento
$evento = $_POST['evento'];

$aux = explode("#", $evento);

$fecha_evento = $aux[0];
$pais = $aux[1];
$ciudad = $aux[2];
$calle = $aux[3];

//generamos la consulta
$sql = "INSERT INTO asociado VALUES ('$fecha_evento','$pais', '$ciudad', '$calle','$nombre_auspiciador','$monto');"; 

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