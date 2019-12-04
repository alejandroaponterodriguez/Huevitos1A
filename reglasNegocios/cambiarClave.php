<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cambiar Contraseña Cliente</title>

	<link rel="stylesheet" href="../estiloscss/estilosCambioContra.css">

	<script src="accesoCambioClave.js"></script>


</head>
<body>
	<?php 
		session_start();

		if (!isset($_SESSION['usuariologin'])) {
			
			header("location:../index.php");
		}
	 ?>

	 <form action="actualizarClave.php" name="formularioClaves" method="POST">

		<h1>CISOFT1A</h1>
		<h2>Cambio de Contraseña de Clientes</h2>
		
		<table>
				<tr>
					<td><label for="">Contraseña Antigua:&nbsp;</label></td>
					<td><input name="contraanti" type="password" id="contraanti" placeholder="Ingresa Password Antiguo"  minlength="8" maxlength="50" required ></td>
				</tr>
			 	<tr>
		            <td>
		                <label>Contraseña Nueva:&nbsp;</label>
		            </td>
		            
		            <td>
		                <input name="contranue" type="password" id="contraenue" placeholder="Ingresa Password Nuevo"  minlength="8" maxlength="50" required >
		            </td>
		            
		        </tr>

		        <tr>
		            <td>
		                <label>Repetir Contraseña Nueva:&nbsp;</label>
		            </td>
		            <td>
		                <input name="repecontranue" type="password" id="repecontranue" placeholder="Repetir Password Nuevo" minlength="8" maxlength="50" required>
		            </td>
		            
		        </tr>

		        <tr>
		        	<td><a href="actualizarcontrasenna.php"><input type="submit" id="clave" name="clave" value="Actualizar Contraseña" class="btncontrol"></a>
					</td>
					<td>
						<a href="interfazclientes.php"><button type="button" name="volver" class="btncontrol">Volver</button></a>
					</td>
		        </tr>

			 	
				</table>


	 </form>
	
</body>
</html>