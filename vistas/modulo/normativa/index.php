<?php
	session_start();

	$_SESSION['usuario'];
	$usuario = $_SESSION['usuario'];
	$user = explode("_", $usuario);
	if(empty($_SESSION['usuario'])){
	 	header("Location:../../../index.php");
	}
?>

<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../../../css/bootstrap-cerulean.css">
		<link rel="stylesheet" href="../../../css/font-awesome.css">
		<link rel="stylesheet" href="../../../css/navbar.css">
	    <link rel="stylesheet" href="../../../css/side-menu.css">
	    <link rel="shortcut icon" href="../../../favicon.ico" />
		<title>S.I.T. | NORMATIVA </title>
	</head>

	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
      		<div class="container">
      			  	<div class="navbar-header">
      			  	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="	navbar"	>
      			  	    <span class="sr-only">Toggle navigation</span>
      			  	    <span class="icon-bar"></span>
      			  	    <span class="icon-bar"></span>
      			  	    <span class="icon-bar"></span>
      			  	  </button>
      			  	  <img src="../../../recursos/img/gob.png"></img><a class="navbar-brand" href="">Departamento de Normativa</a>
      			  	</div>

      			 	 <div id="navbar" class="collapse navbar-collapse">
      			 	   <ul class="nav navbar-nav navbar-right">
      			 	     <li class="dropdown">
      			 	       <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo utf8_encode($user[0]); ?> <span	 	class="		caret"></span></a>
      			 	       <ul class="dropdown-menu" role="menu">
      			 	         <li><a href="../../../controladores/cerrar_sesion.php"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
      			 	       </ul>
      			 	     </li>
      			 	   </ul>
      		 	 	</div><!--/.nav-collapse -->
      		</div>
    	</nav>


					<div class="info col-lg-12" id="lista de obras">

										<ul class="nav nav-tabs">
			                	<li class="active"><a href="#1" class="tabs" data-toggle="tab"> <span class="glyphicon glyphicon-list" aria-hidden="true"></span> Todos las Obras</a></li>
			                	<li><a href="#2" class="tabs" data-toggle="tab"><span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span> Agregar Nueva Obra</a></li>
			              </ul>

										<div class="tab-content"> <!--CONTENIDO DE TABS-->
												<br>

											<div class="tab-pane active" id="1"> <!--TAB 1 TODAS LAS OBRAS-->

												<div class="container"><!--div container-->

													<div class="col-lg-12"> <!--div col lg 12-->
														<input type="text" class="form-control" id="" placeholder="Buscar Obra...">
														<br>
													</div><!--fin div col lg 12-->

													<div class="col-lg-12"> <!--div col lg 12 tabla -->
														<table class="table table-hover">
															     <thead>
																    <tr>
																	    <th>#</th>
																			<th>No. de Obra</th>
																			<th>Nombre de la Obra</th>
																			<th>Municipio</th>
																			<th>Localidad</th>
																			<th>Monto</th>
																			<th>Tipo de Procedimiento</th>
																    </tr>
															     </thead>
															     <tbody>
																			 <!---EJEMPLO DE OBRA AUTORIZADA-->
																	    <tr id="id_obra">
																		    <td>1</td>
																				<td>20163333</td>
																				<td>CONSTRUCCIÓN DE CONCRETO HIDRÁULICO EN CALLE 5 DE MAYO Y CALLE MORELOS, EN LA CABECERA MUNICIPAL DE CAÑADA MORELOS, EN EL ESTADO DE PUEBLA</td>
																				<td>CAÑADA MORELOS</td>
																				<td>CAÑADA MORELOS</td>
																				<td> $10,095,426.35 </td>
																				<td>Licitación Publica Estatal</td>
																	    </tr>

																			<!---EJEMPLO DE OBRA CANCELADA-->
																		 <tr class="danger" id="id_obra">
																			 <td>2</td>
																			 <td>20160078</td>
																			 <td>ELABORACIÓN DE ESTUDIOS Y PROYECTO PARA EL MEJORAMIENTO DE LA IMAGEN URBANA DEL TRAYECTO DEL TREN TURISTICO PUEBLA - CHOLULA (A PRECIO ALZADO)</td>
																			 <td>SAN JOSÉ CHIAPA</td>
																			 <td>SAN JOSÉ CHIAPA</td>
																			 <td> $13,553,898.00 </td>
																			 <td>Invitación Restringida a 5 Federal</td>
																		 </tr>

																		 <!---EJEMPLO DE OBRA LICITADA-->
																		<tr class="success" id="id_obra">
																			<td>3</td>
																			<td>20160007</td>
																			<td>PROYECTO INTEGRAL PARA LA CONSTRUCCIÓN DE LA VÍA SAN MARTÍN TEXMELUCAN-HUEJOTZINGO. TRAMO I UBICADO EN EL ESTADO DE PUEBLA </td>
																			<td>SAN MARTÍN TEXMELUCAN</td>
																			<td>TEXMELUCAN-HUEJOTZINGO</td>
																			<td> $211,382,760.00  </td>
																			<td>Licitación Publica Estatal</td>
																		</tr>
															     </tbody>
														</table>

														<ul class="pagination">
														  <li class="disabled"><a href="">&laquo;</a></li>
														  <li class="active"><a href="">1</a></li>
														  <li><a href="">2</a></li>
														  <li><a href="">3</a></li>
														  <li><a href="">4</a></li>
														  <li><a href="">5</a></li>
														  <li><a href="">&raquo;</a></li>
														</ul>
													</div><!--fin div col lg 12 tabla-->


												</div><!--fin div container-->
											</div> <!--FIN TAB1 DE TODAS LAS OBRAS-->



								    	<div class="tab-pane" id="2"> <!--TAB AGREGAR NUEVA OBRA-->

												<div class="container"> <!-- CONTENEDOR DE TODO DE INGRESO DE NUEVA OBRA --->

													<div class="col-lg-12"> <!--col lg 12-->

														<div class="panel panel-default"><!--PRIMER PANEL-->
														  <div class="panel-heading">
														    <h3 class="panel-title">Identificación</h3>
														  </div>
														  <div class="panel-body">

																<div class="col-lg-12">
												            <label for="textArea" class="constrol-label">Descripción de la Obra</label>
												            <textarea class="form-control" rows="3" id="obra" name="" ></textarea>
												            <input type="hidden" class="form-control" name="" value="">
																		<p class="help-block">Este texto aparecerá si el nombre de la obra ya existe</p>
												            <br>
												        </div>

																<div class="col-lg-3  col-sm-6">
	 														    <label for="">Tipo de Inversión</label>
	 														    <input type="text" class="form-control" id="tipo_inversion">
 													      </div>

																<div class="col-lg-3  col-sm-6">
																	<label>Tipo de Solicitud</label>
											            <select class="form-control option" id="tipo_expediente" name="">
											                <option></option>
																			<option>COSTO-BENEFICIO</option>
																			<option>ESTUDIOS Y PROYECTOS</option>
																			<option>OBRA</option>
																			<option>PROYECTO INTEGRAL</option>
																			<option>SUPERVISIÓN</option>
																		</select>
 													      </div>

																<div class="col-lg-3  col-sm-6">
																	<label class="control-label">Monto Solicitado</label>
																	  <div class="input-group">
																	    <span class="input-group-addon">$</span>
																	    <input type="text" class="form-control" id="monto_solicitado">
																	  </div>
 													      </div>

																<div class="col-lg-3  col-sm-6">
	 														    <label for="">Dimensión de Inversión</label>
	 														    <input type="text" class="form-control" id="dimension_inversion">
																	<br>
 													      </div>

																<div class="col-lg-3  col-sm-6">
																	<label>Dependencia Solicitante</label>
											            <select class="form-control option" name="" id="dependencia_solicitante">
											                <option></option>
																			<option>Secretaría de Infraestructura</option>
																		</select>
 													      </div>

																<div class="col-lg-3  col-sm-6">
																	<label>Dependencia Ejecutora</label>
											            <select class="form-control option" name="" id="dependencia_ejecutora">
											                <option></option>
																			<option>Secretaría de Infraestructura y Transportes</option>
																		</select>
 													      </div>

																<div class="col-lg-3  col-sm-6">
																	<label>Unidad Responsable (U.R.)</label>
											            <select class="form-control option" name="" id="unidad_responsable">
											                <option></option>
																			<option>Dirección General de Proyectos</option>
																			<option>Dirección de Vialidades Urbana</option>
																		</select>
 													      </div>

																<div class="col-lg-3  col-sm-6">
	 														    <label for="">Etapa</label>
	 														    <input type="text" class="form-control" id="etapa">
																	<br>
 													      </div>

																<div class="col-lg-3  col-sm-6">
	 														    <label for="">Periodo de Ejecución</label>
	 														    <input type="text" class="form-control" id="periodo_ejecucion" placeholder="Semanas">
 													      </div>

																<div class="col-lg-3  col-sm-6">
	 														    <label for="">Propuesta Anual</label>
	 														    <input type="text" class="form-control" id="propuesta_anual">
 													      </div>

																<div class="col-lg-3  col-sm-6">
	 														    <label for="">Normativa a Aplicar</label>
	 														    <input type="text" class="form-control" id="normativa_aplicar">
																	<br>
 													      </div>

																<div class="col-lg-3  col-sm-6">
	 														    <label for="">Modalidad de Ejecución</label>
	 														    <input type="text" class="form-control" id="tipo_adj_solicitado">
																	<br>
 													      </div>

																<legend></legend>

																<div class="col-lg-4">
												            <label for="textArea" class="constrol-label">Partidas</label>
												            <textarea class="form-control" rows="2" id="partidas" name=""></textarea>
												            <input type="hidden" class="form-control" name="" value="">
												            <br>
												        </div>

																<div class="col-lg-4">
	 														    <label for="">Clave Programa Presupuesto</label>
	 														    <input type="text" class="form-control" id="clave_presupuesto">
																	<br>
 													      </div>

																<div class="col-lg-4">
												            <label for="textArea" class="constrol-label">Descripción Programa Presupuestario</label>
												            <textarea class="form-control" rows="2" id="desc_presupuesto" name=""></textarea>
												            <input type="hidden" class="form-control" name="" value="">
												            <br>
												        </div>
														  </div>
													</div>

												</div> <!--DIV DE COL -LG-12-->

												<div class="col-lg-12  col-sm-6"><!--2do col lg 12-->
													<div class="panel panel-default"><!--2do PANEL-->
														<div class="panel-heading">
															<h3 class="panel-title">Ubicación</h3>
														</div>
														<div class="panel-body">
																<div class="col-lg-3  col-sm-6">
																	<label for="">Municipio</label>
																	<input type="text" class="form-control" id="municipio">
																	<br>
																</div>

																<div class="col-lg-3  col-sm-6">
																	<label for="">Localidad</label>
																	<input type="text" class="form-control" id="localidad">
																	<br>
																</div>

																<div class="col-lg-3  col-sm-6">
																	<label for="">Beneficiarios Directos</label>
																	<input type="text" class="form-control" id="beneficiarios_directos">
																	<br>
																</div>

																<div class="col-lg-3  col-sm-6">
																	<label for="">Beneficiarios Indirectos</label>
																	<input type="text" class="form-control" id="beneficiarios_indirectos">
																	<br>
																</div>
														</div>
													</div><!--div 2do PANEL-->
												</div><!--fin 2do col lg 12-->

												<div class="col-lg-12  col-sm-6"><!--3er col lg 12-->
													<div class="panel panel-default"><!--2do PANEL-->
															<div class="panel-heading">
																<h3 class="panel-title">Estructura Financiera</h3>
															</div>
																<div class="panel-body">

																		<div class="col-lg-4">
																			<label for="">Programa Federal</label>
																			<input type="text" class="form-control" id="programa_federal">
																			<br>
																		</div>

																		<div class="col-lg-4">
																			<label for="">Programa Estatal</label>
																			<input type="text" class="form-control" id="programa_estatal">
																			<br>
																		</div>

																		<div class="col-lg-4">
																			<label for="">Programa Municipal</label>
																			<input type="text" class="form-control" id="programa_municipal">
																			<br>
																		</div>

																		<div class="col-lg-4">
																			  <div class="input-group">
																			    <span class="input-group-addon">$</span>
																			    <input type="text" class="form-control" placeholder="Aportación Federal" id="aporte_federal">
																			  </div>
		 													      </div>

																		<div class="col-lg-4">
																			  <div class="input-group">
																			    <span class="input-group-addon">$</span>
																			    <input type="text" class="form-control" placeholder="Aportación Estatal" id="aporte_estatal">
																			  </div>
		 													      </div>

																		<div class="col-lg-4">
																			  <div class="input-group">
																			    <span class="input-group-addon">$</span>
																			    <input type="text" class="form-control" placeholder="Aportación Municipal" id="aporte_municipal">
																			  </div>
																				<br>
		 													      </div>

																		<legend></legend>

																		<div class="col-lg-6  col-sm-6">
																			<label for="">Aportación Beneficiarios</label>
																			<div class="input-group">
																				<span class="input-group-addon">$</span>
																				<input type="text" class="form-control" id="aportacion_beneficiarios">
																			</div>
																			<br>
																		</div>

																		<div class="col-lg-6  col-sm-6">
																			<label for="">Aportación Otros</label>
																			<div class="input-group">
																				<span class="input-group-addon">$</span>
																				<input type="text" class="form-control" id="aportacion_otros">
																			</div>
																			<br>
																		</div>

																		<div class="col-lg-12">
																			<h3>Total: </h3> $3,644,988.54
																			<!---EN CASO DE QUE LA SUMA DE LOS MONTOS SEA DIFERENTE MANDAR ALERTA ERROR-->
																			<span class="label label-danger" id=""><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> La suma de los Montos es diferente al Monto Solicitado VERIFICAR A LA BREVEDAD</span>

																			<br>
																			<!---EN CASO DE QUE LA SUMA DE LOS MONTOS SEA EXACTA MOSTRAR ALERTA POSITIVA-->
																			<span class="label label-success" id=""><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
																		</div>
																</div><!--panel body-->
													</div>
												</div><!--fin div 3er co lg 12-->



												</div> <!--DIV DE CONTAINER-->


													<div class="col-lg-12">
															<center><button type="submit" id="guardar_obra" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</button></center>
															<br>
													</div>


											</div><!---FIN DE TAB 2-->

										</div><!--FIN CONTENIDO DE TABS-->


					</div>

























<!--NODAL INFO OBRAS-->
					<div class="modal fade" id="modalObra">
		        <div class="modal-dialog" style="width: 1000px;">
		          <div class="modal-content">
		            <div class="modal-header">
		              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

									<div class="col-lg-12">

										<div class="col-lg-4 col-sm-4">
											<h3>Información de la Obra</h3>
										</div>

										<div class="col-lg-4 col-sm-4">
											<div class="alert alert-dismissible alert-success">
												Estatus del Recurso: <strong>Autorizado</strong>
											</div>
										</div>

										<div class="col-lg-4 col-sm-4">
											<div class="alert alert-dismissible alert-info">
												Estatus Obra: <strong>En Revisión S.I.T. </strong>
											</div>
										</div>

									</div>
									<br><br><br><br>

		            </div>

		            <div class="modal-body">

									<div class="col-lg-12">
									  <ul class="nav nav-tabs nav-justified">
									    <li class="active"><a href="#general" data-toggle="tab" aria-expanded="false"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>  General</a></li>
									    <li class=""><a href="#profile" data-toggle="tab" aria-expanded="true"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 	Revisiones</a></li>
									  </ul>
									  <div id="myTabContent" class="tab-content">

									    <div class="tab-pane fade active in" id="general">
												<?php
													require("vistas/info_obra_modal.php");
												?>

											</div><!--div de tab 1-->
											<div class="tab-pane fade" id="profile">
												<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
											</div>
										</div>
									</div>


		            </div><!--Div de modal body-->
									<legend></legend>
		            <div class="modal-footer">

		              <button id="" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar Proyecto</button>

									<button type="button" id="" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar</button>
									<button type="button" id="" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</button>
		              <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-resize-small" aria-hidden="true"></span> Cerrar</button>
		              <input type="hidden" id="" value="">
		            </div>
		          </div>
		        </div>
		      </div>





    	      <script src="../../../js/jquery21.js"></script>
            <script src="../../../js/jquery21.js"></script>
            <script src="../../../js/bootstrap.js"></script>
            <script src="../../../js/scripts_generales.js"></script>
						<script src="../../../js/_Sagregar_obra.js"></script>
						<script src="js/effects.js">

						</script>
	</body>
</html>
