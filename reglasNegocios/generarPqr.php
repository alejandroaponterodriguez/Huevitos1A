<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Generar PQR.</title>

	<style>

		#contenidoPqr{

			width: 700px;
			margin:10px auto;
			border:1px solid white;
			border-radius: 10px;

		}
		textarea{
			resize: none;
			overflow: scroll;
			text-align: justify;
		}
		td{
			
			text-align: center;
			color:white;
			font-size: 20px;
			padding: 5px;
			
		}
		#titulopqr{

			font-size: 20px;
			width: 740px;
					
			margin: 5px auto;
			text-align: center;
			border:1px solid white;
			border-radius: 10px;
			
			
		}
		h2{
			
				
			border-radius:10px;
			color:white;
			margin-top: 5px;
			

		}
		p{
			margin-top: 2px;
			color:white;
		}

		form{

			border:1px solid black;
			width:800px;
			margin:auto;
			border-radius: 10px;
			background-image: url("../imagenes/fondoRegistro2.jpg");
			background-size: 100%;
		}
		#asunto{
			
			height: 20px;
			border:1px solid orange;
			width: 500px;
			
		}
		#asuntopqr{
			text-align: right;
		}
		#btnasunto{
			text-align:left;
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

	 <form action="controlGenerarPqr.php" method="POST">

	 	<div id="titulopqr">
	 		<h2>Redactar P.Q.R</h2>
	 		<p>Usuario:<?php echo $_SESSION['usuariologin']; ?></p>
	 	</div>


	 <table id="contenidoPqr">
	 	
	 	<tr>
	 		
	 		<td id="asuntopqr">Asunto:</td>

	 		<td id="btnasunto" colspan="2"><input id="asunto" type="text" maxlength="500" name="asunto"></td>
	 	</tr>
	 	<tr>
	 		<td colspan="3">Redacte la P.Q.R. de forma clara: Tiene un maximo de 5000 caracteres</td>
	 	</tr>
		<tr>
			<td colspan="3"> 
				<textarea name="comentarios" id="" cols="100" rows="25" id="comentarios"></textarea>
			</td>
		</tr>
		<tr>
			<td><a href="pqr.php"><input type="button" value="Volver a ménu P.Q.R."></a></td>
			<td><a href="interfazClientes.php"><input type="button" value="Volver a ménu Principal"></a></td>
			<td><input type="submit" value="Generar"></td>
		</tr>

	 </table>

	 </form>
</body>
</html>