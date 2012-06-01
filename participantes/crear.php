<html>

<!-- Formulario que crea un participante -->
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<title>Creando un Participante</title>
</head>
<?php include "../navbar.php"?>
<div class="container">
<h1>Crear Participante</h1>

<p>Ingrese los datos del nuevo participante:


<p>


<form class="well" method='post' action='crear_data.php'>
	<h3>Datos personales:</h3>
	<p>
		Nombres: <input type="text" name="nombres" />
	</p>
	<p>
		Apellido Paterno: <input type="text" name="ap_paterno" />
	</p>
	<p>
		Apellido Materno: <input type="text" name="ap_materno" />
	</p>
	<p>
		RUT: <input type="text" name="rut" />
	</p>
	<p>
		Nacionalidad: <input type="text" name="nacionalidad" />
	</p>
	<p>
		Fecha de Nacimiento: <input type="text" name="fecha_nacimiento" />
	</p>
	<p>
		Genero: <input type="text" name="genero" />
	</p>
	<p>
		Telefono: <input type="text" name="telefono" />
	</p>
	
	<h3>Direccion:</h3>
	<p>
		Codigo postal: <input type="text" name="codigo_postal" />
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
	<h3>Contacto:</h3>
	<p>
		Email: <input type="text" name="email" />
	</p>
	<p>
		<input type="submit" value="Enviar">
	</p>
</form>
</div>
</html>