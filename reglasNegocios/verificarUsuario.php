<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Verificación de Usuario</title>
</head>
<body>
	
	<?php 

		$nickname = $_POST['nickname'];
		$password = $_POST['password'];

		require("../conexionbbdd/conexionHuevitosbd.php");

		$conexion = new mysqli($db_host,$db_usuario,$db_contrahuevitos,$db_nombre);

		if($conexion->connect_error){

			die("No se puedo conectar la base datos :" . $conenxion->mysqli_error);
		}

		$conexion->set_charset("utf8");

		$consultasql= "SELECT USUARIO, CONTRA FROM tblclaves WHERE USUARIO='$nickname' AND CONTRA='$password'";

		if($resultado = $conexion->query($consultasql)){

			$filas = $resultado->fetch_assoc();

			

			if($filas['USUARIO']==$nickname && $filas['CONTRA']==$password){

				$conexion->close();

				require("../Menu.php");

			}else{

				$conexion->close();

				require("usuarioNoExiste.php");
			}
			

			

		}

		

		

	 ?>



</body>
</html>