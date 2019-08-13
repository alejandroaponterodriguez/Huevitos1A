<?php 

	//Utilizando conexión a Objetos
	/********************************/

	

	if(isset($_POST["usuario"]) && $_POST["usuario"]!="" && $_POST["usuario"]!=null ){

			$usuario = $_POST["usuario"];

	}else{

			require("errorDeDatosRegistros.php");
			exit();
	}
	

	if(isset($_POST["email"])){

		$email = $_POST["email"];
	}

	if(isset($_POST["contrasena"])){

		$contrasena = $_POST["contrasena"];
	}

	if(isset($_POST["repecontrasena"])){

		$repecontrasena = $_POST["repecontrasena"];
	}


	require("../conexionbbdd/conexionHuevitosbd.php");
	

	$conexion = new mysqli($db_host, $db_usuario, $db_contrahuevitos, $db_nombre);

	if($conexion->connect_error){

		die("Conexión fallida :" . $conexion->connect_error);

	}


	
	$sqlInsertar = "INSERT INTO tblclaves(USUARIO, CONTRA, EMAIL) VALUES('$usuario', '$contrasena', '$email')";

	if($conexion->query($sqlInsertar)){

		require("registroExitosos.php");

		$conexion->close();

	}else{

		die("Error al insertar datos :" . $conexion->error);
	}
	

	/********************************/


	


 ?>