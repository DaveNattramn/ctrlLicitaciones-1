$(document).ready(function(){                   
        var consulta;                         

        $("#descrip").focus();
                                                                                                    
        //comprobamos si se pulsa una tecla
        $("#descrip").keyup(function(e){
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#descrip").val();  

              //hace la búsqueda                                                          
              $.ajax({
                    type: "POST",
                    url: "../controladores/busqueda.php",
                    data:{b:consulta},
                    dataType: "html",
                    error: function(){
                          alert("error petición ajax");
                    },
                    success: function(data){                                        
                          $("#descripcion").empty();
                          $("#descripcion").append(data);            
                    }
              });                                           
        });      
});