<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $id = $_POST['id_obra'];

  $result = $bd->getAlcances($id);

  $j_alcance = array();

  while($row = odbc_fetch_array($result))
  {
    $nestedData=array();
    $nestedData['id_alcance']=utf8_encode($row['id_alcance']);
  	$nestedData['id_obra']=utf8_encode($row['id_obra']);
    $nestedData['tipo_obra']=utf8_encode($row['tipo_obra']);
    $nestedData['num_obj']=utf8_encode($row['num_obj']);
    $nestedData['objeto']=utf8_encode($row['objeto']);
    $nestedData['cantidad']=utf8_encode($row['cantidad']);
    $nestedData['um']=utf8_encode($row['um']);
    $j_alcance[] = $nestedData;
  }

  echo json_encode($j_alcance);
  $bd->cerrar();
?>
