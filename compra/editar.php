<?php
	
	//Verificamos que exista un id como parametro
	if (!isset($_GET['rut']) || !isset($_GET['nacionalidad']) ||
	    !isset($_GET['modelo']) || !isset($_GET['pais']) || !isset($_GET['ciudad'])
		|| !isset($_GET['calle']) || !isset($_GET['fecha_compra'])) {
		echo "No ha especificado una compra";
	}
		else {
			//incluimos la conexion a la base de datos
			include '../db_connect.php';
			
			//Obtenemos los datos y generamos la consulta
			$nacionalidad = $_GET['nacionalidad'];
			$rut = $_GET['rut'];
			
			$modelo = $_GET['modelo'];
			
			$pais = $_GET['pais'];
			$ciudad = $_GET['ciudad'];
			$calle = $_GET['calle'];
			
			$fecha = $_GET['fecha_compra'];
			
			$sql = "SELECT * FROM compra WHERE rut = '$rut' AND nacionalidad = '$nacionalidad' AND modelo = '$modelo' AND 
											pais = '$pais' AND ciudad = '$ciudad' AND calle = '$calle' AND fecha_compra = '$fecha';";
			
			//die($sql);
			//Extraemos los datos 
			foreach($db->query($sql) as $row){
				
				$compra = $row;
			}
			
			//Nos desconectamos de la BD
			$db = null;
			
			//Si no hay una compra lo informamos
			if(!isset($compra)){
				
				echo "No existe esa compra";

			} else{
			
			?>
			
<!-- Formulario que edita una compra -->
		
<html>
	<head>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<title>Editando compras</title>
	</head>
	
	<h1>Editar Compra</h1>
	<p>Indique los nuevos datos de la compra:</p>
	
	<form class="well" method="post" action="editar_data.php">
		<p>
			Comprador: <?php echo $rut?> <?php echo $nacionalidad?>
			<input type="hidden" name="rut" value="<?php echo $rut ?>" />
			<input type="hidden" name="nacionalidad" value="<?php echo $nacionalidad?>" />
		</p>
		<p>
			Modelo Producto: <?php echo $modelo?>
			<input type="hidden" name="modelo" value="<?php echo $modelo ?>" />
		</p>
		<p>
			Tienda: <?php echo $pais?> / <?php echo $ciudad?> / <?php echo $calle?> 
			<input type="hidden" name="pais" value="<?php echo $pais ?>" />
			<input type="hidden" name="ciudad" value="<?php echo $ciudad ?>" />
			<input type="hidden" name="calle" value="<?php echo $calle ?>" />
		</p>
		<p>
			Fecha: <?php echo $fecha?>
			<input type="hidden" name="fecha_compra" value="<?php echo $fecha ?>" />
		</p>
		<p>
			Cantidad: <input type="text" name="cantidad" value="<?php echo $compra['cantidad'] ?>" />
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