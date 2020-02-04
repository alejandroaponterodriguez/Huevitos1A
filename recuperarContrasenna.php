<!DOCTYPE html>
<html lang="es">
<head>

   <title>Recuperar Contraseña</title>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="estiloscss/estilosCssRecuperarcontrasena.css">

</head>

<body>

  <?php 

    if(isset($_POST['submit'])){

        if (isset($_POST['usuario']) && isset($_POST['email'])) {
          
            $usuario = htmlentities(addslashes($_POST['usuario']),ENT_QUOTES);
            $email = htmlentities(addslashes($_POST['email']),ENT_QUOTES);


            try {

              $conexion = new PDO("mysql:host=localhost; dbname=cisoft1a","root","");
              $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              $conexion->exec("SET CHARACTER SET UTF8");

              $sqlVerificar = "SELECT USUARIO, EMAIL FROM tblclave WHERE USUARIO=:usu AND EMAIL=:emal";

              $controlVerificacion = $conexion->prepare($sqlVerificar);

              $controlVerificacion->bindValue(":usu",$usuario);
              $controlVerificacion->bindValue(":emal",$email);

              $controlVerificacion->execute();

              if (($resultado=$controlVerificacion->fetchAll(PDO::FETCH_ASSOC))>0) {

                $nuevaContrasena = rand();
                $nuevaContrasena .=$usuario;

                $restablecerContrasena = password_hash($nuevaContrasena, PASSWORD_DEFAULT);

                $sqlNuevaContra = "UPDATE tblclave SET CONTRASENNA=:nueva WHERE USUARIO=:usu";

                $nuevoCambio = $conexion->prepare($sqlNuevaContra);

                $nuevoCambio->bindValue(":nueva",$restablecerContrasena);
                $nuevoCambio->bindValue(":usu",$usuario);

                $nuevoCambio->execute();

                $nuevoCambio->closeCursor();

                print "Entrando la funcion mail";

                  $mail="huevitos1a@gmail.com";
                  $asunto = "Recuperación Contraseña";

                  $mensaje = "La contraseña restablecida CISOFT1A es:" . $nuevaContrasena . " Es recomendable que la cambie una vez ingrese a la plataforma.\n";
                  $headers = "MIME-VERSION:1.0\r\n";
                  $headers .="Content-type:text/html;charset=utf-8\r\n";
                  $headers .="From:Huevitos1A <" . $mail . ">\r\n";

                  $texto = mail($email,$asunto,$mensaje,$headers);

                  echo $texto;

                  if($texto){

                      echo "<script>alert('Contraseñar restablecida');</script>";

                      header("location:recuperarContrasenna.php");

                  }else{

                    echo "<script>alert('No se puedo restablecer la contraseña');</script>";
                    header("location:recuperarContrasenna.php");
                  }

                
              }else{

                echo "<script>alert('No se encontraron datos registrados');</script>";
                header("location:recuperarContrasenna.php");
              }
              
            } catch (Exception $e) {
              
              die("Error: " . $e->getMessage() . " " . $e->getLine());
            }


        }


    }else{

      include_once("reglasNegocios/formularioRecuperacion.html");
    }

   ?>

</body>
</html>
