<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();

  $id_obra = utf8_decode($_POST['id_obra']);
  $tipo_obra = utf8_decode($_POST['tipo_obra']);
  $num_obj = utf8_decode($_POST['num_obj']);
  $objeto = utf8_decode($_POST['objeto']);
  $cantidad = utf8_decode($_POST['cantidad']);
  $um = utf8_decode($_POST['um']);

  $resultado=$bd->agregar_alcance($id_obra,$tipo_obra,$num_obj,$objeto,$cantidad,$um);

  $bd->cerrar();
?>
