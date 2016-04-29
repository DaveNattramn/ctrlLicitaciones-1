$(document).ready(function(){                   
        var consulta;                         

        $("#contratista").focus();
                                                                                                    
        //comprobamos si se pulsa una tecla
        $("#contratista").keyup(function(e){
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#contratista").val();  

              //hace la búsqueda                                                          
              $.ajax({
                    type: "POST",
                    url: "../controladores/busqueda_contratista.php",
                    data:{b:consulta},
                    dataType: "html",
                    error: function(){
                          alert("error petición ajax");
                    },
                    success: function(data){                                        
                          $("#contra").empty();
                          $("#contra").append(data);            
                    }
              });                                           
        });      
});