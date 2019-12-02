<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Creación de Sesión de Usuario.</title>
</head>
<body>

	<?php 

		session_start();

		session_destroy();

		header("locatacion:../index.php");

	 ?>
	
</body>
</html>