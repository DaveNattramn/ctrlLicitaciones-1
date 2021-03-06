<html lang='es'>
	<head>
		<meta charset='UTF-8'>
		<link rel='stylesheet' href='bootstrap.css'>
	  <script src='../../../../js/jquery21.js'></script>
	</head>
<body><center>

<style type='text/css'>



.atributo {font-size:10px;color:#31708F !important;text-align: right;}
.valor {font-size:10px;text-align: left; color:#110}
.columna {font-size:11px;color:#31708F !important;text-align: center;}
.columna_valor {font-size:10px;text-align: center;}
.normativa{background-color: white;color:black;text-align: left;font-style: Verdana, sans-serif;font-weight: bold;}
.imagen{height:60px;width:60px}
.titulo{font-weight: bold;}
img {
    max-width: 100%;
    max-height: 100%;
}
</style>


<script type="text/javascript">
    $(function () {
        if (window.opener != null && !window.opener.closed) {
            var parent = $(window.opener.document).contents();
            var data = "<u>Values using Popup Window</u><br /><br />";
            data += "<b>Name:</b> " + parent.find("#m_obra").val();

            $("#CONTENIDO").html(data);
        }
    });
		</script>




<div id='CONTENIDO'>
</div>

<div class='col-md-8 '>

	<div class='panel panel-default normativa'>
  <div class='panel-body'>
    	  <img class='imagen' src='seinfra.png'></img>     DEPARTAMENTO DE NORMATIVA
  </div>
</div>


  <div class='panel panel-default'>
    <div class='panel-heading titulo'>Identificación</div>
    <div class='panel-body'>

			<table class='table table-sm'>
  <thead>
  </thead>
  <tbody>
    <tr>
			<td class='atributo'>Nombre de la obra</td>
      <td class='valor' id='' colspan='3'>Ejemplo ejemplo ejemplo</td>
    </tr>
    <tr>
			<td class='atributo'>Tipo de inversión</td>
      <td class='valor' id=''>Ejemplo ejemplo ejemplo</td>
			<td class='atributo'>Monto solicitado</td>
			<td class='valor' id=''>Ejemplo ejemplo ejemplo</td>
    </tr>
    <tr>
			<td class='atributo'>Tipo de solicitud</td>
      <td class='valor' id=''>Ejemplo ejemplo ejemplo</td>
			<td class='atributo'>Dimensión de inversión</td>
      <td class='valor' id=''>Ejemplo ejemplo ejemplo</td>
    </tr>
		<tr>
			<td class='atributo'>Unidad responsable</td>
      <td class='valor' id=''>Ejemplo ejemplo ejemplo</td>
			<td class='atributo'>Etapa</td>
      <td class='valor' id=''>Ejemplo ejemplo ejemplo</td>
    </tr>
		<tr>
			<td class='atributo'>Periodo de ejecución</td>
      <td class='valor' id=''>Ejemplo ejemplo ejemplo</td>
			<td class='atributo'>Propuesta anual</td>
	    <td class='valor' id=''>Ejemplo ejemplo ejemplo</td>
    </tr>
		<tr>
			<td class='atributo'>Normativa a aplicar</td>
      <td class='valor' id=''>Ejemplo ejemplo ejemplo</td>
			<td class='atributo'>Modalidad de ejecución</td>
      <td class='valor' id=''>Ejemplo ejemplo ejemplo</td>
    </tr>
		<tr>
			<td class='atributo'>Partidas </td>
      <td class='valor' id='' colspan='3'>Ejemplo ejemplo ejemplo</td>
    </tr>

  </tbody>
</table>

    </div>
	</div>

	<div class='panel panel-default'>
		<div class='panel-heading titulo'>Ubicación</div>
		<div class='panel-body'>

			<table class='table table-sm'>
	<thead>
	</thead>
	<tbody>
		<tr>
			<td class='atributo'>Municipio</td>
			<td class='valor' id=''>Ejemplo ejemplo ejemplo</td>
			<td class='atributo'>Beneficiarios directos</td>
			<td class='valor' id=''>Ejemplo ejemplo ejemplo</td>
		</tr>
		<tr>
			<td class='atributo'>Localidad</td>
			<td class='valor' id=''>Ejemplo ejemplo ejemplo</td>
			<td class='atributo'>Beneficiarios indirectos</td>
			<td class='valor' id=''>Ejemplo ejemplo ejemplo</td>
		</tr>
	</tbody>
	</table>

		</div>
	</div>

	<div class='panel panel-default'>
		<div class='panel-heading titulo'>Alcances</div>
		<div class='panel-body'>

			<table class='table table-sm table-striped'>
	<thead>
		<tr>
			<td class='columna'>Tipo de obra</td>
			<td class='columna'>No. de objeto</td>
			<td class='columna'>Objeto</td>
			<td class='columna'>Cantidad</td>
			<td class='columna'>U.M.</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class='columna_valor' id=''>Ejemplo eje</td>
			<td class='columna_valor' id=''>Ejemplo eje</td>
			<td class='columna_valor' id=''>Ejemplo eje</td>
			<td class='columna_valor' id=''>Ejemplo eje</td>
			<td class='columna_valor' id=''>Ejemplo eje</td>
		</tr>
		<tr>
			<td class='columna_valor' id=''>Ejemplo eje</td>
			<td class='columna_valor' id=''>Ejemplo eje</td>
			<td class='columna_valor' id=''>Ejemplo eje</td>
			<td class='columna_valor' id=''>Ejemplo eje</td>
			<td class='columna_valor' id=''>Ejemplo eje</td>
		</tr>
		<tr>
			<td class='columna_valor' id=''>Ejemplo eje</td>
			<td class='columna_valor' id=''>Ejemplo eje</td>
			<td class='columna_valor' id=''>Ejemplo eje</td>
			<td class='columna_valor' id=''>Ejemplo eje</td>
			<td class='columna_valor' id=''>Ejemplo eje</td>
		</tr>
	</tbody>
	</table>

		</div>
	</div>

	<div class='panel panel-default'>
		<div class='panel-heading titulo'>Estructura Financiera</div>
		<div class='panel-body'>

			<table class='table table-sm'>
	<thead>
	</thead>
	<tbody>
		<tr>
			<td class='atributo'>Aporte estatal</td>
			<td class='valor' id=''>Ejemplo ejemplo ejemplo</td>
			<td class='atributo'>Empleos directos</td>
			<td class='valor' id=''>Ejemplo ejemplo ejemplo</td>
		</tr>
		<tr>
			<td class='atributo'>Aporte federal</td>
			<td class='valor' id=''>Ejemplo ejemplo ejemplo</td>
			<td class='atributo'>Empleos indirectos</td>
			<td class='valor' id=''>Ejemplo ejemplo ejemplo</td>
		</tr>
		<tr>
			<td class='atributo'>Aporte municipal</td>
			<td class='valor' id=''>Ejemplo ejemplo ejemplo</td>
		</tr>
		<tr>
			<td class='atributo'>Total</td>
			<td class='valor' id=''>Ejemplo ejemplo ejemplo</td>
		</tr>
	</tbody>
	</table>

		</div>
	</div>


	<div class='panel panel-default'>
		<div class='panel-heading titulo'>Observaciones</div>
		<div class='panel-body'>

			<table class='table table-sm table-striped'>
	<thead>
		<tr>
			<td class='columna'>No. de observación</td>
			<td class='columna'>Observaciones de revisión</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class='columna_valor' id=''>Ejemplo ejemplo ejemplo</td>
			<td class='columna_valor' id=''>Ejemplo ejemplo ejemplo</td>
		</tr>
		<tr>
			<td class='columna_valor' id=''>Ejemplo ejemplo ejemplo</td>
			<td class='columna_valor' id=''>Ejemplo ejemplo ejemplo</td>
		</tr>

	</tbody>
	</table>

		</div>
	</div>


</div>
