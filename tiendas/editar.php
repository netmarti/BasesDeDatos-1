<?php

//Revisamos que exista un id como parametro
if(!isset($_GET['pais']) || !isset($_GET['ciudad']) || !isset($_GET['calle'])){
	echo "No ha especificado una tienda";
} else {

	//Incluimos la conexion a la base de datos
	include '../db_connect.php';

	//Obtenemos los datos y generamos la consulta
	$pais = $_GET['pais'];
	$ciudad = $_GET['ciudad'];
	$calle = $_GET['calle'];
	
	$sql_tienda = "SELECT * FROM tienda WHERE pais = '$pais' AND ciudad = '$ciudad' AND calle = '$calle';";

	//Extraemos los datos
	
	//die($sql_precio_juvenil);
	foreach ($db->query($sql_tienda) as $row){

		$tienda = $row;

	}
	
	//Nos desconectamos de la base de datos
	$db = null;

	//Si no hay un evento con ese id, lo informamos
	if(!isset($tienda)){

		echo "No existe esa tienda";

	} else {

		?>
<!-- Formulario que edita una tienda -->

<html>

<h1>Editar Tienda</h1>

<p>Indique los nuevos datos de la tienda:


<p>


<form method='post' action='editar_data.php'>
	<input type="hidden" name="id_fabricante" value="<?php echo $calle ?>" />
	<h3>Datos del evento:</h3>
	<p>
		Nombre: <input type="text" name="nombre"
			value="<?php echo $tienda['nombre']?>" />
	</p>
	<p>
		Calle: <input type="text" name="calle"
			value="<?php echo $tienda['calle']?>" />
	</p>
	<p>
		Ciudad: <input type="text" name="ciudad"
			value="<?php echo $tienda['ciudad']?>" />
	</p>
	<p>
		Pais: <input type="text" name="pais"
			value="<?php echo $tienda['pais']?>" />
	</p>
	<p>
		<input type="submit" value="Enviar">
	</p>
</form>

</html>
<?php
	
	}
}
?>