<!DOCTYPE html>
<html lang="es">
<head>

   <title>Recuperar Contraseña</title>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="estiloscss/estilosCssRecuperarcontrasena.css">


<script>
  function comenzar(){

    document.getElementById('volver').addEventListener("click",volver,false);


  }

  function volver(){

    document.location.href="index.php";
  }

  window.addEventListener("load",comenzar,false);

</script>


</head>

<body>

  <h1>HUEVITOS 1A CiSoft1A</h1>
  <h2>Recuperar Contraseña</h2>

<section id="contenedor">

    <figure id="ima1">
  		<img src="imagenes/huevitos1A.jpg" alt="Huevitos1A" id="imagen1">	
  	</figure>
  					
  	<form action="consulta.php" method="post">
                 
      <table>
        
        <tr>
          <td><label>Número De Identificación:</label></td>
          <td>
            <input name="btnidentificacion" type="text" id="btnidentificacion" placeholder="Numero De Identificacion" required="" autofocus="true" class="botones">
          </td>
        </tr>
        
        <tr>
          <td><label>Correo Electrónico:</label></td>
          <td>
            <input name="email" type="email" id="email" placeholder="Correo de verificacion" required="" class="botones">
          </td>
        </tr>
        
        <tr>
          <td id="entradas" colspan="2">
            
            
              
              <input type="submit" id="submit" name="submit" value="Validar" class="btncontrol">
              <input type="button" name="volver" id="volver" value="Volver" class="btncontrol">

            
             

          </td>
          
        </tr>
        

      </table>
         
      
      
      <br>
        

      </form>

      <article id= "pie"> 

        <p>Recuperación de contraseña</p>

      </article>

</section>
</body>
</html>
