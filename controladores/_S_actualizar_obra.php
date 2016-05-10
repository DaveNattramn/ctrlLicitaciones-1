<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();

  $id_obra = $_POST['id_obra'];
  $no_obra = $_POST['no_obra'];
  $obra = $_POST['obra'];
  $fecha_autorizacion = $_POST['fecha_autorizacion'];
  $fecha_recibido_autorizacion = $_POST['fecha_recibido_autorizacion'];
  $no_autorizacion = $_POST['no_autorizacion'];
  $tipo_inversion = $_POST['tipo_inversion'];
  $tipo_expediente = $_POST['tipo_expediente'];
  $monto_solicitado = $_POST['monto_solicitado'];
  $dimension_inversion = $_POST['dimension_inversion'];
  $unidad_responsable = $_POST['unidad_responsable'];
  $etapa = $_POST['etapa'];
  $periodo_ejecucion = $_POST['periodo_ejecucion'];
  $propuesta_anual = $_POST['propuesta_anual'];
  $normativa_aplicar = $_POST['normativa_aplicar'];
  $tipo_adj_solicitado = $_POST['tipo_adj_solicitado'];
  $partidas = $_POST['partidas'];
  $municipio = $_POST['municipio'];
  $localidad = $_POST['localidad'];
  $beneficiarios_directos = $_POST['beneficiarios_directos'];
  $beneficiarios_indirectos = $_POST['beneficiarios_indirectos'];
  $empleos_directos = $_POST['empleos_directos'];
  $empleos_indirectos = $_POST['empleos_indirectos'];
  $programa_federal = $_POST['programa_federal'];
  $aporte_federal = $_POST['aporte_federal'];
  $programa_estatal = $_POST['programa_estatal'];
  $aporte_estatal = $_POST['aporte_estatal'];
  $programa_municipal = $_POST['programa_municipal'];
  $aporte_municipal = $_POST['aporte_municipal'];
  $aportacion_beneficiarios = $_POST['aportacion_beneficiarios'];
  $aportacion_otros = $_POST['aportacion_otros'];

  $resultado=$bd->actualizar_obra($id_obra,$no_obra,$obra,$no_autorizacion,$fecha_autorizacion,$fecha_recibido_autorizacion,$tipo_inversion,$tipo_expediente,$monto_solicitado,$dimension_inversion,$unidad_responsable,$etapa,$periodo_ejecucion,$propuesta_anual,$normativa_aplicar,$tipo_adj_solicitado,$partidas,$municipio,$localidad,$beneficiarios_directos,$beneficiarios_indirectos,$empleos_directos,$empleos_indirectos,$programa_federal,$aporte_federal,$programa_estatal,$aporte_estatal,$programa_municipal,$aporte_municipal,$aportacion_beneficiarios,$aportacion_otros);

  $bd->cerrar();
?>
