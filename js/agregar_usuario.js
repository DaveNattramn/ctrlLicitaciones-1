jQuery(document).ready(function($) {

	$("#guardar_usuario").click(function(event) {
		var nombre = $("#_nombre").val();
		var puesto = $("#puesto").val();
		var t_usuario = $("#tp_user").val();
		var area = $("#area").val();
		var modulo = $("#modulo").val();
		var tel = $("#tel").val();
		var mail = $("#mail").val();
		var n_user = $(".user").val();
		var n_pas = $(".pass").val();

		if (nombre == "" || puesto == ""||t_usuario == ""|| modulo == ""||n_user == "" || n_pas == "") {

			$("#nom").removeClass('col-lg-4').addClass('col-lg-4 has-error');
			$("#pue").removeClass('col-lg-4').addClass('col-lg-4 has-error');
			$("#t_use").removeClass('col-lg-4').addClass('col-lg-4 has-error');
			$("#mod").removeClass('col-lg-3').addClass('col-lg-3 has-error');
			$("#us").removeClass('col-lg-6').addClass('col-lg-6 has-error');
			$("#pa").removeClass('col-lg-6').addClass('col-lg-6 has-error');


			Command: toastr["warning"]("Campo(s) Obligatorios Vacios")

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
		}
		else
		{
			
			$.ajax({
				url: 'controladores/agregar_usuario.php',
				type: 'post',
				data: {nombre:nombre, puesto:puesto, t_usuario:t_usuario,
						area:area, modulo:modulo, tel:tel, mail:mail, n_user:n_user, n_pas:n_pas},
				success: function (data) {

					Command: toastr["success"]("Agregado con Éxito: " +nombre);
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
					$("#_nombre").val("");
					$("#puesto").val("");
					$("#tp_user").val("");
					$("#area").val("");
					$("#modulo").val("");
					$("#tel").val("");
					$("#mail").val("");
					$(".user").val("");
					$(".pass").val("");

					$("#nom").removeClass('col-lg-4 has-error').addClass('col-lg-4');
					$("#pue").removeClass('col-lg-4 has-error').addClass('col-lg-4');
					$("#t_use").removeClass('col-lg-4 has-error').addClass('col-lg-4');
					$("#mod").removeClass('col-lg-3 has-error').addClass('col-lg-3');
					$("#us").removeClass('col-lg-6 has-error').addClass('col-lg-6');
					$("#pa").removeClass('col-lg-6 has-error').addClass('col-lg-6');
				}
			});
		}

	});

	/*$("#guardar_usuario").click(function(event) {
		
	});
	*/
});