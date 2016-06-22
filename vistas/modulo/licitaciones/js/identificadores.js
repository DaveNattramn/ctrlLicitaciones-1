$(document).ready(function(){
	$("#new").click(function(event) {
		/* Act on the event */
		//$("#uno").fadeIn();
		//$("#dos").fadeIn();

		$("#iden_1").fadeIn();
		$("#another").fadeIn();
		$("#add").fadeIn();
		$("#new").hide();

		$("#another").click(function(event) {
			/* Act on the event */
			$("#iden_2").fadeIn();
			$("#another").hide();
			$("#new_iden").fadeIn();

			$("#new_iden").click(function(event) {
				/* Act on the event */
				$("#add_new").fadeIn();
				$("#add").fadeOut();

				$("#iden_1").hide();
				$("#iden_2").hide();
				$("#new_iden").hide();
			});

		});
	});


});