<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $id_obra = utf8_decode($_POST['id_obra']);
  $id_revisiones = utf8_decode($_POST['id_revisiones']);

  $result = $bd->getRevision($id_revisiones);

  $j_revisiones = array();

  while($row = odbc_fetch_array($result))
  {
  	$j_revisiones["id_revisiones"]=utf8_encode($row["id_revisiones"]);
    $j_revisiones["id_obra"]=utf8_encode($row["id_obra"]);
    $j_revisiones["area"]=utf8_encode($row["area"]);
    $j_revisiones["fecha_ingreso"]=utf8_encode($row["fecha_ingreso"]);
    $j_revisiones["fecha_entrega"]=utf8_encode($row["fecha_entrega"]);
    $j_revisiones["observaciones"]=utf8_encode($row["observaciones"]);
    $j_revisiones["fecha_ingreso_d"]= DateTime::createFromFormat('Y-m-d H:i:s.u',utf8_encode($row["fecha_ingreso"]))->format("Y-m-d H:i:s");
    $j_revisiones["fecha_entrega_d"]= DateTime::createFromFormat('Y-m-d H:i:s.u',utf8_encode($row["fecha_entrega"]))->format("Y-m-d H:i:s");
    $j_revisiones["fecha_ingreso_d2"]= DateTime::createFromFormat('Y-m-d H:i:s.u',utf8_encode($row["fecha_ingreso"]))->format("d M Y - h:i a");
    $j_revisiones["fecha_entrega_d2"]= DateTime::createFromFormat('Y-m-d H:i:s.u',utf8_encode($row["fecha_entrega"]))->format("d M Y - h:i a");


  }

  echo json_encode($j_revisiones);
  $bd->cerrar();
?>
