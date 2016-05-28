<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();

  $id_obra = utf8_decode($_POST['id_obra']);
  $id_revisiones = utf8_decode($_POST['id_revisiones']);

  $fecha_ingreso = utf8_decode($_POST['r_fecha_recibido']);
  $fecha_entrega = utf8_decode($_POST['r_fecha_envio']);
  $observaciones = utf8_decode($_POST['observaciones']);
  $area = utf8_decode($_POST['area']);

  $fecha_ingreso_convertida = DateTime::createFromFormat('Y-m-d H:i:s',$fecha_ingreso);

  if($fecha_entrega==""){

  $resultado=$bd->actualizar_revision($id_revisiones,$id_obra,$fecha_ingreso_convertida->format('d-m-Y H:i:s'),null,$observaciones,$area);
  }
  else{

  $fecha_entrega_convertida = DateTime::createFromFormat('Y-m-d H:i:s',$fecha_entrega);
  $resultado=$bd->actualizar_revision($id_revisiones,$id_obra,$fecha_ingreso_convertida->format('d-m-Y H:i:s'),$fecha_entrega_convertida->format('d-m-Y H:i:s'),$observaciones,$area);
  }




  $bd->cerrar();

?>
