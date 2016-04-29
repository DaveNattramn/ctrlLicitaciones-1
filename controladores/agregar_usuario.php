<?php
  include('../modelo/conexion_admin.php');
  $bd = new ADMIN();
  $nombre = $_POST['nombre'];
  $puesto = $_POST['puesto'];
  $t_usuario = $_POST['t_usuario'];
  $area = $_POST['area'];
  $modulo = $_POST['modulo'];
  $tel = $_POST['tel'];
  $mail = $_POST['mail'];
  $n_user = $_POST['n_user'];
  $n_pas = $_POST['n_pas'];

  $resultado=$bd->agregar_usuario($nombre, $puesto, $t_usuario, $area, $modulo, $tel, $mail, $n_user, $n_pas);

  $bd->cerrar();
?>