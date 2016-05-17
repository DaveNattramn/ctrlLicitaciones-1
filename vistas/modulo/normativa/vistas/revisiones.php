<!-- ENCABEZADO DE LA FECHA DEL PROYECTO, DÍA EN QUE SE INGRESO--->

<blockquote class="blockquote-reverse">
  <p>Fecha de Recibido el Proyecto.</p>
<div id="div_fecha_recibido">   </div>
</blockquote>


<!-- PROCESO DE REVISIÓN NORMATIVA
<ul class="breadcrumb">

  <li class="dis">Normativa</li>
  <li>Dirección de Obra</a></li>
  <li>Seguimiento a la Inversión (S.F.A.)</li>
  <li>Licitaciones</a></li>

</ul>--->


<!-- PROCESO DE REVISIÓN NORMATIVA demo 2--->

<ul class="nav nav-tabs nav-justified">
  <li class="active"><a href="#normativa" class="tabs" data-toggle="tab">Normativa</a></li>
  <li ><a href="#direccion" class="tabs" data-toggle="tab">Dirección de Obra</a></li>
  <li ><a href="#seguimiento" class="tabs" data-toggle="tab">Seguimiento a la Inversión</a></li>
  <li ><a href="#licitaciones" class="tabs" data-toggle="tab">Licitaciones</a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane fade active in" id="normativa">
    <br>
    <!---EN CASO DE QUE NO SE TENGA NINGUNA REVISIÓN-->


    <!---EN CASO DE QUE EXISTAN REVISIONES QUE LAS MUESTRE EN LA TABLA-->

    <div>

      <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading"><strong><center>Observaciones Realizadas</center></strong></div>
        <div id="tabla_normativa">

        </div>
      </div>

    </div>

    <h4>Nueva Revisión</h4>
    <legend></legend>

    <!---AGREGAR UNA NUEVA REVISIÓN -->

    <div class="col-md-4">
    <label for="dtp_input1">Fecha de Ingreso</label>
    <div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="mr_fecha_recibido_n" >
        <input class="form-control" type="text" value="" id="mr_fecha_recibido_n2" readonly>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>
    <input type="hidden" id="mr_fecha_recibido_n" value="" /><br/>
    <br>
</div>

<div class="col-md-4 col-md-offset-4">
    <label for="dtp_input1">Fecha de Envio</label>
    <div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="mr_fecha_envio_n" >
        <input class="form-control" type="text" value="" id="mr_fecha_envio_n2" readonly>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>
    <input type="hidden" id="mr_fecha_envio_n" value="" /><br/>
    <br>
</div>




    <div class="col-lg-12">
        <label for="textArea" class="constrol-label">Observaciones generales del Expediente</label>
        <textarea class="form-control" rows="2" id="mr_observaciones_n" name=""></textarea>
        <input type="hidden" class="form-control" name="" value="">
        <br>
    </div>

    <div class="col-lg-12">
        <center><button type="button"  id="enviar_normativa" class="btn btn-info btn-sm"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Enviar</button></center>
        <br>
    </div>
  </div>

  <div class="tab-pane" id="direccion">
    <br>
        <div>

      <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading"><strong><center>Observaciones Realizadas</center></strong></div>
        <div id="tabla_direccion">

        </div>
      </div>

    </div>

    <h4>Nueva Revisión</h4>
    <legend></legend>

    <!---AGREGAR UNA NUEVA REVISIÓN -->

    <div class="col-md-4">
    <label for="dtp_input1">Fecha de Ingreso</label>
    <div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="mr_fecha_recibido_d" >
        <input class="form-control" type="text" value="" id="mr_fecha_recibido_d2" readonly>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>
    <input type="hidden" id="mr_fecha_recibido_d" value="" /><br/>
    <br>
  </div>

  <div class="col-md-4 col-md-offset-4">
    <label for="dtp_input1">Fecha de Envio</label>
    <div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="mr_fecha_envio_d" >
        <input class="form-control" type="text" value="" id="mr_fecha_envio_d2" readonly>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>
    <input type="hidden" id="mr_fecha_envio_d" value="" /><br/>
    <br>
  </div>




    <div class="col-lg-12">
        <label for="textArea" class="constrol-label">Observaciones generales del Expediente</label>
        <textarea class="form-control" rows="2" id="mr_observaciones_d" name=""></textarea>
        <input type="hidden" class="form-control" name="" value="">
        <br>
    </div>

    <div class="col-lg-12">
        <center><button type="button"  id="enviar_direccion" class="btn btn-info btn-sm"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Enviar</button></center>
        <br>
    </div>
  </div>


  <div class="tab-pane" id="seguimiento">
    <br>
        <div>

      <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading"><strong><center>Observaciones Realizadas</center></strong></div>
        <div id="tabla_seguimiento">

        </div>
      </div>

    </div>

    <h4>Nueva Revisión</h4>
    <legend></legend>

    <!---AGREGAR UNA NUEVA REVISIÓN -->

    <div class="col-md-4">
    <label for="dtp_input1">Fecha de Ingreso</label>
    <div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="mr_fecha_recibido_s" >
        <input class="form-control" type="text" value="" id="mr_fecha_recibido_s2" readonly>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>
    <input type="hidden" id="mr_fecha_recibido_s" value="" /><br/>
    <br>
  </div>

  <div class="col-md-4 col-md-offset-4">
    <label for="dtp_input1">Fecha de Envio</label>
    <div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="mr_fecha_envio_s" >
        <input class="form-control" type="text" value="" id="mr_fecha_envio_s2" readonly>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>
    <input type="hidden" id="mr_fecha_envio_s" value="" /><br/>
    <br>
  </div>




    <div class="col-lg-12">
        <label for="textArea" class="constrol-label">Observaciones generales del Expediente</label>
        <textarea class="form-control" rows="2" id="mr_observaciones_s" name=""></textarea>
        <input type="hidden" class="form-control" name="" value="">
        <br>
    </div>

    <div class="col-lg-12">
        <center><button type="button"  id="enviar_seguimiento" class="btn btn-info btn-sm"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Enviar</button></center>
        <br>
    </div>
  </div>


  <div class="tab-pane" id="licitaciones">
    <br>
        <div>

      <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading"><strong><center>Observaciones Realizadas</center></strong></div>
        <div id="tabla_licitaciones">

        </div>
      </div>

    </div>

    <h4>Nueva Revisión</h4>
    <legend></legend>

    <!---AGREGAR UNA NUEVA REVISIÓN -->

    <div class="col-md-4">
    <label for="dtp_input1">Fecha de Ingreso</label>
    <div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="mr_fecha_recibido_l" >
        <input class="form-control" type="text" value="" id="mr_fecha_recibido_l2" readonly>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>
    <input type="hidden" id="mr_fecha_recibido_l" value="" /><br/>
    <br>
  </div>

  <div class="col-md-4 col-md-offset-4">
    <label for="dtp_input1">Fecha de Envio</label>
    <div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="mr_fecha_envio_l" >
        <input class="form-control" type="text" value="" id="mr_fecha_envio_l2" readonly>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>
    <input type="hidden" id="mr_fecha_envio_l" value="" /><br/>
    <br>
  </div>




    <div class="col-lg-12">
        <label for="textArea" class="constrol-label">Observaciones generales del Expediente</label>
        <textarea class="form-control" rows="2" id="mr_observaciones_l" name=""></textarea>
        <input type="hidden" class="form-control" name="" value="">
        <br>
    </div>

    <div class="col-lg-12">
        <center><button type="button"  id="enviar_licitaciones" class="btn btn-info btn-sm"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Enviar</button></center>
        <br>
    </div>
  </div>


</div>
