<?php 

		$id;
		$usu;
		$ema;
		$nom;
		$ape;
		$ced;
		$dir;
		$car;
		$dep;
		$sex;
		$cel;
		$nfi;
		$pbx;

	try{
	
		
		
	
	require("../conexionbbdd/conexionHuevitosbd.php");

		$usuarioL=$_SESSION['usuariologin'];

		$conexion = new PDO(DB_HOST,DB_USUARIO,DB_CONTRA);

		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$conexion->exec(DB_CHARACTER);


		//CONSULTA A CLAVE

		$sqlClaveId ="SELECT ID_CLIENTE FROM tblclave WHERE USUARIO=:usua";

		$resultadoClaveId = $conexion->prepare($sqlClaveId);

		$resultadoClaveId->bindValue(":usua",$usuarioL);		
		
		
		$resultadoClaveId->execute();

		
		$control_registros_Clave = $resultadoClaveId->fetch(PDO::FETCH_ASSOC);

								
		$id_Buscar = $control_registros_Clave['ID_CLIENTE'];

		$resultadoClaveId->closeCursor();
		$resultadoClaveId=null;


		#*************************CONSULTA INNER JOIN CON TODAS LA TABLAS.***************************+


		$sqlGeneral = "SELECT cli.ID_CLIENTE, cli.CEDULA, cli.NOMBRES, cli.APELLIDOS, cli.DIRECCION, cli.CARGO, cli.DEPARTAMENTO, cli.SEXO, cla.USUARIO, cla.EMAIL, tel.NUMERO_CELULAR, tel.NUMERO_FIJO, tel.PBX  FROM tblcliente cli INNER JOIN tbltelefono tel ON tel.ID_CLIENTE=cli.ID_CLIENTE INNER JOIN  tblclave cla ON cla.ID_CLIENTE=cli.ID_CLIENTE";

		$resultadoGeneral = $conexion->prepare($sqlGeneral);

		
		$resultadoGeneral->execute();


		if($filas=$resultadoGeneral->rowCount()>0){

			

			while ($controlfila = $resultadoGeneral->fetch(PDO::FETCH_ASSOC)) {
				
				if($controlfila['USUARIO']==$usuarioL){

					$id=$controlfila['ID_CLIENTE'];
					$usu=$controlfila['USUARIO'];
					$ema=$controlfila['EMAIL'];
					$nom=$controlfila['NOMBRES'];
					$ape=$controlfila['APELLIDOS'];
					$ced=$controlfila['CEDULA'];
					$dir=$controlfila['DIRECCION'];
					$car=$controlfila['CARGO'];
					$dep=$controlfila['DEPARTAMENTO'];
					$sex=$controlfila['SEXO'];
					$cel=$controlfila['NUMERO_CELULAR'];
					$nfi=$controlfila['NUMERO_FIJO'];
					$pbx=$controlfila['PBX'];
					
				}

				
			}

			$resultadoGeneral->closeCursor();
			$resultadoGeneral=null;
			$conexion=null;


		}else{

			$resultadoGeneral->closeCursor();
			$resultadoGeneral=null;
			$conexion=null;

			header("location:noActuarlizarDatos.php");
		}


		
		
		
#*************************************para revisar.
	

		

	}catch(Exception $e){

		die("Error al conectar la base de datos para actualizar: " . $e->getMessage());

	}

	
		


 ?>