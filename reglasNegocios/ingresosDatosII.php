<?php 

			
	
	
	try{

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

		$id_cliente;
		$idClienteInt;
		$control_registros_clave;
		$registroTelefono;
		$ultimoid;

		$resultadoClave;
		$control_registros;
		$ulitoIdClave;


		if(isset($_POST["usuario"]) &&
			isset($_POST["email"]) &&
			isset($_POST["contrasenna"]) &&
			isset($_POST["repecontrasenna"]) &&
			isset($_POST["nombres"]) &&
			isset($_POST["apellidos"]) &&
			isset($_POST["cedula"]) &&
			isset($_POST["direccion"]) &&
			isset($_POST["cargo"]) &&
			isset($_POST["departamento"]) &&
			isset($_POST["sexo"]) &&
			isset($_POST["celular"]) &&
			isset($_POST["telefonofijo"]) &&
			isset($_POST["pbx"])

			){

				//VAriables de login para usuarios********

				$usuario = htmlentities(addslashes($_POST["usuario"]));

				$email = htmlentities(addslashes($_POST["email"]));

				$contrasenna = htmlentities(addslashes($_POST["contrasenna"]));
				
				$repecontrasenna = htmlentities(addslashes($_POST["repecontrasenna"]));

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


			//****************************************
			}

	
	require("../conexionbbdd/conexionHuevitosbd.php");

		

		$conexion = new PDO(DB_HOST,DB_USUARIO,DB_CONTRA);

		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$conexion->exec(DB_CHARACTER);


		//Ingresando datos a la tabla de CLIENTES

		$sqlCliente ="INSERT INTO tblcliente(CEDULA,NOMBRES,APELLIDOS,DIRECCION,CARGO,DEPARTAMENTO,SEXO) 
		VALUES(:ced,:nom,:ape,:dir,:carg,:depa,:sex)";

		$resultadoCliente = $conexion->prepare($sqlCliente);

		$resultadoCliente->bindValue(":ced",$cedula);
		$resultadoCliente->bindValue(":nom",$nombres);
		$resultadoCliente->bindValue(":ape",$apellidos);
		$resultadoCliente->bindValue(":dir",$direccion);
		$resultadoCliente->bindValue(":carg",$cargo);
		$resultadoCliente->bindValue(":depa",$departamento);
		$resultadoCliente->bindValue(":sex",$sexo);

		
		
		$resultadoCliente->execute();

		$control_registros = $resultadoCliente->rowCount();

		
		$ultimoid=$conexion->lastInsertId();

		

#****************************************************************

		if($control_registros!=0){

			#$resultadoCliente->closeCursor();

			#************Acceso a la BBDD de clave
			$sqlClave = "INSERT INTO tblclave(ID_CLIENTE,USUARIO,CONTRASENNA,EMAIL) VALUES(:idcliente,:usua,:contra,:correo)";

			$resultadoClave = $conexion->prepare($sqlClave);



			//Encriptando la contraseña con password_hash();

			$claveEncriptada = password_hash($contrasenna, PASSWORD_DEFAULT);

			//******************************************************************

			$resultadoClave->bindValue(":idcliente",intval($ultimoid));
			$resultadoClave->bindValue(":usua",$usuario);
			$resultadoClave->bindValue(":contra",$claveEncriptada);
			$resultadoClave->bindValue(":correo",$email);

			$resultadoClave->execute();

			$control_registros_clave = $resultadoClave->rowCount();

			

				if($control_registros_clave!=0){


					#$resultadoClave->closeCursor();

					#**********Acceso BBDD de telefono
					$sqlTelefono = "INSERT INTO tbltelefono(ID_CLIENTE,NUMERO_CELULAR,NUMERO_FIJO,PBX) VALUES(:id_cliente,:cel,:fijo,:pbx)";

					$resultadoTelefono = $conexion->prepare($sqlTelefono);

					$resultadoTelefono->bindValue(":id_cliente",intval($ultimoid));
					$resultadoTelefono->bindValue(":cel",$celular);
					$resultadoTelefono->bindValue(":fijo",$telefonofijo);
					$resultadoTelefono->bindValue(":pbx",$pbx);


					$resultadoTelefono->execute();

					$registroTelefono = $resultadoTelefono->rowCount();

							if($registroTelefono!=0){


									$resultadoTelefono->closeCursor();
									$resultadoCliente->closeCursor();
									$resultadoClave->closeCursor();

									$resultadoCliente=null;
									$resultadoClave=null;	
									$resultadoTelefono=null;

									$conexion=null;

									header("location:registroExitosos.php");


							}else{

								$sqlBorradoCliente = "DELETE FROM tblcliente WHERE ID_CLIENTE=:cliente";

								$resultadoborrar = $conexion->prepare($sqlBorradoCliente);

								$resultadoborrar->bindValue(":cliente",intval($ultimoid));

								$resultadoborrar->execute();

																
								$resultadoborrar->closeCursor();
								$resultadoCliente->closeCursor();
								$resultadoClave->closeCursor();
								$resultadoTelefono->closeCursor();

								$resultadoCliente=null;
								$resultadoClave=null;	
								$resultadoborrar=null;
								$resultadoTelefono=null;
								
								header("location:errorDeDatosRegistros.php");

							}


				}else{

					$sqlBorradoCliente = "DELETE FROM tblcliente WHERE ID_CLIENTE=:cliente";

					$resultadoborrar = $conexion->prepare($sqlBorradoCliente);

					$resultadoborrar->bindValue(":cliente",intval($ultimoid));

					$resultadoborrar->execute();

													
					$resultadoborrar->closeCursor();
					$resultadoCliente->closeCursor();
					$resultadoClave->closeCursor();

					$resultadoCliente=null;
					$resultadoClave=null;	
					$resultadoborrar=null;
					
					header("location:errorDeDatosRegistros.php");

				}


		}else{

			
			$resultadoCliente->closeCursor();

			$resultadoCliente=null;
			
			header("location:errorDeDatosRegistros.php");

		}

#*************************************para revisar.
	

		$resultadoCliente->closeCursor();
		$resultadoClave->closeCursor();	
		$resultadoTelefono->closeCursor();	
		
		$resultadoCliente=null;
		$resultadoClave=null;	
		$resultadoTelefono=null;	

	}catch(Exception $e){

		die("Error al conectar la base de datos: " . $e->getMessage());

	}

	
		


 ?>