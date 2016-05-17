<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $id_revisiones = utf8_decode($_POST['id_revisiones']);
  echo $id_revisiones;
  $result = $bd->borrar_revision($id_revisiones);

  $bd->cerrar();
?>
