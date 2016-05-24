<?php

require_once('../recursos/adodb/adodb.inc.php');

class ADMIN{
    public $conexion;
    private $servidor;
    private $nombrebd;
    private $usuario;
    private $contra;
    private $config;
    public $configini;

    public function __construct() {
        $this->configini=parse_ini_file('config.ini',true);
        $this->servidor=  $this->configini['db']['servidor']; //Config::NOMBRE_BD;
         $this->nombrebd=$this->configini['db']['nombrebd']; //Config::NOMBRE_BD;
         $this->usuario=$this->configini['db']['usuario'];//Config::USUARIO;
         $this->contra=$this->configini['db']['contra'];  //Config::PASS;
         $this->config="Driver={SQL Server Native Client 10.0};Server=$this->servidor;Database=$this->nombrebd;";
        $this->conexion = odbc_connect($this->config,$this->usuario, $this->contra)or die(odbc_errormsg());

        if($this->conexion === false){
           throw new ErrorException(odbc_errormsg());
       }
       date_default_timezone_set('America/Mexico_City');
    }


      public function Cerrar(){
            odbc_close($this->conexion);
      }

      public function getObra($idobra){
          $sql = "SELECT * FROM obra WHERE id_obra ='".$idobra."'";
          $exec = odbc_exec($this->conexion, $sql);
          return $exec;
      }

      public function getUbicacion($idobra){
          $sql = "SELECT * FROM ubicacion WHERE id_obra ='".$idobra."'";
          $exec = odbc_exec($this->conexion, $sql);
          return $exec;
      }

      public function getEstructuraF($idobra){
          $sql = "SELECT * FROM estructura_financiera WHERE id_obra ='".$idobra."'";
          $exec = odbc_exec($this->conexion, $sql);
          return $exec;
      }

      public function selectAllObras(){
        $sql = "SELECT * FROM obra";
        $exec = odbc_exec($this->conexion, $sql);
        return $exec;
      }


      public function selectObraNormativa(){
  $sql="    SELECT  distinct obra.id_obra, obra.no_obra, obra.obra, estructura_financiera.total, obra.tipo_adj_solicitado, obra.estatus_general, substring(
        (
            Select ','+ubicacion.municipio
            From ubicacion
            Where obra.id_obra = ubicacion.id_obra
            ORDER BY municipio
            For XML PATH ('')
        ), 2, 1000) As municipio,substring((
            Select ','+ubicacion.localidad
            From ubicacion
            Where obra.id_obra = ubicacion.id_obra
            ORDER BY municipio
            For XML PATH ('')
        ), 2, 1000) As localidad
FROM obra
INNER JOIN
estructura_financiera on obra.id_obra = estructura_financiera.id_obra ";


        $query = odbc_exec($this->conexion, $sql);
        return $query;
      }

      public function buscaSelectObraNormativa($req){

        $sql= "SELECT  distinct obra.id_obra, obra.no_obra, obra.obra, estructura_financiera.total, obra.tipo_adj_solicitado, obra.estatus_general, substring(
                (
                    Select ','+ubicacion.municipio
                    From ubicacion
                    Where obra.id_obra = ubicacion.id_obra
                    ORDER BY municipio
                    For XML PATH ('')
                ), 2, 1000) As municipio,substring((
                    Select ','+ubicacion.localidad
                    From ubicacion
                    Where obra.id_obra = ubicacion.id_obra
                    ORDER BY municipio
                    For XML PATH ('')
                ), 2, 1000) As localidad
        FROM obra
        INNER JOIN
        estructura_financiera on obra.id_obra = estructura_financiera.id_obra
        WHERE 1=1 ";
        if( !empty($req) ) {
        $sql.="    AND ( obra.id_obra LIKE ('%".$req."%')
                  OR obra.no_obra LIKE ('%".$req."%')
                  OR obra.obra LIKE ('%".$req."%')
                  OR substring(
                (
                    Select ','+ubicacion.municipio
                    From ubicacion
                    Where obra.id_obra = ubicacion.id_obra
                    ORDER BY municipio
                    For XML PATH ('')
                ), 2, 1000) LIKE ('%".$req."%')
                  OR substring((
                    Select ','+ubicacion.localidad
                    From ubicacion
                    Where obra.id_obra = ubicacion.id_obra
                    ORDER BY municipio
                    For XML PATH ('')
                ), 2, 1000) LIKE ('%".$req."%')
                  OR estructura_financiera.total LIKE ('%".$req."%')
                  OR obra.tipo_adj_solicitado LIKE ('%".$req."%')
                  OR obra.estatus_general LIKE ('%".$req."%') )";
        }

        $query=odbc_exec($this->conexion, $sql);
        return $query;
      }

public function ordenaSelectObraNormativa($req,$req_o_c,$req_o_d,$req_s,$req_l){

  $sql="WITH OrderedOrders AS
        (
          SELECT  distinct obra.id_obra, obra.no_obra, obra.obra, estructura_financiera.total, obra.tipo_adj_solicitado, obra.estatus_general, substring(
                (
                    Select ','+ubicacion.municipio
                    From ubicacion
                    Where obra.id_obra = ubicacion.id_obra
                    ORDER BY municipio
                    For XML PATH ('')
                ), 2, 1000) As municipio ,substring((
                    Select ','+ubicacion.localidad
                    From ubicacion
                    Where obra.id_obra = ubicacion.id_obra
                    ORDER BY municipio
                    For XML PATH ('')
                ), 2, 1000) As localidad,
                ROW_NUMBER() OVER (ORDER BY obra.id_obra) AS RowNumber
        FROM obra
        INNER JOIN
        estructura_financiera on obra.id_obra = estructura_financiera.id_obra
        WHERE 1=1 ";
        if( !empty($req) ) {
        $sql.="    AND ( obra.id_obra LIKE ('%".$req."%')
                  OR obra.no_obra LIKE ('%".$req."%')
                  OR obra.obra LIKE ('%".$req."%')
                  OR substring(
                (
                    Select ', '+ubicacion.municipio
                    From ubicacion
                    Where obra.id_obra = ubicacion.id_obra
                    ORDER BY municipio
                    For XML PATH ('')
                ), 2, 200) LIKE ('%".$req."%')
                  OR substring((
                    Select ', '+ubicacion.localidad
                    From ubicacion
                    Where obra.id_obra = ubicacion.id_obra
                    ORDER BY municipio
                    For XML PATH ('')
                ), 2, 200) LIKE ('%".$req."%')
                  OR estructura_financiera.total LIKE ('%".$req."%')
                  OR obra.tipo_adj_solicitado LIKE ('%".$req."%')
                  OR obra.estatus_general LIKE ('%".$req."%') ) ";
                }
  $sql.=")
          SELECT id_obra, no_obra, total, tipo_adj_solicitado, estatus_general, municipio, localidad, obra
          FROM OrderedOrders
          WHERE RowNumber BETWEEN ".($req_s+1)." AND ".($req_l+$req_s)."
          ORDER BY ".$req_o_c."   ".$req_o_d." ";



  $query=odbc_exec($this->conexion, $sql);
  return $query;
}


    public function agregar_obra($obra,$tipo_inversion,$tipo_expediente,$monto_solicitado,$dimension_inversion,$dependencia_solicitante,$dependencia_ejecutora,$unidad_responsable,$etapa,$periodo_ejecucion,$propuesta_anual,$normativa_aplicar,$tipo_adj_solicitado,$partidas,$ubicacion,$beneficiarios_directos,$beneficiarios_indirectos,$empleos_directos,$empleos_indirectos,$programa_federal,$aporte_federal,$programa_estatal,$aporte_estatal,$programa_municipal,$aporte_municipal,$aportacion_beneficiarios,$aportacion_otros)
      {
              $ubicacion_decode = json_decode($ubicacion);
      $sql = "BEGIN TRANSACTION _tr
              BEGIN TRY
              INSERT INTO obra(obra,tipo_inversion,tipo_expediente,dimension_inversion,dependencia_solicitante,dependencia_ejecutora,unidad_responsable,etapa,periodo_ejecucion,propuesta_anual,normativa_aplicar,tipo_adj_solicitado,partidas,beneficiarios_directos,beneficiarios_indirectos,empleos_directos,empleos_indirectos)
                    VALUES ('".$obra."', '".$tipo_inversion."', '".$tipo_expediente."', '".$dimension_inversion."', '".$dependencia_solicitante."', '".$dependencia_ejecutora."', '".$unidad_responsable."', '".$etapa."', '".$periodo_ejecucion."', '".$propuesta_anual."', '".$normativa_aplicar."',
                            '".$tipo_adj_solicitado."', '".$partidas."','".$beneficiarios_directos."','".$beneficiarios_indirectos."','".$empleos_directos."','".$empleos_indirectos."')
              DECLARE @ID INT
          		SET @ID = SCOPE_IDENTITY()";
              foreach($ubicacion_decode as $ubi){
                $sql.= "INSERT INTO ubicacion(id_obra,municipio,localidad) VALUES (@ID,'".utf8_decode($ubi->municipio)."', '".utf8_decode($ubi->localidad)."')  ";
              }
      $sql.= "INSERT INTO estructura_financiera(id_obra,total,programa_federal,aporte_federal,programa_estatal,aporte_estatal,programa_municipal,aporte_municipal,aportacion_beneficiarios,aportacion_otros) VALUES (@ID,'".$monto_solicitado."', '".$programa_federal."', '".$aporte_federal."', '".$programa_estatal."', '".$aporte_estatal."', '".$programa_municipal."', '".$aporte_municipal."', '".$aportacion_beneficiarios."', '".$aportacion_otros."')
              COMMIT TRANSACTION _tr
              END TRY
              BEGIN CATCH
                ROLLBACK TRANSACTION _tr
              END CATCH";
              echo $sql;
  		$exec = odbc_exec($this->conexion, $sql);
          if ($exec) {
            $message = $sql;

              return true;

          }
          else
          {
            $message = $sql;

              return false;
          }
      }

      public function validaObra($obra){
        $sql = "SELECT COUNT(obra) AS obra FROM obra WHERE obra ='".$obra."'";
        $exec = odbc_exec($this->conexion, $sql);
            if ($exec) {
                return $exec;

            }
            else
            {
                return false;
            }
      }

      public function validaCambioObra($obra, $id_obra){
        $sql = "SELECT COUNT(obra) AS obra FROM obra WHERE obra ='".$obra."'  AND NOT id_obra='".$id_obra."'   ";

        $exec = odbc_exec($this->conexion, $sql);
            if ($exec) {
                return $exec;

            }
            else
            {
                return false;
            }
      }

      public function get_valor_obra($id_obra, $columna){
        $sql = "SELECT ".$columna." FROM obra WHERE id_obra ='".$id_obra."'";
        $exec = odbc_exec($this->conexion, $sql);

        return $exec;
      }


      public function get_fecha_reciente_Dir($id_obra){
        $sql = "SELECT MIN(fecha_ingreso) As fecha from revisiones WHERE id_obra='".$id_obra."' AND (area='1' OR area='2' OR area='3')";
        $exec = odbc_exec($this->conexion, $sql);

        return $exec;
      }

public function getAlcances($id_obra){
  $sql = "SELECT * FROM alcance WHERE id_obra ='".$id_obra."'";
  $exec = odbc_exec($this->conexion, $sql);
  return $exec;
}

public function getRevision($id_revisiones){
  $sql = "SELECT * FROM revisiones WHERE id_revisiones ='".$id_revisiones."' ";
  $exec = odbc_exec($this->conexion, $sql);
  return $exec;
}

public function getRevisiones($id_obra,$area){
  $sql = "SELECT * FROM revisiones WHERE id_obra ='".$id_obra."'  AND area='".$area."' ORDER BY fecha_ingreso ASC";
  $exec = odbc_exec($this->conexion, $sql);
  return $exec;
}

public function getRevisionesDir($id_obra){
  $sql = "SELECT * FROM revisiones WHERE id_obra ='".$id_obra."'  AND (area='1' OR area='2' OR area='3') ORDER BY fecha_ingreso ASC";
  $exec = odbc_exec($this->conexion, $sql);
  return $exec;
}

public function borrar_alcance($id_alcance){
  $sql = "DELETE from alcance WHERE id_alcance='".$id_alcance."' ";
  $exec = odbc_exec($this->conexion, $sql);
  return $exec;
}

public function borrar_revision($id_revisiones){
  $sql = "DELETE from revisiones WHERE id_revisiones='".$id_revisiones."' ";
  echo $sql;
  $exec = odbc_exec($this->conexion, $sql);
  return $exec;
}


public function set_valor_obra($id_obra,$columna,$valor){
  $sql= "UPDATE obra SET ".$columna."='".$valor."' WHERE id_obra='".$id_obra."'   ";
  $exec = odbc_exec($this->conexion, $sql);
      if ($exec) {
        $message = $sql;

          return true;

      }
      else
      {
        $message = $sql;

          return false;
      }
}


      public function actualizar_obra($id_obra,$no_obra,$obra,$no_autorizacion,$fecha_autorizacion,$fecha_recibido_autorizacion,$tipo_inversion,$tipo_expediente,$monto_solicitado,$dimension_inversion,$unidad_responsable,$etapa,$periodo_ejecucion,$propuesta_anual,$normativa_aplicar,$tipo_adj_solicitado,$partidas,$ubicacion,$beneficiarios_directos,$beneficiarios_indirectos,$empleos_directos,$empleos_indirectos,$programa_federal,$aporte_federal,$programa_estatal,$aporte_estatal,$programa_municipal,$aporte_municipal,$aportacion_beneficiarios,$aportacion_otros)
        {
        $ubicacion_decode = json_decode($ubicacion);
        $sql = "BEGIN TRANSACTION _tr
                BEGIN TRY
                UPDATE obra
                SET no_obra=";
        if(is_Numeric($no_obra)) {$sql.= "'".$no_obra."'";}
        else { $sql.= "NULL";}

        $sql.= ",obra='".$obra."',no_autorizacion='".$no_autorizacion."',fecha_autorizacion=";

        if(validaDate($fecha_autorizacion,'Y-m-d')){$sql.="'".$fecha_autorizacion."'";}
        else { $sql.= "NULL";}

        $sql.= ",fecha_recibido_autorizacion=";
        if(validaDate($fecha_recibido_autorizacion,'Y-m-d')){$sql.="'".$fecha_recibido_autorizacion."'";}
        else { $sql.= "NULL";}

         $sql.=",tipo_inversion='".$tipo_inversion."',
        tipo_expediente='".$tipo_expediente."', dimension_inversion='".$dimension_inversion."',  unidad_responsable='".$unidad_responsable."', etapa='".$etapa."', periodo_ejecucion='".$periodo_ejecucion."', propuesta_anual='".$propuesta_anual."', normativa_aplicar='".$normativa_aplicar."',
                              tipo_adj_solicitado='".$tipo_adj_solicitado."', partidas='".$partidas."', beneficiarios_directos='".$beneficiarios_directos."',beneficiarios_indirectos='".$beneficiarios_indirectos."',empleos_directos='".$empleos_directos."',empleos_indirectos='".$empleos_indirectos."'
                      WHERE id_obra=".$id_obra." ";
          $sql.=  "    UPDATE estructura_financiera
                      SET total='".$monto_solicitado."', programa_federal='".$programa_federal."', aporte_federal='".$aporte_federal."', programa_estatal='".$programa_estatal."', aporte_estatal='".$aporte_estatal."',
                       programa_municipal='".$programa_municipal."', aporte_municipal='".$aporte_municipal."', aportacion_beneficiarios='".$aportacion_beneficiarios."', aportacion_otros='".$aportacion_otros."'
                      WHERE id_obra=".$id_obra."

                DELETE from ubicacion WHERE id_obra=".$id_obra."  " ;
                foreach($ubicacion_decode as $ubi){
                  $sql.= "INSERT INTO ubicacion(id_obra,municipio,localidad) VALUES (".$id_obra."  ,'".utf8_decode($ubi->municipio)."', '".utf8_decode($ubi->localidad)."')  ";
                }
            $sql.=  " COMMIT TRANSACTION _tr
                END TRY
                BEGIN CATCH
                  ROLLBACK TRANSACTION _tr
                END CATCH";

                echo $sql;
    		$exec = odbc_exec($this->conexion, $sql);
            if ($exec) {
              $message = $sql;

                return true;

            }
            else
            {
              $message = $sql;

                return false;
            }
        }

public function select_municipios(){
  $sql = "SELECT DISTINCT municipio_nombre from municipio_localidad ORDER BY municipio_nombre ASC";

      $exec = odbc_exec($this->conexion, $sql);
        return $exec;
}

public function select_localidad($municipio){
  $sql = "SELECT localidad_nombre from municipio_localidad WHERE municipio_nombre='".$municipio."'  ORDER BY localidad_nombre ASC";

      $exec = odbc_exec($this->conexion, $sql);
        return $exec;
}


public function select_localidadPoblacion($municipio_nombre,$localidad_nombre){
  $sql = "SELECT poblacion_total FROM municipio_localidad WHERE municipio_nombre='".$municipio_nombre."' AND localidad_nombre='".$localidad_nombre."' ";

  $exec = odbc_exec($this->conexion, $sql);
  return $exec;
}


public function agregar_alcance($id_obra,$tipo_obra,$num_obj,$objeto,$cantidad,$um){
  $sql = "INSERT INTO alcance(id_obra,tipo_obra,num_obj,objeto,cantidad,um)
         VALUES ('".$id_obra."', '".$tipo_obra."', '".$num_obj."', '".$objeto."', '".$cantidad."', '".$um."')";

      $exec = odbc_exec($this->conexion, $sql);
      if ($exec) {
        $message = $sql;

          return true;

      }
      else
      {
        $message = $sql;

          return false;
      }
}

public function agregar_revision($id_obra,$fecha_ingreso,$fecha_entrega,$observaciones,$area){
  $sql = "INSERT INTO revisiones(id_obra,area,fecha_ingreso,fecha_entrega,observaciones)
         VALUES ('".$id_obra."', '".$area."', ";
         if(validaDate($fecha_ingreso,'d-m-Y H:i:s')){$sql.="'".$fecha_ingreso."' ,";}
         else { $sql.= "NULL ,";}
         if(validaDate($fecha_entrega,'d-m-Y H:i:s')){$sql.="'".$fecha_entrega."' ,";}
         else { $sql.= "NULL ,";}
         //$sql.="  '".$fecha_ingreso."' , '".$fecha_entrega."' ";
  $sql.= " '".$observaciones."')";


echo $sql;

      $exec = odbc_exec($this->conexion, $sql);
      if ($exec) {
        $message = $sql;

          return true;

      }
      else
      {
        $message = $sql;

          return false;
      }
}

public function actualizar_revision($id_revisiones,$id_obra,$fecha_ingreso,$fecha_entrega,$observaciones,$area){
  $sql= " UPDATE revisiones SET fecha_ingreso=";
  if(validaDate($fecha_ingreso,'d-m-Y H:i:s')){$sql.="'".$fecha_ingreso."' ,";}
  else { $sql.= "NULL ,";}
  $sql.=" fecha_entrega=";
  if(validaDate($fecha_entrega,'d-m-Y H:i:s')){$sql.="'".$fecha_entrega."' ,";}
  else { $sql.= "NULL ,";}
  $sql.=" observaciones='".$observaciones."' ,area='".$area."'  WHERE id_revisiones='".$id_revisiones."' ";

      $exec = odbc_exec($this->conexion, $sql);
      if ($exec) {
        $message = $sql;

          return true;

      }
      else
      {
        $message = $sql;

          return false;
      }
}


    }


   function validaDate($date, $format)
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

  ?>
