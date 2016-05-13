<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();

  $id_obra = utf8_decode($_POST['id_obra']);
  $fecha_ingreso = utf8_decode($_POST['r_fecha_recibido']);
  $fecha_entrega = utf8_decode($_POST['r_fecha_envio']);
  $observaciones = utf8_decode($_POST['observaciones']);
  $area = utf8_decode($_POST['area']);

  $resultado=$bd->agregar_revision($id_obra,$fecha_ingreso,$fecha_entrega,$observaciones,$area);

  $bd->cerrar();
?>
