<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PQR de Clientes</title>

	<!--<link rel="stylesheet" href="../estiloscss/estilosInterfazClientes.css">-->
	<link rel="stylesheet" href="../estiloscss/estilosPqr.css">

	<style>
		
		#menuPqr{

			width:400px;
			margin:40px auto;
			border:1px solid black;
			border-radius: 10px;
			background-image: url("../imagenes/fondoRegistro.jpg");
			background-size: 100%;
		}

		td a{

					
			color:white;
			font-size: 20px;
		}
		td{
			padding: 15px;
			text-align: center;
			color:white;
			font-size: 20px;
		}
		#titulo{

			padding: 10px;
			border:1px solid black;
			border-radius: 10px;
			background-image: url("../imagenes/fondoRegistro.jpg");
			background-size: 100%;
			margin-bottom:5px;
			font-size:20px;
			color:white;
		}


		

	</style>

</head>
<body>

	<?php 

		session_start();

		if(!isset($_SESSION['usuariologin'])){

			header("location:../index.php");
		}


	 ?>



	 <table id="menuPqr" class="tamano">
	 	<caption id="titulo"><h2>P.Q.R</h2></caption>
	 	<tr>
	 		<td colspan="2"><?php echo "Usuario: " . $_SESSION['usuariologin'] ?></td>
	 	</tr>

	 	<tr>
	 		<td><a href="generarPqr.php">Generar PQR</a></td>
	 		<td><a href="visualizarPqr.php">Visualizar PQR Generadas</a></td>
	 	</tr>
	 	<tr>
	 		
	 		<td class="bordes" colspan="2"><a href="interfazclientes.php"><input type="button" value="← Volver" class="btn"></a></td>
	 	</tr>
	 </table>
	
</body>
</html>