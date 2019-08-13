<?php  

	$usuario = $_POST["usuario"];

	$email = $_POST["email"];

	$contrasena	= $_POST["contrasena"];

	$repecontrasena = $_POST["repecontrasena"];

	$idusuario = intval($usuario);

	
	//Abrir la conexión a la base de datos

	require("../conexionbbdd/conexionHuevitosbd.php");

	$conexion = mysqli_connect($db_host, $db_usuario, $db_contrahuevitos);

	if(mysqli_connect_errno()){

		echo "Error al conectar con la base de datos";
		exit();
	}

	mysqli_select_db($conexion, $db_nombre) or die ("No se encontro la base de datos");

	mysqli_set_charset($conexion,"UTF8");

	$sqlInsertar = "INSERT INTO tblclaves(USUARIO, CONTRA, EMAIL) VALUES ('$idusuario', '$contrasena', '$email')";

	mysqli_query($conexion,$sqlInsertar);

	mysqli_close($conexion);

	

	require("registroExitosos.php");


	
?>
