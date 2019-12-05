<?php 

	require("../conexionbbdd/conexionHuevitosbd.php");

	try {

		$conexion = new PDO(DB_HOST, DB_USUARIO,DB_CONTRA);
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec(DB_CHARACTER);

		$sqlprod = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, PRECIO, DESCRIPCION FROM tblproducto";

		$resultado = $conexion->prepare($sqlprod);

		$resultado->execute();
		
	} catch (Exception $e) {
		
		die("Error en la conexion: " . $e->getMessage());
	}

 ?>