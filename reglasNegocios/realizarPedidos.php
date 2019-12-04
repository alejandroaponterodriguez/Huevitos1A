<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Realizar Pedidos</title>
</head>
<body>
	<?php 

		session_start();
		if (!isset($_SESSION['usuariologin'])) {
			
			header("location:../index.php");
		}

		$usuario=$_SESSION['usuario'];

		
	 ?>
	
</body>
</html>