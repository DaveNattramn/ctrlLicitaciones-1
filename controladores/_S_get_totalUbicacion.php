<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $municipio_nombre = utf8_decode($_POST['municipio_nombre']);
  $localidad_nombre = utf8_decode($_POST['localidad_nombre']);
  $no_localidad = utf8_decode($_POST['no_localidad']);




  $j_obra = array();
    $j_obra['municipio']=utf8_encode($municipio_nombre);
    $j_obra['localidad']=utf8_encode($localidad_nombre);
  	$j_obra['poblacion_total']= utf8_encode(odbc_result($bd->select_localidadPoblacion($municipio_nombre,"TOTAL DEL MUNICIPIO","0000"),1));
    $j_obra['poblacion_localidad']= utf8_encode(odbc_result($bd->select_localidadPoblacion($municipio_nombre,$localidad_nombre,$no_localidad),1));
    $j_obra['no_localidad'] = utf8_encode($no_localidad);
  echo json_encode($j_obra);
  $bd->cerrar();
?>
