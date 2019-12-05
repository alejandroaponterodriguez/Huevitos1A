<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro de Productos</title>
	<link rel="stylesheet" href="../estiloscss/verProductos.css">
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

	 <table id="contenedor">
		<tr>
	 		<td class="relleno">N°</td>
	 		<td class="relleno">NOMBRE DEL PRODUCTO</td>
	 		<td class="relleno">PRECIO</td>
	 		<td class="relleno">DESCRIPCIÓN</td>
	 	</tr>
	 	<?php 

	 		while ($control=$resultado->fetch(PDO::FETCH_ASSOC)) {
	 		
	 		echo "<tr><td>" . $control['ID_PRODUCTO'] . "</td>";
	 		echo "<td>" . $control['NOMBRE_PRODUCTO'] . "</td>";
	 		echo "<td>$" . round($control['PRECIO'],3) . "</td>";
	 		echo "<td id='descripcion'>" .  $control['DESCRIPCION'] . "</td></tr>";

	 		}
	 		
	 		$resultado->closeCursor();
	 		$resultado=null;
	 		$conexionn=null;

	 	 ?>
	 	
	 	<tr>
	 		<td colspan="4"><a href="interfazclientes.php"><input type="button" value="← Volver" id="volver"></a></td>
	 	</tr>
	 	
	 </table>
	
</body>
</html>