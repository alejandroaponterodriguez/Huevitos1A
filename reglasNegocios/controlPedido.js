
var producto;
var cantidad;
var direccion;

function comenzar(){

	document.getElementById("formularioPedido").addEventListener("invalid",validar,false);
	document.getElementById("enviarPedido").addEventListener("click",enviar,false);
	producto =document.getElementById("lista");
	cantidad = document.getElementById("cantidad");
	direccion = document.getElementById("direccion");

}

function validar(e){

        var elementos = e.target;

        if(elementos){

        elementos.style.background = "#F5ABAB";

        }

    }


function enviar(){

        
        if(producto.value == "" ){

            
            producto.setCustomValidity("El campo producto no debe estar vacio");

            producto.style.background="#F5ABAB";

                       

        }else if(cantidad.value == "" || cantidad.value<0){

            
            cantidad.setCustomValidity("El campo cantidad debe ser mayor que cero y no vacio");

            cantidad.style.background="#F5ABAB";


        }else if(direccion.value==""){

        	direccion.setCustomValidity("Indique una dirección valida");

        	direccion.style.background="#F5ABAB";

        }else{

            producto.setCustomValidity("");
            
            cantidad.setCustomValidity("");

            direccion.setCustomValidity("");

           

            producto.style.background="white";

            cantidad.style.background="white";

            direccion.style.background="white";

            var correcto = document.formularioPedido.checkValidity();

            if(correcto){

                document.formularioPedido.submit();
            }


        }
         
        

    }




window.addEventListener("load",comenzar,false);