<?php

try {
	$db = new PDO("pgsql:dbname=proyecto host=localhost port=5432 user=postgres password=5204320");
}
catch(PDOException $e) {
	die ('Problema al conectar a la base de datos!');
}

?>
