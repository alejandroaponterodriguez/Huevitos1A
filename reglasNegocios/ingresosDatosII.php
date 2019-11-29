<?php 

	

	//VAriables de login para usuarios********

	$usuario = $_POST["usuario"];

	$email = $_POST["email"];

	$contrasena = $_POST["contrasena"];
	
	$repecontrasena = $_POST["repecontrasena"];

	//Variables de datos personales***********

	$nombres = $_POST["nombres"];

	$apellidos = $_POST["apellidos"];

	$cedula = $_POST["cedula"];

	$direccion = $_POST["direccion"];

	$cargo = $_POST["cargo"];

	$telefono = $_POST["telefono"];

	$departamento = $_POST["departamento"];

	$sexo = $_POST["sexo"];

	//****************************************
	

			
	require("../conexionbbdd/conexionHuevitosbd.php");
	

	$conexion = new mysqli($db_host, $db_usuario, $db_contrahuevitos, $db_nombre);

	if($conexion->connect_error){

		die("Conexión fallida :" . $conexion->connect_error);

	}


	
	$sqlInsertar = "INSERT INTO tblclaves(USUARIO, CONTRA, EMAIL) VALUES('$usuario', '$contrasena', '$email')";

	$sqlInsertarDatos = "INSERT INTO tblcliente(CliNombre, CliApellido, CliDireccion, CliCargo, CliTelefono, CliDepartamento, CliSexo) VALUES('$nombres','$apellidos','$direccion','$cargo','$telefono','$departamento', '$sexo')";

	if($conexion->query($sqlInsertarDatos) && $conexion->query($sqlInsertar)){

		$conexion->close();
		require("registroExitosos.php");

		

	}else{

		die("Error al insertar datos :" . $conexion->error);
		require("errorDeDatosRegistros.php");
				
	}
	

	/********************************/


	


 ?>