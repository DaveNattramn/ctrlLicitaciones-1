$(document).ready(function(){

	$("#busqueda").focus();

	$("#todos").click(function(event) {
		$("#todos").addClass('active');
		$("#no_entre").removeClass('active');
		$("#en_sit").removeClass('active');
		$("#en_daop").removeClass('active');
		$("#en_progra").removeClass('active');
		$("#en_proce").removeClass('active');
		$("#adju").removeClass('active');

		$("#general").show(300);

		$("#no_entregados").hide(300);
		$("#sit").hide(300);
		$("#daop").hide(300);
		$("#progra").hide(300);
		$("#proce").hide(300);
		$("#adjudicadas").hide(300);
	});

	$("#no_entre").click(function(event) {
		$("#todos").removeClass('active');
		$("#no_entre").addClass('active');
		$("#en_sit").removeClass('active');
		$("#en_daop").removeClass('active');
		$("#en_progra").removeClass('active');
		$("#en_proce").removeClass('active');
		$("#adju").removeClass('active');

		$("#no_entregados").show(300);

		$("#general").hide(300);
		$("#sit").hide(300);
		$("#daop").hide(300);
		$("#progra").hide(300);
		$("#proce").hide(300);
		$("#adjudicadas").hide(300);
	});

	$("#en_sit").click(function(event) {
		$("#todos").removeClass('active');
		$("#no_entre").removeClass('active');
		$("#en_sit").addClass('active');
		$("#en_daop").removeClass('active');
		$("#en_progra").removeClass('active');
		$("#en_proce").removeClass('active');
		$("#adju").removeClass('active');

		$("#sit").show(300);

		$("#no_entregados").hide(300);		
		$("#general").hide(300);
		$("#daop").hide(300);
		$("#progra").hide(300);
		$("#proce").hide(300);
		$("#adjudicadas").hide(300);
	});

	$("#en_daop").click(function(event) {
		$("#todos").removeClass('active');
		$("#no_entre").removeClass('active');
		$("#en_sit").removeClass('active');
		$("#en_daop").addClass('active');
		$("#en_progra").removeClass('active');
		$("#en_proce").removeClass('active');
		$("#adju").removeClass('active');

		$("#daop").show(300);

		$("#sit").hide(300);
		$("#no_entregados").hide(300);		
		$("#general").hide(300);
		$("#progra").hide(300);
		$("#proce").hide(300);
		$("#adjudicadas").hide(300);
	});

	$("#en_progra").click(function(event) {
		$("#todos").removeClass('active');
		$("#no_entre").removeClass('active');
		$("#en_sit").removeClass('active');
		$("#en_daop").removeClass('active');
		$("#en_progra").addClass('active');
		$("#en_proce").removeClass('active');
		$("#adju").removeClass('active');

		$("#progra").show(300);

		$("#daop").hide(300);
		$("#sit").hide(300);
		$("#no_entregados").hide(300);		
		$("#general").hide(300);
		$("#proce").hide(300);
		$("#adjudicadas").hide(300);
	});

	$("#en_proce").click(function(event) {
		$("#todos").removeClass('active');
		$("#no_entre").removeClass('active');
		$("#en_sit").removeClass('active');
		$("#en_daop").removeClass('active');
		$("#en_progra").removeClass('active');
		$("#en_proce").addClass('active');
		$("#adju").removeClass('active');

		$("#proce").show(300);

		$("#progra").hide(300);
		$("#daop").hide(300);
		$("#sit").hide(300);
		$("#no_entregados").hide(300);		
		$("#general").hide(300);
		$("#adjudicadas").hide(300);
	});

	$("#adju").click(function(event) {
		$("#todos").removeClass('active');
		$("#no_entre").removeClass('active');
		$("#en_sit").removeClass('active');
		$("#en_daop").removeClass('active');
		$("#en_progra").removeClass('active');
		$("#en_proce").removeClass('active');
		$("#adju").addClass('active');

		$("#adjudicadas").show(300);

		$("#proce").hide(300);
		$("#progra").hide(300);
		$("#daop").hide(300);
		$("#sit").hide(300);
		$("#no_entregados").hide(300);		
		$("#general").hide(300);
	});
});