<?php 
		session_start();

		if (!isset($_SESSION['usuariologin'])) {
			
			header("location:../index.php");
		}

		$usuario = $_SESSION['usuariologin'];
	

	try {

		$lista;
		$cantidad;
		$direccion;
		$formapago;
		$tipocliente;
		$fecha;
		$hora;
		$time = time();
		$idPedido;
		$precio;
		$id_producto;
		$precio_total;
		$id_vendedor=null;
		$estado ="Pendiente";

		if (isset($_POST['lista']) &&
			isset($_POST['cantidad']) &&
			isset($_POST['direccion'])) {

			$lista = htmlentities(addslashes($_POST['lista']));
			$cantidad = htmlentities(addslashes($_POST['cantidad']));
			$direccion = htmlentities(addslashes($_POST['direccion']));
			$formapago = htmlentities(addslashes($_POST['formapago']));
			$tipocliente = htmlentities(addslashes($_POST['tipocliente']));	

		}
		

		require("../conexionbbdd/conexionHuevitosbd.php");

		$conexion= new PDO(DB_HOST,DB_USUARIO,DB_CONTRA);

		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$conexion->exec(DB_CHARACTER);

		$sqlIdUsuario = "SELECT ID_CLIENTE FROM tblclave WHERE USUARIO=:usu";

		$resultado = $conexion->prepare($sqlIdUsuario);

		$resultado->bindValue(":usu",$usuario);

		$resultado->execute();

		$resultadoIdCliente = $resultado->fetch(PDO::FETCH_ASSOC);

		$id_cliente = $resultadoIdCliente['ID_CLIENTE'];

		#Enviando el id_cliente a la tabla cliente-vendedor

		$sqlcliven = "INSERT INTO tblclientevendedor (ID_CLIENTE, ID_VENDEDOR) VALUES(:id,:idv)";

		$resultadocliven = $conexion->prepare($sqlcliven);

		$resultadocliven->bindValue(":id",$id_cliente);
		$resultadocliven->bindValue(":idv",$id_vendedor);

		$resultadocliven->execute();


		#llenar la tabla de Pedidos (tblpedido)

		$fecha = date("d-m-Y",$time);
		$hora = date("h:i:s",$time);

		$sqlpedido = "INSERT INTO tblpedido (ID_CLIENTE,CANTIDAD,FECHA,HORA,DIRECCION_ENTREGA,FORMA_PAGO,TIPO,NOMBRE_PRODUCTO) VALUES(:id,:can,:fec,:hor,:dir,:for,:tip,:npro)";

		$resultadopedido = $conexion->prepare($sqlpedido);

		$resultadopedido->bindValue(":id",$id_cliente);
		$resultadopedido->bindValue(":can",$cantidad);
		$resultadopedido->bindValue(":fec",$fecha);
		$resultadopedido->bindValue(":hor",$hora);
		$resultadopedido->bindValue(":dir",$direccion);
		$resultadopedido->bindValue(":for",$formapago);
		$resultadopedido->bindValue(":tip",$tipocliente);
		$resultadopedido->bindValue(":npro",$lista);

		$resultadopedido->execute();

		$idPedido =$conexion->lastInsertId();


		
		#Sacar de la tabla de producto tblproducto el valor del articulo;

		$sqlproducto ="SELECT ID_PRODUCTO, PRECIO FROM tblproducto WHERE NOMBRE_PRODUCTO=:nprod";

		$resultadoproducto = $conexion->prepare($sqlproducto);

		$resultadoproducto->bindValue(":nprod",$lista);

		$resultadoproducto->execute();

		while ($controlproducto=$resultadoproducto->fetch(PDO::FETCH_ASSOC)) {
			
			$precio = $controlproducto['PRECIO'];
			$id_producto =$controlproducto['ID_PRODUCTO'];
		}

		$precio_total = $precio*$cantidad;
		
		
		#************************************************************************************
		#Ingresando valores al tabla factura.

		$sqlfactura = "INSERT INTO tblfactura (ID_VENDEDOR,ID_PEDIDO,TIPO,PRECIO_TOTAL,HORA,FECHA,CANTIDAD_FACTURA,FORMA_PAGO,ESTADO_FACTURA,DIRECCION_ENTREGA,NOMBRE_PRODUCTO) VALUES(:idv,:idp,:tip,:pret,:hor,:fec,:can,:forp,:est,:dire,:nomp)";

		$resultadofac = $conexion->prepare($sqlfactura);

		$resultadofac->bindValue(":idv",$id_vendedor);
		$resultadofac->bindValue(":idp",$idPedido);
		$resultadofac->bindValue(":tip",$tipocliente);
		$resultadofac->bindValue(":pret",$precio_total);
		$resultadofac->bindValue(":hor",$hora);
		$resultadofac->bindValue(":fec",$fecha);
		$resultadofac->bindValue(":can",$cantidad);
		$resultadofac->bindValue(":forp",$formapago);
		$resultadofac->bindValue(":est",$estado);
		$resultadofac->bindValue(":dire",$direccion);
		$resultadofac->bindValue(":nomp",$lista);

		$resultadofac->execute();

		$id_factura = $conexion->lastInsertId();


		#Insertando los ID de producto y ID de factura en la tabla tblfacturaproducto

		$sqlfacpro = "INSERT INTO tblfacturaproducto (ID_PRODUCTO,ID_FACTURA) VALUES(:idpro,:idfac)";

		$resultadofacpro = $conexion->prepare($sqlfacpro);

		$resultadofacpro->bindValue(":idpro",$id_producto);
		$resultadofacpro->bindValue(":idfac",$id_factura);

		$resultadofacpro->execute();




		

		$resultadoproducto->closeCursor();
		$resultadofacpro->closeCursor();
		$resultadofac->closeCursor();
		$resultadopedido->closeCursor();
		$resultadocliven->closeCursor();
		$resultado->closeCursor();

		$resultadoproducto=null;
		$resultadofacpro=null;
		$resultadofac=null;
		$resultadopedido=null;
		$resultadocliven=null;
		$resultado=null;

		$conexion=null;

		header("location:pedidoExitoso.php");

		
	} catch (Exception $e) {
		
		die("Error en la conexion: " . $e->getMessage());

	}
	

 ?>