<?php
	
//Incluimos el archivo de conexion a la base de datos
include '../db_connect.php';

//Extraemos los valores de la compra
$cantidad = $_POST['cantidad'];


$fecha = $_POST['fecha_compra'];

//llave foranea participante
$participante = $_POST['participante'];

$aux = explode("#", $participante);
$rut = $aux[0];
$nacionalidad = $aux[1];

//llave foranea tienda
$tienda = $_POST['tienda'];

$aux = explode("#", $tienda);

$pais = $aux[0];
$ciudad = $aux[1];
$calle = $aux[2];

//llave foranea producto
$modelo = $_POST['modelo'];

//generamos la consulta

if($_POST['fecha_compra'] == null || $_POST['fecha_compra'] == '' ){

	//si la fecha no esta especificada agregamos la fecha actual	
	$sql = "INSERT INTO compra VALUES ('$rut', '$nacionalidad', '$modelo', 
				'$pais', '$ciudad', '$calle', CURRENT_TIMESTAMP, '$cantidad');"; 
}
else{
	
	$sql = "INSERT INTO compra VALUES ('$rut', '$nacionalidad', '$modelo', 
				'$pais', '$ciudad', '$calle', '$fecha', '$cantidad');"; 			
}


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

//Redirigimos a la lista de compras
header("Location: listar.php");	
?>