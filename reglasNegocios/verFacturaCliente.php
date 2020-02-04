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

		require("traerFacturas.php");
	 ?>

	 <div id="titulos">
	 	<h1>CISOFT1A</h1>
		<h2>Factura de Cliente</h2>
		<h3><?php echo "Usuario: " . $usuario; ?></h3>
	 	
	 </div>
	<div id="tablas">

		<?php 

			$contador=0;
			$iva ="19%";
			$ivavalor=0.19;

			while ($controlcliente = $resultadocliente->fetch(PDO::FETCH_ASSOC)) {

			$nombres = $controlcliente['NOMBRES'];
			$apellidos = $controlcliente['APELLIDOS'];
			$cedula =$controlcliente['CEDULA'];

			$tipo = $controlcliente['TIPO'];
			$precio_total = $controlcliente['PRECIO_TOTAL'];
			$hora = $controlcliente['HORA'];
			$fecha = $controlcliente['FECHA'];
			$cant_fac = $controlcliente['CANTIDAD_FACTURA'];
			$for_pag = $controlcliente['FORMA_PAGO'];
			$est_fac = $controlcliente['ESTADO_FACTURA'];
			$dir_ent = $controlcliente['DIRECCION_ENTREGA'];
			$nom_pro = $controlcliente['NOMBRE_PRODUCTO'];


			$num_cel = $controlcliente['NUMERO_CELULAR'];
			$num_fij = $controlcliente['NUMERO_FIJO'];
			$pbx = $controlcliente['PBX'];

			$email = $controlcliente['EMAIL'];

			#**********************************
			$sqlproducto ="SELECT DESCRIPCION, PRECIO FROM tblproducto WHERE NOMBRE_PRODUCTO=:nomp";

			$resultadoproducto = $conexion->prepare($sqlproducto);

			$resultadoproducto->bindValue(":nomp",$nom_pro);

			$resultadoproducto->execute();

			$descripcion_pro = $resultadoproducto->fetch(PDO::FETCH_ASSOC);

			$des_nom = $descripcion_pro['DESCRIPCION'];

			$pre_uni = round($descripcion_pro['PRECIO'],3);

			$contador++;

					
		 
		echo "<table id='datos' class='tamano'>

			<tr>
	 			<td colspan='4' id='centrar'>

					<p><h3>Huevitos 1A</h3></p>
					<p>Nit: XXXXXXX-X</p>
					<p>Dirección: Municipio de Caldas Antioquia Telefono: 057 XXXXXX</p>

	 			</td>
	 			<td colspan='2' id='centrar'><img src='../imagenes/huevitos1A.jpg' width='130px'></td>
	 		</tr>

	 		<tr>
	 			<td colspan='6' id='centrar'>FACTURA GENERADA N° " . $contador . " </td>
	 			
	 		</tr>
	 		<tr>
	 			<td colspan='3'>Nombres: " . $nombres . "</td>
	 			
	 			<td colspan='3'>Apellidos: " . $apellidos . "</td>
	 				 			
	 		</tr>
	 		<tr>
	 			<td colspan='3'>Cédula: " . $cedula . "</td>
	 			<td colspan='3'>Tipo :" . $tipo . "</td>
	 		</tr>
	 		<tr>
	 			<td colspan='2'>Celular: " . $num_cel . "</td>
	 			<td colspan='2'>Número fijo: " . $num_fij . "</td>
	 			<td colspan='2'>PBX: " . $pbx . "</td>
	 			
	 		</tr>
	 		<tr>
	 			<td colspan='4'>E-mail :" . $email . "</td>
	 			<td colspan='2'>Forma de Pago :" . $for_pag . "</td>
	 			
	 		</tr>
	 		<tr>
	 			
	 			<td colspan='2'>Hora: " . $hora . " </td>
	 			<td >Fecha: " . $fecha . " </td>
	 			<td colspan='3'>Estado: " . $est_fac . " </td>
	 		</tr>
	 		<tr>
	 			<td colspan='6'>Dirección de Entrega: " . $dir_ent . " </td>
	 		</tr>
	 	

	 		<tr>
	 			<td class='centrar'>CANTIDAD</td>
	 			<td class='centrar'>PRODUCTO</td>
	 			<td class='centrar'>DRESCRIPCIÓN</td>
	 			<td class='centrar'>PRECIO UNITARIO</td>
	 			<td class='centrar'>IVA :" . $iva . " </td>
	 			<td class='centrar'>PRECIO TOTAL</td>
	 		</tr>
	 		<tr>
	 			<td> " . $cant_fac . " </td>
	 			<td> " . $nom_pro . " </td>
	 			<td> " . $des_nom . " </td>
	 			<td> $" . $pre_uni . " </td>
	 			<td> $" . round($pre_uni*$ivavalor,3) . " </td>
	 			<td>$" . round($pre_uni*(1+$ivavalor),3) . "</td>
	 		</tr>

			

	 		<tr>
	 			<td colspan='5'>TOTAL A PAGAR</td>
	 			<td>$" . round($pre_uni*(1+$ivavalor),3) . "</td>
	 			
	 		</tr>;

	 		
	 	</table>";

	 }

	 		$resultadoId->closeCursor();
			$resultadocliente->closeCursor();
			$resultadoproducto->closeCursor();

			$resultadoId=null;
			$resultadocliente=null;
			$resultadoproducto=null;


			$conexion=null;


	 	?>
	 	<table id="botones" class="tamano">
	 	<tr>
	 		<td class="bordes"><a href=""><input type="button" value="Imprimir" class="btn"></a></td>
	 		<td class="bordes"><a href="interfazclientes.php"><input type="button" value="← Volver" class="btn"></a></td>
	 	</tr>
	 	</table>
	</div>
	 
	
</body>
</html>