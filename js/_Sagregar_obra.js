$(document).ready(function () {

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

               "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                                                              // Cell click
                                                               $('td', nRow).on('click', function() {
                                                                 alert(aData[2]);

                                                                 $('#myModal').modal({
                                                                    show: true
                                                                  });

                                                               });
            }

        });

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
        var clave_presupuesto = $("#clave_presupuesto").val();
        var desc_presupuesto = $("#desc_presupuesto").val();
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
              tipo_adj_solicitado:tipo_adj_solicitado,partidas:partidas,clave_presupuesto:clave_presupuesto,
              desc_presupuesto:desc_presupuesto,municipio:municipio,localidad:localidad,beneficiarios_directos:beneficiarios_directos,
              beneficiarios_indirectos:beneficiarios_indirectos,empleos_directos:empleos_directos,empleos_indirectos:empleos_indirectos,
              programa_federal:programa_federal,aporte_federal:aporte_federal,programa_estatal:programa_estatal,
              aporte_estatal:aporte_estatal,programa_municipal:programa_municipal,aporte_municipal:aporte_municipal,
              aportacion_beneficiarios:aportacion_beneficiarios,aportacion_otros:aportacion_otros

            },
            success: function (data) {

                Command: toastr["success"]("Agregado con Éxito: " + obra);
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


    $('#mostrar').on('dblclick', 'td', function(event) {
      alert("Hola");
    });







});
