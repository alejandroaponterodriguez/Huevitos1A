<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Realizar Pedidos</title>
	<link rel="stylesheet" href="../estiloscss/realizarPedidos.css">
	<script src="../jquery/jquery-3.4.js"></script>
	<!--<script src="controlPedido.js"></script>-->


</head>
<body>
	<?php 

		session_start();

		if (!isset($_SESSION['usuariologin'])) {
			
			header("location:../index.php");
		}

		$usuario=$_SESSION['usuariologin'];

		require("traerProductos.php");
		
	 ?>
	 <div id="titulos">
	 	<h1>CISOFT1A</h1>
		<h2>Orden de Pedidos</h2>
		<h3><?php echo "Usuario: " . $usuario; ?></h3>
	 	
	 </div>
	
	 <form action="controlPedido.php" method="POST" id="forped" name="formularioPedidos">

	 	
		<table id="contenedor">
			<tr>
				<td class="alineacion">Productos:&nbsp;</td>
				<td><input list="listaProductos" name="lista" id="lista" placeholder="Selecciona un producto" class="ancho" required>

				<datalist id="listaProductos">

					<?php 

						while($control=$resultadoPro->fetch(PDO::FETCH_ASSOC)){

							echo "<option value='" . $control['NOMBRE_PRODUCTO'] . "'></option>";

							
						}
						
						$resultadoPro->closeCursor();
						$resultadoProd=null;
						$conexion=null;

					 ?>
					
					
				</datalist>
				</td>
			</tr>
			<tr>
				<td class="alineacion">Cantidad:&nbsp;</td>
				<td><input pattern="[0-9]*" name="cantidad" id="cantidad" placeholder="Cantidad" class="ancho" required minlength="1" maxlength="4" required></td>
			</tr>
			<tr>
				<td class="alineacion">Dirección de Entrega:&nbsp;</td>
				<td><textarea name="direccion" id="direccion" cols="34" rows="5" minlength="1" maxlength="100" required=""></textarea></td>
			</tr>
				
			<tr>
				<td class="alineacion">Forma de Pago:&nbsp;</td>
				<td><input list="formapago" name="formapago" id="formapago" required placeholder="Elige forma de pago" class="ancho"></td>
				<datalist id="formapago">
					<option value="Efectivo"></option>
					<option value="Tarjeta Debito"></option>
					<option value="Tarjeta credito"></option>
				</datalist>
			</tr>
			<tr>
				<td class="alineacion">Tipo de Cliente:&nbsp;</td>
				<td><input list="tipocliente" id="tipocliente" name="tipocliente" required placeholder="Elige el tipo legal." class="ancho"></td>
				<datalist id="tipocliente">
					<option value="Persona Juridica"></option>
					<option value="Persona Natural"></option>
				</datalist>
			</tr>

			<tr>
				<td  colspan="2"><div class="centrar"><input type="submit" name="enviarPedido" id="enviarPedido" value="Generar Pedido" class="sepad tama"><a href="interfazclientes.php"><input type="button" id="volver" value="← Volver" class="sepai tama"></a></div></td>
				
			</tr>
			
		</table>


	 </form>	
</body>
</html>