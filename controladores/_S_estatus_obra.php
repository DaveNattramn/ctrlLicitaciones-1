<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();

  $id_obra = $_POST['id_obra'];
  $estatus_recurso = $_POST['estatus_recurso'];
  $resultado=$bd->estatus_obra($id_obra,$estatus_recurso);

  $bd->cerrar();
?>
