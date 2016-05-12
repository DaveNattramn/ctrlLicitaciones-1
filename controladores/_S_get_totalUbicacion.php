<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $municipio_nombre = utf8_decode($_POST['municipio_nombre']);
  $localidad_nombre = utf8_decode($_POST['localidad_nombre']);




  $j_obra = array();

  	$j_obra['poblacion_total']= odbc_result($bd->select_localidadPoblacion($municipio_nombre,"TOTAL DEL MUNICIPIO"),1);
    $j_obra['poblacion_localidad']= odbc_result($bd->select_localidadPoblacion($municipio_nombre,$localidad_nombre),1);


  echo json_encode($j_obra);
  $bd->cerrar();
?>
