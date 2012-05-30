<?php

//Incluimos la conexion a la base de datos
include '../db_connect.php';

//Rescatamos los datos
$rut_participante = $_POST['rut_participante'];
$nacionalidad = $_POST['nacionalidad'];
$fecha_inscripcion = $_POST['fecha_inscripcion'];
$categoria = $_POST['categoria_participante'];
$fecha_evento = $_POST['fecha_evento'];
$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];
$calle = $_POST['calle'];

//Generamos la consulta
$query_inscripcion = "UPDATE inscripcion SET rut_participante = '$rut_participante', nacionalidad = '$nacionalidad', fecha_inscripcion = '$fecha_inscripcion', categoria_participante = '$categoria', fecha_evento = '$fecha_evento', ciudad = '$ciudad', pais = '$pais', calle = '$calle' WHERE rut_participante = '$rut_participante' AND nacionalidad = '$nacionalidad' AND fecha_evento = '$fecha_evento' AND ciudad = '$ciudad' AND pais = '$pais' AND calle = '$calle';";
//die($query_inscripcion);
//La ejecutamos
$db->exec($query_inscripcion);

//Nos desconectamos de la base de datos
$db = null;

//Redireccionamos a la lista de fabricantes
header("Location: listar.php");

?>