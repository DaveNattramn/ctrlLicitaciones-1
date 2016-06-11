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
		<link href="../../../css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <script src="../../../js/jquery21.js"></script>
        <script src="../../../js/bootstrap.js"></script>
        <script src="../../../js/scripts_generales.js"></script>
		<script src="../../../js/_S_agregar_obra.js"></script>
		<script src="../../../js/_S_tabla_obra.js"></script>
		<script src="../../../js/jquery-dateFormat.js"></script>
		<script src="js/nvo_alcance.js"></script>
		<script src="js/effects.js"></script>
		<script src="js/datetimepicker.js"></script>
		<script type="text/javascript" src="../../../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
		<script type="text/javascript" src="../../../js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

		<title>S.I.T. | NORMATIVA </title>


		<link rel="stylesheet" type="text/css" href="../../../recursos/DataTables/datatables.css">
		<script type="text/javascript" src="../../../recursos/DataTables/datatables2.js"></script>

		<link rel="stylesheet" href="../../../css/toastr.css">
		<script src="../../../js/toastr.js"></script>


<!--

<script type="text/javascript" src="../../../js/responsive.bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="../../../recursos/DataTables/responsive.bootstrap.css">

-->
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
      			 	       	<?php 
      			 	         	if ($user[0] == "David Flores Alvarez") {
      			 	         		?>
      			 	         			<li><a href="../../../admin.php"><i class="fa fa-undo" aria-hidden="true"></i> Volver a Admin</a></li>
      			 	         			<li class="divider"></li>
      			 	         		<?php
      			 	         	}
      			 	         ?>
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

											<div class="tab-pane active" id="1" > <!--TAB 1 TODAS LAS OBRAS-->

											<!--<div class="container"><!--div container-->

												<div class="col-lg-12"> <!--div col lg 12 tabla -->

														<table class="table table-hover table-condensed " id="mostrar">
															     <thead>
																    <tr>
																	    <th style="width: 4%">#</th>
																			<th style="width: 7%">No. de Obra</th>
																			<th style="width: 49%">Nombre de la Obra</th>
																			<th style="width: 10%">Municipio</th>
																			<th style="width: 10%">Localidad</th>
																			<th style="width: 10%">Monto</th>
																			<th style="width: 10%">Tipo de Procedimiento</th>
																    </tr>
															     </thead>

															     

														</table>

												</div><!--fin div col lg 12 tabla-->


											<!--</div><!--fin div container-->
											</div> <!--FIN TAB1 DE TODAS LAS OBRAS-->



								    	<div class="tab-pane" id="2"> <!--TAB AGREGAR NUEVA OBRA-->

												<div class="container"> <!-- CONTENEDOR DE TODO DE INGRESO DE NUEVA OBRA --->

													<div class="col-lg-12"> <!--col lg 12-->

														<div class="panel panel-default"><!--PRIMER PANEL-->
														  <div class="panel-heading">
														    <h3 class="panel-title">Identificación</h3>
														  </div>
														  <div class="panel-body">

																<div class="col-lg-12" id="d_obra">
												            <label for="textArea" class="constrol-label">Descripción de la Obra</label>
												            <textarea class="form-control" rows="3" id="obra" name="" required></textarea>
												            <input type="hidden" class="form-control" name="" value="">
																		<p class="help-block"></p>
												            <br>
												        </div>

																<div class="col-lg-3  col-sm-6" id="d_tipo_inversion">
	 														    <label for="">Tipo de Inversión</label>
	 														    <input type="text" class="form-control" id="tipo_inversion">
 													      </div>

																<div class="col-lg-3  col-sm-6" id="d_tipo_expediente">
																	<label>Tipo de Solicitud</label>
											            <select class="form-control option" id="tipo_expediente" name="">
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

																<div class="col-lg-3  col-sm-6" id="d_monto_solicitado">
																	<label class="control-label">Monto Solicitado</label>
																	  <div class="input-group">
																	    <span class="input-group-addon">$</span>
																	    <input type="text" class="form-control" id="monto_solicitado">
																	  </div>
 													      </div>

																<div class="col-lg-3  col-sm-6" id="d_dimension_inversion">
	 														    <label for="">Dimensión de Inversión</label>
																	<select class="form-control option" id="dimension_inversion">
																		<option></option>
																		<option>UNICA</option>
																		<option>MULTIPLE</option>
																	</select>
																	<br>

 													      </div>

																<div class="col-lg-3  col-sm-6" id="d_dependencia_solicitante">
																	<label>Dependencia Solicitante</label>
											            <select class="form-control option" name="" id="dependencia_solicitante">

																			<option>SECRETARÍA DE INFRAESTRUCTURA</option>
																		</select>
 													      </div>

																<div class="col-lg-3  col-sm-6" id="d_dependencia_ejecutora">
																	<label>Dependencia Ejecutora</label>
											            <select class="form-control option" name="" id="dependencia_ejecutora">

																			<option>SECRETARÍA DE INFRAESTRUCTURA Y TRANSPORTES</option>
																		</select>
 													      </div>

																<div class="col-lg-3  col-sm-6" id="d_unidad_responsable">
																	<label>Unidad Responsable (U.R.)</label>
											            <select class="form-control option" name="" id="unidad_responsable">
																		<option></option>
																		<option>COORDINACIÓN GENERAL ADMINISTRATIVA</option>
																		<option>DIRECCIÓN DE AGUA</option>
																		<option>DIRECCIÓN DE ALCANTARILLADO</option>
																		<option>DIRECCIÓN DE ASUNTOS JURIDICOS</option>
																		<option>DIRECCIÓN DE CARRETERAS Y CAMINOS ESTATALES</option>
																		<option>DIRECCIÓN DE CONSERVACION Y MANTENIMIENTO</option>
																		<option>DIRECCIÓN DE INFRAESTRUCTURA DE COMUNICACIONES</option>
																		<option>DIRECCIÓN DE INFRAESTRUCTURA ESTRATEGICA</option>
																		<option>DIRECCIÓN DE NORMATIVIDAD Y GESTION CIUDADANA</option>
																		<option>DIRECCIÓN DE OBRA PUBLICA</option>
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

																<div class="col-lg-3  col-sm-6" id="d_etapa">
	 														    <label for="">Etapa</label>
																	<select class="form-control option" name="" id="etapa">
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

																<div class="col-lg-3  col-sm-6" id="d_periodo_ejecucion">
	 														    <label for="">Periodo de Ejecución</label>
	 														    <input type="text" class="form-control" id="periodo_ejecucion" placeholder="Semanas">
 													      </div>

																<div class="col-lg-3  col-sm-6" id="d_propuesta_anual">
	 														    <label for="">Propuesta Anual</label>
																	<select class="form-control option" id="propuesta_anual">
								                    <option></option>
								                    <option>SÍ</option>
								                    <option>NO</option>
								                  </select>
 													      </div>

																<div class="col-lg-3  col-sm-6" id="d_normativa_aplicar">
	 														    <label for="">Normativa a Aplicar</label>
	 														    <input type="text" class="form-control" id="normativa_aplicar">
																	<br>
 													      </div>

																<div class="col-lg-3  col-sm-6" id="d_tipo_adj_solicitado">
	 														    <label for="">Modalidad de Ejecución</label>
																	<select class="form-control option" name="" id="tipo_adj_solicitado">
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
																	<br>
 													      </div>

																<legend></legend>

																<div class="col-lg-4" id="d_partidas">
												            <label for="textArea" class="constrol-label">Partidas</label>
												            <textarea class="form-control" rows="2" id="partidas" name=""></textarea>
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

															<div class="col-lg-12  col-sm-6" id="panel_ubicacion">

																															<div class="col-lg-3  col-sm-6">
																															<input type="hidden" class="form-control" id="total_ubicacion_campos" value="1" readonly>
																														</div>
															<div class='col-lg-12  col-sm-6' >

																<div class="col-md-4" id="d_municipio1">
																	<label for="">Municipio</label>
																	<select onchange='municipio_i(1)' class="form-control option" id="municipio1">
																		</select>
																	<br>
																</div>

																<div class="col-md-5" id="d_localidad1">
																	<label for="">Localidad</label>
																	<select onchange='localidad_i(1)' class="form-control option" id="localidad1">

																	</select>
																	<br>
																</div>

																<div class="col-md-2" id="d_no_localidad" >
																	<label for="">No.</label>
																	<select onchange='no_localidad_i(1)' class="form-control option" id="no_localidad1" >
																	</select>
																	<br>
																</div>

														<div class="col-md-1">
															<br>
															<button type="button" id="btn_agregar_ubicacion" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
														</div>

													</div>

														<div id="panel_ubicacion_app">
														</div>
													</div>

																<div class="col-lg-3  col-sm-6">
																	<label for="">Beneficiarios Directos</label>
																	<input type="text" class="form-control" id="beneficiarios_directos" readonly>
																	<br>
																</div>

																<div class="col-lg-3  col-sm-6">
																	<label for="">Beneficiarios Indirectos</label>
																	<input type="text" class="form-control" id="beneficiarios_indirectos" readonly>
																	<br>
																</div>


																<div class="col-lg-3  col-sm-6">
																	<label for="">Empleos directos</label>
																	<input type="text" class="form-control" id="empleos_directos" readonly>
																	<br>
																</div>


																<div class="col-lg-3  col-sm-6">
																	<label for="">Empleos Indirectos</label>
																	<input type="text" class="form-control" id="empleos_indirectos" readonly>
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

																		<div class="col-lg-4" id="d_programa_federal">
																			<label for="">Programa Federal</label>
																			<input type="text" class="form-control" id="programa_federal">
																			<br>
																		</div>

																		<div class="col-lg-4" id="d_programa_estatal">
																			<label for="">Programa Estatal</label>
																			<input type="text" class="form-control" id="programa_estatal">
																			<br>
																		</div>

																		<div class="col-lg-4" id="d_programa_municipal">
																			<label for="">Programa Municipal</label>
																			<input type="text" class="form-control" id="programa_municipal">
																			<br>
																		</div>

																		<div class="col-lg-4" id="d_aporte_federal">
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

																		<div class="col-lg-12" id="suma_total">

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
					<div class="modal fade" id="myModal">
		        <div class="modal-dialog" style="width: 1000px;">
		          <div class="modal-content">
		            <div class="modal-header">
		              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

									<div class="col-lg-12">

										<div class="col-lg-4 col-sm-4">
											<h3>Información de la Obra</h3>
										</div>

										<div class="col-lg-4 col-sm-4">
											<div class="alert alert-dismissible alert-success" align="center" id="alerta_recurso">

											</div>
										</div>

										<div class="col-lg-4 col-sm-4">
											<div class="alert alert-dismissible alert-info" align="center" id="alerta_obra">

											</div>
										</div>

									</div>
									<br><br><br><br><br>

		            </div>

		            <div class="modal-body" id="m_tabs">

									<div class="col-lg-12">
									  <ul class="nav nav-tabs nav-justified">
									    <li class="active"><a href="#general" data-toggle="tab" aria-expanded="false"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>  General</a></li>
											<li class=""><a href="#alcances" data-toggle="tab" aria-expanded="true"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> 	Alcances</a></li>
									    <li class=""><a href="#profile" data-toggle="tab" aria-expanded="true"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 	Revisiones</a></li>
									  </ul>
										<div id="myTabContent" class="tab-content">

									    <div class="tab-pane fade active in" id="general">
												<?php
													require("vistas/info_obra_modal.php");
												?>

											</div><!--div de tab 1-->

											<div class="tab-pane fade" id="alcances"><!--div de tab 2-->
												<?php
													require("vistas/alcances.php");
												?>
											</div>

											<div class="tab-pane fade" id="profile"><!--div de tab 3-->
												<?php
													require("vistas/revisiones.php");
												?>
											</div>
										</div>
									</div>


		            </div><!--Div de modal body-->
									<legend></legend>
		            <div class="modal-footer">

									<button id="btn_resumen" type="button" class="btn btn-warning pull-left"><i class="fa fa-external-link" aria-hidden="true"></i> Resumen</button>
									<button id="activar_obra" type="button" class="btn btn-success" ><span class="glyphicon glyphicon-check" aria-hidden="true" ></span> Activar Proyecto</button>
		              <button id="cancelar_obra" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar Proyecto</button>
									<button type="button" id="modificar_obra" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar</button>
									<button type="button" id="actualizar_obra" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</button>
		              <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-resize-small" aria-hidden="true"></span> Cerrar</button>
		              <input type="hidden" id="" value="">
		            </div>
		          </div>
		        </div>
		      </div>




	</body>
</html>
