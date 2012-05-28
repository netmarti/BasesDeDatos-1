<?php

//Incluimos la conexion a la base de datos
include '../db_connect.php';

//Rescatamos los datos
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo_de_evento'];
$recaudacion = $_POST['recaudacion'];
$fecha = $_POST['fecha'];
$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];
$calle = $_POST['calle'];

//Generamos la consulta
$query = "UPDATE evento SET nombre = '$nombre', tipo_de_evento = '$tipo', recaudacion = '$recaudacion', fecha = '$fecha', ciudad = '$ciudad', pais = '$pais', calle = '$calle' WHERE fecha = '$fecha' AND ciudad = '$ciudad' AND pais = '$pais' AND calle = '$calle';";

//La ejecutamos
$db->exec($query);

//Nos desconectamos de la base de datos
$db = null;

//Redireccionamos a la lista de fabricantes
header("Location: listar.php");

?>
