<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $id_obra = utf8_decode($_POST['id_obra']);
  $area = utf8_decode($_POST['area']);


  $result = $bd->get_fecha_reciente_area($id_obra,$area);


  $j_fecha = array();

  while($row = odbc_fetch_array($result))
  {
    $d=utf8_encode($row['fecha']);
  }

  if($d!=null){
    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $diaSemana = strftime("%w", strtotime($d));
    $diaNumero = strftime("%d", strtotime($d));
    $mesNumero = strftime("%m", strtotime($d));
    $aoNumero = strftime("%Y", strtotime($d));

    $j_fecha['fecha']= ($dias[$diaSemana]." ".$diaNumero." de ".$meses[($mesNumero)-1]. " del ".$aoNumero) ;
  }
  else{
    $j_fecha['fecha'] = "No hay fecha disponible";
  }


  echo json_encode($j_fecha);
  $bd->cerrar();
?>
