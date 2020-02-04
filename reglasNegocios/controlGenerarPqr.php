<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Control de PQR</title>

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

		
		session_start();

		if(!isset($_SESSION['usuariologin'])){

			header("location:../index.php");
		}

		$asunto;
		$comentarios;
		$usuario;
		$id;

		if(isset($_POST['asunto']) && isset($_POST['comentarios'])){

			$asunto = htmlentities(addslashes($_POST['asunto']),ENT_QUOTES);
			$comentarios = htmlentities(addslashes($_POST['comentarios']),ENT_QUOTES);
			$usuario=$_SESSION['usuariologin'];

		}

		try {

			$conexion = new PDO("mysql:host=localhost;dbname=cisoft1a","root","");
			$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$conexion->exec("SET CHARACTER SET UTF8");

			$sqlIdUsuario = "SELECT ID_USUARIO FROM tblclave WHERE USUARIO=:usu";

			$resultado = $conexion->prepare($sqlIdUsuario);

			$resultado->bindValue(":usu",$usuario);

			$resultado->execute();

			$resulId = $resultado->fetch(PDO::FETCH_ASSOC);

			$id = $resulId['ID_USUARIO'];

			date_default_timezone_set('America/Bogota');
			

			$fecha = date("Y-m-d");
			$hora = date("H:i:s");

			$origen = "Internet";
			$estado = "En tramite";

			$sqlPQR = "INSERT INTO tblpqr (ID_CLIENTE,FECHA,ASUNTO,ORIGEN,DESCRIPCION,ESTADO,HORA) VALUES(:id,:fec,:asu,:ori,:des,:esta,:hor)";

			$IngresaPqr = $conexion->prepare($sqlPQR);

			$IngresaPqr->bindValue(":id",$id);
			$IngresaPqr->bindValue(":fec",$fecha);
			$IngresaPqr->bindValue(":asu",$asunto);
			$IngresaPqr->bindValue(":ori",$origen);
			$IngresaPqr->bindValue(":des",$comentarios);
			$IngresaPqr->bindValue(":esta",$estado);
			$IngresaPqr->bindValue(":hor",$hora);

			$IngresaPqr->execute();

			if(($resultadoPqr = $IngresaPqr->rowCount())>0){

				echo "<div id='pqringreso'>";
				echo "<h2>Registro de P.Q.R. exitoso!</h2>";
				echo "<a href='generarPqr.php' ><input type='button' value='←Volver' id='volver' /></a>";
				echo "<p></p>";
				echo "</div>";


			}else{

				header("location:errorPqr.php");
			}



			
		} catch (Exception $e) {
			
			die("Error: " . $e->getMessage() . " " . $e->getLine());
		}
	

 	?>
</body>
</html>
