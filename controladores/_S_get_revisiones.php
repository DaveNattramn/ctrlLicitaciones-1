<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $id = utf8_decode($_POST['id_obra']);
  $area = utf8_decode($_POST['area']);

  if($area=='DIRECCION'){
    $result = $bd->getRevisionesDir($id);
  }
  else{
    $result = $bd->getRevisiones($id,$area);
  }
  $j_revision = array();

  while($row = odbc_fetch_array($result))
  {
    $nestedData=array();
  	$nestedData['id_obra']=utf8_encode($row['id_obra']);
  	$nestedData['id_revisiones']=utf8_encode($row['id_revisiones']);

    $nestedData['fecha_ingreso']=DateTime::createFromFormat('Y-m-d H:i:s.u',utf8_encode($row['fecha_ingreso']))->format('d/m/Y - h:i A');
    if($row['fecha_entrega']!=NULL) $nestedData['fecha_entrega']=DateTime::createFromFormat('Y-m-d H:i:s.u',utf8_encode($row['fecha_entrega']))->format('d/m/Y - h:i A');
    else $nestedData['fecha_entrega']="";

    $nestedData['observaciones']=utf8_encode($row['observaciones']);
    $nestedData['area']=utf8_encode($row['area']);
    $j_revision[] = $nestedData;
  }

  echo json_encode($j_revision);
  $bd->cerrar();
?>
