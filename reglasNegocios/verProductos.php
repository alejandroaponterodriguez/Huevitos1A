<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro de Productos</title>
	<link rel="stylesheet" href="../estiloscss/registroProductos.css">
</head>
<body>

	<?php 
		session_start();

		if (!isset($_SESSION['usuariologin'])) {
			
			header("location:../index.php");


		}

		$usuario = $_SESSION['usuariologin'];

		require("verRegistroProducto.php");
	 ?>

	 <div id="titulos">
	 	<h1>CISOFT1A</h1>
		<h2>Productos Ofrecidos</h2>
		<h3><?php echo "Usuario: " . $usuario; ?></h3>
	 	
	 </div>

	 <table>
		<tr>
	 		<td>N°</td>
	 		<td>Nombre del Producto</td>
	 		<td>Precio</td>
	 		<td>Descripción</td>
	 	</tr>
	 	<?php 

	 		while ($control=$resultado->fetch(PDO::FETCH_ASSOC)) {
	 		
	 		echo "<tr><td>" . $control['ID_PRODUCTO'] . "</td>";
	 		echo "<td>" . $control['NOMBRE_PRODUCTO'] . "</td>";
	 		echo "<td>" . round($control['PRECIO'],3) . "</td>";
	 		echo "<td><textarea name='' id='' cols='40' rows='5' readOnly='readOnly'>" .  $control['DESCRIPCION'] . "</textarea></td></tr>";

	 		}
	 		
	 		$resultado->closeCursor();
	 		$resultado=null;
	 		$conexionn=null;

	 	 ?>
	 	
	 	<tr>
	 		<td colspan="4"><a href="interfazclientes.php"><input type="button" value="Volver"></a></td>
	 	</tr>
	 	
	 </table>
	
</body>
</html>