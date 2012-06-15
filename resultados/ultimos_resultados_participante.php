<?php
	
	//incluimos la conexion a la BD
	include '../db_connect.php';
	
	$participante = $_POST['participante'];
	$formato = $_POST['formato'];
	
	$aux = explode("#", $participante);
	$rut = $aux[0];
	$nacionalidad = $aux[1];
	
	//consultamos la tabla
	$sql = "SELECT nombres_participante, ap_paterno, rut, nombre_evento, posicion,  horas, minutos, segundos
			FROM resultados_eventos  
			WHERE rut = '$rut' AND nacionalidad = '$nacionalidad'
			AND fecha_evento > current_date - interval '1 year'
			ORDER BY fecha_evento;";
	//die($sql);
	//creamos un arreglo que almacena cada instancia de producto
	$resultados = array();
	foreach ($db->query($sql) as $resultado)
	{
		$resultados[] = $resultado;
	}
	
	if($formato != "xml") {
?>

<html>
	<head>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<title>
			Resultados
		</title>
	</head>
	
	<body>
	<?php include "../navbar.php"?>
	<div class="container">
		<h1>Encuentra los ultimos resultados de un participante</h1>
		<h1>Lista de los ultimos resultados de :</h1>
		<table class="table">
			<thead>
			<tr>
				<th>Posicion</th>
				<th>Tiempo</th>
				<th>Rut participante</th>
				<th>Fecha evento</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($resultados as $resultado){
				?>
			<tr>
				<td><?php echo $resultado['nombres_participante'] ?></td>
				<td><?php echo $resultado['ap_paterno'] ?></td>
				<td><?php echo $resultado['rut'] ?></td>
				<td><?php echo $resultado['posicion'] ?></td>
				<td><?php echo $resultado['horas']?>:<?php echo $resultado['minutos']?>:<?php echo $resultado['segundos']?></td>
				<td><?php echo $resultado['nombre_evento'] ?></td>
				<td><?php echo $resultado['fecha_evento'] ?></td>				
			</tr>
			<?php } ?>
			</tbody> 
		</table>
		<br />		
		<a href="listar">Volver</a>
	</div>
	<body>	

</html>
<?php 
	} else {
		//aqui va el XML !!
		$elemento = new SimpleXMLElement("<tabla></tabla>");
		foreach($resultados as $resultado) {
			$registro = $elemento->addChild("registro");
			$registro->addChild("nombres_participante",$resultado['nombres_participante']);
			$registro->addChild("ap_paterno",$resultado['ap_paterno']);
			$registro->addChild("rut",$resultado['rut']);
			$registro->addChild("posicion",$resultado['posicion']);
			$registro->addChild("tiempo",$resultado['horas'].':'.$resultado['minutos'].':'.$resultado['segundos']);
			$registro->addChild("nombre_evento",$resultado['nombre_evento']);
			$registro->addChild("fecha_evento",$resultado['fecha_evento']);	
		}
		echo $elemento->asXML();
	}
?>
