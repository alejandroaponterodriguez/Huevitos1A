<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Verificación de Usuario</title>
</head>
<body>
	
	<?php 

		

		try {

			$autenticado=false;
			$controlRegistros;

			if(isset($_POST["nickname"]) && isset($_POST["password"])){

				$usuario = htmlentities(addslashes($_POST["nickname"]));
				$clave = htmlentities(addslashes($_POST["password"]));

			}

			
		

		require("../conexionbbdd/conexionHuevitosbd.php");

			$conexion = new PDO(DB_HOST,DB_USUARIO,DB_CONTRA);

			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$conexion->exec(DB_CHARACTER);

			$sqlBuscar = "SELECT USUARIO, CONTRASENNA FROM tblclave WHERE USUARIO=:usu";

			$resultadoBuscar = $conexion->prepare($sqlBuscar);

			$resultadoBuscar->bindValue(":usu",$usuario);

			$resultadoBuscar->execute();

			

			
while($controlRegistros = $resultadoBuscar->fetch(PDO::FETCH_ASSOC)){

						
if(password_verify($clave,$controlRegistros['CONTRASENNA'])){

	

	if ($controlRegistros['USUARIO']==$usuario) {
		
		$autenticado = true;
	}
}
	/*$compro=password_verify($clave,$controlRegistros['CONTRASENNA']);

		echo "El usuario es: " . $controlRegistros['USUARIO'] . "<br><br>";
		echo "La clave es: " . $controlRegistros['CONTRASENNA'] . "<br><br>";

		echo "Imprime si son iguales: " . $compro . "<br><br>";*/
	}

				//echo "valor: " . $autenticado . "<br><br>";			
			

			if($autenticado){

				$resultadoBuscar->closeCursor();
				$conexion=null;

				session_start();

				$_SESSION['usuariologin'] = $usuario;

				//header("location:crearSesion.php?");

				header('location:../Menu.php');

			}else{

				
				$resultadoBuscar->closeCursor();
				$conexion=null;


				header("location:usuarioNoExiste.php");

			}
			
			
		} catch (Exception $e) {

			die("Error en la conexión: " . $e->getMessage());
			
		}




	 ?>



</body>
</html>