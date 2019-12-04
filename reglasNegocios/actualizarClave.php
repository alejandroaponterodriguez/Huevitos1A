<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cambiar Clave de Usuario</title>
</head>
<body>
	<?php 

		session_start();

		if(!isset($_SESSION['usuariologin'])){

			header("location:../index.php");
		}

		$contranue;
		$contraanti;
		$usuario;

		if (isset($_POST['contraanti']) && isset($_POST['contranue'])) {

			$contraanti =htmlentities(addslashes($_POST['contraanti']));

			$contranue =htmlentities(addslashes($_POST['contranue']));

			$usuario = $_SESSION['usuariologin'];
			
		}


		try {
			
		} catch (Exception $e) {
			
			die("Error en la conexion: " $e->getMassge());
		}

	 ?>
	
</body>
</html>