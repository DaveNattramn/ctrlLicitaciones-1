<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $id = utf8_decode($_POST['id_obra']);

  $result = $bd->getObra($id);

  $j_obra = array();

  while($row = odbc_fetch_array($result))
  {
  	$j_obra['id_obra']=utf8_encode($row['id_obra']);
  	$j_obra['obra']=utf8_encode($row['obra']);
    $j_obra['tipo_inversion']=utf8_encode($row['tipo_inversion']);
    $j_obra['tipo_expediente']=utf8_encode($row['tipo_expediente']);
    $j_obra['dimension_inversion']=utf8_encode($row['dimension_inversion']);
    $j_obra['dependencia_solicitante']=utf8_encode($row['dependencia_solicitante']);
    $j_obra['dependencia_ejecutora']=utf8_encode($row['dependencia_ejecutora']);
    $j_obra['unidad_responsable']=utf8_encode($row['unidad_responsable']);
    $j_obra['no_obra']=utf8_encode($row['no_obra']);
    $j_obra['no_autorizacion']=utf8_encode($row['no_autorizacion']);
    $j_obra['fecha_autorizacion']=  utf8_encode($row['fecha_autorizacion']);
    $j_obra['fecha_recibido_autorizacion']=utf8_encode($row['fecha_recibido_autorizacion']);
    $j_obra['etapa']=utf8_encode($row['etapa']);
    $j_obra['periodo_ejecucion']=utf8_encode($row['periodo_ejecucion']);
    $j_obra['propuesta_anual']=utf8_encode($row['propuesta_anual']);
    $j_obra['normativa_aplicar']=utf8_encode($row['normativa_aplicar']);
    $j_obra['tipo_adj_solicitado']=utf8_encode($row['tipo_adj_solicitado']);
    $j_obra['partidas']=utf8_encode($row['partidas']);
    $j_obra['beneficiarios_directos']=utf8_encode($row['beneficiarios_directos']);
    $j_obra['beneficiarios_indirectos']=utf8_encode($row['beneficiarios_indirectos']);
    $j_obra['empleos_directos']=utf8_encode($row['empleos_directos']);
    $j_obra['empleos_indirectos']=utf8_encode($row['empleos_indirectos']);
  }


  echo json_encode($j_obra);
  $bd->cerrar();
?>
