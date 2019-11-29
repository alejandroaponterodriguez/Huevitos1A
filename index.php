<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio de Sesión</title>
	
	<link rel="stylesheet" type="text/css" href="resetHuevitos1A.css">
	<link rel="stylesheet" type="text/css" href="estiloscss/estilosCssHuevitos1A.css">
	<script src="reglasNegocios/acceso.js"></script>

		
</head>
<body id="general">
	<header id="titulos">
		<h1>Huevitos 1A CISoft1A</h1>
		<h2>Bienvenidos</h2>
	</header>
	
	<section id="contenedor">

		<article id="principal">
			
		
			<figure id="ima1">
				<img src="imagenes/huevitos1A.jpg" alt="Huevitos1A" id="imagen1">	
			</figure>
			<form action="reglasNegocios/verificarUsuario.php" method="Post" name="formularioPrincipal">
				<table id="formulario">
					
				
				<tr>
					<td class="espacio">
						<input type="text" name="nickname" id="nickname" placeholder="usuario" autofocus="true" class="tamanno" pattern="[A-Za-z0-9]+">&nbsp;<img src="imagenes/imagenUsuarios.jpg" id="imagenNick" >
					</td>
					
				</tr>
				<tr>
					<td class="espacio">
						<input type="password" name="password" id="password" placeholder="password" class="tamanno" minlength="8" maxlength="20" required>&nbsp;<img src="imagenes/imagenPasswordNo.png" id="imagenPasswordNo" >
					</td>
				</tr>
					
				<tr>
					<td class="espacio">
						<a href="registroUsuarios.php">Registrarse</a>
						<br>
						<a href="recuperarContrasenna.php">Olvido su Contraseña</a>
						<br>
						<a href="#">Privacy Policy</a>
					</td>
				</tr>

				</table>
			
				<input type="submit" name="acceder" id="acceder" value="Acceder">
			</form>

			</article>
			
		<article id="secundario">

			<figure id="ima2">

				<img src="imagenes/huevitos1Aproductos.jpg" alt="Huevitos1A productos" id="imagen2">

			</figure>

		</article>
					
	</section>

	

	<footer id="pie">
		<blockquote>
		<label>Derechos Reservados-2019</label>
			<br>
		<label>Copyright© 2019 CISOFT1A, L.L.C.</label>
			<br>
		<label>Credits: Deiber Hernandez - Alejandro Aponte - Jonier Velasquez</label>
		</blockquote>
	</footer>

</body>
</html>