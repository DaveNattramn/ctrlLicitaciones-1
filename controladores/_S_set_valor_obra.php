<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();

  $id_obra = utf8_decode($_POST['id_obra']);
  $columna = utf8_decode($_POST['columna']);
  $valor = utf8_decode($_POST['valor']);
  $resultado=$bd->set_valor_obra($id_obra,$columna,$valor);

  $bd->cerrar();
?>
