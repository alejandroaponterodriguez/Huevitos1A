<?php 


			
	
	try{

		session_start();

		if (!isset($_SESSION['usuariologin'])) {

			header("location:../index.php");
		}

		$id;
		//Variables de Contra.****************
		$usurio;
		$email;
		$contrasenna;
		$repecontrasenna;

		//Variables de datos Usuario.**********
		$nombres;
		$apellidos;
		$cedula;
		$direccion;
		$cargo;
		$departamento;
		$sexo;

		//Variables de Telefono*****************

		$celular;
		$telefonofijo;
		$pbx;

		//Variables para consultas

		$control_registrosCla;
		$control_registrosTel;
		$control_registrosCli;


		if(isset($_POST["usuario"]) &&
			isset($_POST["email"]) &&
			isset($_POST["nombres"]) &&
			isset($_POST["apellidos"]) &&
			isset($_POST["cedula"]) &&
			isset($_POST["direccion"]) &&
			isset($_POST["cargo"]) &&
			isset($_POST["departamento"]) &&
			isset($_POST["sexo"]) &&
			isset($_POST["celular"]) &&
			isset($_POST["telefonofijo"]) &&
			isset($_POST["pbx"]) &&
			isset($_POST['id'])

			){

				//VAriables de login para usuarios********

				$usuario = htmlentities(addslashes($_POST["usuario"]));

				$email = htmlentities(addslashes($_POST["email"]));

				//Variables de datos personales***********

				$nombres = htmlentities(addslashes($_POST["nombres"]));

				$apellidos = htmlentities(addslashes($_POST["apellidos"]));

				$cedula = htmlentities(addslashes($_POST["cedula"]));

				$direccion = htmlentities(addslashes($_POST["direccion"]));

				$cargo = htmlentities(addslashes($_POST["cargo"]));

				$departamento = htmlentities(addslashes($_POST["departamento"]));

				$sexo = htmlentities(addslashes($_POST["sexo"]));

				//Variables de Telefono*****************

				$celular = htmlentities(addslashes($_POST["celular"]));

				$telefonofijo = htmlentities(addslashes($_POST["telefonofijo"]));

				$pbx = htmlentities(addslashes($_POST["pbx"]));

				$id =intval(htmlentities(addslashes($_POST["id"])));


			//****************************************
			}

	
	require("../conexionbbdd/conexionHuevitosbd.php");

		

		$conexion = new PDO(DB_HOST,DB_USUARIO,DB_CONTRA);

		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$conexion->exec(DB_CHARACTER);


		//Actualizando datos a la tabla de CLIENTES

		$sqlCliente ="UPDATE tblcliente SET CEDULA=:ced,NOMBRES=:nom,
		APELLIDOS=:ape,DIRECCION=:dir,CARGO=:carg,DEPARTAMENTO=:depa,SEXO=:sex 
		WHERE ID_CLIENTE=:id";
		

		$resultadoCliente = $conexion->prepare($sqlCliente);

		$resultadoCliente->bindValue(":ced",$cedula);
		$resultadoCliente->bindValue(":nom",$nombres);
		$resultadoCliente->bindValue(":ape",$apellidos);
		$resultadoCliente->bindValue(":dir",$direccion);
		$resultadoCliente->bindValue(":carg",$cargo);
		$resultadoCliente->bindValue(":depa",$departamento);
		$resultadoCliente->bindValue(":sex",$sexo);
		$resultadoCliente->bindValue(":id",$id);
		
		
		$resultadoCliente->execute();

		$control_registrosCli = $resultadoCliente->rowCount();

		#Actualizando datos de tabla Telefono

		$sqlTelefono ="UPDATE tbltelefono SET NUMERO_CELULAR=:cel,NUMERO_FIJO=:nfi,
		PBX=:pbx WHERE ID_CLIENTE=:id";
		

		$resultadoTelefono = $conexion->prepare($sqlTelefono);

		$resultadoTelefono->bindValue(":cel",$celular);
		$resultadoTelefono->bindValue(":nfi",$telefonofijo);
		$resultadoTelefono->bindValue(":pbx",$pbx);
		$resultadoTelefono->bindValue(":id",$id);
		
		
		
		$resultadoTelefono->execute();

		$control_registrosTel = $resultadoTelefono->rowCount();

		#Actualizando datos de la tabla Telefono

		$sqlClave ="UPDATE tblclave SET USUARIO=:usuari,EMAIL=:ema WHERE ID_CLIENTE=:id";
		

		$resultadoClave = $conexion->prepare($sqlClave);

		$resultadoClave->bindValue(":usuari",$usuario);
		$resultadoClave->bindValue(":ema",$email);
		$resultadoClave->bindValue(":id",$id);
		
		
		
		$resultadoClave->execute();

		$control_registrosCla = $resultadoClave->rowCount();

		if($control_registrosCla!=0 || $control_registrosTel!=0 || $control_registrosCli!=0){

			
			$resultadoCliente->closeCursor();
			$resultadoTelefono->closeCursor();
			$resultadoClave->closeCursor();

			$resultadoCliente=null;
			$resultadoTelefono=null;
			$resultadoClave=null;
			$conexion=null;

			header("location:actualizacionCorrecta.php");

		}else{

			
			$resultadoCliente->closeCursor();
			$resultadoTelefono->closeCursor();
			$resultadoClave->closeCursor();

			$resultadoCliente=null;
			$resultadoTelefono=null;
			$resultadoClave=null;
			$conexion=null;
			header("location:noActualizacion.php");
		}

		
		



	}catch(Exception $e){

		die("Error al conectar la base de datos: " . $e->getMessage() . $e->getLine());

	}

	
		


 ?>