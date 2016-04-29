function borrar_user(id){
	var id_user = $('#idUserDelete').val(id);
}

$("#eliminar").click(function(event) {
	var id = $("#idUserDelete").val();

	$.ajax({
        url: 'controladores/eliminar_usuario.php',
        type: 'post',
        data: {id:id},
        beforeSend:function(){
			
		},
        success: function (data) {
        	//$("#myModal").modal('hide');
        	toastr.options = {
				"debug": false,
				"newestOnTop": false,
				"progressBar": false,
				"positionClass": "toast-bottom-right",
				"preventDuplicates": true,
				"onclick": null,
				"showDuration": "500",
				"hideDuration": "500",
				"timeOut": "5000",//duracion
				"extendedTimeOut": "5000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "show",
				"hideMethod": "fadeOut"
			}
			toastr["success"]("Usuario Eliminado del Sistema");
			setTimeout(function(){
			   window.location.href="admin.php";
			}, 3000);
        	//window.location.href="admin.php";
        },
        error:function(x,h,r){
            alert('Error $.ajax Modificar Usuario');
        }
    });
});