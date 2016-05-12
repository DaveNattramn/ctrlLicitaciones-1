<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();

  $result = $bd->select_municipios();

  $j_obra = array();

  while($row = odbc_fetch_array($result))
  {
    
  	$j_obra[]= utf8_encode($row['municipio_nombre']);

  }


  echo json_encode($j_obra);
  $bd->cerrar();
?>
