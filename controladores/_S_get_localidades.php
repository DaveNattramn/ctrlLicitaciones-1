<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $municipio =  utf8_decode($_POST['municipio_nombre']);

  $result = $bd->select_localidad($municipio);

  $j_obra = array();

  while($row = odbc_fetch_array($result))
  {
    $nestedData=array();
  	$nestedData['localidad']= utf8_encode($row['localidad_nombre']);    
    $j_obra[] = $nestedData;
  }


  echo json_encode($j_obra);
  $bd->cerrar();
?>
