<html>

<!-- Formulario que crea un evento -->
<head>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<title>Creando un Evento</title>
</head>
<body>
<?php include "../navbar.php"?>
<div class="container">
<h1>Crear Evento</h1>

<p>Ingrese los datos del nuevo evento:


<p>


<form class="well" method='post' action='crear_data.php'>
	<h3>Datos del evento:</h3>
	<p>
		Nombre: <input type="text" name="nombre" />
	</p>
	<p>
		Tipo: <input type="text" name="tipo_de_evento" />
	</p>
	<p>
		Fecha: <input type="text" name="fecha" />
	</p>
	<p>
		Pais: <input type="text" name="pais" />
	</p>
	<p>
		Ciudad: <input type="text" name="ciudad" />
	</p>
	<p>
		Calle: <input type="text" name="calle" />
	</p>
	<h3>Precios por categoria:</h3>
	<p>
		Juvenil: <input type="text" name="precio_juvenil" />
	</p>
	<p>
		Adulto: <input type="text" name="precio_adulto" />
	</p>
	<p>
		Senior: <input type="text" name="precio_senior" />
	</p>
	<p>
		<input type="submit" value="Enviar">
	</p>
</form>
</div>
</body>
</html>


