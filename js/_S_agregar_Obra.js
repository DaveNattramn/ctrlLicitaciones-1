var glb_ubicacion = [];

$(document).ready(function(){


  glb_ubicacion[0] = new Array(6);
  glb_ubicacion[0][0]="";
  glb_ubicacion[0][1]="";

  $('#guardar_obra').click(function (event) {

      var obra = $("#obra").val().trim();
      var tipo_inversion = $("#tipo_inversion").val().trim();
      var tipo_expediente = $("#tipo_expediente").val().trim();
      var monto_solicitado = $("#monto_solicitado").val().replace(/[^0-9\.]+/g,"");
      var dimension_inversion = $("#dimension_inversion").val().trim();
      var dependencia_solicitante = $("#dependencia_solicitante").val().trim();
      var dependencia_ejecutora = $("#dependencia_ejecutora").val().trim();
      var unidad_responsable = $("#unidad_responsable").val().trim();
      var etapa = $("#etapa").val().trim();
      var periodo_ejecucion = $("#periodo_ejecucion").val().trim();
      var propuesta_anual = $("#propuesta_anual").val().trim();
      var normativa_aplicar = $("#normativa_aplicar").val().trim();
      var tipo_adj_solicitado = $("#tipo_adj_solicitado").val().trim();
      var partidas = $("#partidas").val().trim();
      var total_ubicaciones = $('#total_ubicacion_campos').val();


    /*  var ubicacion_municipio = [];
      var ubicacion_localidad = [];*/
      var ubicacion  = [];
      for(x=0;x<total_ubicaciones;x++){
        if(glb_ubicacion[x][0]!=""){
          if(glb_ubicacion[x][1]!=""){
              ubicacion.push({
                                'municipio':glb_ubicacion[x][0],
                                'localidad':glb_ubicacion[x][1],
                                'no_localidad':glb_ubicacion[x][5]
              });
          }
        }
      }
      ubicacion = JSON.stringify(ubicacion);
      /*ubicacion_municipio = JSON.stringify(ubicacion_municipio);
      ubicacion_localidad = JSON.stringify(ubicacion_localidad);
      */
      var beneficiarios_directos = $("#beneficiarios_directos").val();
      var beneficiarios_indirectos = $("#beneficiarios_indirectos").val();
      var empleos_directos = $("#empleos_directos").val();
      var empleos_indirectos = $("#empleos_indirectos").val();
      var programa_federal = $("#programa_federal").val().trim();
      var aporte_federal = $("#aporte_federal").val().replace(/[^0-9\.]+/g,"");
      var programa_estatal = $("#programa_estatal").val().trim();
      var aporte_estatal = $("#aporte_estatal").val().replace(/[^0-9\.]+/g,"");
      var programa_municipal = $("#programa_municipal").val().trim();
      var aporte_municipal = $("#aporte_municipal").val().replace(/[^0-9\.]+/g,"");
      var aportacion_beneficiarios = $("#aportacion_beneficiarios").val().replace(/[^0-9\.]+/g,"");
      var aportacion_otros = $("#aportacion_otros").val().replace(/[^0-9\.]+/g,"");

      if(!($.isNumeric(monto_solicitado))) monto_solicitado = 0;
      if(!($.isNumeric(periodo_ejecucion))) periodo_ejecucion = 0;
      if(!($.isNumeric(beneficiarios_directos))) beneficiarios_directos = 0;
      if(!($.isNumeric(beneficiarios_indirectos))) beneficiarios_indirectos = 0;
      if(!($.isNumeric(empleos_directos))) empleos_directos = 0;
      if(!($.isNumeric(empleos_indirectos))) empleos_indirectos = 0;
      if(!($.isNumeric(aporte_federal))) aporte_federal = 0;
      if(!($.isNumeric(aporte_estatal))) aporte_estatal = 0;
      if(!($.isNumeric(aporte_municipal))) aporte_municipal = 0;
      if(!($.isNumeric(aportacion_otros))) aportacion_otros = 0;
      if(!($.isNumeric(aportacion_beneficiarios))) aportacion_beneficiarios = 0;


            $("#d_obra").removeClass('col-lg-12 has-error').addClass('col-lg-12');
            $("#d_tipo_inversion").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
            $("#d_tipo_expediente").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
            $("#d_dimension_inversion").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
            $("#d_dependencia_solicitante").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
            $("#d_dependencia_ejecutora").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
            $("#d_unidad_responsable").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
            $("#d_etapa").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
            $("#d_periodo_ejecucion").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
            $("#d_propuesta_anual").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
            $("#d_normativa_aplicar").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
            $("#d_tipo_adj_solicitado").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
            $("#d_partidas").removeClass('col-lg-4 has-error').addClass('col-lg-4');
            $("#d_programa_federal").removeClass('col-lg-4 has-error').addClass('col-lg-4');
            $("#d_programa_estatal").removeClass('col-lg-4 has-error').addClass('col-lg-4');
            $("#d_programa_municipal").removeClass('col-lg-4 has-error').addClass('col-lg-4');

            $("#d_monto_solicitado").removeClass('col-lg-4 has-error').addClass('col-lg-4');

            if(monto_solicitado==0)$("#d_monto_solicitado").removeClass('col-lg-12').addClass('col-lg-12 has-error');

              if(obra=="")$("#d_obra").removeClass('col-lg-12').addClass('col-lg-12 has-error');
              if(tipo_inversion=="")$("#d_tipo_inversion").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
              if(tipo_expediente=="")$("#d_tipo_expediente").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
              if(dimension_inversion=="")$("#d_dimension_inversion").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
              if(dependencia_solicitante=="")$("#d_dependencia_solicitante").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
              if(dependencia_ejecutora=="")$("#d_dependencia_ejecutora").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
              if(unidad_responsable=="")$("#d_unidad_responsable").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
              if(etapa=="")$("#d_etapa").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
              if(periodo_ejecucion=="")$("#d_periodo_ejecucion").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
              if(propuesta_anual=="")$("#d_propuesta_anual").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
              if(normativa_aplicar=="")$("#d_normativa_aplicar").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
              if(tipo_adj_solicitado=="")$("#d_tipo_adj_solicitado").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
              if(partidas=="")$("#d_partidas").removeClass('col-lg-4 ').addClass('col-lg-4 has-error');
              if(programa_federal=="" && programa_estatal=="" && programa_municipal==""){
                $("#d_programa_federal").removeClass('col-lg-4 ').addClass('col-lg-4 has-error');
                $("#d_programa_estatal").removeClass('col-lg-4 ').addClass('col-lg-4 has-error');
                $("#d_programa_municipal").removeClass('col-lg-4 ').addClass('col-lg-4 has-error');
              }



      var condicion_obra;
      obra_existe().success(function (data) {condicion_obra = data.obra;
      if(Number(condicion_obra) == 0 ){
        var suma_final = parseFloat(aporte_federal)+parseFloat(aporte_estatal)+parseFloat(aporte_municipal)+parseFloat(aportacion_otros)+parseFloat(aportacion_beneficiarios);
        if(parseFloat(monto_solicitado).toFixed(2) == parseFloat(suma_final).toFixed(2)   && monto_solicitado>0 ){
          if(obra!="" && tipo_inversion!="" && tipo_expediente!="" && dimension_inversion!="" && dependencia_ejecutora!="" && dependencia_solicitante!="" && unidad_responsable!="" && etapa!="" && periodo_ejecucion!=""
                && propuesta_anual!="" && normativa_aplicar!="" && tipo_adj_solicitado!="" && partidas!="" && (programa_federal!="" || programa_estatal!="" || programa_municipal!="" ))
                {

                    $.ajax({

                    url: '../../../controladores/_S_agregar_obra.php',
                    type: 'post',
                    data: {
                      obra:obra,tipo_inversion:tipo_inversion,tipo_expediente:tipo_expediente,monto_solicitado:monto_solicitado,
                      dimension_inversion:dimension_inversion,dependencia_solicitante:dependencia_solicitante,
                      dependencia_ejecutora:dependencia_ejecutora,unidad_responsable:unidad_responsable,etapa:etapa,
                      periodo_ejecucion:periodo_ejecucion,propuesta_anual:propuesta_anual,normativa_aplicar:normativa_aplicar,
                      tipo_adj_solicitado:tipo_adj_solicitado,partidas:partidas,
                      //ubicacion_municipio:ubicacion_municipio, ubicacion_localidad:ubicacion_localidad,
                      ubicacion:ubicacion,
                      beneficiarios_directos:beneficiarios_directos,
                      beneficiarios_indirectos:beneficiarios_indirectos,empleos_directos:empleos_directos,empleos_indirectos:empleos_indirectos,
                      programa_federal:programa_federal,aporte_federal:aporte_federal,programa_estatal:programa_estatal,
                      aporte_estatal:aporte_estatal,programa_municipal:programa_municipal,aporte_municipal:aporte_municipal,
                      aportacion_beneficiarios:aportacion_beneficiarios,aportacion_otros:aportacion_otros

                    },
                    success: function (data) {


                      $("#obra").val("");
                      $("#tipo_inversion").val("");
                      $("#tipo_expediente").val("");
                      $("#monto_solicitado").val("");
                      $("#dimension_inversion").val("") ;
                      $("#dependencia_solicitante").val("") ;
                      $("#dependencia_ejecutora").val("");
                      $("#unidad_responsable").val("");
                      $("#etapa").val("") ;
                      $("#periodo_ejecucion").val("") ;
                      $("#propuesta_anual").val("");
                      $("#normativa_aplicar").val("");
                      $("#tipo_adj_solicitado").val("");
                      $("#partidas").val("");
                      $("#municipio").val("");
                      $("#localidad").val("");
                      $("#beneficiarios_directos").val("");
                      $("#beneficiarios_indirectos").val("");
                      $("#empleos_directos").val("");
                      $("#empleos_indirectos").val("");
                      $("#programa_federal").val("");
                      $("#aporte_federal").val("");
                      $("#programa_estatal").val("");
                      $("#aporte_estatal").val("");
                      $("#programa_municipal").val("");
                      $("#aporte_municipal").val("");
                      $("#aportacion_beneficiarios").val("");
                      $("#aportacion_otros").val("");
                      $('#suma_total').empty();

                      funcion_toastr("success","Obra agregada con Éxito");
                      $('#total_ubicacion_campos').val("1");
                      glb_ubicacion = [];
                      $('#panel_ubicacion_app').empty();
                    }
                    ,

                    error: function (jqXHR, textStatus, errorThrown) {
                      alert(errorThrown);
                    }


                  }); //end ajax agregar obra

            }//endif campos vacios
            else{
              funcion_toastr("error","Campos obligatorios vacios");
            }
      }//endif montos
      else{
          funcion_toastr("error","Montos incorrectos");
      } //endelse montos

      }//endif existe obra
      else{
          funcion_toastr("error","La obra ya existe");
    }//end else existe obra
    });
  });

  $('#municipio')
      .append($("<option></option>")
      .attr("value","")
      .text(""))
      .append($("<option></option>")
      .attr("value","VARIOS")
      .text("VARIOS"))
      ;
  getMunicipios().success(function (data) {
    $.each(data, function(key, value) {
        $('#municipio')
            .append($("<option></option>")
            .attr("value",value)
            .text(value))
            ;
          });
    });

    $("#municipio").change(function() {
      $('#localidad').empty();
      glb_ubicacion[0] = new Array(6);
      glb_ubicacion[0][0]="";
      glb_ubicacion[0][1]="";
      var resultado = actualizar_beneficiarios($('#total_ubicacion_campos').val());
      $("#beneficiarios_directos").val(resultado[0]);
      $("#beneficiarios_indirectos").val(resultado[1]);

      $('#localidad')
          .append($("<option></option>")
          .attr("value","")
          .text(""));
    if($("#municipio").val() == 'VARIOS'){
      $('#localidad')
          .append($("<option></option>")
          .attr("value","VARIOS")
          .text("VARIOS"));
    }
    else{
    getLocalidades($("#municipio").val()).success(function (data) {
    $.each(data, function(key, value) {
        $('#localidad')
            .append($("<option></option>")
            .attr("value",value.localidad)
            .text(value.localidad));
        });
      });
    }
});

  $("#localidad").change(function() {
    getTotalUbicacion($("#municipio").val(),$("#localidad").val()).success(function (data) {
      agregar_ubicacionGLB(data,1);
      var resultado = actualizar_beneficiarios($('#total_ubicacion_campos').val());
      $("#beneficiarios_directos").val(resultado[0]);
      $("#beneficiarios_indirectos").val(resultado[1]);
    });
});

$('#btn_agregar_ubicacion').click(function (event) {
var num_var_id = $('#total_ubicacion_campos').val();
num_var_id = Number(num_var_id) + 1;


glb_ubicacion[num_var_id] = new Array(5);
glb_ubicacion[num_var_id][0]="";
glb_ubicacion[num_var_id][1]="";
glb_ubicacion[num_var_id][2]=0;
glb_ubicacion[num_var_id][3]=0;
glb_ubicacion[num_var_id][4]=0;
glb_ubicacion[num_var_id][5]="";

$('#total_ubicacion_campos').val(num_var_id);
var append_ubicacion="<div class='col-lg-12  col-sm-6' >"+
                  "<div class='col-lg-3  col-sm-6'><label for=''>Municipio</label>"+
                  "<select  onchange='municipio_i("+num_var_id+")' class='form-control option' id='municipio"+num_var_id+"'>"+
                  "</select><br></div><div class='col-lg-3  col-sm-6'><label for=''>Localidad</label>"+
                  "<select onchange='localidad_i("+num_var_id+")' class='form-control option' id='localidad"+num_var_id+"'>"+
                  "</select><br></div>";


$('#panel_ubicacion_app').append(append_ubicacion);

$('#municipio'+num_var_id)
    .append($("<option></option>")
    .attr("value","")
    .text(""))
    .append($("<option></option>")
    .attr("value","VARIOS")
    .text("VARIOS"))
    ;
getMunicipios().success(function (data) {
  $.each(data, function(key, value) {
      $('#municipio'+num_var_id)
          .append($("<option></option>")
          .attr("value",value)
          .text(value))
          ;
        });
  });
});

$('#monto_solicitado').change(function() {
  formato_montos("monto_solicitado");
  sumaAportes();
  $('#empleos_directos').val("");
  $('#empleos_indirectos').val("");

  var monto_solicitado = $('#monto_solicitado').val();
  if($.isNumeric(monto_solicitado)){

    $('#empleos_directos').val(Math.round(parseFloat(monto_solicitado)/ 200000) );
    $('#empleos_indirectos').val((Math.round(parseFloat(monto_solicitado)/ 200000) )*4);
  }


});

$('#aporte_federal').change(function() {
  formato_montos("aporte_federal");
  sumaAportes();
});

$('#aporte_municipal').change(function() {
  formato_montos("aporte_municipal");
  sumaAportes();
});

$('#aporte_estatal').change(function() {
  formato_montos("aporte_estatal");
  sumaAportes();
});


$('#aportacion_otros').change(function() {
  formato_montos("aportacion_otros");
  sumaAportes();
});

$('#aportacion_beneficiarios').change(function() {
  formato_montos("aportacion_beneficiarios");
  sumaAportes();
});

$('#m_monto_solicitado').change(function() {
formato_montos("m_monto_solicitado");
m_sumaAportes();
$('#m_empleos_directos').val("");
$('#m_empleos_indirectos').val("");
var monto_solicitado = $("#m_monto_solicitado").val().replace(/[^0-9\.]+/g,"");

if($.isNumeric(monto_solicitado)){

$('#m_empleos_directos').val(Math.round(parseFloat(monto_solicitado)/ 200000) );
$('#m_empleos_indirectos').val((Math.round(parseFloat(monto_solicitado)/ 200000) )*4);
}


});

$('#m_aporte_federal').change(function() {
  formato_montos("m_aporte_federal");
  m_sumaAportes();
});

$('#m_aporte_municipal').change(function() {
  formato_montos("m_aporte_municipal");
  m_sumaAportes();
});

$('#m_aporte_estatal').change(function() {
  formato_montos("m_aporte_estatal");
  m_sumaAportes();
});


$('#m_aportacion_otros').change(function() {
  formato_montos("m_aportacion_otros");
  m_sumaAportes();
});

$('#m_aportacion_beneficiarios').change(function() {
  formato_montos("m_aportacion_beneficiarios");
  m_sumaAportes();
});

});//END JQUERY


function formato_montos(nombre){
  var monto = $("#"+nombre).val().replace(/[^0-9\.]+/g,"");
  $("#"+nombre).val(numero_coma(parseFloat(monto).toFixed(2)));
  monto = $("#"+nombre).val().replace(/[^0-9\.]+/g,"");
}


function getLocalidades(municipio_nombre){
  return $.ajax({
    type: 'POST',
    url: '../../../controladores/_S_get_localidades.php',
    data: {municipio_nombre:municipio_nombre},
    dataType: 'json',
  });
  }


function getTotalUbicacion(municipio_nombre,localidad_nombre){
  return $.ajax({
    type: 'POST',
    url: '../../../controladores/_S_get_totalUbicacion.php',
    data: {municipio_nombre:municipio_nombre, localidad_nombre:localidad_nombre},
    dataType: 'json',
  });
}

function getMunicipios(){
  return $.ajax({
    type: 'POST',
    url: '../../../controladores/_S_get_municipios.php',
    data: {},
    dataType: 'json',
  });
  }

  function municipio_i(i){
    glb_ubicacion[i-1] = new Array(6);
    glb_ubicacion[i-1][0]="";
    glb_ubicacion[i-1][1]="";
    $('#localidad'+i).empty();
    var resultado = actualizar_beneficiarios($('#total_ubicacion_campos').val());
    $("#beneficiarios_directos").val(resultado[0]);
    $("#beneficiarios_indirectos").val(resultado[1]);
    $('#localidad'+i)
        .append($("<option></option>")
        .attr("value","")
        .text(""));
  if($("#municipio"+i).val() == 'VARIOS'){
    $('#localidad'+i)
        .append($("<option></option>")
        .attr("value","VARIOS")
        .text("VARIOS"));
  }
  else{
  getLocalidades($("#municipio"+i).val()).success(function (data) {
  $.each(data, function(key, value) {
      $('#localidad'+i)
          .append($("<option></option>")
          .attr("value",value.localidad)
          .text(value.localidad));
      });
    });
  }
  }

  function localidad_i(i){
    getTotalUbicacion($("#municipio"+i).val(),$("#localidad"+i).val()).success(function (data) {
      agregar_ubicacionGLB(data,i);
      var resultado = actualizar_beneficiarios($('#total_ubicacion_campos').val());
      $("#beneficiarios_directos").val(resultado[0]);
      $("#beneficiarios_indirectos").val(resultado[1]);
    });
  }

  function actualizar_beneficiarios(total_num){
    var y=0;
    var municipios_agregados = [];
    var son_iguales = 0;
    var total_poblacion_areglos = 0;
    var total_directa = 0;
    var total_indirecta = 0;

    for(var x=0;x<total_num;x++){

      if(glb_ubicacion[x][1]!=""){
        total_directa = Number(total_directa) + Number(glb_ubicacion[x][2]);
        if(y==0){
          municipios_agregados[y] = glb_ubicacion[x][0];
          total_poblacion_areglos = Number(total_poblacion_areglos) + Number(glb_ubicacion[x][4]);
          y++;
        }
        else{
          for(var z=0;z<y;z++){
            if(municipios_agregados[z]==glb_ubicacion[x][0]){
              son_iguales = 1;
            }
          }
          if(son_iguales=='1'){
            son_iguales = 0;
          }
          else{
            municipios_agregados[y] = glb_ubicacion[x][0];
            total_poblacion_areglos = Number(total_poblacion_areglos) + Number(glb_ubicacion[x][4]);
            y++;
          }
        }
      }
    }
    total_indirecta =  Number(total_poblacion_areglos) - Number(total_directa);

    var resultado = new Array(2);
    resultado[0] = total_directa;
    resultado[1] = total_indirecta;
    return resultado;
  }


  function agregar_ubicacionGLB(data,i){
    var poblacion_total = data.poblacion_total;
    var poblacion_directa = data.poblacion_localidad;

    if(!($.isNumeric(poblacion_total))) poblacion_total = 0;
    if(!($.isNumeric(poblacion_directa))) poblacion_directa = 0;
    var poblacion_indirecta = parseFloat(poblacion_total) - parseFloat(poblacion_directa);

    glb_ubicacion[i-1] = new Array(5);
    glb_ubicacion[i-1][0]=data.municipio;
    glb_ubicacion[i-1][1]=data.localidad;
    glb_ubicacion[i-1][2]=poblacion_directa;
    glb_ubicacion[i-1][3]=poblacion_indirecta;
    glb_ubicacion[i-1][4]=poblacion_total;
    glb_ubicacion[i-1][5]=data.no_localidad;
  }



function numero_coma(x) {
  var parts = x.toString().split(".");
   parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
   return parts.join(".");
}



function sumaAportes(){
  var aporte_federal;
  var aporte_estatal;
  var aporte_municipal;
  var aportacion_otros;
  var aportacion_beneficiarios;
  var monto_solicitado;
  var suma_aportes;

  var monto_solicitado = $("#monto_solicitado").val().replace(/[^0-9\.]+/g,"");
  var aporte_federal = $("#aporte_federal").val().replace(/[^0-9\.]+/g,"");
  var aporte_estatal = $("#aporte_estatal").val().replace(/[^0-9\.]+/g,"");
  var aporte_municipal = $("#aporte_municipal").val().replace(/[^0-9\.]+/g,"");
  var aportacion_beneficiarios = $("#aportacion_beneficiarios").val().replace(/[^0-9\.]+/g,"");
  var aportacion_otros = $("#aportacion_otros").val().replace(/[^0-9\.]+/g,"");

  if(!($.isNumeric(monto_solicitado))) monto_solicitado = 0;
  if(!($.isNumeric(aporte_federal))) aporte_federal = 0;
  if(!($.isNumeric(aporte_estatal))) aporte_estatal = 0;
  if(!($.isNumeric(aporte_municipal))) aporte_municipal = 0;
  if(!($.isNumeric(aportacion_otros))) aportacion_otros = 0;
  if(!($.isNumeric(aportacion_beneficiarios))) aportacion_beneficiarios = 0;

  suma = parseFloat(aporte_federal)+parseFloat(aporte_estatal)+parseFloat(aporte_municipal)+parseFloat(aportacion_otros)+parseFloat(aportacion_beneficiarios);
  contenido_mensaje= "<h3>Total: $" + numero_coma(parseFloat(suma).toFixed(2)) + "</h3>        ";


  if(parseFloat(monto_solicitado).toFixed(2) == parseFloat(suma).toFixed(2)){
      contenido_mensaje = contenido_mensaje + "  <span class='label label-success' id=''><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></span>";
    }
    else{
      contenido_mensaje = contenido_mensaje + "<span class='label label-danger' id=''><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> La suma de los Montos es diferente al Monto Solicitado VERIFICAR A LA BREVEDAD</span>";
    }

    $('#suma_total').empty()
                .append(contenido_mensaje);

}

function m_sumaAportes(){
  var aporte_federal;
  var aporte_estatal;
  var aporte_municipal;
  var aportacion_otros;
  var aportacion_beneficiarios;
  var monto_solicitado;
  var suma_aportes;

  var monto_solicitado = $("#m_monto_solicitado").val().replace(/[^0-9\.]+/g,"");
  var aporte_federal = $("#m_aporte_federal").val().replace(/[^0-9\.]+/g,"");
  var aporte_estatal = $("#m_aporte_estatal").val().replace(/[^0-9\.]+/g,"");
  var aporte_municipal = $("#m_aporte_municipal").val().replace(/[^0-9\.]+/g,"");
  var aportacion_beneficiarios = $("#m_aportacion_beneficiarios").val().replace(/[^0-9\.]+/g,"");
  var aportacion_otros = $("#m_aportacion_otros").val().replace(/[^0-9\.]+/g,"");

  if(!($.isNumeric(monto_solicitado))) monto_solicitado = 0;
  if(!($.isNumeric(aporte_federal))) aporte_federal = 0;
  if(!($.isNumeric(aporte_estatal))) aporte_estatal = 0;
  if(!($.isNumeric(aporte_municipal))) aporte_municipal = 0;
  if(!($.isNumeric(aportacion_otros))) aportacion_otros = 0;
  if(!($.isNumeric(aportacion_beneficiarios))) aportacion_beneficiarios = 0;

  suma = parseFloat(aporte_federal)+parseFloat(aporte_estatal)+parseFloat(aporte_municipal)+parseFloat(aportacion_otros)+parseFloat(aportacion_beneficiarios);
  contenido_mensaje= "<h3>Total: $" + numero_coma(parseFloat(suma).toFixed(2)) + "</h3>        ";


  if(parseFloat(monto_solicitado).toFixed(2) == parseFloat(suma).toFixed(2)){
      contenido_mensaje = contenido_mensaje + "  <span class='label label-success' id=''><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></span>";
    }
    else{
      contenido_mensaje = contenido_mensaje + "<span class='label label-danger' id=''><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> La suma de los Montos es diferente al Monto Solicitado VERIFICAR A LA BREVEDAD</span>";
    }

    $('#m_suma_total').empty()
                .append(contenido_mensaje);

}
