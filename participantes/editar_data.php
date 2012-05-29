<?php

//Incluimos la conexion a la base de datos
include '../db_connect.php';

//Extraemos los valores para la tabla participante
$nombres = $_POST['nombres'];
$ap_paterno = $_POST['ap_paterno'];
$ap_materno = $_POST['ap_materno'];
$rut = $_POST['rut'];
$nacionalidad = $_POST['nacionalidad'];
$fecha_nac = $_POST['fecha_nacimiento'];
$genero = $_POST['genero'];
$telefono = $_POST['telefono'];

//valores para la tabla email
$email = $_POST['email'];

//valores para la tabla direccion
$codigo_postal = $_POST['codigo_postal'];
$pais = $_POST['pais'];
$ciudad = $_POST['ciudad'];
$calle = $_POST['calle'];

//Generamos la consulta para participante
$query_participante = "UPDATE participante SET nombres = '$nombre', tipo_de_evento = '$tipo', recaudacion = '$recaudacion', fecha = '$fecha', ciudad = '$ciudad', pais = '$pais', calle = '$calle' WHERE fecha = '$fecha' AND ciudad = '$ciudad' AND pais = '$pais' AND calle = '$calle';";

//Generamos la consulta para direccion
$query_direccion = 
//Generamos la consulta para email

//La ejecutamos
$db->exec($query);

//Nos desconectamos de la base de datos
$db = null;

//Redireccionamos a la lista de fabricantes
header("Location: listar.php");

?>