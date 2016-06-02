$(function() {
	function login(usuario,passw){
		$.ajax({
			url: 'controladores/iniciar_sesion.php',
			type: 'post',
			data: {user:usuario,pass:passw},
			beforeSend:function(){
				$('#loader').show();
			},
			success: function (data) {
				if(!data){
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
					toastr["error"]("El usuario y/o la contraseña son incorrectos", "Error en inicio de sesión");
					console.log("Error de usuario o contraseña");

					$('#loader').hide();
				}
				else
				{
					var explode = data.split("_");
					var user = explode[0];
					var modul = explode[1];

					if (user == "David Flores Alvarez") {
						window.location.href = "admin.php";
					}
					else
					{
						if (modul == "Normativa") {
							window.location.href = "vistas/modulo/normativa/";
						}
						if (modul == "Licitaciones") {
							window.location.href = "vistas/modulo/licitaciones/";
						}
					}

				}
			},
			error:function(x,h,r){
				alert('Error');
			}
		});
	}
  $('#btniniciar').click(function(){
  	var usuario=$('#txtusuario').val();
	var pass=$('#txtpass').val();
  	login(usuario,pass);
  	$('#loader').show();
  });
  $('#txtpass').keyup(function(e){
  	if(e.which===13){
  		var usuario=$('#txtusuario').val();
		var pass=$('#txtpass').val();
  		login(usuario,pass);
  	}
  });
});