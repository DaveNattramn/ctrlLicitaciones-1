<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $id_obra = $_POST['id_obra'];
  $columna = $_POST['columna'];

  $result = $bd->getCeldaObra($id_obra,$columna);

  $j_obra = array();

  while($row = odbc_fetch_array($result))
  {
  	$j_obra[$columna]=$row[$columna];
  }

  echo json_encode($j_obra);
  $bd->cerrar();
?>
