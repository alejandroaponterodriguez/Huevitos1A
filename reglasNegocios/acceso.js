    var nickname;
    var password;
    var control=false;

    function comenzar(){


        password = document.getElementById("password");
        nickname = document.getElementById("nickname");

        document.formularioPrincipal.addEventListener("invalid",validar,true);

        document.getElementById("acceder").addEventListener("click",enviar,false);

        //document.getElementById("volver").addEventListener("click",volverPaginaInicial,false);

        document.getElementById("input").addEventListener("input",validar_tiempo_real,false);

        

        
    }

    /*function volverPaginaInicial(){

          
        document.location.href="verificarUsuario.php";

        
    }*/

    function validar(e){

        var elementos = e.target;

        if(elementos){

        elementos.style.background = "#F5ABAB";

        }

    }

    function enviar(){

        

        if(nickname.value == "" ){

            
            nickname.setCustomValidity("El campo usuario no debe estar vacio");

            nickname.style.background="#F5ABAB";

                       

        }else if(password.value == ""){

            
            password.setCustomValidity("El campo contraseña no debe estar vacio");

            password.style.background="#F5ABAB";


        }else{

            nickname.setCustomValidity("");
            
            password.setCustomValidity("");

           

            password.style.background="white";

            nickname.style.background="white";

            var correcto = document.formularioPrincipal.checkValidity();

            if(correcto){

                document.formularioPrincipal.submit();
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

    function visible(){

        var claveOculta = document.getElementById("password");
        var imagenCambio = document.getElementById("imagenPasswordNo");

        if(control){

            claveOculta.type="password";
            control=false;
            imagenCambio.src="imagenes/imagenPasswordNo.png";
            

        }else{

            claveOculta.type="text";
            control=true;
            imagenCambio.src="imagenes/imagenPassword.png";
            
        }


    }

    
    
    
    window.addEventListener("load",comenzar,false);