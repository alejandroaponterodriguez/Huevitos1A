<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cambiar Clave de Usuario</title>
</head>
<body>
	<?php 

		


		try {

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

			require("../conexionbbdd/conexionHuevitosbd.php");

			$conexion = new PDO(DB_HOST,DB_USUARIO,DB_CONTRA);

			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$conexion->exec(DB_CHARACTER);

			$sqlverificar = "SELECT USUARIO, CONTRASENNA FROM tblclave WHERE USUARIO=:usuar";

			$resultadoVerificar = $conexion->prepare($sqlverificar);

			$resultadoVerificar->bindValue(":usuar",$usuario);

			$resultadoVerificar->execute();



			$controlregistro = $resultadoVerificar->fetch(PDO::FETCH_ASSOC);

				if(password_verify($contraanti, $controlregistro['CONTRASENNA'])){

					$nuevapassword = password_hash($contranue, PASSWORD_DEFAULT);

					$sqlcambio = "UPDATE tblclave SET CONTRASENNA=:clavenueva WHERE USUARIO=:usuar";

					$resultadoCambio = $conexion->prepare($sqlcambio);

					$resultadoCambio->bindValue(":clavenueva",$nuevapassword);
					$resultadoCambio->bindValue(":usuar",$usuario);

					$resultadoCambio->execute();

					$controlCambio =$resultadoCambio->rowCount();

					if ($controlCambio!=0) {
						
						$resultadoVerificar->closeCursor();
						$resultadoCambio->closeCursor();

						$resultadoVerificar=null;
						$resultadoCambio=null;

						$conexion=null;

						header("location:actualizacionOkClave.php");


					}else{

						$resultadoVerificar->closeCursor();
						$resultadoCambio->closeCursor();

						$resultadoVerificar=null;
						$resultadoCambio=null;

						$conexion=null;

						header("location:noActualizacionContra.php");

					}



				}
				
			
		
		} catch (Exception $e) {
			
			die("Error en la conexion: " . $e->getMessage());
		}

	 ?>
	
</body>
</html>