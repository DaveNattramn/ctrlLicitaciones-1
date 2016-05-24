<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();

  $id_obra = utf8_decode($_POST['id_obra']);
  $no_obra = utf8_decode($_POST['no_obra']);
  $obra = utf8_decode($_POST['obra']);
  $fecha_autorizacion = utf8_decode($_POST['fecha_autorizacion']);
  $fecha_recibido_autorizacion = utf8_decode($_POST['fecha_recibido_autorizacion']);
  $no_autorizacion = utf8_decode($_POST['no_autorizacion']);
  $tipo_inversion = utf8_decode($_POST['tipo_inversion']);
  $tipo_expediente = utf8_decode($_POST['tipo_expediente']);
  $monto_solicitado = utf8_decode($_POST['monto_solicitado']);
  $dimension_inversion = utf8_decode($_POST['dimension_inversion']);
  $unidad_responsable = utf8_decode($_POST['unidad_responsable']);
  $etapa = utf8_decode($_POST['etapa']);
  $periodo_ejecucion = utf8_decode($_POST['periodo_ejecucion']);
  $propuesta_anual = utf8_decode($_POST['propuesta_anual']);
  $normativa_aplicar = utf8_decode($_POST['normativa_aplicar']);
  $tipo_adj_solicitado = utf8_decode($_POST['tipo_adj_solicitado']);
  $partidas = utf8_decode($_POST['partidas']);

  $ubicacion = $_POST['ubicacion'];  //UTF8 se usara en la conexión, tiene problemas con JSON

  $beneficiarios_directos = utf8_decode($_POST['beneficiarios_directos']);
  $beneficiarios_indirectos = utf8_decode($_POST['beneficiarios_indirectos']);
  $empleos_directos = utf8_decode($_POST['empleos_directos']);
  $empleos_indirectos = utf8_decode($_POST['empleos_indirectos']);
  $programa_federal = utf8_decode($_POST['programa_federal']);
  $aporte_federal = utf8_decode($_POST['aporte_federal']);
  $programa_estatal = utf8_decode($_POST['programa_estatal']);
  $aporte_estatal = utf8_decode($_POST['aporte_estatal']);
  $programa_municipal = utf8_decode($_POST['programa_municipal']);
  $aporte_municipal = utf8_decode($_POST['aporte_municipal']);
  $aportacion_beneficiarios = utf8_decode($_POST['aportacion_beneficiarios']);
  $aportacion_otros = utf8_decode($_POST['aportacion_otros']);

  //automaticos
  /*if($no_obra==""){
    $estatus_recurso='EN INTEGRACIÓN DE EXPEDIENTE';
  }
  else {
    $estatus_recurso='AUTORIZADO';
  }*/

  $resultado=$bd->actualizar_obra($id_obra,$no_obra,$obra,$no_autorizacion,$fecha_autorizacion,$fecha_recibido_autorizacion,$tipo_inversion,$tipo_expediente,$monto_solicitado,$dimension_inversion,$unidad_responsable,$etapa,$periodo_ejecucion,$propuesta_anual,$normativa_aplicar,$tipo_adj_solicitado,$partidas,$ubicacion,$beneficiarios_directos,$beneficiarios_indirectos,$empleos_directos,$empleos_indirectos,$programa_federal,$aporte_federal,$programa_estatal,$aporte_estatal,$programa_municipal,$aporte_municipal,$aportacion_beneficiarios,
                                    $aportacion_otros);

  $bd->cerrar();
?>
