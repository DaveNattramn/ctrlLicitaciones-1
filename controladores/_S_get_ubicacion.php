<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $id = utf8_decode($_POST['id_obra']);

  $result = $bd->getUbicacion($id);

  $j_obra = array();

  while($row = odbc_fetch_array($result))
  {
    $nestedData=array();
  	$nestedData['id_obra']=utf8_encode($row['id_obra']);
  	$nestedData['municipio']=utf8_encode($row['municipio']);
    $nestedData['localidad']=utf8_encode($row['localidad']);
    $j_obra[]=$nestedData;
  }


  echo json_encode($j_obra);
  $bd->cerrar();
?>
