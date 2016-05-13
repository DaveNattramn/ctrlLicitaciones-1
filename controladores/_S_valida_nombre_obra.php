<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $obra = utf8_decode($_POST['obra']);
  $id_obra = utf8_decode($_POST['id_obra']);

  $j_obra = array();

  $j_obra['obra']= utf8_encode(odbc_result($bd->validaCambioObra($obra,$id_obra),1));

  //false en caso de no encontrar;
  echo json_encode($j_obra);
  $bd->cerrar();
?>
