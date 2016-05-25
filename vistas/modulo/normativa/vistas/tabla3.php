<html lang='es'>
	<head>
		<meta charset='UTF-8'>
		<link rel='stylesheet' href='bootstrap.css'>
	  <script src='../../../../js/jquery21.js'></script>
	</head>
<body><center>

<style type='text/css'>



.atributo {min-width: 150px;font-size:10px;color:#31708F !important;text-align: right;}
.valor {min-width: 150px;font-size:10px;text-align: left; color:#110}
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
            var data;



            $("#t_obra").text(parent.find("#m_obra").val());
            $("#t_tipo_inversion").text(parent.find("#m_tipo_inversion").val());
            $("#t_tipo_expediente").text(parent.find("#m_tipo_expediente").val());
            $("#t_dimension_inversion").text(parent.find("#m_dimension_inversion").val());
            $("#t_monto_solicitado").text("$ "+parent.find("#m_monto_solicitado").val());
            $("#t_ur").text(parent.find("#m_unidad_responsable").val());
            $("#t_etapa").text(parent.find("#m_etapa").val());
            $("#t_periodo_ejecucion").text(parent.find("#m_periodo_ejecucion").val()+" semanas");
            $("#t_normativa_aplicar").text(parent.find("#m_normativa_aplicar").val());
            $("#t_tipo_adj_solicitado").text(parent.find("#m_tipo_adj_solicitado").val());
            $("#t_partidas").text(parent.find("#m_partidas").val());
            $("#t_propuesta_anual").text(parent.find("#m_propuesta_anual").val());

            $("#t_municipio").text(parent.find("#m_municipio").val());
            $("#t_localidad").text(parent.find("#m_localidad").val());
            $("#t_beneficiarios_directos").text(parent.find("#m_beneficiarios_directos").val());
            $("#t_beneficiarios_indirectos").text(parent.find("#m_beneficiarios_indirectos").val());
            $("#t_empleos_directos").text(parent.find("#m_empleos_directos").val());
            $("#t_empleos_indirectos").text(parent.find("#m_empleos_indirectos").val());

            $("#t_aporte_federal").text("$ "+parent.find("#m_aporte_federal").val());
            $("#t_aporte_estatal").text("$ "+parent.find("#m_aporte_estatal").val());
            $("#t_aporte_municipal").text("$ "+parent.find("#m_aporte_municipal").val());
            $("#t_aportacion_beneficiarios").text("$ "+parent.find("#m_aportacion_beneficiarios").val());
            $("#t_aportacion_otros").text("$ "+parent.find("#m_aportacion_otros").val());

            $("#t_total").text("$ "+parent.find("#m_monto_solicitado").val());

						getAlcances(parent.find('#m_id_obra').val()  ).success(function (data) {
							var contentAlcance = "";
							var len = 0;
					  	var i;
					  	for (i in data) {
					      if (data.hasOwnProperty(i)) {
					        len++;
					      }
					  	}
					  	if(len>0){
					    for(i=0; i<len; i++){
					      contentAlcance += '<tr>' +
					                        '<td class="columna_valor">'+ data[i].tipo_obra+'</td>'+
					                        '<td class="columna_valor">'+ data[i].num_obj+'</td>'+
					                        '<td class="columna_valor">'+ data[i].objeto+'</td>'+
					                        '<td class="columna_valor">'+ data[i].cantidad+'</td>'+
					                        '<td class="columna_valor">'+ data[i].um+'</td>'+
					                        '</tr>';
					      }
							}
							$("#t_tbody_alc").append(contentAlcance);
						});

					getRevisiones(parent.find('#m_id_obra').val(),"DIRECCION").success(function (data) {
						var contentRevision = "";
						var len = 0;
					  var i;
					  for(i in data){
					    if (data.hasOwnProperty(i)) {
					      len++;
					      }
					  }
					  if(len>0){
					  for(i=0; i<len; i++){
					     contentRevision +='<tr>' +
					                       '<td class="columna_valor">'+ (i+1)+'</td>'+
					                       '<td class="columna_valor">'+ data[i].observaciones+'</td>'+
					                       '</tr>';
					     }
						}
					  $('#t_tabla_rev').append(contentRevision);
					});

            $("#CONTENIDO").html(data);
        }

				function getAlcances(id_obra){
				    return $.ajax({
				      type: 'POST',
				      url: '../../../../controladores/_S_get_alcances.php',
				      data: {"id_obra" : id_obra},
				      dataType: 'json',
				    });
				}

				function getRevisiones(id_obra,area){
				    return $.ajax({
				      type: 'POST',
				      url: '../../../../controladores/_S_get_revisiones.php',
				      data: {"id_obra" : id_obra, "area":area},
				      dataType: 'json',
				    });
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
      <td class='valor' id='t_obra' colspan='3'></td>
    </tr>
    <tr>
			<td class='atributo'>Tipo de inversión</td>
      <td class='valor' id='t_tipo_inversion'></td>
			<td class='atributo'>Monto solicitado</td>
			<td class='valor' id='t_monto_solicitado'></td>
    </tr>
    <tr>
			<td class='atributo'>Tipo de solicitud</td>
      <td class='valor' id='t_tipo_expediente'></td>
			<td class='atributo'>Dimensión de inversión</td>
      <td class='valor' id='t_dimension_inversion'></td>
    </tr>
		<tr>
			<td class='atributo'>Unidad responsable</td>
      <td class='valor' id='t_ur'></td>
			<td class='atributo'>Etapa</td>
      <td class='valor' id='t_etapa'></td>
    </tr>
		<tr>
			<td class='atributo'>Periodo de ejecución</td>
      <td class='valor' id='t_periodo_ejecucion'></td>
			<td class='atributo'>Propuesta anual</td>
	    <td class='valor' id='t_propuesta_anual'></td>
    </tr>
		<tr>
			<td class='atributo'>Normativa a aplicar</td>
      <td class='valor' id='t_normativa_aplicar'></td>
			<td class='atributo'>Modalidad de ejecución</td>
      <td class='valor' id='t_tipo_adj_solicitado'></td>
    </tr>
		<tr>
			<td class='atributo'>Partidas </td>
      <td class='valor' id='t_partidas' colspan='3'></td>
    </tr>

  </tbody>
</table>

    </div>
	</div>

	<div class='panel panel-default'>
		<div class='panel-heading titulo'>Ubicación</div>
		<div class='panel-body'>

  <table class='table table-sm'>
  <tbody>
    <tr>
			<td class='atributo'>Municipio</td>
      <td class='valor' id='t_municipio' colspan='3'></td>
    </tr>
    <tr>
      <td class='atributo'>Localidad</td>
      <td class='valor' id='t_localidad' colspan='3'></td>
    </tr>
  <tr>
    <td class='atributo'>Beneficiarios directos</td>
    <td class='valor' id='t_beneficiarios_directos'></td>
    <td class='atributo'>Empleos directos</td>
    <td class='valor' id='t_empleos_directos'></td>
  </tr>
  <tr>
    <td class='atributo'>Beneficiarios indirectos</td>
    <td class='valor' id='t_beneficiarios_indirectos'></td>
    <td class='atributo'>Empleos indirectos</td>
    <td class='valor' id='t_empleos_indirectos'></td>
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
	<tbody id="t_tbody_alc">

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
			<td class='valor' id='t_aporte_estatal'></td>
			<td class='atributo'>Aporte beneficiarios</td>
			<td class='valor' id='t_aportacion_beneficiarios'></td>
		</tr>
		<tr>
			<td class='atributo'>Aporte federal</td>
			<td class='valor' id='t_aporte_federal'></td>
			<td class='atributo'>Aporte otros</td>
			<td class='valor' id='t_aportacion_otros'></td>
		</tr>
		<tr>
			<td class='atributo'>Aporte municipal</td>
			<td class='valor' id='t_aporte_municipal'></td>
		</tr>
		<tr>
			<td class='atributo'>Total</td>
			<td class='valor' id='t_total'></td>
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
	<tbody id="t_tabla_rev">

	</tbody>
	</table>

		</div>
	</div>


</div>
</body>
</html>
