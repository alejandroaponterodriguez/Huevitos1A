    var contraanti;
    var contranue;
    var repecontranue;

    function comenzar(){


        contraanti = document.getElementById("contraanti");
        contranue = document.getElementById("contranue");
        repecontranue = document.getElementById("repecontranue");

        document.formularioClaves.addEventListener("invalid",validar,true);

        document.getElementById("clave").addEventListener("click",enviar,false);

        
        document.getElementById("input").addEventListener("input",validar_tiempo_real,false);

        

        
    }

 

    function validar(e){

        var elementos = e.target;

        if(elementos){

        elementos.style.background = "#F5ABAB";

        }

    }

    function enviar(){

        

        if(contraanti.value == "" ){

            
            contraanti.setCustomValidity("El campo usuario no debe estar vacio");

            contraanti.style.background="#F5ABAB";

                       

        }else if(contranue.value == ""){

            
            contranue.setCustomValidity("El campo contraseña no debe estar vacio");

            contranue.style.background="#F5ABAB";


        }else if(repecontranue.value==""){

            repecontranue.setCustomValidity("El campo contraseña no debe estar vacio");

            repecontranue.style.background="#F5ABAB";

        }else if(contranue.value !== repecontranue.value){
                        
            contranue.setCustomValidity("las contraseñas son diferentes, repitalas");

            contranue.style.background="#F5ABAB";

            repecontranue.style.background="#F5ABAB";
            
        }else{

            contraanti.setCustomValidity("");
            
            contranue.setCustomValidity("");

            repecontranue.setCustomValidity("");

           

            contraanti.style.background="white";

            contranue.style.background="white";

            repecontranue.style.background="white";

            var correcto = document.formularioPrincipal.checkValidity();

            if(correcto){

                document.formularioClaves.submit();
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

    
    
    
    window.addEventListener("load",comenzar,false);