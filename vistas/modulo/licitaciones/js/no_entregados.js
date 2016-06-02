$(document).ready(function(){
	$("#no_au").click(function(event) {
		$("#tabla_no_autorizados").fadeIn(10000);
		$("#tabla_autorizados").fadeOut();

		$("#no_au").addClass("active");
		$("#general").removeClass("active");
		$("#au").removeClass("active");
	});  

	$("#au").click(function(event) {
		$("#tabla_no_autorizados").fadeOut();
		$("#tabla_autorizados").fadeIn(10000);

		$("#au").addClass("active");
		$("#general").removeClass("active");
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