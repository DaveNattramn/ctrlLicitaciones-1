<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $obra = $_POST['obra'];

  $j_obra = array();

  $j_obra['obra']= odbc_result($bd->validaObra($obra),1);
  //false en caso de no encontrar;
  echo json_encode($j_obra);
  $bd->cerrar();
?>
