$(document).ready(function(){
                                
  var consulta;                                                
   //hacemos focus al campo de búsqueda
  $("#busqueda").focus();
                                                                                              
  //comprobamos si se pulsa una tecla
  $("#busqueda").keyup(function(e){
        console.log('BUSQUEDA CONVENIO');
        //obtenemos el texto introducido en el campo de búsqueda
        consulta = $("#busqueda").val();  
        var seleccionado;
        radios=$("input[name='optionsRadios']:checked").val();
        //hace la búsqueda                                                          
        $.ajax({
              type: "POST",
              url: "../controladores/buscar_convenios.php",
              data:{b:consulta,optionsRadios:radios},
              dataType: "html",
              error: function(){
                    alert("error petición ajax");
              },
              success: function(data){                                        
                    $("#resultado").empty();
                    $("#resultado").on('change',"input[name='rdoaplica']",function(){
                      if($("#aplica").is(':checked')){
                        $('#aplico').fadeIn();
                      }
                      else{
                        $('#aplico').fadeOut();
                      }
                      
                    });
                    $("#resultado").append(data);            
              }
        });                                           
  });      
});