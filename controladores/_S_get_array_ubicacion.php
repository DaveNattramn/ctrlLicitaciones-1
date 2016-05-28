<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();

  $result = $bd->getArrayUbicacion();

  $j_ubi = array();

  while($row = odbc_fetch_array($result))
  {
    $nestedData=array();
    $nestedData['municipio']=utf8_encode($row['municipio_nombre']);
  	$nestedData['localidad']=utf8_encode($row['localidad_nombre']);
    $nestedData['no_localidad']=utf8_encode($row['localidad']);
    $nestedData['poblacion_total']=utf8_encode($row['poblacion_total']);
    $j_ubi[] = $nestedData;
  }

  echo json_encode($j_ubi);
  $bd->cerrar();
?>
