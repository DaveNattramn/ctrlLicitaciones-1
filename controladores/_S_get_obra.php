<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $id = $_POST['id_obra'];

  $result = $bd->getObra($id);

  $j_obra = array();

  while($row = odbc_fetch_array($result))
  {
  	$j_obra['id_obra']=$row['id_obra'];
  	$j_obra['obra']=$row['obra'];
    $j_obra['tipo_inversion']=$row['tipo_inversion'];
    $j_obra['tipo_expediente']=$row['tipo_expediente'];
    $j_obra['dimension_inversion']=$row['dimension_inversion'];
    $j_obra['dependencia_solicitante']=$row['dependencia_solicitante'];
    $j_obra['dependencia_ejecutora']=$row['dependencia_ejecutora'];
    $j_obra['unidad_responsable']=$row['unidad_responsable'];
    $j_obra['no_obra']=$row['no_obra'];
    $j_obra['no_autorizacion']=$row['no_autorizacion'];
    $j_obra['fecha_autorizacion']=  $row['fecha_autorizacion'];
    $j_obra['fecha_recibido_autorizacion']=$row['fecha_recibido_autorizacion'];
    $j_obra['etapa']=$row['etapa'];
    $j_obra['periodo_ejecucion']=$row['periodo_ejecucion'];
    $j_obra['propuesta_anual']=$row['propuesta_anual'];
    $j_obra['normativa_aplicar']=$row['normativa_aplicar'];
    $j_obra['tipo_adj_solicitado']=$row['tipo_adj_solicitado'];
    $j_obra['partidas']=$row['partidas'];
  }


  echo json_encode($j_obra);
  $bd->cerrar();
?>
