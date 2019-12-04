<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Actualización de Contraseña Correcta.</title>
	<style>
		
		h1,h2{
			
			width: 300px;
			border:1px solid white;
			margin:20px auto;
			border-radius: 10px;
			color:#6663F3;
			
		}
		h2{
			color:#6663F3;
		}

		table{

			width: 400px;
			height: 250px;
			margin: 30px auto;
			border:1px solid black;
			border-radius: 10px;
			background-image: url("../imagenes/fondoRegistro.jpg");
			background-size: 100%;
		}

		td{
			text-align: center;
			padding: 5px;
		}

		input{

			font-size: 16px;
			width: 100px;
		}
	</style>
</head>
<body>
	<?php 

		session_start();

		if(!isset($_SESSION['usuariologin'])){

			header("location:../index.php");
		}

		echo "<table><tr><td>";
		echo "<h1>CISOFT1A</h1><h2>No se puedo actualizar la contraseña</h2></td></tr><tr><td>";
		echo "<a href='interfazclientes.php'><input type='button' value='Volver'></a></td></tr>";
		echo "</table>";

	 ?>
</body>
</html>