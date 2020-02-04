<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Visualización de PQR</title>
	<style>
		
		#pqrVisualizacion{

			width: 1000px;
			margin: 40px auto;
			border:1px solid black;
			border-radius: 10px;
		}
		form{
			width: 1100px;
			margin:20px auto; 
			border:1px solid black;
			border-radius: 10px;
			background-image: url("../imagenes/fondoRegistro2.jpg");
			background-size: 100%;

		}
		td{
			text-align: justify;
			padding: 5px;
			border:1px solid white;
			color:white;


		}
		#titulopqr{

			text-align: center;
			font-size: 20px;
			color:white;
		}
		.centrarpqr{

			text-align: center;
		}

		#contador{

			font-size: 20px;
		}

	</style>
</head>
<body>

	<?php 

		 

		session_start();

		if(!isset($_SESSION['usuariologin'])){

			header("location:../index.php");
		}

		try{

			$numeroFilas;
			$desde;
			$pagina;
			$numPaginas;



			$conexion = new PDO("mysql:host=localhost;dbname=cisoft1a","root","");
			$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$conexion->exec("SET CHARACTER SET UTF8");

			$sqlcontrol = "SELECT * FROM tblpqr";

			$controlFilas = $conexion->prepare($sqlcontrol);

			$controlFilas->execute();

			$numeroFilas = $controlFilas->rowCount();

			$pagina=2;

			$rangoPaginas = ceil($numeroFilas/$pagina);

			if(isset($_GET['pagina'])){

				if($_GET['pagina']==1){

					header("location:visualizarPqr.php");
				}else{

					$numPaginas=intval($_GET['pagina']);
				}


			}else{

				$numPaginas=1;
			}

			$desde = ($numPaginas-1)*$pagina;

			$sqlPaginacion = "SELECT * FROM tblpqr ORDER BY FECHA DESC LIMIT $desde,$pagina";

			$visualizacion = $conexion->prepare($sqlPaginacion);

			$visualizacion->execute();

			 {


				
			}



		}catch(Exception $e){

			die("Error: " . $e->getMessage() . " " . $e->getLine());
		}
	 

	 ?>

	 <form action="$_SERVER['PHP_SELF']" method="GET">

	 	<table id="pqrVisualizacion">
	 		<tr >
	 			<td id="titulopqr"><?php echo "Usuario: " . $_SESSION['usuariologin']; ?></td>
	 			<td colspan="4" id="titulopqr">P.Q.R. GENERADAS</td>
	 			<td><img src="../imagenes/huevitos1A.jpg" alt=""></td>
	 		</tr>
	 		
	 		<tr>
	 			
	 			<td class="centrarpqr">FECHA</td>
	 			<td class="centrarpqr">ASUNTO</td>
	 			<td class="centrarpqr">ORIGEN</td>
	 			<td class="centrarpqr">DESCRIPCION</td>
	 			<td class="centrarpqr">ESTADO</td>
	 			<td class="centrarpqr">HORA</td>
	 		</tr>
	 	
	 	
		<?php while ($controlPaginacion = $visualizacion->fetch(PDO::FETCH_ASSOC)): ?>

		
				<tr>
					<td><?php echo $controlPaginacion['FECHA']; ?></td>
					<td><?php echo $controlPaginacion['ASUNTO']; ?></td>
					<td><?php echo $controlPaginacion['ORIGEN']; ?></td>
					<td><?php echo $controlPaginacion['DESCRIPCION']; ?></td>
					<td><?php echo $controlPaginacion['ESTADO']; ?></td>
					<td><?php echo $controlPaginacion['HORA']; ?></td>

				</tr>
			
			



		<?php endwhile; ?>

			
				<tr>
					<td colspan="6" class="centrarpqr">
						<?php 

							echo "Páginas: ";

						for($i=1; $i<=$rangoPaginas; $i++){

								echo "<a href='?pagina=" . $i . "' id='contador'>" . $i .  "</a> ";
							}

						 ?>
					</td>
				</tr>
				<tr>
					<td colspan="3" class="centrarpqr"><a href="pqr.php"><input type="button" value="←Volver"></a></td>
					<td colspan="3" class="centrarpqr"><a href="interfazclientes.php"><input type="button" value="Menu Principal"></a></td>
				</tr>
			</table>

		<?php 
			$visualizacion->closeCursor();
		 ?>

	 </form>
	
</body>
</html>