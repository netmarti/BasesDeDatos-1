<?php

try {
	$db = new PDO("pgsql:dbname=proyecto host=localhost port=5432 user=grupo14 password=basesdedatos");
}
catch(PDOException $e) {
	die ('Problema al conectar a la base de datos!');
}

//echo "Conectado a la base de datos! </br>";
?>
