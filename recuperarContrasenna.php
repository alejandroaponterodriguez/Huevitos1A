<!DOCTYPE html>
<html lang="es">
<head>

   <title>Recuperar Contraseña</title>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="estiloscss/estilosCssRecuperarcontrasena.css">

</head>

<body>

  <h1>HUEVITOS 1A CiSoft1A</h1>
  <h2>Recuperar Contraseña</h2>

<section id="contenedor">

    <figure id="ima1">
  		<img src="imagenes/huevitos1A.jpg" alt="Huevitos1A" id="imagen1">	
  	</figure>
  					
  	<form action="consulta.php" method="post">
                 
      <p><label>Numero De Identificacion:</label></p>
      <input name="contrasenia" type="text" id="contrasenia" placeholder="Numero De Identificacion" required="" autofocus="true" class="botones"> 

      <p><label>Correo Electronico:</label></p>
      <input name="contrasenia" type="email" id="Contrasenia" placeholder="Correo de verificacion" required="" class="botones"> 
      
      <br>
      <br>
      <input type="submit" id="submit" name="submit" value="Validar" class="botones">   

      </form>

      <article id= "pie"> 

        <p>Recuperación de contraseña</p>

      </article>

</section>
</body>
</html>
