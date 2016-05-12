<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();

  $id_obra = $_POST['id_obra'];
  $estatus_general = $_POST['estatus_general'];
  $resultado=$bd->estatus_obra($id_obra,$estatus_general);

  $bd->cerrar();
?>
