<?php
	
	//Verificamos que exista un id como parametro
	if (!isset($_GET['rut_participante']) || !isset($_GET['nacionalidad_participante']) ||
	    !isset($_GET['fecha_evento']) || !isset($_GET['pais']) || !isset($_GET['ciudad'])
		|| !isset($_GET['calle'])) {
		echo "No ha especificado un resultado";
	}
		else {
			//incluimos la conexion a la base de datos
			include '../db_connect.php';
			
			//Obtenemos los datos y generamos la consulta
			$nacionalidad = $_GET['nacionalidad_participante'];
			$rut = $_GET['rut_participante'];
			
			$fecha = $_GET['fecha_evento'];
			$pais = $_GET['pais'];
			$ciudad = $_GET['ciudad'];
			$calle = $_GET['calle'];
			
			$sql = "SELECT * FROM resultado WHERE rut_participante = '$rut' AND nacionalidad_participante = '$nacionalidad' AND
											fecha_evento = '$fecha' AND pais = '$pais' AND ciudad = '$ciudad' AND calle = '$calle'";
			
			//die($sql);
			//Extraemos los datos 
			foreach($db->query($sql) as $row){
				
				$resultado = $row;
			}
			
			//Nos desconectamos de la BD
			$db = null;
			
			//Si no hay un resultado lo informamos
			if(!isset($resultado)){
				
				echo "No existe ese resultado";

			} else{
			
			?>
			
<!-- Formulario que edita un resultado -->
		
<html>
	<head>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<title>Editando resultados</title>
	</head>
	
	<h1>Editar Resultado</h1>
	<p>Indique los nuevos datos del resultado:</p>
	
	<form class="well" method="post" action="editar_data.php">
		<input type="hidden" name="rut_participante" value="<?php echo $rut ?>" />
		<input type="hidden" name="nacionalidad_participante" value="<?php echo $nacionalidad ?>" />
		<input type="hidden" name="fecha_evento" value="<?php echo $fecha ?>" />
		<input type="hidden" name="pais" value="<?php echo $pais ?>" />
		<input type="hidden" name="ciudad" value="<?php echo $ciudad ?>" />
		<input type="hidden" name="calle" value="<?php echo $calle ?>" />
		
		<p>
			Posicion: <input type="text" name="posicion" value="<?php echo $resultado['posicion'] ?>" />
		</p>
		<p>
			Horas: <input type="text" name="horas" value="<?php echo $resultado['horas'] ?>" />
		</p>
		<p>
			Minutos: <input type="text" name="minutos" value="<?php echo $resultado['minutos'] ?>" />
		</p>
		<p>
			Segundos: <input type="text" name="segundos" value="<?php echo $resultado['segundos'] ?>" />
		</p>
		<p>
			<input type="submit" value="Editar" />
		</p>
		
	</form>
</html>	
		
			
<?php	
			}
		}
?>