<?php
	
//Incluimos el archivo de conexion a la base de datos
include '../db_connect.php';

//Extraemos los valores del resultado
$posicion = $_POST['posicion'];
$horas = $_POST['horas'];
$minutos = $_POST['minutos'];
$segundos = $_POST['segundos'];

//llave foranea participante
$participante = $_POST['participante'];

$aux = explode("#", $participante);
$rut = $aux[0];
$nacionalidad = $aux[1];

//llave foranea evento
$evento = $_POST['evento'];

$aux = explode("#", $evento);

$fecha_evento = $aux[0];
$pais = $aux[1];
$ciudad = $aux[2];
$calle = $aux[3];

//generamos la consulta
$sql = "INSERT INTO resultado VALUES ('$posicion', '$horas', '$minutos',
				'$segundos', '$rut', '$nacionalidad', '$fecha_evento',
				'$pais', '$ciudad', '$calle');"; 

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