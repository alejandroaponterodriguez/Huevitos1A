<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro Usuarios</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estiloscss/resetHuevitos1A.css">
    <link rel="stylesheet" type="text/css" href="estiloscss/estilosCssRegistrosUsuarios.css">
    <link rel="stylesheet" type="text/css" href="../jquery/jquery-3.4.1.js">

<script type="text/javascript">
    var password;
    var repepassword;

    function comenzar(){

        password = document.getElementById("contrasena");
        repepassword = document.getElementById("repecontrasena");

        document.datos_usuario.addEventListener("invalid",validar,true);

        document.getElementById("registrar").addEventListener("click",enviar,false);

        document.getElementById("volver").addEventListener("click",volverPaginaInicial,false);

        document.getElementById("input").addEventListener("input",validar_tiempo_real,false);

        document.getElementById("textoterminos").addEventListener("click",activarcheck,false);

        

        
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

        

        if(password.value !== repepassword.value){

            
            password.setCustomValidity("las contraseñas son diferentes, repitalas");

            password.style.background="#F5ABAB";

            repepassword.style.background="#F5ABAB";
            

            

        }else{

           password.setCustomValidity("");

            password.style.background="white";

            repepassword.style.background="white";

            var btncheckbox = document.getElementById("terminos");

            if(btncheckbox.checked){

                var correcto = document.datos_usuario.checkValidity();

                if(correcto){

                document.datos_usuario.submit();
                }

            }else{

                alert("Para registrarse debe aceptar los terminos y condiciones");
            }
            


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

    function activarcheck(){

        alert("pulse el texto");

        var btncheckbox=document.getElementById("terminos");

        if(!btncheckbox.checked){

            btncheckbox.checked=true;

        }else{

            btncheckbox.checked=false;
        }

        
    }
    
    
    
    window.addEventListener("load",comenzar,false);

</script>



    
</head>
<body id="principal">

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
				
        <table id="tabla1">
            <tr>
                    <td colspan="2" >
                        <label class="titulosDatos">Datos de Acceso</label>
                    </td>
                </tr>
            <tr>
                
                <tr>
                    <td>
                        <label>Usuario:&nbsp;</label>
                    </td>
        
                    <td>
                        <input name="usuario" pattern="[A-Za-z0-9]+" id="usuario" placeholder="Ingresa Usuario" autofocus="true" minlength="6" maxlength="20" required>
                    </td>
                </tr>

                <tr>
                    <td>

                        <label>E-mail:&nbsp;</label>
                    </td>
                    <td>
                        <input name="email" type="email" id="email" placeholder="e-mail" minlength="1" maxlength="50" required>
                    </td>

                    
                </tr>
                
                <tr>
                    <td>
                        <label>Contraseña:&nbsp;</label>
                    </td>
                    
                    <td>
                        <input name="contrasena" type="password" id="contrasena" placeholder="Ingresa Password"  minlength="8" maxlength="20" required>
                    </td>
                    
                </tr>

                <tr>
                    <td>
                        <label>Repetir Contraseña:&nbsp;</label>
                    </td>
                    <td>
                        <input name="repecontrasena" type="password" id="repecontrasena" placeholder="Repetir Password" minlength="8" maxlength="20" required>
                    </td>
                    
                </tr>

            </tr>

        </table>

        <table id="tabla2"> 

        <tr>
            <td colspan="2" >
                <label for="" class="titulosDatos">Datos personales</label>
            </td>

        </tr>   

        <tr>
            <td>
                <label>Nombres:&nbsp;</label>
            </td>
        
            <td>
                <input name="nombres" type="text" id="nombres" placeholder="Ingresa Nombres"  minlength="3" maxlength="60" required>
            </td>
        
        </tr>

        <tr>
            <td>
                <label>Apellidos:&nbsp;</label>
            </td>
            
            <td>
                <input name="apellidos" type="text" id="apellidos" placeholder="Ingresa Apellidos"  minlength="3" maxlength="60" required>
            </td>
        </tr>

        <tr>
            <td>
                <label>Cédula:&nbsp;</label>
            </td>
            
            <td>
                <input name="cedula" pattern="[0-9]{6,}" id="cedula" placeholder="Ingresa Cédula"  minlength="6" maxlength="10" required>
            </td>
        </tr>

        <tr>
            <td>
                <label>Dirección:&nbsp;</label>
            </td>
            
            <td>
                <input name="direccion" type="text" id="direccion" placeholder="Ingresa Dirección"  minlength="3" maxlength="110" required>
            </td>
        </tr>

        <tr>
            <td>
                <label>Cargo:&nbsp;</label>
            </td>
            
            <td>
                <input name="cargo" type="text" id="cargo" placeholder="Ingresa Cargo"  minlength="3" maxlength="30" required>
            </td>
        </tr>

        <tr>
            <td>
                <label>Teléfono:&nbsp;</label>
            </td>
            
            <td>
                <input name="telefono" type="text" id="telefono" placeholder="Ingresa Teléfono"  minlength="10" maxlength="16" required>
            </td>
        </tr>

        <tr>
            <td>
                <label>Departamento:&nbsp;</label>
            </td>
            
            <td>
                <input name="departamento" type="text" id="departamento" placeholder="Ingresa Departamento"  minlength="3" maxlength="55" required>
            </td>
        </tr>

        <tr>
            <td>
                <label>Sexo:&nbsp;</label>
            </td>
            
            <td>
                <input list="milista" name="sexo"  id="sexo" placeholder="Ingresa Sexo F/M"  minlength="1" maxlength="1" required>

                <datalist id="milista">
                    <option value="F"></option>
                    <option value="M"></option>
                </datalist>
            </td>
        </tr>


        

        </table>    
        <br>
        <br>
        
         <table id="btncheck">
            <tr>
                <td colspan="2">
                    <input type="checkbox" name="terminos" id="terminos"><label for="" id="textoterminos">Acepto términos y condiciones</label>
                </td>
                
            </tr>
        </table>
        <br>
        <div>
            <input type="submit" name="registrar" value="Registrar" class="btngeneral" id="registrar">
        
        
        <button type="button" id="volver" name="volver" class="btngeneral">Volver</button> 
        </div>
        
       
                                 
    </form>

   
        
        <footer>
            <div id="pie">Sistema de Registro de Clientes</div>
        </footer>
       
           
    
</section> 

    

     

</body>
 
</html>
