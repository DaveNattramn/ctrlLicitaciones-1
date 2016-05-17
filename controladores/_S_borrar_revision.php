<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $id_revision = utf8_decode($_POST['id_revision']);

  $result = $bd->borrar_revision($id_revision);

  $bd->cerrar();
?>
