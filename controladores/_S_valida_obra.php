<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $obra = utf8_decode($_POST['obra']);

  $j_obra = array();

  $j_obra['obra']= utf8_encode(odbc_result($bd->validaObra($obra),1));
  //false en caso de no encontrar;
  echo json_encode($j_obra);
  $bd->cerrar();
?>
