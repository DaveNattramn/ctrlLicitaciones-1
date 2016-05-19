$(document).ready(function(){

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


      function getMunicipios(){
        return $.ajax({
          type: 'POST',
          url: '../../../controladores/_S_get_municipios.php',
          data: {},
          dataType: 'json',
        });
        }
        $("#municipio").change(function() {
          $('#localidad').empty();
          $('#beneficiarios_directos').val("");
          $('#beneficiarios_indirectos').val("");
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
        getLocalidades().success(function (data) {
        $.each(data, function(key, value) {
            $('#localidad')
                .append($("<option></option>")
                .attr("value",value)
                .text(value));
            });
          });
        }
            function getLocalidades(){
              var municipio_nombre = $("#municipio").val();
              return $.ajax({
                type: 'POST',
                url: '../../../controladores/_S_get_localidades.php',
                data: {municipio_nombre:municipio_nombre},
                dataType: 'json',
              });
              }
      });


                                                    function getTotalUbicacion(){
                                                      var municipio_nombre = $("#municipio").val();
                                                      var localidad_nombre = $("#localidad").val();
                                                      return $.ajax({
                                                        type: 'POST',
                                                        url: '../../../controladores/_S_get_totalUbicacion.php',
                                                        data: {municipio_nombre:municipio_nombre, localidad_nombre:localidad_nombre},
                                                        dataType: 'json',
                                                      });
                                                    }

                                                    $("#localidad").change(function() {
                                                    getTotalUbicacion().success(function (data) {
                                                    //$.each(data, function(key, value) {
                                                        var poblacion_total = data.poblacion_total;
                                                        var poblacion_directa = data.poblacion_localidad;
                                                        if(!($.isNumeric(poblacion_total))) poblacion_total = 0;
                                                        if(!($.isNumeric(poblacion_directa))) poblacion_directa = 0;
                                                        var poblacion_indirecta = parseFloat(poblacion_total) - parseFloat(poblacion_directa);

                                                        $("#beneficiarios_directos").val(poblacion_directa);
                                                        $("#beneficiarios_indirectos").val(poblacion_indirecta);
                                                      //});
                                                    });
                                                  });



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

                                                  $('#monto_solicitado').change(function() {
                                                        sumaAportes();
                                                        $('#empleos_directos').val("");
                                                        $('#empleos_indirectos').val("");
                                                        var monto_solicitado = $("#monto_solicitado").val().replace(/[^0-9\.]+/g,"");

                                                        if($.isNumeric(monto_solicitado)){

                                                          $('#empleos_directos').val(Math.round(parseFloat(monto_solicitado)/ 200000) );
                                                          $('#empleos_indirectos').val((Math.round(parseFloat(monto_solicitado)/ 200000) )*4);
                                                        }

                                                  });

                                                  $('#aporte_federal').change(function() {
                                                        sumaAportes();
                                                  });

                                                  $('#aporte_municipal').change(function() {
                                                        sumaAportes();
                                                  });

                                                  $('#aporte_estatal').change(function() {
                                                        sumaAportes();
                                                  });


                                                  $('#aportacion_otros').change(function() {
                                                        sumaAportes();
                                                  });

                                                  $('#aportacion_beneficiarios').change(function() {
                                                        sumaAportes();
                                                  });


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

                                                  $('#m_monto_solicitado').change(function() {
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
                                                        m_sumaAportes();
                                                  });

                                                  $('#m_aporte_municipal').change(function() {
                                                        m_sumaAportes();
                                                  });

                                                  $('#m_aporte_estatal').change(function() {
                                                        m_sumaAportes();
                                                  });


                                                  $('#m_aportacion_otros').change(function() {
                                                        m_sumaAportes();
                                                  });

                                                  $('#m_aportacion_beneficiarios').change(function() {
                                                        m_sumaAportes();
                                                  });


function numero_coma(x) {
  var parts = x.toString().split(".");
   parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
   return parts.join(".");
}

});
