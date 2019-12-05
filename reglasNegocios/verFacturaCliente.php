<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura de Cliente</title>
	<link rel="stylesheet" href="../estiloscss/traerFactura.css">
</head>
<body>

	<?php 
		session_start();
		if (!isset($_SESSION['usuariologin'])) {
			
			header("location:../index.php");
		}

		$usuario = $_SESSION['usuariologin'];

		require("traerFactura.php");
	 ?>

	 <div id="titulos">
	 	<h1>CISOFT1A</h1>
		<h2>Factura de Cliente</h2>
		<h3><?php echo "Usuario: " . $usuario; ?></h3>
	 	
	 </div>
	<div>
		<table id="datos">
	 		<tr>
	 			<td colspan="4">FACTURA GENERADA</td>
	 			
	 		</tr>
	 		<tr>
	 			<td>Nombres:</td>
	 			<td>Apellidos:</td>
	 			<td colspan="2">Cédula:</td>
	 		</tr>
	 		<tr>
	 			<td colspan="2">Celular:</td>
	 			<td>Número fijo:</td>
	 			<td>PBX:</td>
	 			
	 		</tr>
	 		<tr>
	 			<td colspan="3">E-mail:</td>
	 			<td>Forma de Pago:</td>
	 			
	 		</tr>
	 		<tr>
	 			<td>Tipo:</td>
	 			<td>Hora:</td>
	 			<td>Fecha:</td>
	 			<td>Estado:</td>
	 		</tr>
	 		<tr>
	 			<td colspan="4">Dirección de Entrega:</td>
	 		</tr>
	 	</table>
	 	<table id="datosproductos">
	 		<tr>
	 			<td>CANTIDAD</td>
	 			<td>PRODUCTO</td>
	 			<td>DRESCRIPCIÓN</td>
	 			<td>PRECIO UNITARIO</td>
	 			<td>IVA</td>
	 			<td>PRECIO TOTAL</td>
	 		</tr>
	 		<tr>
	 			<td></td>
	 			<td></td>
	 			<td></td>
	 			<td></td>
	 			<td></td>
	 			<td></td>
	 		</tr>
	 		<tr>
	 			<td colspan="5">TOTAL A PAGAR</td>
	 			<td></td>
	 			
	 		</tr>
	 	</table>
	 	<table id="botones">
	 	<tr>
	 		<td><a href=""><input type="button"></a></td>
	 		<td><a href=""></a><input type="button">← Volver</td>
	 	</tr>
	 	</table>
	</div>
	 
	
</body>
</html>