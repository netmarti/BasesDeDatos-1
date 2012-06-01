<?php
	
	//Verificamos que exista un id como parametro
	if (!isset($_GET['modelo']) || !isset($_GET['pais']) ||
	    !isset($_GET['ciudad']) || !isset($_GET['calle'])) {
		echo "No ha especificado una oferta";
	}
		else {
			//incluimos la conexion a la base de datos
			include '../db_connect.php';
			
			//Obtenemos la llave y generamos la consulta
			$modelo = $_GET['modelo'];
			
			$pais = $_GET['pais'];
			$ciudad = $_GET['ciudad'];
			$calle = $_GET['calle'];
			
			$sql = "SELECT * FROM ofrece WHERE modelo = '$modelo' AND pais = '$pais' AND 
											ciudad = '$ciudad' AND calle = '$calle'";
			
			//Extraemos los datos 
			foreach($db->query($sql) as $row){
				
				$oferta = $row;
			}
			
			//Nos desconectamos de la BD
			$db = null;
			
			//Si no hay un oferta lo informamos
			if(!isset($oferta)){
				
				echo "No existe esa oferta";

			} else{
			
			?>
			
<!-- Formulario que edita una oferta -->
		
<html>
	<head>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<title>Editando una oferta</title>
	</head>
	<?php include "../navbar.php"?>
	<div class="container">
	<h1>Editar Oferta</h1>
	<p>Indique los nuevos datos de la oferta:</p>
	
	<form class="well" method="post" action="editar_data.php">
		<input type="hidden" name="modelo" value="<?php echo $modelo ?>" />
		<input type="hidden" name="pais" value="<?php echo $pais ?>" />
		<input type="hidden" name="ciudad" value="<?php echo $ciudad ?>" />
		<input type="hidden" name="calle" value="<?php echo $calle ?>" />
		
		<p>
			Stock: <input type="text" name="stock" value="<?php echo $oferta['stock'] ?>" />
		</p>
		<p>
			Precio: <input type="text" name="precio" value="<?php echo $oferta['precio'] ?>" />
		</p>
		
		<p>
			<input type="submit" value="Editar" />
		</p>
		
	</form>
	<div class="container">
</html>	
		
			
<?php	
			}
		}
?>