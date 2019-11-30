<?php 

			
	
	
	try{

		$usurio;
		$email;
		$contrasenna;

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

		$id_cliente=0;
		$idClienteInt=0;
		$control_registros_clave=0;
		$registroTelefono=0;
		$ultimoid=0;

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

		

		if($control_registros!=0){


			//Buscar el Id_Cliente para enviarlo a la tabla Clave.

			$sqlBuscarIdCliente ="SELECT ID_CLIENTE, CEDULA FROM tblcliente WHERE CEDULA=:ced";

			$resultadoBuscarIdCliente = $conexion->prepare($sqlBuscarIdCliente);

			$resultadoBuscarIdCliente->bindValue(":ced",$cedula);

			$resultadoBuscarIdCliente->execute();

			$registros=$resultadoBuscarIdCliente->fetchAll(PDO::FETCH_ASSOC);

			$id_cliente = $registros['ID_CLIENTE'];

			$ultimoid = intval($id_cliente);

			//echo "Este el valor:" . $idClienteInt;
				
			
			//Ingresando datos a la tabla de Clave

			$sqlClave = "INSERT INTO tblclave(ID_CLIENTE,USUARIO,CONTRASENNA,EMAIL) VALUES(:idcliente:usua,:contra,:correo)";

			$resultadoClave = $conexion->prepare($sqlClave);

			//Encriptando la contraseña con password_hash();

			$claveEncriptada = password_hash($contrasenna, PASSWORD_DEFAULT);

			//******************************************************************

			$resultadoClave->bindValue(":idcliente",$ultimoid);
			$resultadoClave->bindValue(":usua",$usuario);
			$resultadoClave->bindValue(":contra",$claveEncriptada);
			$resultadoClave->bindValue(":correo",$email);

			/*$resultadoClave->execute(array(":idcliente"=>$ultimoid,":usua"=>$usuario,":contra"=>$claveEncriptada,":correo"=>$email));*/

			$control_registros_clave = $resultadoClave->rowCount();

			$resultadoClave->closeCursor();

		}else{

					/*$sqlBorradoCliente = "DELETE FROM tblcliente WHERE ID_CLIENTE=:cliente";

					$resultadoborrar = $conexion->prepare($sqlBorradoCliente);

					$resultadoborrar->bindValue(":cliente",$idClienteInt);

					$resultadoborrar->execute();*/

					$conexion->close();
					//$resultadoborrar->closeCursor();

					header("location:errorDeDatosRegistros.php");


				}



			if($control_registros_clave!=0){

				//Registrando la base de datos de Telefono.

				$sqlTelefono = "INSERT INTO tbltelefono(ID_CLIENTE,NUMERO_CELULAR,NUMERO_FIJO,PBX) VALUES(:id_cliente,:cel,:fijo,:pbx)";

				$resultadoTelefono = $conexion->prepare($sqlTelefono);

				$resultadoTelefono->bindValue(":id_cliente",$ultimoid);
				$resultadoTelefono->bindValue(":cel",$celular);
				$resultadoTelefono->bindValue(":fijo",$telefonofijo);
				$resultadoTelefono->bindValue(":pbx",$pbx);


				$resultadoTelefono->execute();

				$registroTelefono = $resultadoTelefono->rowCount();

				$resultadoTelefono->closeCursor();



			}else{

					/*$sqlBorradoCliente = "DELETE FROM tblcliente WHERE ID_CLIENTE=:cliente";

					$resultadoborrar = $conexion->prepare($sqlBorradoCliente);

					$resultadoborrar->bindValue(":cliente",$idClienteInt);

					$resultadoborrar->execute();*/

					$conexion->close();

					//$resultadoborrar->closeCursor();

					header("location:errorDeDatosRegistros.php");


				}



					if($registroTelefono!=0){

						$conexion->close();

						header("location:registroExitosos.php");

					}else{

						

						$sqlBorradoCliente = "DELETE FROM tblcliente WHERE ID_CLIENTE=:cliente";

						$resultadoborrar = $conexion->prepare($sqlBorradoCliente);

						$resultadoborrar->bindValue(":cliente",$ultimoid);

						$resultadoborrar->execute();

						$conexion->closeCursor();

						$resultadoborrar->closeCursor();

						header("location:errorDeDatosRegistros.php");
					}

			

		$conexion->close();


	}catch(Exception $e){

		die("Error al conectar la base de datos: " . $e->getMessage());

	}

	
		


 ?>