<!-- ENCABEZADO DE LA FECHA DEL PROYECTO, DÍA EN QUE SE INGRESO--->

<blockquote class="blockquote-reverse">
  <p>Fecha de Recibido el Proyecto.</p>
<div id="div_fecha_recibido">   </div>
</blockquote>

<ul class="nav nav-tabs nav-justified">
  <li class="active"><a href="#direccion" class="tabs" data-toggle="tab">Dirección de Obra</a></li>
  <li ><a href="#seguimiento" class="tabs" data-toggle="tab">Seguimiento a la Inversión</a></li>
  <li ><a href="#licitaciones" class="tabs" data-toggle="tab">Licitaciones</a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane fade active in" id="direccion">
    <br>
        <div>

      <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading"><strong><center>Observaciones Realizadas</center></strong></div>
        <div id="tabla_direccion">

        </div>
      </div>

    </div>

    <a href="#" class="btn btn-info btn-sm" id="btn_nueva_revision_direccion"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Revisión</a>

    <br><br>

<div id="nueva_revision_direccion" class="hidden">
    <h4>Nueva Revisión</h4>
    <legend></legend>

    <!---AGREGAR UNA NUEVA REVISIÓN -->

    <div class="col-md-4">
    <label for="dtp_input1">Fecha de Ingreso</label>
    <div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="mr_fecha_recibido_direccion" >
        <input class="form-control" type="text" value="" id="mr_fecha_recibido_direccion2" readonly>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>
    <input type="hidden" id="mr_fecha_recibido_direccion" value="" />
    <br>
  </div>

  <div class="col-md-4 col-md-offset-4">
    <label for="dtp_input1">Fecha de Envio</label>
    <div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="mr_fecha_envio_direccion" >
        <input class="form-control" type="text" value="" id="mr_fecha_envio_direccion2" readonly>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>
    <input type="hidden" id="mr_fecha_envio_direccion" value="" />
    <br>
  </div>

  <div class="col-lg-3  col-sm-6" id="mr_area_direccion2">
    <label for="">Dirección</label>
    <select  class="form-control option" id="mr_area_direccion">
      <option>DIRECCIÓN GENERAL DE PROYECTOS</option>
      <option>DIRECCIÓN GENERAL DE INFRAESTRUCTURA ESTRATÉGICA</option>
      <option>DIRECCIÓN DE OBRA PÚBLICA</option>
      </select>
    <br>
  </div>


    <div class="col-lg-12">
        <label for="textArea" class="constrol-label">Observaciones generales del Expediente</label>
        <textarea class="form-control" rows="2" id="mr_observaciones_direccion" name=""></textarea>
        <input type="hidden" class="form-control" name="" value="">
        <br>
    </div>

    <div class="col-lg-12">
        <center><button type="button"  id="enviar_direccion" class="btn btn-info btn-sm"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Enviar</button></center>
        <br>
    </div>
  </div>





  <div id="modificar_revision_direccion" class="hidden">
    <h4>Modificar Revisión</h4>
    <legend></legend>

    <!---AGREGAR UNA NUEVA REVISIÓN -->
    <div> <input type="hidden" id="edt_mr_id_revisiones_direccion" value="" /></div>
    <div class="col-md-4">
      <label for="dtp_input1">Fecha de Ingreso</label>
      <div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="edt_mr_fecha_recibido_direccion" >
        <input class="form-control" type="text" value="" id="edt_mr_fecha_recibido_direccion2" readonly>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
      </div>
      <input type="hidden" id="edt_mr_fecha_recibido_direccion" value="" />
      <br>
    </div>

    <div class="col-md-4 col-md-offset-4">
      <label for="dtp_input1">Fecha de Envio</label>
      <div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="edt_mr_fecha_envio_direccion" >
        <input class="form-control" type="text" value="" id="edt_mr_fecha_envio_direccion2" readonly>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
      </div>
      <input type="hidden" id="edt_mr_fecha_envio_direccion" value="" />
      <br>
    </div>

    <div class="col-lg-3  col-sm-6" id="edt_mr_area_direccion2">
      <label for="">Dirección</label>
      <select  class="form-control option" id="edt_mr_area_direccion">
        <option>DIRECCIÓN GENERAL DE PROYECTOS</option>
        <option>DIRECCIÓN GENERAL DE INFRAESTRUCTURA ESTRATÉGICA</option>
        <option>DIRECCIÓN DE OBRA PÚBLICA</option>
      </select>
      <br>
    </div>


    <div class="col-lg-12">
      <label for="textArea" class="constrol-label">Observaciones generales del Expediente</label>
      <textarea class="form-control" rows="2" id="edt_mr_observaciones_direccion" name=""></textarea>
      <input type="hidden" class="form-control" name="" value="">
      <br>
    </div>

    <div class="col-lg-12">
      <center><button type="button"  id="edt_enviar_direccion" class="btn btn-info btn-sm"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Guardar cambios</button></center>
      <br>
    </div>
  </div>

</div>

<!-- //////////////////////////////////////////////////////////////////////////////////////////// -->
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

        <a href="#" class="btn btn-info btn-sm" id="btn_nueva_revision_seguimiento"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Revisión</a>

        <br><br>

<div id="nueva_revision_seguimiento" class="hidden">

<h4>Nueva Revisión</h4>
<legend></legend>

<!---AGREGAR UNA NUEVA REVISIÓN -->

<div class="col-md-4">
<label for="dtp_input1">Fecha de Ingreso</label>
<div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="mr_fecha_recibido_seguimiento" >
    <input class="form-control" type="text" value="" id="mr_fecha_recibido_seguimiento2" readonly>
    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input type="hidden" id="mr_fecha_recibido_seguimiento" value="" />
<br>
</div>

<div class="col-md-4 col-md-offset-4">
<label for="dtp_input1">Fecha de Envio</label>
<div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="mr_fecha_envio_seguimiento" >
    <input class="form-control" type="text" value="" id="mr_fecha_envio_seguimiento2" readonly>
    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input type="hidden" id="mr_fecha_envio_seguimiento" value="" />
<br>
</div>


  <div style="display:none;" id="mr_area_seguimiento2">
    <label for="">Dirección</label>
    <select  class="form-control option" id="mr_area_seguimiento">
      <option>SEGUIMIENTO A LA INVERSIÓN</option>
      </select>
    <br>
  </div>

<div class="col-lg-12">
    <label for="textArea" class="constrol-label">Observaciones generales del Expediente</label>
    <textarea class="form-control" rows="2" id="mr_observaciones_seguimiento" name=""></textarea>
    <input type="hidden" class="form-control" name="" value="">
    <br>
</div>

<div class="col-lg-12">
    <center><button type="button"  id="enviar_seguimiento" class="btn btn-info btn-sm"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Enviar</button></center>
    <br>
</div>
</div>


<div id="modificar_revision_seguimiento" class="hidden">

<h4>Modificar Revisión</h4>
<legend></legend>

<!---AGREGAR UNA NUEVA REVISIÓN -->
<div> <input type="hidden" id="edt_mr_id_revisiones_seguimiento" value="" /></div>
<div class="col-md-4">
<label for="dtp_input1">Fecha de Ingreso</label>
<div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="edt_mr_fecha_recibido_seguimiento" >
    <input class="form-control" type="text" value="" id="edt_mr_fecha_recibido_seguimiento2" readonly>
    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input type="hidden" id="edt_mr_fecha_recibido_seguimiento" value="" />
<br>
</div>

<div class="col-md-4 col-md-offset-4">
<label for="dtp_input1">Fecha de Envio</label>
<div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="edt_mr_fecha_envio_seguimiento" >
    <input class="form-control" type="text" value="" id="edt_mr_fecha_envio_seguimiento2" readonly>
    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input type="hidden" id="edt_mr_fecha_envio_seguimiento" value="" />
<br>
</div>


<div style="display:none;" id="edt_mr_area_seguimiento2">
  <label for="">Dirección</label>
  <select  class="form-control option" id="edt_mr_area_seguimiento">
    <option>SEGUIMIENTO A LA INVERSIÓN</option>
  </select>
  <br>
</div>


<div class="col-lg-12">
    <label for="textArea" class="constrol-label">Observaciones generales del Expediente</label>
    <textarea class="form-control" rows="2" id="edt_mr_observaciones_seguimiento" name=""></textarea>
    <input type="hidden" class="form-control" name="" value="">
    <br>
</div>

<div class="col-lg-12">
    <center><button type="button"  id="edt_enviar_seguimiento" class="btn btn-info btn-sm"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Guardar cambios</button></center>
    <br>
</div>
</div>

</div>
<!-- /////////////////////////////////////////////////////////////////////////////////// -->


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


        <a href="#" class="btn btn-info btn-sm" id="btn_nueva_revision_licitaciones"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Revisión</a>

        <br><br>
<div id="nueva_revision_licitaciones" class="hidden">
    <h4>Nueva Revisión</h4>
    <legend></legend>

    <!---AGREGAR UNA NUEVA REVISIÓN -->

    <div class="col-md-4">
    <label for="dtp_input1">Fecha de Ingreso</label>
    <div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="mr_fecha_recibido_licitaciones" >
        <input class="form-control" type="text" value="" id="mr_fecha_recibido_licitaciones2" readonly>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>
    <input type="hidden" id="mr_fecha_recibido_licitaciones" value="" />
    <br>
  </div>

  <div class="col-md-4 col-md-offset-4">
    <label for="dtp_input1">Fecha de Envio</label>
    <div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="mr_fecha_envio_licitaciones" >
        <input class="form-control" type="text" value="" id="mr_fecha_envio_licitaciones2" readonly>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
    </div>
    <input type="hidden" id="mr_fecha_envio_licitaciones" value="" />
    <br>
  </div>




    <div style="display:none;" id="mr_area_licitaciones2">
      <label for="">Dirección</label>
      <select  class="form-control option" id="mr_area_licitaciones">
        <option>LICITACIONES</option>
        </select>
      <br>
    </div>


    <div class="col-lg-12">
        <label for="textArea" class="constrol-label">Observaciones generales del Expediente</label>
        <textarea class="form-control" rows="2" id="mr_observaciones_licitaciones" name=""></textarea>
        <input type="hidden" class="form-control" name="" value="">
        <br>
    </div>

    <div class="col-lg-12">
        <center><button type="button"  id="enviar_licitaciones" class="btn btn-info btn-sm"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Enviar</button></center>
        <br>
    </div>
  </div>

  <div id="modificar_revision_licitaciones" class="hidden">
      <h4>Modificar Revisión</h4>
      <legend></legend>

      <!---AGREGAR UNA NUEVA REVISIÓN -->
      <div> <input type="hidden" id="edt_mr_id_revisiones_licitaciones" value="" /></div>
      <div class="col-md-4">
      <label for="dtp_input1">Fecha de Ingreso</label>
      <div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="edt_mr_fecha_recibido_licitaciones" >
          <input class="form-control" type="text" value="" id="edt_mr_fecha_recibido_licitaciones2" readonly>
          <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
          <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
      </div>
      <input type="hidden" id="edt_mr_fecha_recibido_licitaciones" value="" />
      <br>
    </div>

    <div class="col-md-4 col-md-offset-4">
      <label for="dtp_input1">Fecha de Envio</label>
      <div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="edt_mr_fecha_envio_licitaciones" >
          <input class="form-control" type="text" value="" id="edt_mr_fecha_envio_licitaciones2" readonly>
          <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
          <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
      </div>
      <input type="hidden" id="edt_mr_fecha_envio_licitaciones" value="" />
      <br>
    </div>



    <div style="display:none;" id="edt_mr_area_licitaciones2">
      <label for="">Dirección</label>
      <select  class="form-control option" id="edt_mr_area_licitaciones">
        <option>LICITACIONES</option>
      </select>
      <br>
    </div>

      <div class="col-lg-12">
          <label for="textArea" class="constrol-label">Observaciones generales del Expediente</label>
          <textarea class="form-control" rows="2" id="edt_mr_observaciones_licitaciones" name=""></textarea>
          <input type="hidden" class="form-control" name="" value="">
          <br>
      </div>

      <div class="col-lg-12">
          <center><button type="button"  id="edt_enviar_licitaciones" class="btn btn-info btn-sm"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Guardar cambios</button></center>
          <br>
      </div>
    </div>


</div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
</div>
