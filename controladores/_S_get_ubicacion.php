<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $id = $_POST['id_obra'];

  $result = $bd->getUbicacion($id);

  $j_obra = array();

  while($row = odbc_fetch_array($result))
  {
  	$j_obra['id_obra']=$row['id_obra'];
  	$j_obra['municipio']=$row['municipio'];
    $j_obra['localidad']=$row['localidad'];
    $j_obra['beneficiarios_directos']=$row['beneficiarios_directos'];
    $j_obra['beneficiarios_indirectos']=$row['beneficiarios_indirectos'];
    //$j_obra['empleos_directos']=$row['empleos_directos'];
    //$j_obra['empleos_indirectos']=$row['empleos_indirectos'];
  }


  echo json_encode($j_obra);
  $bd->cerrar();
?>
