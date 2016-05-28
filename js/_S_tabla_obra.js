var glb_m_ubicacion = [];

$(document).ready(function () {
      var act_id_obra;
      var myModal;

      var mostrar = $('#mostrar').DataTable( {
          "processing": true,
          "serverSide": true,
          "responsive": true,
          "sDom": "flrtip",
          "ajax":{
             url :"../../../controladores/_S_mostrar_obra.php", // json datasource
             type: "POST"
            },
            "createdRow": function( row, data, dataIndex ) {
                if ( data[7] == 'CANCELADA' ) $(row).addClass('can');
                if ( data[7] == 'ADJUDICADA DAOP' ) $(row).addClass('aceptada');
              },
               "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                      //CLICK FILA
                      $('td', nRow).on('click', function() {
                        myModal = $('#myModal');
                        myModal
                        inicializar_campos();
                        act_id_obra = aData[0];
                        $('#m_id_obra').val(act_id_obra);

                        actualizar_datos(act_id_obra);
                        actualizar_fecha_ingreso(act_id_obra);
                        setTimeout(function(){get_Obra(aData[0]).success(function (data) {

                          $('<small>'+data.identificacion.obra+'</small>').appendTo('#contenido_alcance');
                          $('#m_obra').val(data.identificacion.obra);
                          $('#m_no_obra').val(data.identificacion.no_obra);
                          $('#m_no_autorizacion').val(data.identificacion.no_autorizacion);
                          $('#m_fecha_autorizacion').val(data.identificacion.fecha_autorizacion);
                          if(data.identificacion.fecha_autorizacion!="")$('#m_fecha_autorizacion_v').val($.format.date(data.identificacion.fecha_autorizacion+" 00:00:00", "dd MMMM yyyy"));
                          else $('#m_fecha_autorizacion_v').val("");
                          $('#m_fecha_recibido_autorizacion').val(data.identificacion.fecha_recibido_autorizacion);
                          if(data.identificacion.fecha_recibido_autorizacion!="")$('#m_fecha_recibido_autorizacion_v').val($.format.date(data.identificacion.fecha_recibido_autorizacion+" 00:00:00", "dd MMMM yyyy"));
                          else $('#m_fecha_recibido_autorizacion_v').val("");
                          $('#m_tipo_inversion').val(data.identificacion.tipo_inversion);
                          $('#m_tipo_expediente').val(data.identificacion.tipo_expediente);
                          $('#m_dimension_inversion').val(data.identificacion.dimension_inversion);
                          $('#m_unidad_responsable').val(data.identificacion.unidad_responsable);
                          $('#m_etapa').val(data.identificacion.etapa);
                          $('#m_periodo_ejecucion').val(data.identificacion.periodo_ejecucion);
                          $('#m_propuesta_anual').val(data.identificacion.propuesta_anual);
                          $('#m_normativa_aplicar').val(data.identificacion.normativa_aplicar);
                          $('#m_tipo_adj_solicitado').val(data.identificacion.tipo_adj_solicitado);
                          $('#m_partidas').val(data.identificacion.partidas);
                          $('#m_beneficiarios_directos').val(data.identificacion.beneficiarios_directos);
                          $('#m_beneficiarios_indirectos').val(data.identificacion.beneficiarios_indirectos);
                          $('#m_empleos_indirectos').val(data.identificacion.empleos_indirectos);
                          $('#m_empleos_directos').val(data.identificacion.empleos_directos);

                          ////EF
                          $('#m_monto_solicitado').val(data.estructura_financiera.total);
                          $('#m_programa_federal').val(data.estructura_financiera.programa_federal);
                          $('#m_programa_estatal').val(data.estructura_financiera.programa_estatal);
                          $('#m_programa_municipal').val(data.estructura_financiera.programa_municipal);
                          $('#m_aporte_federal').val(data.estructura_financiera.aporte_federal);
                          $('#m_aporte_estatal').val(data.estructura_financiera.aporte_estatal);
                          $('#m_aporte_municipal').val(data.estructura_financiera.aporte_municipal);
                          $('#m_aportacion_otros').val(data.estructura_financiera.aportacion_otros);
                          $('#m_aportacion_beneficiarios').val(data.estructura_financiera.aportacion_beneficiarios);

                          //ALCANCE
                          actualizar_alcance(data.alcance);

                          //REVISIONES
                          actualizar_revision(data.revisiones.direccion,"direccion");
                          actualizar_revision(data.revisiones.seguimiento,"seguimiento");
                          actualizar_revision(data.revisiones.licitaciones,"licitaciones");
                          ////UBICACION
                          $('#m_municipio')
                              .append($("<option></option>")
                              .attr("value","")
                              .text(""))
                              .append($("<option></option>")
                              .attr("value","VARIOS")
                              .text("VARIOS"))
                           ;

                           if(data.ubicacion['ubicacion_0'].municipio){
                             var municipio_d = data.ubicacion['ubicacion_0'].municipio;
                             var localidad_d = data.ubicacion['ubicacion_0'].localidad;
                             m_agregar_ubicacionGLB(data.ubicacion['ubicacion_0'],1);

                             var len = 0;
                             var i;
                             for(i in data.ubicacion){
                               if (data.ubicacion.hasOwnProperty(i)) {
                                 len++;
                               }
                             }
                             if(len>0){
                               var x;
                               var xx = 1;
                               for(x=1;x<len;x++){
                                 addUbicacionGet(data.ubicacion['ubicacion_'+x].municipio, data.ubicacion['ubicacion_'+x].localidad);
                                 m_agregar_ubicacionGLB(data.ubicacion['ubicacion_'+x],++xx);
                               }
                             }
                           }
                           else{
                             var municipio_d = "";
                             var localidad_d = "";
                           }

                           m_getMunicipios().success(function (data) {
                             $.each(data, function(key, value) {
                                 $('#m_municipio')
                                     .append($("<option></option>")
                                     .attr("value",value)
                                     .text(value));
                                   });
                             $('#m_municipio').val(municipio_d);
                             $('#m_localidad')
                                 .append($("<option></option>")
                                 .attr("value","")
                                 .text(""));

                           if($("#m_municipio").val() == 'VARIOS'){
                           $('#m_localidad')
                                       .append($("<option></option>")
                                       .attr("value","VARIOS")
                                       .text("VARIOS"));
                               $('#m_localidad').val(localidad_d);
                             }
                             else{
                             m_getLocalidades(municipio_d).success(function (data) {
                                 $.each(data, function(key, value) {
                                     $('#m_localidad')
                                         .append($("<option></option>")
                                         .attr("value",value.localidad)
                                         .text(value.localidad));
                                     });
                                     $('#m_localidad').val(localidad_d);

                                   })
                                   .error(function(data){
                                       funcion_toastr("error","Error de conexión / Localidades");
                                       $.ajax(this);
                                   })
                                   ;
                               }
                             })
                             .error(function(data){
                                 funcion_toastr("error","Error de conexión / Municipios 2");
                                 $.ajax(this);
                             });
                        })
                        .error(function(data){
                            funcion_toastr("error","Error de conexión / Obra");
                            $.ajax(this);
                        });


                      },200);

                          setTimeout(function(){cambiar_read(true)},520);
                          $('#m_tabs a:first').tab('show');
                          setTimeout(function(){ myModal.modal({ show: true }); }, 1000);

                     });
            }

        });


    $('#actualizar_obra').click(function (event) {

        var id_obra = act_id_obra;
        var no_obra = $("#m_no_obra").val().trim();
        var obra = $("#m_obra").val().trim();
        var no_autorizacion = $("#m_no_autorizacion").val().trim();
        var fecha_autorizacion = $("#m_fecha_autorizacion").val();
        var fecha_recibido_autorizacion = $("#m_fecha_recibido_autorizacion").val();
        var tipo_inversion = $("#m_tipo_inversion").val().trim();
        var tipo_expediente = $("#m_tipo_expediente").val().trim();
        var monto_solicitado = $("#m_monto_solicitado").val().replace(/[^0-9\.]+/g,"");
        var dimension_inversion = $("#m_dimension_inversion").val();
        var unidad_responsable = $("#m_unidad_responsable").val().trim();
        var etapa = $("#m_etapa").val();
        var periodo_ejecucion = $("#m_periodo_ejecucion").val().trim();
        var propuesta_anual = $("#m_propuesta_anual").val();
        var normativa_aplicar = $("#m_normativa_aplicar").val().trim();
        var tipo_adj_solicitado = $("#m_tipo_adj_solicitado").val();
        var partidas = $("#m_partidas").val().trim();
        var total_ubicaciones = $('#m_total_ubicacion_campos').val();
        var ubicacion  = [];

        for(x=0;x<total_ubicaciones;x++){
          if(glb_m_ubicacion[x][0]!=""){
            if(glb_m_ubicacion[x][1]!=""){
                                ubicacion.push({
                                  'municipio':glb_m_ubicacion[x][0],
                                  'localidad':glb_m_ubicacion[x][1]
                                });
            }
          }
        }
        ubicacion = JSON.stringify(ubicacion);
        var resultado = m_actualizar_beneficiarios($('#m_total_ubicacion_campos').val());
        $("#m_beneficiarios_directos").val(resultado[0]);
        $("#m_beneficiarios_indirectos").val(resultado[1]);
        var beneficiarios_directos = $("#m_beneficiarios_directos").val();
        var beneficiarios_indirectos = $("#m_beneficiarios_indirectos").val();
        var programa_federal = $("#m_programa_federal").val();
        var aporte_federal = $("#m_aporte_federal").val().replace(/[^0-9\.]+/g,"");
        var programa_estatal = $("#m_programa_estatal").val().trim();
        var aporte_estatal = $("#m_aporte_estatal").val().replace(/[^0-9\.]+/g,"");
        var programa_municipal = $("#m_programa_municipal").val().trim();
        var aporte_municipal = $("#m_aporte_municipal").val().replace(/[^0-9\.]+/g,"");
        var aportacion_beneficiarios = $("#m_aportacion_beneficiarios").val().replace(/[^0-9\.]+/g,"");
        var aportacion_otros = $("#m_aportacion_otros").val().replace(/[^0-9\.]+/g,"");
        m_sumaAportes();
        if($.isNumeric(monto_solicitado)){

        $('#m_empleos_directos').val(Math.round(parseFloat(monto_solicitado)/ 200000) );
        $('#m_empleos_indirectos').val((Math.round(parseFloat(monto_solicitado)/ 200000) )*4);
        }
        var empleos_directos = $("#m_empleos_directos").val();
        var empleos_indirectos = $("#m_empleos_indirectos").val();


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



                      $("#dm_obra").removeClass('col-lg-12 has-error').addClass('col-lg-12');
                      $("#dm_tipo_inversion").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
                      $("#dm_tipo_expediente").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
                      $("#dm_dimension_inversion").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
                      $("#dm_dependencia_solicitante").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
                      $("#dm_dependencia_ejecutora").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
                      $("#dm_unidad_responsable").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
                      $("#dm_etapa").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
                      $("#dm_periodo_ejecucion").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
                      $("#dm_propuesta_anual").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
                      $("#dm_normativa_aplicar").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
                      $("#dm_tipo_adj_solicitado").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
                      $("#dm_partidas").removeClass('col-lg-4 has-error').addClass('col-lg-4');
                      $("#dm_programa_federal").removeClass('col-lg-4 has-error').addClass('col-lg-4');
                      $("#dm_programa_estatal").removeClass('col-lg-4 has-error').addClass('col-lg-4');
                      $("#dm_programa_municipal").removeClass('col-lg-4 has-error').addClass('col-lg-4');
                      $("#dm_monto_solicitado").removeClass('col-lg-4 has-error').addClass('col-lg-4');

                      if(monto_solicitado==0)$("#dm_monto_solicitado").removeClass('col-lg-12').addClass('col-lg-12 has-error');

                        if(obra=="")$("#dm_obra").removeClass('col-lg-12').addClass('col-lg-12 has-error');
                        if(tipo_inversion=="")$("#dm_tipo_inversion").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
                        if(tipo_expediente=="")$("#dm_tipo_expediente").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
                        if(dimension_inversion=="")$("#dm_dimension_inversion").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
                        if(dependencia_solicitante=="")$("#dm_dependencia_solicitante").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
                        if(dependencia_ejecutora=="")$("#dm_dependencia_ejecutora").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
                        if(unidad_responsable=="")$("#dm_unidad_responsable").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
                        if(etapa=="")$("#dm_etapa").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
                        if(periodo_ejecucion=="")$("#dm_periodo_ejecucion").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
                        if(propuesta_anual=="")$("#dm_propuesta_anual").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
                        if(normativa_aplicar=="")$("#dm_normativa_aplicar").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
                        if(tipo_adj_solicitado=="")$("#dm_tipo_adj_solicitado").removeClass('col-lg-3  col-sm-6 ').addClass('col-lg-3  col-sm-6 has-error');
                        if(partidas=="")$("#dm_partidas").removeClass('col-lg-4 ').addClass('col-lg-4 has-error');
                        if(programa_federal=="" && programa_estatal=="" && programa_municipal==""){
                          $("#dm_programa_federal").removeClass('col-lg-4 ').addClass('col-lg-4 has-error');
                          $("#dm_programa_estatal").removeClass('col-lg-4 ').addClass('col-lg-4 has-error');
                          $("#dm_programa_municipal").removeClass('col-lg-4 ').addClass('col-lg-4 has-error');
                        }


        var condicion_obra;
        obra_existe_id(id_obra).success(function (data) {condicion_obra = data.obra;
        if(Number(condicion_obra) == 0 ){
          var suma_final = parseFloat(aporte_federal)+parseFloat(aporte_estatal)+parseFloat(aporte_municipal)+parseFloat(aportacion_otros)+parseFloat(aportacion_beneficiarios);
          if(parseFloat(monto_solicitado).toFixed(2) == parseFloat(suma_final).toFixed(2) && monto_solicitado>0 ){
            if(obra!="" && tipo_inversion!="" && tipo_expediente!="" && dimension_inversion!="" && dependencia_ejecutora!="" && dependencia_solicitante!="" && unidad_responsable!="" && etapa!="" && periodo_ejecucion!=""
                  && propuesta_anual!="" && normativa_aplicar!="" && tipo_adj_solicitado!="" && partidas!="" && (programa_federal!="" || programa_estatal!="" || programa_municipal!="" ))
                  {

                      $.ajax({

                        url: '../../../controladores/_S_actualizar_obra.php',
                        type: 'post',
                        data: {
                          id_obra:id_obra, no_obra:no_obra, obra:obra, no_autorizacion:no_autorizacion, fecha_autorizacion:fecha_autorizacion,
                          fecha_recibido_autorizacion:fecha_recibido_autorizacion, tipo_inversion:tipo_inversion,
                          tipo_expediente:tipo_expediente, monto_solicitado:monto_solicitado, dimension_inversion:dimension_inversion,
                          unidad_responsable:unidad_responsable,etapa:etapa,
                          periodo_ejecucion:periodo_ejecucion,propuesta_anual:propuesta_anual,normativa_aplicar:normativa_aplicar,
                          tipo_adj_solicitado:tipo_adj_solicitado,partidas:partidas,
                          ubicacion:ubicacion,beneficiarios_directos:beneficiarios_directos,
                          beneficiarios_indirectos:beneficiarios_indirectos,empleos_directos:empleos_directos,empleos_indirectos:empleos_indirectos,
                          programa_federal:programa_federal,aporte_federal:aporte_federal,programa_estatal:programa_estatal,
                          aporte_estatal:aporte_estatal,programa_municipal:programa_municipal,aporte_municipal:aporte_municipal,
                          aportacion_beneficiarios:aportacion_beneficiarios,aportacion_otros:aportacion_otros

                        },
                        success: function (data) {
                          funcion_toastr("success","Obra actualizada");
                          mostrar.ajax.reload();
                          actualizar_datos(act_id_obra);
                        }
                        ,

                        error: function (jqXHR, textStatus, errorThrown) {
                          alert(errorThrown);
                        }
                      });
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
              funcion_toastr("error","Nombre de la obra en uso");
          }//end else existe obra

        });
    });


    $('#btn_resumen').bind("click", function () {
                window.open("/ctrlLicitaciones/vistas/modulo/normativa/vistas/tabla3.php");
    });

    //$('#btn_resumen').click(function (event) {
//      window.open("/ctrlLicitaciones/vistas/modulo/normativa/vistas/tabla.php");
    //});

    $('#cancelar_obra').click(function (event) {
         var valor = 'CANCELADA';
         var columna = "estatus_general"
         var id_obra = act_id_obra;
         $.ajax({

             url: '../../../controladores/_S_set_valor_obra.php',
             type: 'post',
             data: {
               id_obra:id_obra,columna:columna,valor:valor
             },
             success: function (data) {
                funcion_toastr("success","Obra cancelada");
                 mostrar.ajax.reload();
                 actualizar_datos(act_id_obra);
             }
              ,

             error: function (jqXHR, textStatus, errorThrown) {
                 alert(errorThrown);
             }


         });

    });

    $("#m_municipio").change(function() {
      $('#m_localidad').empty();
      glb_m_ubicacion[0] = new Array(5);
      glb_m_ubicacion[0][0]="";
      glb_m_ubicacion[0][1]="";
      var resultado = m_actualizar_beneficiarios($('#m_total_ubicacion_campos').val());
      $("#m_beneficiarios_directos").val(resultado[0]);
      $("#m_beneficiarios_indirectos").val(resultado[1]);
      $('#m_localidad').empty();
      $('#m_localidad')
          .append($("<option></option>")
          .attr("value","")
          .text(""));
      if($("#m_municipio").val() == 'VARIOS'){
            $('#m_localidad')
                .append($("<option></option>")
                .attr("value","VARIOS")
                .text("VARIOS"));
          }
      else{
        m_getLocalidades($("#m_municipio").val()).success(function (data) {
          $.each(data, function(key, value) {
            $('#m_localidad')
              .append($("<option></option>")
              .attr("value",value.localidad)
              .text(value.localidad));
        });
      });
    }
  });




                                                $("#m_localidad").change(function() {
                                                getTotalUbicacion($("#m_municipio").val(),$("#m_localidad").val()).success(function (data) {
                                                  m_agregar_ubicacionGLB(data,1);
                                                  var resultado = m_actualizar_beneficiarios($('#m_total_ubicacion_campos').val());
                                                  $("#m_beneficiarios_directos").val(resultado[0]);
                                                  $("#m_beneficiarios_indirectos").val(resultado[1]);
                                                });
                                              });






$('#modificar_obra').click(function (event) {
    cambiar_read(false);
});

$('#btn_nuevo_alcance').click(function (event) {
  $('#nuevo_alcance').removeClass("hidden").addClass("visible");
});

$('#btn_nueva_revision_direccion').click(function (event) {
  $('#modificar_revision_direccion').removeClass("visible").addClass("hidden");
  $('#nueva_revision_direccion').removeClass("hidden").addClass("visible");

});

$('#btn_nueva_revision_seguimiento').click(function (event) {
  $('#nueva_revision_seguimiento').removeClass("hidden").addClass("visible");
});

$('#btn_nueva_revision_licitaciones').click(function (event) {
  $('#nueva_revision_licitaciones').removeClass("hidden").addClass("visible");
});

$('#guardar_alcance').click(function (event) {
  var id_obra = act_id_obra;
  var tipo_obra = $("#ma_tipo_obra").val();
  var num_obj = $("#ma_num_obj").val();
  var objeto = $("#ma_objeto").val();
  var cantidad = $("#ma_cantidad").val();
  var um = $("#ma_um").val();
  if(!($.isNumeric(num_obj))) num_obj = 0;
  if(!($.isNumeric(cantidad))) cantidad = 0;
  $.ajax({
      url: '../../../controladores/_S_agregar_alcance.php',
      type: 'post',
      data: {
        id_obra:id_obra, tipo_obra:tipo_obra, num_obj:num_obj, objeto:objeto, cantidad:cantidad, um:um
      },
      success: function (data) {
          funcion_toastr("success","Alcance agregado");
          mostrar.ajax.reload();
          $("#ma_tipo_obra").val("");
          $("#ma_num_obj").val("");
          $("#ma_objeto").val("");
          $("#ma_cantidad").val("");
          $("#ma_um").val("");
          $('#nuevo_alcance').removeClass("visible").addClass("hidden");
          getAlcances(id_obra).success(function (data) {
            actualizar_alcance(data);
          });
      }
       ,
      error: function (jqXHR, textStatus, errorThrown) {
          alert(errorThrown);
      }
  });


});


$('#enviar_direccion').click(function (event) {
  btn_guardar_revision(act_id_obra,"direccion");
});


$('#edt_enviar_direccion').click(function (event) {
  btn_enviar_revision(act_id_obra,"direccion");
});


$('#enviar_seguimiento').click(function (event) {
  btn_guardar_revision(act_id_obra,"seguimiento");
});


$('#m_btn_agregar_ubicacion').click(function (event) {
  addUbicacion();
});


$('#edt_enviar_seguimiento').click(function (event) {
  btn_enviar_revision(act_id_obra,"seguimiento");
});


$('#enviar_licitaciones').click(function (event) {
  btn_guardar_revision(act_id_obra,"licitaciones");
});

$('#edt_enviar_licitaciones').click(function (event) {
  btn_enviar_revision(act_id_obra,"licitaciones");
});

});


/*///////////////////////////////////////////
            FUNCIONES
////////////////////////////////////////////*/

function setValorObra(id_obra,columna,valor){
   return  $.ajax({

        url: '../../../controladores/_S_set_valor_obra.php',
        type: 'post',
        data: {
          id_obra:id_obra,columna:columna,valor:valor
        }
      });
}

function getValorObra(idobra,columna){
  return $.ajax({
    type: 'POST',
    url: '../../../controladores/_S_get_valor_obra.php',
    data: {"id_obra" : idobra, "columna":columna},
    dataType: 'json',
  });
  }

function getObra(idobra){
    return $.ajax({
      type: 'POST',
      url: '../../../controladores/_S_get_obra.php',
      data: {"id_obra" : idobra},
      dataType: 'json',
    });
}

function get_Obra(idobra){
    return $.ajax({
      type: 'POST',
      url: '../../../controladores/_S_test.php',
      data: {"id_obra" : idobra},
      dataType: 'json',
    });
}

function getUbicacion(idobra){
    return $.ajax({
      type: 'POST',
      url: '../../../controladores/_S_get_ubicacion.php',
      data: {"id_obra" : idobra},
      dataType: 'json',
    });

}

function getEstructuraF(idobra){
    return $.ajax({
      type: 'POST',
      url: '../../../controladores/_S_get_estructuraF.php',
      data: {"id_obra" : idobra},
      dataType: 'json',
    });
}

function getAlcances(id_obra){
    return $.ajax({
      type: 'POST',
      url: '../../../controladores/_S_get_alcances.php',
      data: {"id_obra" : id_obra},
      dataType: 'json',
    });
}

function getRevisiones(id_obra,area){
    return $.ajax({
      type: 'POST',
      url: '../../../controladores/_S_get_revisiones.php',
      data: {"id_obra" : id_obra, "area":area},
      dataType: 'json',
    });
}

function borrar_alcance(id_alcance,id_obra){
    $.ajax({
        url: '../../../controladores/_S_borrar_alcance.php',
        type: 'post',
        data: {
          id_alcance:id_alcance
        },
        success: function (data) {
           getAlcances(id_obra).success(function (data) {
             actualizar_alcance(data);
             funcion_toastr("error","Alcance eliminiado");
           });
        }
      });
}

function borrar_revision(id_revisiones,id_obra,area){
   return  $.ajax({
        url: '../../../controladores/_S_borrar_revision.php',
        type: 'post',
        data: {
          id_revisiones:id_revisiones
        },
        success: function (data) {
           getRevisiones(id_obra,area).success(function (data) {
             if(area=="SEGUIMIENTO A LA INVERSIÓN")actualizar_revision(data,"seguimiento");
             else if(area=="LICITACIONES")actualizar_revision(data,"licitaciones");
             else {
               actualizar_revision(data,"direccion");
               actualizar_datos(id_obra);
             }
             funcion_toastr("error","Revisión eliminada");
           });
        }
      });
}

function editar_revision(id_revisiones,id_obra,area){
    alert(area);
    $('#nueva_revision_'+area).removeClass("visible").addClass("hidden");
    $('#modificar_revision_'+area).removeClass("hidden").addClass("visible");
    $("#edt_mr_area_"+area).val("");
    $("#edt_mr_observaciones_"+area).val("");
    $("#edt_mr_fecha_recibido_"+area).val("");
    $("#edt_mr_fecha_recibido_"+area+"2").val("");
    $("#edt_mr_fecha_envio_d"+area).val("");
    $("#edt_mr_fecha_envio_d"+area+"2").val("");
    $("#edt_mr_id_revisiones_d"+area).val();
    $.ajax({
         url: '../../../controladores/_S_get_revision.php',
         type: 'post',
         data: {
           id_revisiones:id_revisiones, id_obra:id_obra
         },
         dataType: 'json'
         ,
         success: function (data) {
              $("#edt_mr_area_"+area).val(data.area);
              $("#edt_mr_observaciones_"+area).val(data.observaciones);
              $("#edt_mr_fecha_recibido_"+area).val(data.fecha_ingreso_d);
              $("#edt_mr_fecha_recibido_"+area+"2").val(data.fecha_ingreso_d2);
              $("#edt_mr_fecha_envio_"+area).val(data.fecha_entrega_d);
              $("#edt_mr_fecha_envio_"+area+"2").val(data.fecha_entrega_d2);
              $("#edt_mr_id_revisiones_"+area).val(data.id_revisiones);
         }
       });
}

  function getFechaRecienteArea(id_obra){
    return $.ajax({
      type: 'POST',
      url: '../../../controladores/_S_get_fecha_area.php',
      data: {id_obra:id_obra},
      dataType: 'json',
    });
    }

function obra_existe(){
  var obra = $("#obra").val();
  return $.ajax({
    type: 'POST',
    url: '../../../controladores/_S_valida_obra.php',
    data: {obra:obra},
    dataType: 'json',
  });
  }

  function obra_existe_id(id_obra){
    var obra = $("#m_obra").val();

    return $.ajax({
      type: 'POST',
      url: '../../../controladores/_S_valida_nombre_obra.php',
      data: {obra:obra, id_obra:id_obra},
      dataType: 'json',
    });
    }

function m_getLocalidades(municipio_nombre){
  return $.ajax({
    type: 'POST',
    url: '../../../controladores/_S_get_localidades.php',
    data: {municipio_nombre:municipio_nombre},
    dataType: 'json',
  });
}

function m_getMunicipios(){
    return $.ajax({
      type: 'POST',
      url: '../../../controladores/_S_get_municipios.php',
      data: {},
      dataType: 'json',
    });
}

function addUbicacion(){
  var num_var_id = $('#m_total_ubicacion_campos').val();
  num_var_id = Number(num_var_id) + 1;

  glb_m_ubicacion[num_var_id-1] = new Array(5);
  glb_m_ubicacion[num_var_id-1][0]="";
  glb_m_ubicacion[num_var_id-1][1]="";
  glb_m_ubicacion[num_var_id-1][2]=0;
  glb_m_ubicacion[num_var_id-1][3]=0;
  glb_m_ubicacion[num_var_id-1][4]=0;

  $('#m_total_ubicacion_campos').val(num_var_id);
  var append_ubicacion="<div class='col-lg-12  col-sm-6' >"+
                    "<div class='col-lg-3  col-sm-6'><label for=''>Municipio</label>"+
                    "<select  onchange='municipio_mi("+num_var_id+")' class='form-control option' id='m_municipio"+num_var_id+"'>"+
                    "</select><br></div><div class='col-lg-3  col-sm-6'><label for=''>Localidad</label>"+
                    "<select onchange='localidad_mi("+num_var_id+")' class='form-control option' id='m_localidad"+num_var_id+"'>"+
                    "</select><br></div>";


  $('#dm_panel_ubicacion_app').append(append_ubicacion);


  $('#m_municipio'+num_var_id)
      .append($("<option></option>")
      .attr("value","")
      .text(""))
      .append($("<option></option>")
      .attr("value","VARIOS")
      .text("VARIOS"))
      ;
  m_getMunicipios().success(function (data) {
    $.each(data, function(key, value) {
        $('#m_municipio'+num_var_id)
            .append($("<option></option>")
            .attr("value",value)
            .text(value))
            ;
          });
    });

}

function addUbicacionGet(data_municipio,data_localidad){
  var num_var_id = $('#m_total_ubicacion_campos').val();
  num_var_id = Number(num_var_id) + 1;

  glb_m_ubicacion[num_var_id-1] = new Array(5);
  glb_m_ubicacion[num_var_id-1][0]="";
  glb_m_ubicacion[num_var_id-1][1]="";
  glb_m_ubicacion[num_var_id-1][2]=0;
  glb_m_ubicacion[num_var_id-1][3]=0;
  glb_m_ubicacion[num_var_id-1][4]=0;
  $('#m_total_ubicacion_campos').val(num_var_id);

  var append_ubicacion="<div class='col-lg-12  col-sm-6' >"+
                    "<div class='col-lg-3  col-sm-6'><label for=''>Municipio</label>"+
                    "<select  onchange='municipio_mi("+num_var_id+")' class='form-control option' id='m_municipio"+num_var_id+"' disabled>"+
                    "</select><br></div><div class='col-lg-3  col-sm-6'><label for=''>Localidad</label>"+
                    "<select onchange='localidad_mi("+num_var_id+")' class='form-control option' id='m_localidad"+num_var_id+"' disabled>"+
                    "</select><br></div>";


  $('#dm_panel_ubicacion_app').append(append_ubicacion);

  $('#m_municipio'+num_var_id)
      .append($("<option></option>")
      .attr("value","")
      .text(""))
      .append($("<option></option>")
      .attr("value","VARIOS")
      .text("VARIOS"))
      ;
  m_getMunicipios().success(function (data) {
    $.each(data, function(key, value) {
        $('#m_municipio'+num_var_id)
            .append($("<option></option>")
            .attr("value",value)
            .text(value))
            ;
      });
          $('#m_municipio'+num_var_id).val(data_municipio);

          $('#m_localidad'+num_var_id).empty();
          $('#m_localidad'+num_var_id)
              .append($("<option></option>")
              .attr("value","")
              .text(""));

        if($("#m_municipio"+num_var_id).val() == 'VARIOS'){
        $('#m_localidad'+num_var_id)
                    .append($("<option></option>")
                    .attr("value","VARIOS")
                    .text("VARIOS"));
            $('#m_localidad'+num_var_id).val(data_localidad);
          }
          else{

          m_getLocalidades(data_municipio).success(function (data) {
              $.each(data, function(key, value) {
                  $('#m_localidad'+num_var_id)
                      .append($("<option></option>")
                      .attr("value",value.localidad)
                      .text(value.localidad));
                  });

                  $('#m_localidad'+num_var_id).val(data_localidad);

                });
            }

    });

}



function municipio_mi(i){
  glb_m_ubicacion[i-1] = new Array(5);
  glb_m_ubicacion[i-1][0]="";
  glb_m_ubicacion[i-1][1]="";
  $('#m_localidad'+i).empty();
  var resultado = m_actualizar_beneficiarios($('#m_total_ubicacion_campos').val());
  $("#m_beneficiarios_directos").val(resultado[0]);
  $("#m_beneficiarios_indirectos").val(resultado[1]);
  $('#m_localidad'+i)
      .append($("<option></option>")
      .attr("value","")
      .text(""));
if($("#m_municipio"+i).val() == 'VARIOS'){
  $('#m_localidad'+i)
      .append($("<option></option>")
      .attr("value","VARIOS")
      .text("VARIOS"));
}
else{
getLocalidades($("#m_municipio"+i).val()).success(function (data) {
$.each(data, function(key, value) {
    $('#m_localidad'+i)
        .append($("<option></option>")
        .attr("value",value.localidad)
        .text(value.localidad));
    });
  });
}
}

function m_actualizar_beneficiarios(total_num){
  var y=0;
  var municipios_agregados = [];
  var son_iguales = 0;
  var total_poblacion_areglos = 0;
  var total_directa = 0;
  var total_indirecta = 0;

  for(var x=0;x<total_num;x++){

    if(glb_m_ubicacion[x][1]!=""){
      total_directa = Number(total_directa) + Number(glb_m_ubicacion[x][2]);
      if(y==0){
        municipios_agregados[y] = glb_m_ubicacion[x][0];
        total_poblacion_areglos = Number(total_poblacion_areglos) + Number(glb_m_ubicacion[x][4]);
        y++;
      }
      else{
        for(var z=0;z<y;z++){
          if(municipios_agregados[z]==glb_m_ubicacion[x][0]){
            son_iguales = 1;
          }
        }
        if(son_iguales=='1'){
          son_iguales = 0;
        }
        else{
          municipios_agregados[y] = glb_m_ubicacion[x][0];
          total_poblacion_areglos = Number(total_poblacion_areglos) + Number(glb_m_ubicacion[x][4]);
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


function m_agregar_ubicacionGLB(data,i){
  var poblacion_total = data.poblacion_total;
  var poblacion_directa = data.poblacion_localidad;

  if(!($.isNumeric(poblacion_total))) poblacion_total = 0;
  if(!($.isNumeric(poblacion_directa))) poblacion_directa = 0;
  var poblacion_indirecta = parseFloat(poblacion_total) - parseFloat(poblacion_directa);

  glb_m_ubicacion[i-1] = new Array(5);
  glb_m_ubicacion[i-1][0]=data.municipio;
  glb_m_ubicacion[i-1][1]=data.localidad;
  glb_m_ubicacion[i-1][2]=poblacion_directa;
  glb_m_ubicacion[i-1][3]=poblacion_indirecta;
  glb_m_ubicacion[i-1][4]=poblacion_total;

}

function localidad_mi(i){
  getTotalUbicacion($("#m_municipio"+i).val(),$("#m_localidad"+i).val()).success(function (data) {
      m_agregar_ubicacionGLB(data,i);
      var resultado = m_actualizar_beneficiarios($('#m_total_ubicacion_campos').val());
      $("#m_beneficiarios_directos").val(resultado[0]);
      $("#m_beneficiarios_indirectos").val(resultado[1]);
  });
}

  function cambiar_read(valor){

                                                                        $('#m_no_obra').prop('readonly', valor);
                                                                        $('#m_obra').prop('readonly', valor);
                                                                        $('#m_no_autorizacion').prop('readonly', valor);
                                                                        if(valor){
                                                                          $('#span_fecha_autorizacion1').hide();
                                                                          $('#span_fecha_autorizacion2').hide();
                                                                          $('#span_fecha_recibido_autorizacion1').hide();
                                                                          $('#span_fecha_recibido_autorizacion2').hide();
                                                                        }
                                                                        else{
                                                                          $('#span_fecha_autorizacion1').show();
                                                                          $('#span_fecha_autorizacion2').show();
                                                                          $('#span_fecha_recibido_autorizacion1').show();
                                                                          $('#span_fecha_recibido_autorizacion2').show();
                                                                        }
                                                                        //$('#m_fecha_autorizacion').prop('readonly', valor);
                                                                        //$('#m_fecha_recibido_autorizacion').prop('readonly', valor);

                                                                        $('#m_tipo_inversion').prop('readonly', valor);
                                                                        $('#m_tipo_expediente').attr('disabled', valor);
                                                                        $('#m_monto_solicitado').prop('readonly', valor);
                                                                        $('#m_dimension_inversion').attr('disabled', valor);
                                                                        $('#m_unidad_responsable').attr('disabled', valor);
                                                                        $('#m_etapa').attr('disabled', valor);
                                                                        $('#m_periodo_ejecucion').prop('readonly', valor);
                                                                        $('#m_propuesta_anual').attr('disabled', valor);
                                                                        $('#m_normativa_aplicar').prop('readonly', valor);
                                                                        $('#m_tipo_adj_solicitado').attr('disabled', valor);
                                                                        $('#m_partidas').prop('readonly', valor);
                                                                        $('#m_municipio').attr('disabled', valor);
                                                                        $('#m_localidad').attr('disabled', valor);
                                                                        $('#m_programa_federal').prop('readonly', valor);
                                                                        $('#m_programa_estatal').prop('readonly', valor);
                                                                        $('#m_programa_municipal').prop('readonly', valor);
                                                                        $('#m_aporte_federal').prop('readonly', valor);
                                                                        $('#m_aporte_estatal').prop('readonly', valor);
                                                                        $('#m_aporte_municipal').prop('readonly', valor);
                                                                        $('#m_aportacion_beneficiarios').prop('readonly', valor);
                                                                        $('#m_aportacion_otros').prop('readonly', valor);
                                                                        $('#m_btn_agregar_ubicacion').attr('disabled', valor);
                                                                        if(valor==false){
                                                                          var x;
                                                                          for(x=2;x<=Number($('#m_total_ubicacion_campos').val());x++){
                                                                            $('#m_municipio'+x).attr('disabled',valor);
                                                                            $('#m_localidad'+x).attr('disabled',valor);
                                                                          }
                                                                        }
  }

function funcion_toastr(atributo,mensaje){
  Command: toastr[atributo](mensaje);
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

function inicializar_campos(){

  //IDENTIFICACIÓN
  $("#m_no_obra").val("");
  $("#m_obra").val("");
  $("#m_no_autorizacion").val("");
  $("#m_fecha_autorizacion").val("");
  $("#m_fecha_recibido_autorizacion").val("");
  $("#m_tipo_inversion").val("");
  $("#m_tipo_expediente").val("");
  $("#m_monto_solicitado").val("");
  $("#m_dimension_inversion").val("");
  $("#m_unidad_responsable").val("");
  $("#m_etapa").val("");
  $("#m_periodo_ejecucion").val("");
  $("#m_propuesta_anual").val("");
  $("#m_normativa_aplicar").val("");
  $("#m_tipo_adj_solicitado").val("");
  $("#m_partidas").val("");
  //UBICACIÓN
  $('#dm_panel_ubicacion_app').empty();
  $('#m_municipio').empty();
  $('#m_localidad').empty();
  $('#m_total_ubicacion_campos').val("1");
  glb_m_ubicacion = [];
  glb_m_ubicacion[0] = new Array(5);
  glb_m_ubicacion[0][0]="";
  glb_m_ubicacion[0][1]="";
  //EF
  $('#m_suma_total').empty();
  $('#m_monto_solicitado').val("");
  $('#m_programa_federal').val("");
  $('#m_programa_estatal').val("");
  $('#m_programa_municipal').val("");
  $('#m_aporte_federal').val("");
  $('#m_aporte_estatal').val("");
  $('#m_aporte_municipal').val("");
  $('#m_aportacion_otros').val("");
  $('#m_aportacion_beneficiarios').val("");
  //ALCANCES
  $('#contenido_alcance').empty();
  $("#ma_tipo_obra").val("");
  $("#ma_num_obj").val("");
  $("#ma_objeto").val("");
  $("#ma_cantidad").val("");
  $("#ma_um").val("");
  //REVISIONES
  $("#mr_fecha_envio_d").val("");
  $("#mr_fecha_recibido_d").val("");
  $("#mr_observaciones_d").val("");
  $("#mr_fecha_envio_d2").val("");
  $("#mr_fecha_recibido_d2").val("");
  $("#mr_observaciones_d2").val("");

  $("#mr_fecha_envio_s").val("");
  $("#mr_fecha_recibido_s").val("");
  $("#mr_observaciones_s").val("");
  $("#mr_fecha_envio_s2").val("");
  $("#mr_fecha_recibido_s2").val("");
  $("#mr_observaciones_s2").val("");

  $("#mr_fecha_envio_l").val("");
  $("#mr_fecha_recibido_l").val("");
  $("#mr_observaciones_l").val("");
  $("#mr_fecha_envio_l2").val("");
  $("#mr_fecha_recibido_l2").val("");
  $("#mr_observaciones_l2").val("");

  $("#edt_mr_id_revisiones_d").val("");
  $("#edt_mr_area_d").val("");
  $("#edt_mr_fecha_recibido_d").val("");
  $("#edt_mr_fecha_envio_d").val("");
  $("#edt_mr_fecha_recibido_d2").val("");
  $("#edt_mr_fecha_envio_d2").val("");
  $("#edt_mr_observaciones_d").val("");

  $("#edt_mr_id_revisiones_s").val("");
  $("#edt_mr_fecha_recibido_s").val("");
  $("#edt_mr_fecha_envio_s").val("");
  $("#edt_mr_fecha_recibido_s2").val("");
  $("#edt_mr_fecha_envio_s2").val("");
  $("#edt_mr_observaciones_s").val("");

  $("#edt_mr_id_revisiones_l").val("");
  $("#edt_mr_fecha_recibido_l").val("");
  $("#edt_mr_fecha_envio_l").val("");
  $("#edt_mr_fecha_recibido_l2").val("");
  $("#edt_mr_fecha_envio_l2").val("");
  $("#edt_mr_observaciones_l").val("");
  //ERRORES
  $("#dm_obra").removeClass('col-lg-12 has-error').addClass('col-lg-12');
  $("#dm_tipo_inversion").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
  $("#dm_tipo_expediente").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
  $("#dm_dimension_inversion").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
  $("#dm_dependencia_solicitante").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
  $("#dm_dependencia_ejecutora").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
  $("#dm_unidad_responsable").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
  $("#dm_etapa").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
  $("#dm_periodo_ejecucion").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
  $("#dm_propuesta_anual").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
  $("#dm_normativa_aplicar").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
  $("#dm_tipo_adj_solicitado").removeClass('col-lg-3  col-sm-6 has-error').addClass('col-lg-3  col-sm-6');
  $("#dm_partidas").removeClass('col-lg-4 has-error').addClass('col-lg-4');
  $("#dm_programa_federal").removeClass('col-lg-4 has-error').addClass('col-lg-4');
  $("#dm_programa_estatal").removeClass('col-lg-4 has-error').addClass('col-lg-4');
  $("#dm_programa_municipal").removeClass('col-lg-4 has-error').addClass('col-lg-4');
  $("#dm_monto_solicitado").removeClass('col-lg-4 has-error').addClass('col-lg-4');
}

function actualizar_revision(data,area){
  $('#tabla_'+area).empty();
  var contentRevision = "<table class='table table-hover'><thead><tr><th>#</th><th>Observaciones</th><th>Area</th><th>Fecha de recibido</th><th>Fecha de envio</th><th></th></tr></thead><tbody>";
  var len = 0;
  var i;
  for(i in data){
    if (data.hasOwnProperty(i)) {
      len++;
      }
  }
  if(len>0){
  for(i=0; i<len; i++){
     contentRevision += '<tr>' +
                       '<td>'+ (i+1)+'</td>'+
                       '<td>'+ data[i].observaciones+'</td>'+
                       '<td>'+ data[i].area+'</td>'+
                       '<td>'+ data[i].fecha_ingreso+'</td>'+
                       '<td>'+ data[i].fecha_entrega+'</td>'+
                       "<td><button type='button' class='btn btn-default'  onclick='borrar_revision("+data[i].id_revisiones+","+data[i].id_obra+",\""+area+"\")'><i class='fa fa-times' aria-hidden='true' style='color:red' ></i></button><button type='button' class='btn btn-default'  onclick='editar_revision("+data[i].id_revisiones+","+data[i].id_obra+",\""+area+"\")'><span class='glyphicon glyphicon-pencil' style='color:blue' aria-hidden='true'></span></button></td>"+
                       '</tr>';
     }
  contentRevision += "</tbody></table>";
  $('#tabla_'+area).append(contentRevision);
}
else {
  contentRevision = "<div class='alert alert-dismissible alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-eye-slash' aria-hidden='true'></i><strong> Expediente sin Observaciones</strong></div>"
  $('#tabla_'+area).append(contentRevision);
}
}

function actualizar_alcance(data){
  $('#tabla_alc').empty();
  var contentAlcance = "<table id='tabla_alcance' class='table table-hover'><thead><tr><th>Tipo de Obra</th><th>Num. Obj.</th><th>Objeto</th><th>Cantidad</th><th>U.M.</th><th></th></tr></thead><tbody id='tbody_alcance'>";
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
                        '<td>'+ data[i].tipo_obra+'</td>'+
                        '<td>'+ data[i].num_obj+'</td>'+
                        '<td>'+ data[i].objeto+'</td>'+
                        '<td>'+ data[i].cantidad+'</td>'+
                        '<td>'+ data[i].um+'</td>'+
                        "<td><button type='button' class='btn btn-default'  onclick='borrar_alcance("+data[i].id_alcance+","+data[i].id_obra+")'><i class='fa fa-times' aria-hidden='true' style='color:red' ></i></button></td>"+
                        '</tr>';
      }
      contentAlcance += "</tbody></table>";
   }
   else{
     contentAlcance = "<div class='alert alert-dismissible alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-eye-slash' aria-hidden='true'></i><strong> Expediente sin alcances</strong></div>"
   }
      $('#tabla_alc').append(contentAlcance);

}

function actualizar_fecha_ingreso(act_id_obra){
  var valor;
  var contenidoRecurso = "";
  //fecha de ingreso del proyecto más reciente
  getFechaRecienteArea(act_id_obra).success(function (data) {
    valor = data.fecha;
    contenidoRecurso = "<small>"+valor+"</small>";
    $('#div_fecha_recibido').empty()
        .append(contenidoRecurso);
  });
}

function btn_enviar_revision(id_obra,id_area){
  var id_revisiones = $("#edt_mr_id_revisiones_"+id_area).val();
  var area = $("#edt_mr_area_"+id_area).val();
  var r_fecha_recibido = $("#edt_mr_fecha_recibido_"+id_area).val();
  var r_fecha_envio = $("#edt_mr_fecha_envio_"+id_area).val();
  var observaciones = $("#edt_mr_observaciones_"+id_area).val();

  if($("#edt_mr_fecha_recibido_"+id_area).val()!=""){
  $.ajax({
      url: '../../../controladores/_S_editar_revision.php',
      type: 'post',
      data: {
        id_revisiones:id_revisiones, id_obra:id_obra, r_fecha_recibido:r_fecha_recibido,r_fecha_envio:r_fecha_envio, observaciones:observaciones, area:area
      },
      success: function (data) {
          $('#modificar_revision_direccion').removeClass("visible").addClass("hidden");
          funcion_toastr("success","Revisión modificada");
          actualizar_fecha_ingreso(id_obra);
          $("#edt_mr_id_revisiones_"+id_area).val("");
          $("#edt_mr_fecha_recibido_"+id_area).val("");
          $("#edt_mr_fecha_envio_"+id_area).val("");
          $("#edt_mr_observaciones_"+id_area).val("");
          $("#mr_fecha_envio_"+id_area+"2").val("");
          $("#mr_fecha_recibido_"+id_area+"2").val("");
          if(id_area=='direccion')getRevisiones(id_obra,"DIRECCION").success(function (data) { actualizar_revision(data,id_area); actualizar_fecha_ingreso(act_id_obra);});
          if(id_area=='seguimiento')getRevisiones(id_obra,"SEGUIMIENTO A LA INVERSIÓN").success(function (data) { actualizar_revision(data,id_area);});
          if(id_area=='licitaciones')getRevisiones(id_obra,"LICITACIONES").success(function (data) { actualizar_revision(data,id_area);});

      }
       ,

      error: function (jqXHR, textStatus, errorThrown) {
          alert(errorThrown);
      }
  });
  }
  else{
    funcion_toastr("error","Ingresa fecha de ingreso");
  }

}


function btn_guardar_revision(id_obra,id_area){
  var area = $("#mr_area_"+id_area).val();
  var r_fecha_recibido = $("#mr_fecha_recibido_"+id_area).val();
  var r_fecha_envio = $("#mr_fecha_envio_"+id_area).val();
  var observaciones = $("#mr_observaciones_"+id_area).val();

  if($("#mr_fecha_recibido_"+id_area).val()!=""){
  $.ajax({
      url: '../../../controladores/_S_agregar_revision.php',
      type: 'post',
      data: {
        id_obra:id_obra, r_fecha_recibido:r_fecha_recibido,r_fecha_envio:r_fecha_envio, observaciones:observaciones, area:area
      },
      success: function (data) {
          funcion_toastr("success","Revisión agregada");
          $("#mr_fecha_envio_"+id_area).val("");
          $("#mr_fecha_recibido_"+id_area).val("");
          $("#mr_observaciones_"+id_area).val("");
          $("#mr_fecha_envio_"+id_area+"2").val("");
          $("#mr_fecha_recibido_"+id_area+"2").val("");
          if(id_area=='direccion')getRevisiones(id_obra,"DIRECCION").success(function (data) { actualizar_revision(data,id_area); actualizar_fecha_ingreso(act_id_obra);});
          if(id_area=='seguimiento')getRevisiones(id_obra,"SEGUIMIENTO A LA INVERSIÓN").success(function (data) { actualizar_revision(data,id_area);});
          if(id_area=='licitaciones')getRevisiones(id_obra,"LICITACIONES").success(function (data) { actualizar_revision(data,id_area);});
      }
       ,
      error: function (jqXHR, textStatus, errorThrown) {
          alert(errorThrown);
      }
  });
  }
  else{
    funcion_toastr("error","Ingresa fecha de ingreso");
  }
}


function actualizar_datos(act_id_obra){
  var valor;
  var contenidoRecurso = "";
  //estatus_recurso
  getValorObra(act_id_obra,'no_obra').success(function (data) {
      valor = data.no_obra;
      if(valor!=""){
        setValorObra(act_id_obra,'estatus_recurso','AUTORIZADO').success(function (data) {
                              getValorObra(act_id_obra,'estatus_recurso').success(function (data) {
                                contenidoRecurso = "Estatus del Recurso<br> <strong>"+data.estatus_recurso+"</strong>";
                                $('#alerta_recurso').empty()
                                  .append(contenidoRecurso);
                              });
        });
      }
      else{
        getValorObra(act_id_obra,'obra').success(function (data) {
          valor = data.obra;
          if(valor!=null){
            setValorObra(act_id_obra,'estatus_recurso','EN INTEGRACIÓN DE EXPEDIENTE').success(function (data) {
                                  getValorObra(act_id_obra,'estatus_recurso').success(function (data) {
                                    contenidoRecurso = "Estatus del Recurso<br> <strong>"+data.estatus_recurso+"</strong>";
                                    $('#alerta_recurso').empty()
                                      .append(contenidoRecurso);
                                  });
            });
          }
        });
      }
  });
  //estatus_general
getValorObra(act_id_obra,'estatus_general').success(function (data) {
  valor = data.estatus_general;
  if(valor=='CANCELADA'){
    contenidoObra = "Estatus Obra<br> <strong>"+valor+"</strong>";
    $('#alerta_obra').empty()
      .append(contenidoObra);

  }
  else{
    getValorObra(act_id_obra,'obra').success(function (data) {
      valor = data.obra;
      if(valor!=null){
          setValorObra(act_id_obra,'estatus_general','AUN NO ENTREGADO').success(function (data) {
                          getValorObra(act_id_obra,'estatus_general').success(function (data) {
                            contenidoObra = "Estatus Obra<br> <strong>"+data.estatus_general+"</strong>";
                            $('#alerta_obra').empty()
                              .append(contenidoObra);

                          });
            });
      }
    });
  }
});

}
