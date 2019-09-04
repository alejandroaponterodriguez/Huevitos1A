<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro Usuarios</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estiloscss/resetHuevitos1A.css">
    <link rel="stylesheet" type="text/css" href="estiloscss/estilosCssRegistrosUsuarios.css">
    <link rel="stylesheet" type="text/css" href="../jquery/jquery-3.4.1.js">

<script type="text/javascript">

    function comenzar(){

        document.datos_usuario.addEventListener("invalid",validar,true);

        document.getElementById("registrar").addEventListener("click",enviar,false);

        document.getElementById("volver").addEventListener("click",volverPaginaInicial,false);

        document.getElementById("input").addEventListener("input",validar_tiempo_real,false);

        
    }

    function volverPaginaInicial(){

          
        document.location.href="index.php";

        
    }

    function validar(e){

        var elementos = e.target;

        if(elementos){

        elementos.style.background = "#F5ABAB";

        }

    }

    function enviar(){

        var correcto = document.datos_usuario.checkValidity();

        if(correcto){

            document.datos_usuario.submit();
        }

    }

    function validar_tiempo_real(e){

        var entradas = e.target;

        if(entradas.validity.valid){

            entradas.style.background="white";

        }else{

            entradas.style.background="#F5ABAB";
        }

    }

    
    
    
    window.addEventListener("load",comenzar,false);

</script>



    
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

	<form action="reglasNegocios/ingresosDatosII.php" method="post" id="registro" name="datos_usuario">
				
        <table>    
        <tr>
            
        <td><label >Usuario:&nbsp;</label></td>
        
        <td><input name="usuario" pattern="[1-9]{10}" id="usuario" placeholder="Ingresa Usuario" autofocus="true" minlength="6" maxlength="10" required></td>
        
        </tr>

        <tr>
        <td><label>E-mail:&nbsp;</label></td>
        <td><input name="email" type="email" id="email" placeholder="e-mail" minlength="1" maxlength="50" required></td>
        </tr>
        
        <tr>
        <td><label>Contraseña:&nbsp;</label></td>
        
        <td><input name="contrasena" type="password" id="contrasena" placeholder="Ingresa Password"  minlength="8" maxlength="20" required></td>
        </tr>
        
        <tr>
            <td><label>Repetir Contraseña:&nbsp;</label></td>
            <td><input name="repecontrasena" type="password" id="repecontrasena" placeholder="Repetir Password" minlength="8" maxlength="20" required></td>
        </tr>
                    

        </table>    
        <br>
        
        <input type="submit" name="registrar" value="Registrar" class="btngeneral" id="registrar">
        
        
        <button type="button" id="volver" name="volver" class="btngeneral">Volver</button> 
       
        
        
       

                         
    </form>
        
        

       <br>
       
            <div id="pie">Sistema de registro individual del personal</div>
    
</section> 

    <footer>
        
    </footer>

     

</body>
 
</html>
