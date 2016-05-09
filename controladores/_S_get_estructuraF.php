<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $id = $_POST['id_obra'];

  $result = $bd->getEstructuraF($id);

  $j_obra = array();

  while($row = odbc_fetch_array($result))
  {
  	$j_obra['id_obra']=$row['id_obra'];

    $j_obra['programa_federal']=$row['programa_federal'];
    $j_obra['aporte_federal']=$row['aporte_federal'];
    $j_obra['programa_estatal']=$row['programa_estatal'];
    $j_obra['aporte_estatal']=$row['aporte_estatal'];
    $j_obra['programa_municipal']=$row['programa_municipal'];
    $j_obra['aporte_municipal']=$row['aporte_municipal'];
    $j_obra['aportacion_beneficiarios']=$row['aportacion_beneficiarios'];
    $j_obra['aportacion_otros']=$row['aportacion_otros'];    
    $j_obra['total']=$row['total'];
  }


  echo json_encode($j_obra);
  $bd->cerrar();
?>
