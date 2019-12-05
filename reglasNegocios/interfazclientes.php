<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interfaz Clientes</title>

	<link rel="stylesheet" href="../estiloscss/estilosInterfazClientes.css">


</head>
<body>

	<?php 

		session_start();

		if(!isset($_SESSION['usuariologin'])){

			header("location:../index.php");
		}


	 ?>

	 <header id="titulo">

	 		<h2 id="titulomenu">Menu de Usuarios</h2>
			
	 </header>
	
	<section id="contenedor">
		
		<nav id="menuprincipal" class="control">

			<table id="controlmenu">
				
				<tr>
					<td>
						<div class="menu">
							<a href="actualizarcuenta.php" class="letras">Actualizar Datos personales</a>
						</div>
					</td>

					<td>
						<div class="menu">
						<div>
							<a href="cerrarSesion.php" class="letras">Cerrar Sessión</a></div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="menu">
							<a href="cambiarclave.php" class="letras">Configuración de Seguridad</a>
						</div>
					</td>

					<td>
						<div class="menu"><label for="" class="letras">Usuario:&nbsp;</label><strong class="letras"><?php echo $_SESSION['usuariologin'];?></strong></div>
					</td>
				</tr>
			</table>

			
		</nav>

		<aside id="menusecundario" class="control">
			
			<div id="contenedorbtn">
				
			
			<div class="botones">
				<a href="realizarPedidos.php"><input type="button" name="realizarpedidos" id="realizarpedidos" value="Realizar Pedidos"></a>
			</div>

			<div class="botones">
				<a href="verProductos.php"><input type="button" name="productos" id="productos" value="Ver productos"></a>
			</div>

			<div class="botones">
				<a href="verFacturaCliente.php"><input type="button" name="verfacturas" id="verfacturas" value="Facturas"></a>
			</div>

			<div class="botones" id="contbtnpbx">
				<a href="pqr.php"><input type="button" name="" id="btnpqr" value="PQR"></a>
			</div>

			</div>

			
		</aside>

		<article>

			
		</article>
		


	</section>



</body>
</html>