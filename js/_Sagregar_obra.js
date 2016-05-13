$(document).ready(function () {
      var act_id_obra;
      var myModal;
      var mostrar = $('#mostrar').DataTable( {
          "processing": true,
          "serverSide": true,
          "responsive": true,
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
                                                                  myModal = $('#myModal');

                                                                  act_id_obra = aData[0];
                                                                  var contenidoRecurso = "";
                                                                  var contenidoObra = "";
                                                                  actualizar_datos();

                                                                  getObra(aData[0]).success(function (data) {


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
                                                                    $('#m_municipio').empty();
                                                                    $('#m_municipio')
                                                                        .append($("<option></option>")
                                                                        .attr("value","")
                                                                        .text(""));
                                                                   var municipio_d = data.municipio;
                                                                   var localidad_d = data.localidad;
                                                                    m_getMunicipios().success(function (data) {

                                                                      $.each(data, function(key, value) {
                                                                          $('#m_municipio')
                                                                              .append($("<option></option>")
                                                                              .attr("value",value)
                                                                              .text(value));
                                                                            });

                                                                    //  $('#m_municipio option[value='+municipio_d+']').attr('selected', 'selected');
                                                                        $('#m_municipio').val(municipio_d);
                                                                      $('#m_localidad').empty();
                                                                      $('#m_localidad')
                                                                          .append($("<option></option>")
                                                                          .attr("value","")
                                                                          .text(""));
                                                                      m_getLocalidades().success(function (data) {
                                                                          $.each(data, function(key, value) {
                                                                              $('#m_localidad')
                                                                                  .append($("<option></option>")
                                                                                  .attr("value",value)
                                                                                  .text(value));
                                                                              });


                                                                              $('#m_localidad').val(localidad_d);

                                                                            });

                                                                      });








                                                                    $('#m_beneficiarios_directos').val(data.beneficiarios_directos);
                                                                    $('#m_beneficiarios_indirectos').val(data.beneficiarios_indirectos);
                                                                    $('#m_empleos_indirectos').val(data.empleos_indirectos);
                                                                    $('#m_empleos_directos').val(data.empleos_directos);
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
                                                                    getRevisiones(aData[0],"NORMATIVA").success(function (data) {
                                                                      $('#tabla_normativa').empty();
                                                                      var contentRevision = "<table class='table table-hover'><thead><tr><th>#</th><th>Observaciones</th><th>Fecha de recibido</th><th>Fecha de envio</th></tr></thead><tbody>";
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
                                                                                           '<td>'+ data[i].fecha_ingreso+'</td>'+
                                                                                           '<td>'+ data[i].fecha_entrega+'</td>'+
                                                                                           '</tr>';
                                                                         }
                                                                      contentRevision += "</tbody></table>";
                                                                      $('#tabla_normativa').append(contentRevision);
                                                                    }
                                                                    else {
                                                                      contentRevision = "<div class='alert alert-dismissible alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-eye-slash' aria-hidden='true'></i><strong> Expediente sin Observaciones</strong></div>"
                                                                      $('#tabla_normativa').append(contentRevision);
                                                                    }
                                                                    });

                                                                    getRevisiones(aData[0],"DIRECCION").success(function (data) {
                                                                      $('#tabla_direccion').empty();
                                                                      var contentRevision = "<table class='table table-hover'><thead><tr><th>#</th><th>Observaciones</th><th>Fecha de recibido</th><th>Fecha de envio</th></tr></thead><tbody>";
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
                                                                                           '<td>'+ data[i].fecha_ingreso+'</td>'+
                                                                                           '<td>'+ data[i].fecha_entrega+'</td>'+
                                                                                           '</tr>';
                                                                         }
                                                                      contentRevision += "</tbody></table>";
                                                                      $('#tabla_direccion').append(contentRevision);
                                                                    }
                                                                    else {
                                                                      contentRevision = "<div class='alert alert-dismissible alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-eye-slash' aria-hidden='true'></i><strong> Expediente sin Observaciones</strong></div>"
                                                                      $('#tabla_direccion').append(contentRevision);
                                                                    }
                                                                    });

                                                                    getRevisiones(aData[0],"SEGUIMIENTO A LA INVERSIÓN").success(function (data) {
                                                                      $('#tabla_seguimiento').empty();
                                                                      var contentRevision = "<table class='table table-hover'><thead><tr><th>#</th><th>Observaciones</th><th>Fecha de recibido</th><th>Fecha de envio</th></tr></thead><tbody>";
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
                                                                                           '<td>'+ data[i].fecha_ingreso+'</td>'+
                                                                                           '<td>'+ data[i].fecha_entrega+'</td>'+
                                                                                           '</tr>';
                                                                         }
                                                                      contentRevision += "</tbody></table>";
                                                                      $('#tabla_seguimiento').append(contentRevision);
                                                                    }
                                                                    else {
                                                                      contentRevision = "<div class='alert alert-dismissible alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-eye-slash' aria-hidden='true'></i><strong> Expediente sin Observaciones</strong></div>"
                                                                      $('#tabla_seguimiento').append(contentRevision);
                                                                    }
                                                                    });

                                                                    getRevisiones(aData[0],"LICITACIONES").success(function (data) {
                                                                      $('#tabla_licitaciones').empty();
                                                                      var contentRevision = "<table class='table table-hover'><thead><tr><th>#</th><th>Observaciones</th><th>Fecha de recibido</th><th>Fecha de envio</th></tr></thead><tbody>";
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
                                                                                           '<td>'+ data[i].fecha_ingreso+'</td>'+
                                                                                           '<td>'+ data[i].fecha_entrega+'</td>'+
                                                                                           '</tr>';
                                                                         }
                                                                      contentRevision += "</tbody></table>";
                                                                      $('#tabla_licitaciones').append(contentRevision);
                                                                    }
                                                                    else {
                                                                      contentRevision = "<div class='alert alert-dismissible alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-eye-slash' aria-hidden='true'></i><strong> Expediente sin Observaciones</strong></div>"
                                                                      $('#tabla_licitaciones').append(contentRevision);
                                                                    }
                                                                    });


                                                                    myModal.modal({ show: true });


                                                               });
            }

        });

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
        var monto_solicitado = $("#monto_solicitado").val().replace(/[^0-9\.]+/g,"");
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
        var aporte_federal = $("#aporte_federal").val().replace(/[^0-9\.]+/g,"");
        var programa_estatal = $("#programa_estatal").val();
        var aporte_estatal = $("#aporte_estatal").val().replace(/[^0-9\.]+/g,"");
        var programa_municipal = $("#programa_municipal").val();
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

        var condicion_obra;
        obra_existe().success(function (data) {condicion_obra = data.obra;
        if(Number(condicion_obra) == 0 ){
          var suma_final = parseFloat(aporte_federal)+parseFloat(aporte_estatal)+parseFloat(aporte_municipal)+parseFloat(aportacion_otros)+parseFloat(aportacion_beneficiarios);
          if(parseFloat(monto_solicitado).toFixed(2) == parseFloat(suma_final).toFixed(2)){

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
                $('#suma_total').empty();

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
                  mostrar.ajax.reload();
              }
               ,

              error: function (jqXHR, textStatus, errorThrown) {
                  alert(errorThrown);
              }


          });

        }//endif montos
        else{

          Command: toastr["error"]("Montos incorrectos");
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

        } //endelse montos

        }//endif existe obra
        else{
          Command: toastr["error"]("La obra ya existe");
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

      }//end else existe obra
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
        var monto_solicitado = $("#m_monto_solicitado").val().replace(/[^0-9\.]+/g,"");
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
        var aporte_federal = $("#m_aporte_federal").val().replace(/[^0-9\.]+/g,"");
        var programa_estatal = $("#m_programa_estatal").val();
        var aporte_estatal = $("#m_aporte_estatal").val().replace(/[^0-9\.]+/g,"");
        var programa_municipal = $("#m_programa_municipal").val();
        var aporte_municipal = $("#m_aporte_municipal").val().replace(/[^0-9\.]+/g,"");
        var aportacion_beneficiarios = $("#m_aportacion_beneficiarios").val().replace(/[^0-9\.]+/g,"");
        var aportacion_otros = $("#m_aportacion_otros").val().replace(/[^0-9\.]+/g,"");


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


        var condicion_obra;
        obra_existe_id(id_obra).success(function (data) {condicion_obra = data.obra;
        if(Number(condicion_obra) == 0 ){
          var suma_final = parseFloat(aporte_federal)+parseFloat(aporte_estatal)+parseFloat(aporte_municipal)+parseFloat(aportacion_otros)+parseFloat(aportacion_beneficiarios);
          if(parseFloat(monto_solicitado).toFixed(2) == parseFloat(suma_final).toFixed(2)){

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
                actualizar_datos();
            }
             ,

            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
            });
          }//endif montos
          else{

            Command: toastr["error"]("Montos incorrectos");
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

          } //endelse montos

          }//endif existe obra
          else{
            Command: toastr["error"]("Nombre de la obra en uso");
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

          }//end else existe obra

        });
    });


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
                 mostrar.ajax.reload();
                 actualizar_datos();
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

function actualizar_datos(){
  var valor;



  //estatus_recurso
  getValorObra(act_id_obra,'no_obra').success(function (data) {
      valor = data.no_obra;
      if(valor!=null){
        setValorObra(act_id_obra,'estatus_recurso','AUTORIZADO').success(function (data) {
                              getValorObra(act_id_obra,'estatus_recurso').success(function (data) {
                                contenidoRecurso = "Estatus del Recurso: <strong>"+data.estatus_recurso+"</strong>";
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
                                    contenidoRecurso = "Estatus del Recurso: <strong>"+data.estatus_recurso+"</strong>";
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
    contenidoObra = "Estatus Obra: <strong>"+valor+"</strong>";
    $('#alerta_obra').empty()
      .append(contenidoObra);

  }
  else{
    getValorObra(act_id_obra,'obra').success(function (data) {
      valor = data.obra;
      if(valor!=null){
          setValorObra(act_id_obra,'estatus_general','AUN NO ENTREGADO').success(function (data) {
                          getValorObra(act_id_obra,'estatus_general').success(function (data) {
                            contenidoObra = "Estatus Obra: <strong>"+data.estatus_general+"</strong>";
                            $('#alerta_obra').empty()
                              .append(contenidoObra);

                          });
            });
      }
    });
  }
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

function m_getLocalidades(){
  var municipio_nombre = $("#m_municipio").val();
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
    function m_getTotalUbicacion(){
      var municipio_nombre = $("#m_municipio").val();
      var localidad_nombre = $("#m_localidad").val();
      return $.ajax({
        type: 'POST',
        url: '../../../controladores/_S_get_totalUbicacion.php',
        data: {municipio_nombre:municipio_nombre, localidad_nombre:localidad_nombre},
        dataType: 'json',
      });
    }

    $("#m_municipio").change(function() {
      $('#m_localidad').empty();
      $('#m_beneficiarios_directos').val("");
      $('#m_beneficiarios_indirectos').val("");
      $('#m_localidad').empty();
      $('#m_localidad')
          .append($("<option></option>")
          .attr("value","")
          .text(""));

    m_getLocalidades().success(function (data) {
    $.each(data, function(key, value) {
        $('#m_localidad')
            .append($("<option></option>")
            .attr("value",value)
            .text(value));
        });
      });

  });




                                                $("#m_localidad").change(function() {
                                                m_getTotalUbicacion().success(function (data) {
                                                //$.each(data, function(key, value) {
                                                    var poblacion_total = data.poblacion_total;
                                                    var poblacion_directa = data.poblacion_localidad;
                                                    if(!($.isNumeric(poblacion_total))) poblacion_total = 0;
                                                    if(!($.isNumeric(poblacion_directa))) poblacion_directa = 0;
                                                    var poblacion_indirecta = Number(poblacion_total) - Number(poblacion_directa);

                                                    $("#m_beneficiarios_directos").val(poblacion_directa);
                                                    $("#m_beneficiarios_indirectos").val(poblacion_indirecta);
                                                  //});
                                                });
                                              });








$('#btn_nuevo_alcance').click(function (event) {
  $('#nuevo_alcance').removeClass("hidden").addClass("visible");
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

          Command: toastr["success"]("Alcance agregado");
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
          $("#ma_tipo_obra").val("");
          $("#ma_num_obj").val("");
          $("#ma_objeto").val("");
          $("#ma_cantidad").val("");
          $("#ma_um").val("");
          $('#nuevo_alcance').removeClass("visible").addClass("hidden");
          getAlcances(id_obra).success(function (data) {
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
      }
       ,

      error: function (jqXHR, textStatus, errorThrown) {
          alert(errorThrown);
      }


  });


});



$('#enviar_normativa').click(function (event) {
  var id_obra = act_id_obra;
  var area = "NORMATIVA";
  var r_fecha_recibido = $("#mr_fecha_recibido_n").val();
  var r_fecha_envio = $("#mr_fecha_envio_n").val();
  var observaciones = $("#mr_observaciones_n").val();

  $.ajax({

      url: '../../../controladores/_S_agregar_revision.php',
      type: 'post',
      data: {
        id_obra:id_obra, r_fecha_recibido:r_fecha_recibido,r_fecha_envio:r_fecha_envio, observaciones:observaciones, area:area
      },
      success: function (data) {

          Command: toastr["success"]("Revisión agregada");
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
          $("#mr_fecha_envio_n").val("");
          $("#mr_fecha_recibido_n").val("");
          $("#mr_observaciones_n").val("");

          getRevisiones(id_obra,area).success(function (data) {
            $('#tabla_normativa').empty();
            var contentRevision = "<table class='table table-hover'><thead><tr><th>#</th><th>Observaciones</th><th>Fecha de recibido</th><th>Fecha de envio</th></tr></thead><tbody>";
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
                                 '<td>'+ data[i].fecha_ingreso+'</td>'+
                                 '<td>'+ data[i].fecha_entrega+'</td>'+
                                 '</tr>';
               }
            contentRevision += "</tbody></table>";
            $('#tabla_normativa').append(contentRevision);
            }
            else {
              contentRevision = "<div class='alert alert-dismissible alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-eye-slash' aria-hidden='true'></i><strong> Expediente sin Observaciones</strong></div>"
              $('#tabla_normativa').append(contentRevision);
            }
        });
      }
       ,

      error: function (jqXHR, textStatus, errorThrown) {
          alert(errorThrown);
      }


  });
});


  $('#enviar_direccion').click(function (event) {
    var id_obra = act_id_obra;
    var area = "DIRECCION";
    var r_fecha_recibido = $("#mr_fecha_recibido_d").val();
    var r_fecha_envio = $("#mr_fecha_envio_d").val();
    var observaciones = $("#mr_observaciones_d").val();

    $.ajax({

        url: '../../../controladores/_S_agregar_revision.php',
        type: 'post',
        data: {
          id_obra:id_obra, r_fecha_recibido:r_fecha_recibido,r_fecha_envio:r_fecha_envio, observaciones:observaciones, area:area
        },
        success: function (data) {

            Command: toastr["success"]("Revisión agregada");
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
            $("#mr_fecha_envio_d").val("");
            $("#mr_fecha_recibido_d").val("");
            $("#mr_observaciones_d").val("");

            getRevisiones(id_obra,area).success(function (data) {
              $('#tabla_direccion').empty();
              var contentRevision = "<table class='table table-hover'><thead><tr><th>#</th><th>Observaciones</th><th>Fecha de recibido</th><th>Fecha de envio</th></tr></thead><tbody>";
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
                                   '<td>'+ data[i].fecha_ingreso+'</td>'+
                                   '<td>'+ data[i].fecha_entrega+'</td>'+
                                   '</tr>';
                 }
              contentRevision += "</tbody></table>";
              $('#tabla_direccion').append(contentRevision);
              }
              else {
                contentRevision = "<div class='alert alert-dismissible alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-eye-slash' aria-hidden='true'></i><strong> Expediente sin Observaciones</strong></div>"
                $('#tabla_direccion').append(contentRevision);
              }
          });
        }
         ,

        error: function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }


    });
});

$('#enviar_seguimiento').click(function (event) {
  var id_obra = act_id_obra;
  var area = "SEGUIMIENTO A LA INVERSIÓN";
  var r_fecha_recibido = $("#mr_fecha_recibido_s").val();
  var r_fecha_envio = $("#mr_fecha_envio_s").val();
  var observaciones = $("#mr_observaciones_s").val();

  $.ajax({

      url: '../../../controladores/_S_agregar_revision.php',
      type: 'post',
      data: {
        id_obra:id_obra, r_fecha_recibido:r_fecha_recibido,r_fecha_envio:r_fecha_envio, observaciones:observaciones, area:area
      },
      success: function (data) {

          Command: toastr["success"]("Revisión agregada");
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
          $("#mr_fecha_envio_s").val("");
          $("#mr_fecha_recibido_s").val("");
          $("#mr_observaciones_s").val("");

          getRevisiones(id_obra,area).success(function (data) {
            $('#tabla_seguimiento').empty();
            var contentRevision = "<table class='table table-hover'><thead><tr><th>#</th><th>Observaciones</th><th>Fecha de recibido</th><th>Fecha de envio</th></tr></thead><tbody>";
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
                                 '<td>'+ data[i].fecha_ingreso+'</td>'+
                                 '<td>'+ data[i].fecha_entrega+'</td>'+
                                 '</tr>';
               }
            contentRevision += "</tbody></table>";
            $('#tabla_seguimiento').append(contentRevision);
            }
            else {
              contentRevision = "<div class='alert alert-dismissible alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-eye-slash' aria-hidden='true'></i><strong> Expediente sin Observaciones</strong></div>"
              $('#tabla_seguimiento').append(contentRevision);
            }
        });
      }
       ,

      error: function (jqXHR, textStatus, errorThrown) {
          alert(errorThrown);
      }


  });
});


$('#enviar_licitaciones').click(function (event) {
  var id_obra = act_id_obra;
  var area = "LICITACIONES";
  var r_fecha_recibido = $("#mr_fecha_recibido_l").val();
  var r_fecha_envio = $("#mr_fecha_envio_l").val();
  var observaciones = $("#mr_observaciones_l").val();

  $.ajax({

      url: '../../../controladores/_S_agregar_revision.php',
      type: 'post',
      data: {
        id_obra:id_obra, r_fecha_recibido:r_fecha_recibido,r_fecha_envio:r_fecha_envio, observaciones:observaciones, area:area
      },
      success: function (data) {

          Command: toastr["success"]("Revisión agregada");
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
          $("#mr_fecha_envio_l").val("");
          $("#mr_fecha_recibido_l").val("");
          $("#mr_observaciones_l").val("");

          getRevisiones(id_obra,area).success(function (data) {
            $('#tabla_licitaciones').empty();
            var contentRevision = "<table class='table table-hover'><thead><tr><th>#</th><th>Observaciones</th><th>Fecha de recibido</th><th>Fecha de envio</th></tr></thead><tbody>";
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
                                 '<td>'+ data[i].fecha_ingreso+'</td>'+
                                 '<td>'+ data[i].fecha_entrega+'</td>'+
                                 '</tr>';
               }
            contentRevision += "</tbody></table>";
            $('#tabla_licitaciones').append(contentRevision);
            }
            else {
              contentRevision = "<div class='alert alert-dismissible alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-eye-slash' aria-hidden='true'></i><strong> Expediente sin Observaciones</strong></div>"
              $('#tabla_licitaciones').append(contentRevision);
            }
        });
      }
       ,

      error: function (jqXHR, textStatus, errorThrown) {
          alert(errorThrown);
      }


  });
});



});
