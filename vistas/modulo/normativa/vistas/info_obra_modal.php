
      <!---INFO GENERAL DE LA OBRA-->
        <br>
            <div class="panel panel-default"><!--PRIMER PANEL-->
              <div class="panel-heading">
                <h3 class="panel-title">Identificación</h3>
              </div>
              <div class="panel-body">


                <input type="hidden" class="form-control" id="m_id_obra" readonly >


                <div class="col-lg-2  col-sm-6" id="dm_no_obra">
                  <label for="">No. de Obra</label>
                  <input type="text" class="form-control" id="m_no_obra">
                  <input type="hidden" id="m_m">
                </div>

                <div class="col-lg-10 col-sm-6" id="dm_obra">
                    <label for="textArea" class="constrol-label">Descripción de la Obra</label>
                    <textarea class="form-control" rows="3" id="m_obra" name=""></textarea>
                    <input type="hidden" class="form-control" name="" value="">
                    <p class="help-block"></p>
                    <br>
                </div>

                <div class="col-lg-4" id="dm_no_autorizacion">
                    <label for="">No. de Oficio Autorización</label>
                    <input type="text" class="form-control" id="m_no_autorizacion">
                </div>

                <div class="col-lg-4"  id="dm_fecha_autorizacion">
                    <label for="">Fecha del Oficio Autorización</label>
                    <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="m_fecha_autorizacion" data-link-format="yyyy-mm-dd">
                          <input id="m_fecha_autorizacion_v" class="form-control" size="25" type="text" value=""  readonly="" disabled>
                          <span id="span_fecha_autorizacion1" class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                          <span id="span_fecha_autorizacion2" class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                      </div>
                    <input id="m_fecha_autorizacion" type="hidden" value="" /><br/>
                    <br>
                </div>

                <div class="col-lg-4" id="dm_fecha_recibido_autorizacion">
                    <label for="">Fecha de Recibido el Oficio</label>
                    <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="m_fecha_recibido_autorizacion" data-link-format="yyyy-mm-dd">
                          <input class="form-control" size="25" type="text" value="" id="m_fecha_recibido_autorizacion_v" disabled>
                          <span id="span_fecha_recibido_autorizacion1" class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                          <span id="span_fecha_recibido_autorizacion2" class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                      </div>
                    <input id="m_fecha_recibido_autorizacion"  type="hidden" value="" /><br/>
                    <br>
                </div>

                <legend></legend>

                <div class="col-lg-3  col-sm-6" id="dm_tipo_inversion">
                  <label for="">Tipo de Inversión</label>
                  <input type="text" class="form-control" id="m_tipo_inversion">
                </div>

                <div class="col-lg-3  col-sm-6" id="dm_tipo_expediente">
                  <label>Tipo de Solicitud</label>
                  <select class="form-control option" name="" id="m_tipo_expediente">
                      <option></option>
                      <option>AFECTACIONES Y COMPRA DE TERRENOS</option>
                      <option>COSTO-BENEFICIO</option>
                      <option>ESTUDIOS Y PROYECTOS</option>
                      <option>MOBILIARIO Y EQUIPAMIENTO DE OBRA</option>
                      <option>OBRA</option>
                      <option>PPS</option>
                      <option>PROYECTO INTEGRAL</option>
                      <option>SUPERVISIÓN</option>
                    </select>
                </div>

                <div class="col-lg-3  col-sm-6" id="dm_monto_solicitado">
                  <label class="control-label">Monto Solicitado</label>
                    <div class="input-group">
                      <span class="input-group-addon">$</span>
                      <input type="text" class="form-control" id="m_monto_solicitado">
                    </div>
                </div>

                <div class="col-lg-3  col-sm-6" id="dm_dimension_inversion">
                  <label for="">Dimensión de Inversión</label>
                  <select class="form-control option" id="m_dimension_inversion">
                    <option></option>
                    <option>UNICA</option>
                    <option>MULTIPLE</option>
                    </select>
                  <br>
                </div>

                <div class="col-lg-3  col-sm-6" id="dm_unidad_responsable">
                  <label>Unidad Responsable (U.R.)</label>
                  <select class="form-control option" name="" id="m_unidad_responsable">
                      <option></option>
                      <option>COORDINACIÓN GENERAL ADMINISTRATIVA</option>
                      <option>DIRECCIÓN DE AGUA</option>
                      <option>DIRECCIÓN DE ALCANTARILLADO</option>
                      <option>DIRECCIÓN DE ASUNTOS JURIDICOS</option>
                      <option>DIRECCIÓN DE CARRETERAS Y CAMINOS ESTATALES</option>
                      <option>DIRECCIÓN DE CONSERVACIÓN Y MANTENIMIENTO</option>
                      <option>DIRECCIÓN DE INFRAESTRUCTURA DE COMUNICACIONES</option>
                      <option>DIRECCIÓN DE INFRAESTRUCTURA ESTRATEGICA</option>
                      <option>DIRECCIÓN DE NORMATIVIDAD Y GESTION CIUDADANA</option>
                      <option>DIRECCIÓN DE OBRA PÚBLICA</option>
                      <option>DIRECCION DE PROYECTOS</option>
                      <option>DIRECCIÓN DE RECURSOS FINANCIEROS</option>
                      <option>DIRECCIÓN DE RECURSOS HUMANOS</option>
                      <option>DIRECCIÓN DE RECURSOS MATERIALES Y SERVICIOS GENERALES</option>
                      <option>DIRECCIÓN DE SANEAMIENTO</option>
                      <option>DIRECCIÓN TECNICA</option>
                      <option>OFICINA DEL C. SECRETARIO</option>
                      <option>SUBSECRETARIA DE COMUNICACIONES</option>
                      <option>SUBSECRETARIA DE INFRAESTRUCTURA</option>
                    </select>
                </div>

                <div class="col-lg-3  col-sm-6" id="dm_etapa">
                  <label>Etapa</label>
                  <select class="form-control option" name="" id="m_etapa">
                      <option></option>
                      <option>UNICA</option>
                      <option>PRIMERA</option>
                      <option>SEGUNDA</option>
                      <option>TERCERA</option>
                      <option>CUARTA</option>
                      <option>QUINTA</option>
                      <option>SEXTA</option>
                      <option>NO APLICA</option>
                    </select>
                </div>

                <div class="col-lg-3  col-sm-6" id="dm_periodo_ejecucion">
                  <label for="">Periodo de Ejecución</label>
                  <input type="text" class="form-control" id="m_periodo_ejecucion" placeholder="Semanas">
                </div>

                <div class="col-lg-3  col-sm-6" id="dm_propuesta_anual">
                  <label for="">Propuesta Anual</label>
                  <select class="form-control option" id="m_propuesta_anual">
                    <option></option>
                    <option>SÍ</option>
                    <option>NO</option>
                  </select>
                  <br>
                </div>

                <div class="col-lg-4  col-sm-6" id="dm_normativa_aplicar">
                  <label for="">Normativa a Aplicar</label>
                  <input type="text" class="form-control" id="m_normativa_aplicar">
                  <br>
                </div>

                <div class="col-lg-4  col-sm-6" id="dm_tipo_adj_solicitado">
                  <label for="">Modalidad de Ejecución</label>
                  <select class="form-control option" name="" id="m_tipo_adj_solicitado">
                    <option></option>
                    <option>ADJUDICACIÓN DIRECTA</option>
                    <option>ADMINISTRACIÓN DEPENDENCIA</option>
                    <option>ADMINISTRACIÓN MUNICIPAL</option>
                    <option>BENEFICIARIOS</option>
                    <option>CONCURSO POR INVITACIÓN</option>
                    <option>DEPENDENCIA</option>
                    <option>INVITACIÓN A 3</option>
                    <option>INVITACIÓN A 5</option>
                    <option>LICITACIÓN PÚBLICA</option>
                  </select>
                </div>

                <div class="col-lg-4" id="dm_partidas">
                    <label for="textArea" class="constrol-label">Partidas</label>
                    <textarea class="form-control" rows="2" id="m_partidas" name=""></textarea>
                    <input type="hidden" class="form-control" name="" value="">
                    <br>
                </div>

              </div>
          </div>

          <div class="panel panel-default"><!--2do PANEL-->
            <div class="panel-heading">
              <h3 class="panel-title">Ubicación</h3>
            </div>
            <div class="panel-body">

      <div class="col-lg-12  col-sm-6" id="panel_ubicacion">

        <div class="col-md-1">
        <input type="hidden" class="form-control" id="m_total_ubicacion_campos" value="1" readonly >
        </div>

        <div class='col-lg-12  col-sm-6' >

            <div class="col-md-4" id="dm_municipio1">
              <label for="">Municipio</label>
              <select onchange='municipio_mi(1)'  class="form-control option" id="m_municipio1">

                </select>
              <br>
            </div>

            <div class="col-md-5" id="dm_localidad1">
              <label for="">Localidad</label>
              <select onchange='localidad_mi(1)' class="form-control option" id="m_localidad1">
              </select>
              <br>
            </div>

            <div class="col-md-2" id="dm_no_localidad1" >
              <label for="">No.</label>
              <select onchange='no_localidad_mi(1)' class="form-control option" id="m_no_localidad1">
                </select>
              <br>
            </div>

            <div class="col-md-1">
              <br>
              <button type="button" id="m_btn_agregar_ubicacion" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
            </div>

        </div>

            <div id="dm_panel_ubicacion_app">
            </div>

      </div>

                <div class="col-lg-3  col-sm-6" id="dm_beneficiarios_directos">
                  <label for="">Beneficiarios Directos</label>
                  <input type="text" class="form-control" id="m_beneficiarios_directos" readonly>
                  <br>
                </div>

                <div class="col-lg-3  col-sm-6" id="dm_beneficiarios_indirectos">
                  <label for="">Beneficiarios Indirectos</label>
                  <input type="text" class="form-control" id="m_beneficiarios_indirectos" readonly>
                  <br>
                </div>


                																<div class="col-lg-3  col-sm-6" id="dm_empleos_directos">
                																	<label for="">Empleos directos</label>
                																	<input type="text" class="form-control" id="m_empleos_directos" readonly>
                																	<br>
                																</div>


                																<div class="col-lg-3  col-sm-6" id="dm_empleos_indirectos">
                																	<label for="">Empleos Indirectos</label>
                																	<input type="text" class="form-control" id="m_empleos_indirectos" readonly>
                																	<br>
                																</div>

            </div>
          </div><!--div 2do PANEL-->

          <div class="panel panel-default"><!--2do PANEL-->
              <div class="panel-heading">
                <h3 class="panel-title">Estructura Financiera</h3>
              </div>
                <div class="panel-body">

                    <div class="col-lg-4" id="dm_programa_federal">
                      <label for="">Programa Federal</label>
                      <input type="text" class="form-control" id="m_programa_federal">
                      <br>
                    </div>

                    <div class="col-lg-4" id="dm_programa_estatal">
                      <label for="">Programa Estatal</label>
                      <input type="text" class="form-control" id="m_programa_estatal">
                      <br>
                    </div>

                    <div class="col-lg-4" id="dm_programa_municipal">
                      <label for="">Programa Municipal</label>
                      <input type="text" class="form-control" id="m_programa_municipal">
                      <br>
                    </div>

                    <div class="col-lg-4" id="dm_aporte_federal">
                        <div class="input-group">
                          <span class="input-group-addon">$</span>
                          <input type="text" class="form-control" placeholder="Aportación Federal" id="m_aporte_federal">
                        </div>
                    </div>

                    <div class="col-lg-4" id="dm_aporte_estatal">
                        <div class="input-group">
                          <span class="input-group-addon">$</span>
                          <input type="text" class="form-control" placeholder="Aportación Estatal" id="m_aporte_estatal">
                        </div>
                    </div>

                    <div class="col-lg-4" id="dm_aporte_municipal">
                        <div class="input-group">
                          <span class="input-group-addon">$</span>
                          <input type="text" class="form-control" placeholder="Aportación Municipal" id="m_aporte_municipal">
                        </div>

                    </div>

                    <legend></legend>

                    <div class="col-lg-6  col-sm-6" id="dm_aportacion_beneficiarios">
                      <label for="">Aportación Beneficiarios</label>
                      <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input type="text" class="form-control" id="m_aportacion_beneficiarios">
                      </div>
                      <br>
                    </div>

                    <div class="col-lg-6  col-sm-6" id="dm_aportacion_otros">
                      <label for="">Aportación Otros</label>
                      <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input type="text" class="form-control" id="m_aportacion_otros">
                      </div>
                      <br>
                    </div>

                    <div class="col-lg-12" id="m_suma_total">

                    </div>
                </div><!--panel body-->
          </div>
