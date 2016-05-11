$(document).ready(function () {
      var act_id_obra;

      var mostrar = $('#mostrar').DataTable( {
          "processing": true,
          "serverSide": true,
          "ajax":{
             url :"../../../controladores/_S_mostrar_obra.php", // json datasource
             type: "POST"/*,
             error: function(){  // error handling
              $(".example-error").html("");
              $("#example").append('<tbody class="example-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#example_processing").css("display","none");}*/
            },

            "createdRow": function( row, data, dataIndex ) {


                if ( data[7] == 'CANCELADA' ) {

                   $(row).addClass('can');
                  //$('tr', row).addClass('highlight');
                  //$(row).addClass( 'important' );
                }

                if ( data[7] == 'ADJUDICADA DAOP' ) {

                   $(row).addClass('aceptada');
                  //$('tr', row).addClass('highlight');
                  //$(row).addClass( 'important' );
                }

              },


               "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                                                              // Cell click
                                                               $('td', nRow).on('click', function() {
                                                                  var myModal = $('#myModal');
                                                                  var txtobra = aData[0];
                                                                  getObra(aData[0]).success(function (data) {
                                                                    act_id_obra = aData[0];

                                                                    $('#contenido').empty();
                                                                    $('<p>'+data.obra+'</p>').appendTo('#contenido');

                                                                    $('#m_obra').val(data.obra);
                                                                    $('#m_no_obra').val(data.no_obra);
                                                                    $('#m_no_autorizacion').val(data.no_autorizacion);
                                                                    $('#m_fecha_autorizacion').val(data.fecha_autorizacion);
                                                                    $('#m_fecha_recibido_autorizacion').val(data.fecha_recibido_autorizacion);
                                                                    $('#m_tipo_inversion').val(data.tipo_inversion);
                                                                    $('#m_tipo_expediente').val(data.tipo_expediente);
                                                                    $('#m_dimension_inversion').val(data.dimension_inversion);
                                                                                //    $('#m_dependencia_solicitante').val(data.);
                                                                            //    $('#m_dependencia_ejecutora').val(data.);
                                                                    $('#m_unidad_responsable').val(data.unidad_responsable);
                                                                    $('#m_etapa').val(data.etapa);
                                                                    $('#m_periodo_ejecucion').val(data.periodo_ejecucion);
                                                                    $('#m_propuesta_anual').val(data.propuesta_anual);
                                                                    $('#m_normativa_aplicar').val(data.normativa_aplicar);
                                                                    $('#m_tipo_adj_solicitado').val(data.tipo_adj_solicitado);
                                                                    $('#m_partidas').val(data.partidas);
                                                                  });
                                                                  getUbicacion(aData[0]).success(function (data) {
                                                                    $('#m_municipio').val(data.municipio);
                                                                    $('#m_localidad').val(data.localidad);
                                                                    $('#m_beneficiarios_directos').val(data.beneficiarios_directos);
                                                                    $('#m_beneficiarios_indirectos').val(data.beneficiarios_indirectos);
                                                                    //$('#m_empleos_indirectos').val(data.empleos_indirectos);
                                                                    //$('#m_empleos_directos').val(data.empleos_directos);
                                                                  });
                                                                  getEstructuraF(aData[0]).success(function (data) {
                                                                    $('#m_monto_solicitado').val(data.total);
                                                                    $('#m_programa_federal').val(data.programa_federal);
                                                                    $('#m_programa_estatal').val(data.programa_estatal);
                                                                    $('#m_programa_municipal').val(data.programa_municipal);
                                                                    $('#m_aporte_federal').val(data.aporte_federal);
                                                                    $('#m_aporte_estatal').val(data.aporte_estatal);
                                                                    $('#m_aporte_municipal').val(data.aporte_municipal);
                                                                    $('#m_aportacion_otros').val(data.aportacion_otros);
                                                                    $('#m_aportacion_beneficiarios').val(data.aportacion_beneficiarios);

                                                                  });
                                                                    getAlcances(aData[0]).success(function (data) {
                                                                      $('#tabla_alc').empty();
                                                                      var contentAlcance = "<table class='table table-hover'><thead><tr><th>Tipo de Obra</th><th>Num. Obj.</th><th>Objeto</th><th>Cantidad</th><th>U.M.</th></tr></thead><tbody>";
                                                                      var len = 0;
                                                                      var i;
                                                                      for (i in data) {
                                                                          if (data.hasOwnProperty(i)) {
                                                                            len++;
                                                                            }
                                                                      }
                                                                        for(i=0; i<len; i++){
                                                                          contentAlcance += '<tr>' +
                                                                                            '<td>'+ data[i].tipo_obra+'</td>'+
                                                                                            '<td>'+ data[i].num_obj+'</td>'+
                                                                                            '<td>'+ data[i].objeto+'</td>'+
                                                                                            '<td>'+ data[i].cantidad+'</td>'+
                                                                                            '<td>'+ data[i].um+'</td>'+
                                                                                            '</tr>';
                                                                          }
                                                                          contentAlcance += "</tbody></table>";
                                                                          $('#tabla_alc').append(contentAlcance);
                                                                  });
          /*                                                          getRevisiones(aData[0]).success(function (data) {
                                                                                                              });*/

                                                                    myModal.modal({ show: true });


                                                               });
            }

        });

        function getObra(idobra){
          return $.ajax({
            type: 'POST',
            url: '../../../controladores/_S_get_obra.php',
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

        function getAlcances(idobra){
          return $.ajax({
            type: 'POST',
            url: '../../../controladores/_S_get_alcances.php',
            data: {"id_obra" : idobra},
            dataType: 'json',
          });

        }
/*
        function getRevisiones(idobra){
          return $.ajax({
            type: 'POST',
            url: '../../../controladores/_S_get_revisiones.php',
            data: {"id_obra" : idobra},
            dataType: 'json',
          });
        }*/

    $('#guardar_obra').click(function (event) {

        var obra = $("#obra").val();
        var tipo_inversion = $("#tipo_inversion").val();
        var tipo_expediente = $("#tipo_expediente").val();
        var monto_solicitado = $("#monto_solicitado").val();
        var dimension_inversion = $("#dimension_inversion").val() ;
        var dependencia_solicitante = $("#dependencia_solicitante").val() ;
        var dependencia_ejecutora = $("#dependencia_ejecutora").val();
        var unidad_responsable = $("#unidad_responsable").val();
        var etapa = $("#etapa").val() ;
        var periodo_ejecucion = $("#periodo_ejecucion").val() ;
        var propuesta_anual = $("#propuesta_anual").val();
        var normativa_aplicar = $("#normativa_aplicar").val();
        var tipo_adj_solicitado = $("#tipo_adj_solicitado").val();
        var partidas = $("#partidas").val();
        //var clave_presupuesto = $("#clave_presupuesto").val();
        //var desc_presupuesto = $("#desc_presupuesto").val();
        var municipio = $("#municipio").val();
        var localidad = $("#localidad").val();
        var beneficiarios_directos = $("#beneficiarios_directos").val();
        var beneficiarios_indirectos = $("#beneficiarios_indirectos").val();
        var empleos_directos = $("#empleos_directos").val();
        var empleos_indirectos = $("#empleos_indirectos").val();
        var programa_federal = $("#programa_federal").val();
        var aporte_federal = $("#aporte_federal").val();
        var programa_estatal = $("#programa_estatal").val();
        var aporte_estatal = $("#aporte_estatal").val();
        var programa_municipal = $("#programa_municipal").val();
        var aporte_municipal = $("#aporte_municipal").val();
        var aportacion_beneficiarios = $("#aportacion_beneficiarios").val();
        var aportacion_otros = $("#aportacion_otros").val();

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

        $.ajax({

            url: '../../../controladores/_S_agregar_obra.php',
            type: 'post',
            data: {
              obra:obra,tipo_inversion:tipo_inversion,tipo_expediente:tipo_expediente,monto_solicitado:monto_solicitado,
              dimension_inversion:dimension_inversion,dependencia_solicitante:dependencia_solicitante,
              dependencia_ejecutora:dependencia_ejecutora,unidad_responsable:unidad_responsable,etapa:etapa,
              periodo_ejecucion:periodo_ejecucion,propuesta_anual:propuesta_anual,normativa_aplicar:normativa_aplicar,
              tipo_adj_solicitado:tipo_adj_solicitado,partidas:partidas,
              municipio:municipio,localidad:localidad,beneficiarios_directos:beneficiarios_directos,
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

                Command: toastr["success"]("Obra agregada con Éxito");
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
             ,

            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }


        });
    });

    $('#actualizar_obra').click(function (event) {

        var id_obra = act_id_obra;
        var no_obra = $("#m_no_obra").val();
        var obra = $("#m_obra").val();
        var no_autorizacion = $("#m_no_autorizacion").val();
        var fecha_autorizacion = $("#m_fecha_autorizacion").val();
        var fecha_recibido_autorizacion = $("#m_fecha_recibido_autorizacion").val();
        var tipo_inversion = $("#m_tipo_inversion").val();
        var tipo_expediente = $("#m_tipo_expediente").val();
        var monto_solicitado = $("#m_monto_solicitado").val();
        var dimension_inversion = $("#m_dimension_inversion").val() ;
        var unidad_responsable = $("#m_unidad_responsable").val();
        var etapa = $("#m_etapa").val() ;
        var periodo_ejecucion = $("#m_periodo_ejecucion").val() ;
        var propuesta_anual = $("#m_propuesta_anual").val();
        var normativa_aplicar = $("#m_normativa_aplicar").val();
        var tipo_adj_solicitado = $("#m_tipo_adj_solicitado").val();
        var partidas = $("#m_partidas").val();
        var municipio = $("#m_municipio").val();
        var localidad = $("#m_localidad").val();
        var beneficiarios_directos = $("#m_beneficiarios_directos").val();
        var beneficiarios_indirectos = $("#m_beneficiarios_indirectos").val();
        var empleos_directos = $("#m_empleos_directos").val();
        var empleos_indirectos = $("#m_empleos_indirectos").val();
        var programa_federal = $("#m_programa_federal").val();
        var aporte_federal = $("#m_aporte_federal").val();
        var programa_estatal = $("#m_programa_estatal").val();
        var aporte_estatal = $("#m_aporte_estatal").val();
        var programa_municipal = $("#m_programa_municipal").val();
        var aporte_municipal = $("#m_aporte_municipal").val();
        var aportacion_beneficiarios = $("#m_aportacion_beneficiarios").val();
        var aportacion_otros = $("#m_aportacion_otros").val();


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
              municipio:municipio,localidad:localidad,beneficiarios_directos:beneficiarios_directos,
              beneficiarios_indirectos:beneficiarios_indirectos,empleos_directos:empleos_directos,empleos_indirectos:empleos_indirectos,
              programa_federal:programa_federal,aporte_federal:aporte_federal,programa_estatal:programa_estatal,
              aporte_estatal:aporte_estatal,programa_municipal:programa_municipal,aporte_municipal:aporte_municipal,
              aportacion_beneficiarios:aportacion_beneficiarios,aportacion_otros:aportacion_otros

            },
            success: function (data) {

                Command: toastr["success"]("Obra actualizada");
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
                mostrar.ajax.reload();
            }
             ,

            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }


        });
    });


    $('#cancelar_obra').click(function (event) {
         var estatus_recurso = 'CANCELADA';
         var id_obra = act_id_obra;
         $.ajax({

             url: '../../../controladores/_S_estatus_obra.php',
             type: 'post',
             data: {
               id_obra:id_obra,estatus_recurso:estatus_recurso
             },
             success: function (data) {

                 Command: toastr["success"]("Obra cancelada");
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
              ,

             error: function (jqXHR, textStatus, errorThrown) {
                 alert(errorThrown);
             }


         });

    });

/*    $('#mostrar').on('dblclick', 'td', function(event) {
      alert("Hola");
    });
*/
/*
$('#btn_nuevo_alcance').click(function (event) {
     var alcModal = $('#modal_alcance');
     alcModal.modal({ show: true });
});
*/




});
