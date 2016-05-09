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
        $sql= " SELECT ob.id_obra, ob.no_obra, ob.obra, ub.municipio, ub.localidad, est.total, ob.tipo_adj_solicitado ";
        $sql.= " FROM obra ob";
        $sql.= " INNER JOIN";
         $sql.= " ubicacion ub on ob.id_obra = ub.id_obra";
         $sql.= " INNER JOIN";
        $sql.= "  estructura_financiera est on ob.id_obra = est.id_obra	";

        $query = odbc_exec($this->conexion, $sql);
        return $query;
      }

      public function buscaSelectObraNormativa($req){
        $sql= " SELECT ob.id_obra, ob.no_obra, ob.obra, ub.municipio, ub.localidad, est.total, ob.tipo_adj_solicitado ";
        $sql.= " FROM obra ob";
        $sql.= " INNER JOIN";
         $sql.= " ubicacion ub on ob.id_obra = ub.id_obra";
         $sql.= " INNER JOIN";
        $sql.= "  estructura_financiera est on ob.id_obra = est.id_obra	";
        $sql.= " WHERE 1=1 ";
        if( !empty($req) ) {
          $sql.="AND ( ob.id_obra LIKE ('%".$req."%') ";
          $sql.=" OR ob.no_obra LIKE ('%".$req."%') ";
          $sql.=" OR ob.obra LIKE ('%".$req."%') ";
          $sql.=" OR ub.municipio LIKE ('%".$req."%') ";
          $sql.=" OR ub.localidad LIKE ('%".$req."%') ";
          $sql.=" OR est.total LIKE ('%".$req."%') ";
          $sql.=" OR ob.tipo_adj_solicitado LIKE ('%".$req."%') )";
        }

        $query=odbc_exec($this->conexion, $sql);
        return $query;
      }

      /*public function ordenaSelectObraNormativa($req,$req_o_c,$req_o_d,$req_s,$req_l){

          $sql=" SELECT TOP (".$req_l.") ob.id_obra, ob.no_obra, ob.obra, ub.municipio, ub.localidad, est.total, ob.tipo_adj_solicitado ";
           $sql.=" FROM obra ob ";
           $sql.=" INNER JOIN ";
            $sql.=" ubicacion ub on ob.id_obra = ub.id_obra ";
            $sql.=" INNER JOIN ";
            $sql.=" estructura_financiera est on ob.id_obra = est.id_obra ";
           $sql.= " WHERE 1=1	";
          if( !empty($req) ) {
          	$sql.=" AND ( ob.id_obra LIKE ('%".$req."%') ";
          	$sql.=" OR ob.no_obra LIKE ('%".$req."%') ";
            $sql.=" OR ob.obra LIKE ('%".$req."%') ";
            $sql.=" OR ub.municipio LIKE ('%".$req."%') ";
            $sql.=" OR ub.localidad LIKE ('%".$req."%') ";
            $sql.=" OR est.total LIKE ('%".$req."%') ";
            $sql.=" OR ob.tipo_adj_solicitado LIKE ('%".$req."%') ) ";
        }
        $sql.=" AND ob.id_obra Not in ( ";

            $sql.=" SELECT TOP (".$req_s.")  id_obra FROM obra  ORDER BY ".$req_o_c."   ".$req_o_d." ) ";

          $sql.= " ORDER BY ".$req_o_c."   ".$req_o_d." ";

        $query=odbc_exec($this->conexion, $sql);
        return $query;
      }
*/

public function ordenaSelectObraNormativa($req,$req_o_c,$req_o_d,$req_s,$req_l){

  $sql= " WITH OrderedOrders AS ";
 $sql.= " ( ";
  $sql.= " SELECT ob.id_obra, ob.no_obra, ob.obra, ub.municipio, ub.localidad, est.total, ob.tipo_adj_solicitado, ROW_NUMBER() OVER (ORDER BY ob.id_obra) AS RowNumber ";
          $sql.= " FROM obra ob ";
          $sql.= " INNER JOIN ";
           $sql.= " ubicacion ub on ob.id_obra = ub.id_obra ";
           $sql.= " INNER JOIN ";
           $sql.= " estructura_financiera est on ob.id_obra = est.id_obra	 ";
          $sql.= " WHERE 1=1	          ";
            $sql.= " AND ( ob.id_obra LIKE ('%".$req."%')  ";
            $sql.= " OR ob.no_obra LIKE ('%".$req."%')  ";
            $sql.= " OR ob.obra LIKE ('%".$req."%')  ";
            $sql.= " OR ub.municipio LIKE ('%".$req."%' )  ";
            $sql.= " OR ub.localidad LIKE ('%".$req."%')  ";
            $sql.= " OR est.total LIKE ('%".$req."%')  ";
            $sql.= " OR ob.tipo_adj_solicitado LIKE ('%".$req."%') ) ";
$sql.= " )  ";
$sql.= " SELECT id_obra, no_obra, municipio, localidad, total, tipo_adj_solicitado, obra  ";
$sql.= " FROM OrderedOrders  ";
$sql.= " WHERE RowNumber BETWEEN ".($req_s+1)." AND ".($req_l+$req_s)." ";
$sql.= " ORDER BY ".$req_o_c."   ".$req_o_d." ";


  $query=odbc_exec($this->conexion, $sql);
  return $query;
}


    public function agregar_obra($obra,$tipo_inversion,$tipo_expediente,$monto_solicitado,$dimension_inversion,$dependencia_solicitante,$dependencia_ejecutora,$unidad_responsable,$etapa,$periodo_ejecucion,$propuesta_anual,$normativa_aplicar,$tipo_adj_solicitado,$partidas,$municipio,$localidad,$beneficiarios_directos,$beneficiarios_indirectos,$empleos_directos,$empleos_indirectos,$programa_federal,$aporte_federal,$programa_estatal,$aporte_estatal,$programa_municipal,$aporte_municipal,$aportacion_beneficiarios,$aportacion_otros)
      {
//Falta añadir beneficiarios y empleos
      $sql = "BEGIN TRANSACTION _tr
              BEGIN TRY
              INSERT INTO obra(obra,tipo_inversion,tipo_expediente,dimension_inversion,dependencia_solicitante,dependencia_ejecutora,unidad_responsable,etapa,periodo_ejecucion,propuesta_anual,normativa_aplicar,tipo_adj_solicitado,partidas)
                    VALUES ('".$obra."', '".$tipo_inversion."', '".$tipo_expediente."', '".$dimension_inversion."', '".$dependencia_solicitante."', '".$dependencia_ejecutora."', '".$unidad_responsable."', '".$etapa."', '".$periodo_ejecucion."', '".$propuesta_anual."', '".$normativa_aplicar."',
                            '".$tipo_adj_solicitado."', '".$partidas."')
              DECLARE @ID INT
          		SET @ID = SCOPE_IDENTITY()
              INSERT INTO ubicacion(id_obra,municipio,localidad,beneficiarios_directos,beneficiarios_indirectos) VALUES (@ID,'".$municipio."', '".$localidad."','".$beneficiarios_directos."','".$beneficiarios_indirectos."')
              INSERT INTO estructura_financiera(id_obra,total,programa_federal,aporte_federal,programa_estatal,aporte_estatal,programa_municipal,aporte_municipal,aportacion_beneficiarios,aportacion_otros) VALUES (@ID,'".$monto_solicitado."', '".$programa_federal."', '".$aporte_federal."', '".$programa_estatal."', '".$aporte_estatal."', '".$programa_municipal."', '".$aporte_municipal."', '".$aportacion_beneficiarios."', '".$aportacion_otros."')
              COMMIT TRANSACTION _tr
              END TRY
              BEGIN CATCH
                ROLLBACK TRANSACTION _tr
              END CATCH";

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
  ?>
