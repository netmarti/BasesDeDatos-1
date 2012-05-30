<?php

//Incluimos la conexion a la base de datos
include '../db_connect.php';

//Rescatamos los datos
$nombre = $_POST['nombre'];
$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];
$calle = $_POST['calle'];

//Generamos la consulta
$query_tienda = "UPDATE tienda SET nombre = '$nombre', ciudad = '$ciudad', pais = '$pais', calle = '$calle' WHERE ciudad = '$ciudad' AND pais = '$pais' AND calle = '$calle';";
//die($query_tienda);
//La ejecutamos
$db->exec($query_tienda);

//Nos desconectamos de la base de datos
$db = null;

//Redireccionamos a la lista de fabricantes
header("Location: listar.php");

?>