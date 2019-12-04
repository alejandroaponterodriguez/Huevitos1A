<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Resultado de Pedido</title>
</head>
<body>
	<?php 

		session_start();

		if (!isset($_SESSION['usuariologin'])) {
			
			header("location:../index.php");
		}


	 ?>

	 <table>
	 	<tr>
	 		<h1>Pedido Generado Exitosamente!!</h1>
	 	</tr>
	 	<tr>
	 		<a href="interfazclientes.php"><input type="button" value="Volver"></a>
	 	</tr>
	 </table>
	
</body>
</html>