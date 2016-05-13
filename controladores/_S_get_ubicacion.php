<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $id = utf8_decode($_POST['id_obra']);

  $result = $bd->getUbicacion($id);

  $j_obra = array();

  while($row = odbc_fetch_array($result))
  {
  	$j_obra['id_obra']=utf8_encode($row['id_obra']);
  	$j_obra['municipio']=utf8_encode($row['municipio']);
    $j_obra['localidad']=utf8_encode($row['localidad']);
    $j_obra['beneficiarios_directos']=utf8_encode($row['beneficiarios_directos']);
    $j_obra['beneficiarios_indirectos']=utf8_encode($row['beneficiarios_indirectos']);
    $j_obra['empleos_directos']=utf8_encode($row['empleos_directos']);
    $j_obra['empleos_indirectos']=utf8_encode($row['empleos_indirectos']);
  }


  echo json_encode($j_obra);
  $bd->cerrar();
?>
