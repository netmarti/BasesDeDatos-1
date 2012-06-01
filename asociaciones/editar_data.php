<?php

//Incluimos la conexion a la base de datos
include '../db_connect.php';

//Rescatamos los datos
$nombre_auspiciador = $_POST['nombre_auspiciador'];
$monto = $_POST['monto'];
$fecha_evento = $_POST['fecha_evento'];
$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];
$calle = $_POST['calle'];

//Generamos la consulta
$query_asociado = "UPDATE asociado SET monto = $monto WHERE fecha_evento = '$fecha_evento' AND ciudad = '$ciudad' AND pais = '$pais' AND calle = '$calle' AND nombre_auspiciador = '$nombre_auspiciador';";
//die($query_inscripcion);
//La ejecutamos
$db->exec($query_asociado);

//Nos desconectamos de la base de datos
$db = null;

//Redireccionamos a la lista de fabricantes
header("Location: listar.php");

?>