<?php
  include('../modelo/conexion_admin.php');
  $bd = new ADMIN();
  $id = $_POST["id"];

  $resultado=$bd->elminar_usuario($id);

  $bd->cerrar();
?>