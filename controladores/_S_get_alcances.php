<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $id = $_POST['id_obra'];
  
  $result = $bd->getAlcances($id);

  $j_alcance = array();

  while($row = odbc_fetch_array($result))
  {
    $nestedData=array();
  	$nestedData['id_obra']=$row['id_obra'];
    $nestedData['tipo_obra']=$row['tipo_obra'];
    $nestedData['num_obj']=$row['num_obj'];
    $nestedData['objeto']=$row['objeto'];
    $nestedData['cantidad']=$row['cantidad'];
    $nestedData['um']=$row['um'];
    $j_alcance[] = $nestedData;
  }

  echo json_encode($j_alcance);
  $bd->cerrar();
?>
