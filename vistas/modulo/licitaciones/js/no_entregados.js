$(document).ready(function(){

	$("#busqueda").focus();

	$("#todos").click(function(event) {
		$("#generallll").fadeIn();
	});  

	$("#au").click(function(event) {
		$("#tabla_no_autorizados").fadeOut();
		$("#tabla_autorizados").fadeIn();

		$("#au").addClass("active");
		$("#general").removeClass("	active");
		$("#no_au").removeClass("active");
	});

	$("#general").click(function(event) {
		$("#tabla_no_autorizados").fadeIn();
		$("#tabla_autorizados").fadeOut();

		$("#general").addClass("active");
		$("#no_au").removeClass("active");
		$("#au").removeClass("active");
	});



});