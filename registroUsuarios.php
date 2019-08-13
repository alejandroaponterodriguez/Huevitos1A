<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro Usuarios</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estiloscss/resetHuevitos1A.css">
    <link rel="stylesheet" type="text/css" href="estiloscss/estilosCssRegistrosUsuarios.css">
    <link rel="stylesheet" type="text/css" href="../jquery/jquery-3.4.1.js">


    
</head>
<body>

<header id="titulos">
    <h1>CISoft1A</h1>
    <h2>Registro de Clientes</h2>
</header>

<section id="contenedor">
			 
	<article>

        <figure id="ima1">
        	<img src="imagenes/huevitos1A.jpg" alt="Huevitos1A" id="imagen1">	
        </figure>

    </article>

	<form action="reglasNegocios/ingresosDatosII.php" method="post" id="registro">
				
        <table>    
        <tr>
            
        <td><label >Usuario:&nbsp;</label></td>
        
        <td><input name="usuario" type="text" id="usuario" placeholder="Ingresa Usuario" autofocus="true" minlength="6" maxlength="10"></td>
        
        </tr>

        <tr>
        <td><label>E-mail:&nbsp;</label></td>
        <td><input name="email" type="email" id="email" placeholder="e-mail" minlength="1" maxlength="50"></td>
        </tr>
        
        <tr>
        <td><label>Contraseña:&nbsp;</label></td>
        
        <td><input name="contrasena" type="password" id="contrasena" placeholder="Ingresa Password"  minlength="8" maxlength="20"></td>
        </tr>
        
        <tr>
            <td><label>Repetir Contraseña:&nbsp;</label></td>
            <td><input name="repecontrasena" type="password" id="repecontrasena" placeholder="Repetir Password" minlength="8" maxlength="20"></td>
        </tr>
                    

        </table>    
        <br>
        
        <input type="submit" name="registrar" value="Registrar" class="btngeneral">
        
        
        <input type="button" name="volver" value="Volver" class="btngeneral" id="volver">
        
       

                         
    </form>
        
        

       <br>
       
            <div id="pie">Sistema de regstro individual del personal</div>
    
</section> 

    <footer>
        
    </footer>

     

</body>
 
</html>
