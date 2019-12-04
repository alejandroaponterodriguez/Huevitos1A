<?php 

	require("../conexionbbdd/conexionHuevitosbd.php");

	$control;
	$resultadoPro;

	try {

		$conexion= new PDO(DB_HOST,DB_USUARIO,DB_CONTRA);

		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$conexion->exec(DB_CHARACTER);

		$sqlproductos = "SELECT NOMBRE_PRODUCTO FROM tblproducto";

		$resultadoPro = $conexion->prepare($sqlproductos);

		$resultadoPro->execute();

		
	} catch (Exception $e) {
		
		die("Error en la conexion: " . $e->getMessage());

	}
	

 ?>