<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Menu Principal</title>

	<link rel="stylesheet" type="text/css" href="estiloscss/resetHuevitos1A.css">
	<link rel="stylesheet" type="text/css" href="estiloscss/estilosMenu.css">

</head>
<body id="fondo">

	<?php 

		session_start();

		if(!isset($_SESSION['usuariologin'])){

			header("location:index.php");
		}


	 ?>
		
		<section class="contenedor">

		<form action="#" method="POST" id="control">
			<input type="button" class="info" value="SISTEMA DE INFORMACION CISOFT1A">
			<input type="submit" value="BUSQUEDA">
			<input type="text" name="nombre" placeholder="BUSCAR" required>	
			<a href="reglasNegocios/cerrarSesion.php"><input type="button" value="CERRAR SESION"></a><label for="">&nbsp;<?php echo "Usuario: " . $_SESSION['usuariologin'];?></label>
		</form>
				
			<br>
			<br>
			<br>
			<input type="button" class="btn" value="PRODUCTOS">
			<img src="imagenes/bolsa.png" class="tamano">
			<br>
			<br>
			<br>
			<input type="button" class="btn" value="PEDIDOS">
			<img src="imagenes/camion.png" class="tamano">
			<br>
			<br>
			<br>
			<input type="button" class="btn" value="VENTAS">
			<img src="imagenes/efectivo.png" class="tamano">
			<br>
			<br>
			<br>
			<input type="button" class="btn" value="MOVIMIENTOS">
			<img src="imagenes/caer.png" class="tamano">
			<br>
			<br>
			<br>
			<input type="button" class="btn" value="REPORTES">
			<img src="imagenes/analisis.png" class="tamano">
			<br>
			<br>
			<br>
			<input type="button" class="btn" value="IMPRIMIR">
			<img src="imagenes/97841.png" class="tamano">
			<br>
			<br>
			<br>
			<input type="button" class="btn" value="ACERCA DE">
			<img src="imagenes/premio.png" class="tamano">
			<br>
		

	
	</section>



</body>
</html>