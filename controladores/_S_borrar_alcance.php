<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $id_alcance = utf8_decode($_POST['id_alcance']);

  $result = $bd->borrar_alcance($id_alcance);

  $bd->cerrar();
?>
