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

//Extraemos los valores de precios por categoria
$precio_juvenil = $_POST['precio_juvenil'];
$precio_adulto = $_POST['precio_adulto'];
$precio_senior = $_POST['precio_senior'];

//Generamos la consulta
$query_evento = "UPDATE evento SET nombre = '$nombre', tipo_de_evento = '$tipo', recaudacion = '$recaudacion', fecha = '$fecha', ciudad = '$ciudad', pais = '$pais', calle = '$calle' WHERE fecha = '$fecha' AND ciudad = '$ciudad' AND pais = '$pais' AND calle = '$calle';";

$query_juvenil = "UPDATE precio_inscripcion SET precio = $precio_juvenil WHERE fecha_evento = '$fecha' AND ciudad = '$ciudad' AND pais = '$pais' AND calle = '$calle' AND categoria_participante = 'juvenil';";
$query_adulto = "UPDATE precio_inscripcion SET precio = $precio_adulto WHERE fecha_evento = '$fecha' AND ciudad = '$ciudad' AND pais = '$pais' AND calle = '$calle' AND categoria_participante = 'adulto';";
$query_senior = "UPDATE precio_inscripcion SET precio = $precio_senior WHERE fecha_evento = '$fecha' AND ciudad = '$ciudad' AND pais = '$pais' AND calle = '$calle' AND categoria_participante = 'senior';";

//La ejecutamos
$db->exec($query_evento);

$db->exec($query_juvenil);
$db->exec($query_adulto);
$db->exec($query_senior);

//Nos desconectamos de la base de datos
$db = null;

//Redireccionamos a la lista de fabricantes
header("Location: listar.php");

?>
