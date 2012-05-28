<?php

	//Incluimos la conexion a la base de datos
	include '../db_connect.php';

	//Rescatamos la llave primaria
		$modelo = $_GET['modelo'];

	//Verificamos si es que existe algún producto con esa llave
	if(!isset($modelo))
	{
		echo "No se ha especificado un producto";
	}
	else
	{

		//Generamos la consulta
		$query = "DELETE FROM producto WHERE modelo = '$modelo';";

		//La ejecutamos
		try{
			$db->exec($query);
		}
		catch(PDOException $error){
			die($query);

		}
		//Nos desconectamos de la base de datos
		$db = null;

		//Redireccionamos a la lista de productos
		header("Location: listar.php");
	}
?>
