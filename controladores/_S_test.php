<?php
  include('../modelo/_S_conexion.php');
  $bd = new ADMIN();
  $id_obra = $_POST['id_obra'];

  $result = $bd->getObra($id_obra);

  $j_obra = array();

  while($row = odbc_fetch_array($result))
  {
    $nestedData=array();
  	$nestedData['id_obra']=utf8_encode($row['id_obra']);
  	$nestedData['obra']=utf8_encode($row['obra']);
    $nestedData['tipo_inversion']=utf8_encode($row['tipo_inversion']);
    $nestedData['tipo_expediente']=utf8_encode($row['tipo_expediente']);
    $nestedData['dimension_inversion']=utf8_encode($row['dimension_inversion']);
    $nestedData['dependencia_solicitante']=utf8_encode($row['dependencia_solicitante']);
    $nestedData['dependencia_ejecutora']=utf8_encode($row['dependencia_ejecutora']);
    $nestedData['unidad_responsable']=utf8_encode($row['unidad_responsable']);
    $nestedData['no_obra']=utf8_encode($row['no_obra']);
    $nestedData['no_autorizacion']=utf8_encode($row['no_autorizacion']);
    $nestedData['fecha_autorizacion']=  utf8_encode($row['fecha_autorizacion']);
    $nestedData['fecha_recibido_autorizacion']=utf8_encode($row['fecha_recibido_autorizacion']);
    $nestedData['etapa']=utf8_encode($row['etapa']);
    $nestedData['periodo_ejecucion']=utf8_encode($row['periodo_ejecucion']);
    $nestedData['propuesta_anual']=utf8_encode($row['propuesta_anual']);
    $nestedData['normativa_aplicar']=utf8_encode($row['normativa_aplicar']);
    $nestedData['tipo_adj_solicitado']=utf8_encode($row['tipo_adj_solicitado']);
    $nestedData['partidas']=utf8_encode($row['partidas']);
    $nestedData['beneficiarios_directos']=utf8_encode($row['beneficiarios_directos']);
    $nestedData['beneficiarios_indirectos']=utf8_encode($row['beneficiarios_indirectos']);
    $nestedData['empleos_directos']=utf8_encode($row['empleos_directos']);
    $nestedData['empleos_indirectos']=utf8_encode($row['empleos_indirectos']);
    $j_obra['identificacion'] = $nestedData;
  }

  $result = $bd->getEstructuraF($id_obra);

  while($row = odbc_fetch_array($result))
    {
      $nestedData=array();
    	$nestedData['id_obra']=utf8_encode($row['id_obra']);
      $nestedData['programa_federal']=utf8_encode($row['programa_federal']);
      $nestedData['aporte_federal']=number_format(utf8_encode($row['aporte_federal']),2);
      $nestedData['programa_estatal']=utf8_encode($row['programa_estatal']);
      $nestedData['aporte_estatal']=number_format(utf8_encode($row['aporte_estatal']),2);
      $nestedData['programa_municipal']=utf8_encode($row['programa_municipal']);
      $nestedData['aporte_municipal']=number_format(utf8_encode($row['aporte_municipal']),2);
      $nestedData['aportacion_beneficiarios']=number_format(utf8_encode($row['aportacion_beneficiarios']),2);
      $nestedData['aportacion_otros']=number_format(utf8_encode($row['aportacion_otros']),2);
      $nestedData['total']=number_format(utf8_encode($row['total']),2);
      $j_obra['estructura_financiera'] = $nestedData;
    }

  $result = $bd->getAlcances($id_obra);
  $j_alcance = array();
  $i=0;
  while($row = odbc_fetch_array($result))
  {
    $nestedData=array();
    $nestedData['id_alcance']=utf8_encode($row['id_alcance']);
  	$nestedData['id_obra']=utf8_encode($row['id_obra']);
    $nestedData['tipo_obra']=utf8_encode($row['tipo_obra']);
    $nestedData['num_obj']=utf8_encode($row['num_obj']);
    $nestedData['objeto']=utf8_encode($row['objeto']);
    $nestedData['cantidad']=utf8_encode($row['cantidad']);
    $nestedData['um']=utf8_encode($row['um']);
    $j_alcance[] = $nestedData;
  }
  $j_obra['alcance']  = $j_alcance;

  $result = $bd->getUbicacion($id_obra);
  $j_ubicacion = array();
  $i=0;
  while($row = odbc_fetch_array($result))
  {
    $nestedData=array();
  	$nestedData['id_obra']=utf8_encode($row['id_obra']);
  	$nestedData['municipio']=utf8_encode($row['municipio']);
    $nestedData['localidad']=utf8_encode($row['localidad']);
    $nestedData['poblacion_localidad'] = utf8_encode(odbc_result($bd->select_localidadPoblacion($row['municipio'],$row['localidad']),1));
    $nestedData['poblacion_total'] = utf8_encode(odbc_result($bd->select_localidadPoblacion($row['municipio'],"TOTAL DEL MUNICIPIO"),1));
    $j_ubicacion['ubicacion_'.$i++]=$nestedData;
  }
  $j_obra['ubicacion']  = $j_ubicacion;


  $result = $bd->getTodasRevisiones($id_obra);
  $j_revision = array();
  $di=0;
  $li=0;
  $si=0;
  $areaDataDi=array();
  $areaDataLi=array();
  $areaDataSe=array();
  while($row = odbc_fetch_array($result))
  {
    $nestedData=array();
    $nestedData['id_obra']=utf8_encode($row['id_obra']);
    $nestedData['id_revisiones']=utf8_encode($row['id_revisiones']);
    $nestedData['fecha_ingreso']=DateTime::createFromFormat('Y-m-d H:i:s.u',utf8_encode($row['fecha_ingreso']))->format('d/m/Y - h:i A');
    if($row['fecha_entrega']!=NULL) $nestedData['fecha_entrega']=DateTime::createFromFormat('Y-m-d H:i:s.u',utf8_encode($row['fecha_entrega']))->format('d/m/Y - h:i A');
    else $nestedData['fecha_entrega']="";
    $nestedData['observaciones']=utf8_encode($row['observaciones']);
    if(utf8_encode($row['area']) == 'LICITACIONES'){
      $nestedData['area']=utf8_encode($row['area']);
      $areaDataLi[] = $nestedData;

    }
    else if(utf8_encode($row['area']) == 'SEGUIMIENTO A LA INVERSIÓN'){
      $nestedData['area']=utf8_encode($row['area']);
      $areaDataSe[] = $nestedData;

    }
    else {
      $nestedData['area']=utf8_encode($row['area']);
      $areaDataDi[] = $nestedData;
    }


  }
  $j_revision['licitaciones'] = $areaDataLi;
  $j_revision['seguimiento'] = $areaDataSe;
  $j_revision['direccion'] = $areaDataDi;
  $j_obra['revisiones']  = $j_revision;





  echo json_encode($j_obra);
  $bd->cerrar();
?>
