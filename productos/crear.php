<html>

<!-- Formulario que crea un producto -->
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<title>Creando producto</title>
</head>
<body>
<?php include "../navbar.php"?>
<div class="container">
	<h1>Crear Producto</h1>

	<p>Ingrese los datos del nuevo producto:<p>

	<form class="well" method='post' action='crear_data.php'>
		<p>Descripcion:	<input type="text" name="descripcion" /></p>
		<p>Nombre: <input type="text" name="nombre" /></p>
		<p>Modelo: <input type="text" name="modelo" /></p>
		<p><input type="submit" value="Ingresar" /></p>
	</form>
	</div>
</body>
</html>
