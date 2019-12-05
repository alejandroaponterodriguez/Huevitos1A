<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>No existe facturas</title>
	<link rel="stylesheet" href="../estiloscss/noRegistro.css">
</head>
<body>

	<?php 

		session_start();

		if (!isset($_SESSION['usuariologin'])) {
			
			header("location:../index.php");
		}


	 ?>

	 <table id="tabla">
	 	<tr>
	 		<td><h1>El cliente no tiene facturas asociadas!!</h1></td>
	 	</tr>
	 	<tr>
	 		<td><a href="interfazclientes.php"><input type="button" value="← Volver" id="volver"></a></td>
	 	</tr>
	 </table>
	
</body>
</html>