<?php
	session_start();

	$_SESSION['usuario'];
	$usuario = $_SESSION['usuario'];
	$user = explode("_", $usuario);
	if(empty($_SESSION['usuario'])){
	 	header("Location:../../../index.php");
	}
?>

<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../../../css/bootstrap-cerulean.css">
		<link rel="stylesheet" href="../../../css/font-awesome.css">
		<link rel="stylesheet" href="../../../css/navbar.css">
	    <link rel="stylesheet" href="../../../css/side-menu.css">
	    <link rel="shortcut icon" href="../../../favicon.ico" />
			<link rel="stylesheet" type="text/css" href="jquery.dataTables.css">
		<title>S.I.T. | NORMATIVA </title>



		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/bs-3.3.6/jq-2.2.0,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.11,af-2.1.1,b-1.1.2,b-colvis-1.1.2,b-flash-1.1.2,b-html5-1.1.2,b-print-1.1.2,cr-1.3.1,fc-3.2.1,fh-3.1.1,r-2.0.2,rr-1.1.1,sc-1.4.1,se-1.1.2/datatables.min.css"/>
		<script type="text/javascript" src="https://cdn.datatables.net/t/bs-3.3.6/jq-2.2.0,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.11,af-2.1.1,b-1.1.2,b-colvis-1.1.2,b-flash-1.1.2,b-html5-1.1.2,b-print-1.1.2,cr-1.3.1,fc-3.2.1,fh-3.1.1,r-2.0.2,rr-1.1.1,sc-1.4.1,se-1.1.2/datatables.min.js"></script>

		<script type="text/javascript" language="javascript" class="init">
			$(document).ready(function() {
				alert("creando");
    		var mostrar = $('#mostrar').DataTable( {
				"processing": true,
					 "serverSide": true,
					 "ajax":{
							 url :"../../../controladores/_S_mostrarObras.php", // json datasource
							 type: "POST"
						 }


					});

				}
		)
		</script>


	<body>
		<div class="header"><h1>TABLA</h1></div>
			<div class="container">
    <table id="mostrar" class="table table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>No. de Obra</th>
                    <th>Nombre de la Obra</th>
                    <th>Tipo de Procedimiento</th>
                </tr>
            </thead>

        </table>
</div>
</div>
	</body>
</html>
