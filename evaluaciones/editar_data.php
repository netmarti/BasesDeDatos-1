<?php

//Incluimos la conexion a la base de datos
include '../db_connect.php';

//Rescatamos los datos
$rut = $_POST['rut'];
$nacionalidad = $_POST['nacionalidad'];
$modelo = $_POST['modelo'];
$nota = $_POST['nota'];
$descripcion = $_POST['descripcion'];

//Generamos la consulta
$query_evaluacion = "UPDATE evalua SET nota = $nota, descripcion = '$descripcion' WHERE rut = '$rut' AND nacionalidad = '$nacionalidad' AND modelo = '$modelo';";
//die($query_evaluacion);
//La ejecutamos
$db->exec($query_evaluacion);

//Nos desconectamos de la base de datos
$db = null;

//Redireccionamos a la lista de fabricantes
header("Location: listar.php");

?>