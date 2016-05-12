<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();

  $id_obra = $_POST['id_obra'];
  $tipo_obra = $_POST['tipo_obra'];
  $num_obj = $_POST['num_obj'];
  $objeto = $_POST['objeto'];
  $cantidad = $_POST['cantidad'];
  $um = $_POST['um'];

  $resultado=$bd->agregar_alcance($id_obra,$tipo_obra,$num_obj,$objeto,$cantidad,$um);

  $bd->cerrar();
?>
