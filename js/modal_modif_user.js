$("#btn_modif").click(function(){
      $("#modificar").modal("show");
      $("#idUserUpdate").val( $("#id_user_send").val());
});

$("#g_modif").click(function(){

 
 var id= $("#idUserUpdate").val();
 var campo = $("#comboboxuser").val();
 var dato = $("#dato_usuario").val();
 $("#modificar").modal("hide");

 $.ajax({
    url: 'controladores/modificar_user.php',
    type: 'post',
    data: {id:id, campo:campo, dato: dato},

    success: function (data){
      $("#modificar").modal("hide");
    }
  });
  
  
    /*

  });




    $.ajax({
        
        
        
        success: function (data) {
        //$(".modif").empty();
        //$(".modif").append(id);  
        
          $("#modificar").modal('hide');
        },
        error:function(x,h,r){
            alert('Error $.ajax Modificar Usuario');
        }
    });*/

});
/*
$("#btn_modif").click(function(){
      $("#modificar").modal("show");
      var id= $("#id_user_send").val();

       $("#g_modif").click(function() {

        var campo = $("#comboboxuser").val();
        var dato = $("#dato_usuario").val();
        $.ajax({
            url: 'controladores/modificar_user.php',
            type: 'post',
            data: {id:id, campo:campo, dato: dato},
            success: function (data) {
                //$(".modif").empty();
                //$(".modif").append(id);  
                
                if (data) {

                  alert("texttooo");

                  Command: toastr["success"]("¡La Información del Usuario ha sido Modificada con Éxito!")
                  
                  toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  }
                  $("#modificar").modal('hide');
                }
            },
            error:function(x,h,r){
                alert('Error $.ajax Modificar Usuario');
            }
        });
    }); 
});
*/


/*
$('tr').click(function() {

    var id = $('tr', 'row-key').val();
    alert(id);

    $("#btn_modif").click(function(){
        $("#modificar").modal("show");
    });
    
    
    $("#g_modif").click(function() {
        var campo = $("#comboboxuser").val();
        var dato = $("#dato_usuario").val();
        $.ajax({
            url: 'controladores/modificar_user.php',
            type: 'post',
            data: {id:id, campo:campo, dato: dato},
            success: function (data) {
                //$(".modif").empty();
                //$(".modif").append(id);   
                alert(id);
                alert(campo);
                alert(dato);
                Command: toastr["success"]("¡La Información del Usuario ha sido Modificada con Éxito!")
                
                toastr.options = {
                  "closeButton": false,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
                $("#modificar").modal('hide');
            },
            error:function(x,h,r){
                alert('Error $.ajax Modificar Usuario');
            }
        });
    }); 
});*/