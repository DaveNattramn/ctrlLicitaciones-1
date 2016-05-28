<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../../../css/bootstrap-cerulean.css">
		<link rel="stylesheet" href="../../../css/font-awesome.css">
		<link rel="stylesheet" href="../../../css/navbar.css">
	    <link rel="stylesheet" href="../../../css/side-menu.css">
	    <link rel="shortcut icon" href="../../../favicon.ico" />

			<script src="../../../js/jquery21.js"></script>


		<title>S.I.T. | NORMATIVA </title>


		<script type="text/javascript" language="javascript" class="init">
			$(document).ready(function() {
				/*var _glb_ubicacion = [];
    		_glb_ubicacion[0] = new Array(2);
				_glb_ubicacion[1] = new Array(2);
				_glb_ubicacion[2] = new Array(2);
				var ubicacion  = [];
				_glb_ubicacion[0][0] = 'municipio 1ó';
				_glb_ubicacion[0][1] = 'localidad 1';
				_glb_ubicacion[1][0] = 'municipio 2';
				_glb_ubicacion[1][1] = 'localidad 2';
				_glb_ubicacion[2][0] = 'municipio 3';
				_glb_ubicacion[2][1] = 'localidad 3';
				for(x=0;x<3;x++){
					ubicacion.push({
																	'municipio':_glb_ubicacion[x][0],
																	'localidad':_glb_ubicacion[x][1]
					});
				}
				ubicacion = JSON.stringify(ubicacion);
				*/
				var id_obra = "3402";
				$.ajax({

				url: '../../../controladores/_S_test.php',
				type: 'post',
				data: {
					id_obra:id_obra,

				},
				  dataType: 'json',
				success: function (data) {

						
				}
				,
				error: function (jqXHR, textStatus, errorThrown) {
					alert(errorThrown);
				}
				});

		});
		</script>

	<body>
<!--		<div class="header"><h1>TABLA</h1></div>
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
</div>-->
	</body>
</html>
