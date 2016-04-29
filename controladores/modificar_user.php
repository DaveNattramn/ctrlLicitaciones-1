<?php
  include('../modelo/conexion_admin.php');
  $bd = new ADMIN();
  $id = $_POST['id'];
  $campo = $_POST['campo'];
  $dato = $_POST['dato'];

  $resultado= $bd->modificar_usuario($id, $campo, $dato);
  $bd->cerrar();
?>