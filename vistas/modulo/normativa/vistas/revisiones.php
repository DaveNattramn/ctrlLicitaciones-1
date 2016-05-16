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
  <li class="active"><a href="#normativa" data-toggle="tab">Normativa</a></li>
  <li class="disabled"><a href="#">Dirección de Obra</a></li>
  <li class="disabled"><a href="#">Seguimiento a la Inversión</a></li>
  <li class="disabled"><a href="#">Licitaciones</a></li>
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
        <label for="">Fecha de Ingreso el Proyecto</label>
        <input type="date" class="form-control" id="mr_fecha_recibido_n" >
        <br>
    </div>

    <div class="col-md-4 col-md-offset-4">
        <label for="">Fecha de Envio</label>
        <input type="date" class="form-control" id="mr_fecha_envio_n" >
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
  <div class="tab-pane fade" id="profile">
    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
  </div>
  <div class="tab-pane fade" id="Dis">
    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
  </div>
</div>
