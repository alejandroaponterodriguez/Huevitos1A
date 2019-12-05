<?php 
		$nombres;
		$apellidos;
		$cedula;

		$tipo;
		$precio_total;
		$fecha;
		$cant_fac;
		$for_pag;
		$est_fac;
		$dir_ent;
		$nom_pro;


		$num_cel;
		$num_fij;
		$pbx;

		$email;

		$des_nom;

		$controlcliente;


	try {


		require("../conexionbbdd/conexionHuevitosbd.php");

		$conexion = new PDO(DB_HOST, DB_USUARIO,DB_CONTRA);
		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$conexion->exec(DB_CHARACTER);

		$sql="SELECT ID_CLIENTE FROM tblclave WHERE USUARIO=:usu";

		$resultadoId = $conexion->prepare($sql);

		$resultadoId->bindValue(":usu",$usuario);

		$resultadoId->execute();

		$controlid =$resultadoId->fetch(PDO::FETCH_ASSOC);

		$id_cliente = $controlid["ID_CLIENTE"];



		#CONSULTA GENERAL DE LA FACTURA.

		$sqlcliente = "SELECT cli.CEDULA, cli.NOMBRES, cli.APELLIDOS, fac.TIPO, fac.PRECIO_TOTAL, fac.HORA, fac.FECHA, fac.CANTIDAD_FACTURA, fac.FORMA_PAGO, fac.ESTADO_FACTURA, fac.DIRECCION_ENTREGA, fac.NOMBRE_PRODUCTO , tel.NUMERO_CELULAR, tel.NUMERO_FIJO, tel.PBX, cla.EMAIL FROM tblcliente cli INNER JOIN tblfactura fac ON cli.ID_CLIENTE=:idcI INNER JOIN tbltelefono tel ON tel.ID_CLIENTE=:idcII INNER JOIN tblclave cla ON cla.ID_CLIENTE=:idcIII";

		$resultadocliente = $conexion->prepare($sqlcliente);

		$resultadocliente->bindValue(":idcI",$id_cliente);
		$resultadocliente->bindValue(":idcII",$id_cliente);
		$resultadocliente->bindValue(":idcIII",$id_cliente);

		$resultadocliente->execute();


	
		
	} catch (Exception $e) {
		
		die("Error en la conexión: " . $e->getMessage() . $e->getLine());
	}

 ?>