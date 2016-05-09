<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();

  $message = "En php controlador";
  echo "<script type='text/javascript'>alert('$message');</script>";

  $obra = $_POST['obra'];
  $tipo_inversion = $_POST['tipo_inversion'];
  $tipo_expediente = $_POST['tipo_expediente'];
  $monto_solicitado = $_POST['monto_solicitado'];
  $dimension_inversion = $_POST['dimension_inversion'];
  $dependencia_solicitante = $_POST['dependencia_solicitante'];
  $dependencia_ejecutora = $_POST['dependencia_ejecutora'];
  $unidad_responsable = $_POST['unidad_responsable'];
  $etapa = $_POST['etapa'];
  $periodo_ejecucion = $_POST['periodo_ejecucion'];
  $propuesta_anual = $_POST['propuesta_anual'];
  $normativa_aplicar = $_POST['normativa_aplicar'];
  $tipo_adj_solicitado = $_POST['tipo_adj_solicitado'];
  $partidas = $_POST['partidas'];
  //$clave_presupuesto = $_POST['clave_presupuesto'];
  //$desc_presupuesto = $_POST['desc_presupuesto'];
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

  $resultado=$bd->agregar_obra($obra,$tipo_inversion,$tipo_expediente,$monto_solicitado,$dimension_inversion,$dependencia_solicitante,$dependencia_ejecutora,$unidad_responsable,$etapa,$periodo_ejecucion,$propuesta_anual,$normativa_aplicar,$tipo_adj_solicitado,$partidas,$municipio,$localidad,$beneficiarios_directos,$beneficiarios_indirectos,$empleos_directos,$empleos_indirectos,$programa_federal,$aporte_federal,$programa_estatal,$aporte_estatal,$programa_municipal,$aporte_municipal,$aportacion_beneficiarios,$aportacion_otros);

  $bd->cerrar();
?>
