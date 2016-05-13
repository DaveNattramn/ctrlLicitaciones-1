<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $id_obra = utf8_decode($_POST['id_obra']);
  $columna = utf8_decode($_POST['columna']);

  $result = $bd->get_valor_obra($id_obra,$columna);

  $j_obra = array();

  while($row = odbc_fetch_array($result))
  {
  	$j_obra[$columna]=utf8_encode($row[$columna]);
  }

  echo json_encode($j_obra);
  $bd->cerrar();
?>
