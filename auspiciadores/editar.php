<?php
	
	//Revisamos que exista un id como parametro
	if(!isset($_GET['nombre'])){
		echo "No ha especificado un auspiciador";
	}
	else {
		//incluimos la conexion a la BD
		include '../db_connect.php';
	
	
		//Obtenemos los datos y generamos la consulta
		$nombre = $_GET['nombre'];
		$sql = "SELECT * FROM auspiciador WHERE nombre = '$nombre';";
	
		//Extraemos los datos
		foreach ($db->query($sql) as $row) {
		
			$auspiciador = $row;
		
		}
	
		//Nos desconectamos de la BD
		$db = null;
	
		//Si no hay un auspiciador cn ese id, lo informamos
		if (!isset($auspiciador)) {
			
				echo "No existe ese auspiciador";
			
			} else {
			
			?>
			
<!-- Formulario que edita un auspiciador-->

<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">	
</head>
<body>
	<h1>Editar Auspiciador</h1>
	<p>Indique los nuevos datos del Auspiciador:</p>
	
	<form class="well" method='post' action='editar_data.php'>
		<input type="hidden" name="id_auspiciador" value="<?php echo $nombre ?>" />
		<p>
			Nombre: <input type="text" name="nombre"
				value="<?php echo $auspiciador['nombre']?>" />
		</p>
		<p>
			Descripcion: <input type="text" name="descripcion"
				value="<?php echo $auspiciador['descripcion']?>" />
		</p>
		<p>
			<input type="submit" value="Editar" />
		</p>
	</form>
</body>
</html>

<?php
		}
	}
	
?>