<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<title>Creando Auspiciador</title>
</head>
<?php include "../navbar.php"?>
<body>
<div class="container">
<!-- Formulario que crea un auspiciador -->
	<h1>Crear Auspiciador</h1>

	<p>Ingrese los datos del nuevo Auspiciador:<p>

	<form class="well" method='post' action='crear_data.php'>
		<p>Nombre: <input type="text" name="nombre" /></p>
		<p>Descripcion:	<input type="text" name="descripcion" /></p>
		<p><input type="submit" value="Ingresar" /></p>
	</form>
</div>
</body>
</html>