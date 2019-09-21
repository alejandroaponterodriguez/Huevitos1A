<?php 

	//Utilizando conexión a Objetos
	/********************************/

	

	$usuario = $_POST["usuario"];

	$email = $_POST["email"];

	$contrasena = $_POST["contrasena"];
	
	$repecontrasena = $_POST["repecontrasena"];
	

			
	require("../conexionbbdd/conexionHuevitosbd.php");
	

	$conexion = new mysqli($db_host, $db_usuario, $db_contrahuevitos, $db_nombre);

	if($conexion->connect_error){

		die("Conexión fallida :" . $conexion->connect_error);

	}


	
	$sqlInsertar = "INSERT INTO tblclaves(USUARIO, CONTRA, EMAIL) VALUES('$usuario', '$contrasena', '$email')";

	if($conexion->query($sqlInsertar)){

		$conexion->close();
		require("registroExitosos.php");

		

	}else{

		die("Error al insertar datos :" . $conexion->error);
		require("errorDeDatosRegistros.php");
				
	}
	

	/********************************/


	


 ?>