<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $id = utf8_decode($_POST['id_obra']);
  $area = utf8_decode($_POST['area']);

  $result = $bd->getRevisiones($id,$area);

  $j_revision = array();

  while($row = odbc_fetch_array($result))
  {
    $nestedData=array();
  	$nestedData['id_obra']=utf8_encode($row['id_obra']);
    $nestedData['fecha_ingreso']=utf8_encode($row['fecha_ingreso']);
    $nestedData['fecha_entrega']=utf8_encode($row['fecha_entrega']);
    $nestedData['observaciones']=utf8_encode($row['observaciones']);
    $nestedData['area']=utf8_encode($row['area']);
    $j_revision[] = $nestedData;
  }

  echo json_encode($j_revision);
  $bd->cerrar();
?>
