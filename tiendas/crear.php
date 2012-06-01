<html>

<!-- Formulario que crea una tienda -->
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<title>Creando Tienda</title>
</head>
	<h1>Crear Tienda</h1>

	<p>Ingrese los datos de la nueva Tienda:<p>

	<form class="well" method='post' action='crear_data.php'>
		<p>Nombre: <input type="text" name="nombre" /></p>
		<p>Calle: <input type="text" name="calle" /></p>
		<p>Ciudad: <input type="text" name="ciudad" /></p>
		<p>Pais:	<input type="text" name="pais" /></p>
		<p><input type="submit" value="Ingresar" /></p>
	</form>

</html>