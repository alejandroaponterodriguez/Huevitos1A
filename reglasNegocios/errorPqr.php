<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Error P.Q.R.</title>
	<style>
	#pqringreso{

			width: 400px;
			margin:20px auto;
			border:1px solid black;
			background-image: url("../imagenes/fondoRegistro2.jpg");
			background-size: 100%;
			color:white;
			text-align: center;	
			border-radius: 10px;

		}
		h2{
			color:white;
			text-align: center;
		}
		#volver{

			padding: 10px;
			width: 100px;
		}
		a{

			padding: 10px;
			margin-bottom: 10px;
		}

	</style>
</head>
<body>
	<?php 

				echo "<div id='pqringreso'>";
				echo "<h2>Error al Ingresar P.Q.R.</h2>";
				echo "<a href='generarPqr.php' ><input type='button' value='←Volver' id='volver' /></a>";
				echo "<p></p>";
				echo "</div>";

	 ?>
</body>
</html>