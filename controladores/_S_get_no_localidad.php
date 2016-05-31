<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $municipio =  utf8_decode($_POST['municipio_nombre']);
  $localidad = utf8_decode($_POST['localidad_nombre']);
  $result = $bd->select_no_localidad($municipio,$localidad);

  $j_obra = array();

  while($row = odbc_fetch_array($result))
  {
    $nestedData=array();
  	$nestedData['no_localidad']= utf8_encode($row['no_localidad']);
    $j_obra[] = $nestedData;
  }


  echo json_encode($j_obra);
  $bd->cerrar();
?>
