<?php
	
//Incluimos el archivo de conexion a la base de datos
include '../db_connect.php';

//Extraemos la categoria
$categoria_participante = $_POST['categoria'];

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
$sql = "INSERT INTO inscripcion (rut_participante, nacionalidad, categoria_participante, fecha_evento, pais, ciudad, calle) VALUES ('$rut', '$nacionalidad','$categoria_participante', '$fecha_evento',
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