<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $id = $_POST['id_obra'];

  $result = $bd->getEstructuraF($id);

  $j_obra = array();

  while($row = odbc_fetch_array($result))
  {
  	$j_obra['id_obra']=utf8_encode($row['id_obra']);
    $j_obra['programa_federal']=utf8_encode($row['programa_federal']);
    $j_obra['aporte_federal']=number_format(utf8_encode($row['aporte_federal']),2);
    $j_obra['programa_estatal']=utf8_encode($row['programa_estatal']);
    $j_obra['aporte_estatal']=number_format(utf8_encode($row['aporte_estatal']),2);
    $j_obra['programa_municipal']=utf8_encode($row['programa_municipal']);
    $j_obra['aporte_municipal']=number_format(utf8_encode($row['aporte_municipal']),2);
    $j_obra['aportacion_beneficiarios']=number_format(utf8_encode($row['aportacion_beneficiarios']),2);
    $j_obra['aportacion_otros']=number_format(utf8_encode($row['aportacion_otros']),2);
    $j_obra['total']=number_format(utf8_encode($row['total']),2);
  }


  echo json_encode($j_obra);
  $bd->cerrar();
?>
