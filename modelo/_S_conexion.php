<?php

require_once('../recursos/adodb/adodb.inc.php');

class ADMIN{
    private $conexion;
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


    public function agregar_obra($obra,$tipo_inversion,$tipo_expediente,$monto_solicitado,$dimension_inversion,$dependencia_solicitante,$dependencia_ejecutora,$unidad_responsable,$etapa,$periodo_ejecucion,$propuesta_anual,$normativa_aplicar,$tipo_adj_solicitado,$partidas,$clave_presupuesto,$desc_presupuesto,$municipio,$localidad,$beneficiarios_directos,$beneficiarios_indirectos,$empleos_directos,$empleos_indirectos,$programa_federal,$aporte_federal,$programa_estatal,$aporte_estatal,$programa_municipal,$aporte_municipal,$aportacion_beneficiarios,$aportacion_otros)
      {
//Falta añadir beneficiarios y empleos
      $sql = "BEGIN TRANSACTION _tr
              BEGIN TRY
              INSERT INTO obra(obra,tipo_inversion,tipo_expediente,dimension_inversion,dependencia_solicitante,dependencia_ejecutora,unidad_responsable,etapa,periodo_ejecucion,propuesta_anual,normativa_aplicar,tipo_adj_solicitado,partidas,clave_presupuesto,desc_presupuesto)
                    VALUES ('".$obra."', '".$tipo_inversion."', '".$tipo_expediente."', '".$dimension_inversion."', '".$dependencia_solicitante."', '".$dependencia_ejecutora."', '".$unidad_responsable."', '".$etapa."', '".$periodo_ejecucion."', '".$propuesta_anual."', '".$normativa_aplicar."',
                            '".$tipo_adj_solicitado."', '".$partidas."', '".$clave_presupuesto."', '".$desc_presupuesto."')
              DECLARE @ID INT
          		SET @ID = SCOPE_IDENTITY()
              INSERT INTO ubicacion(id_obra,municipio,localidad) VALUES (@ID,'".$municipio."', '".$localidad."')
              INSERT INTO estructura_financiera(id_obra,total,programa_federal,aporte_federal,programa_estatal,aporte_estatal,programa_municipal,aporte_municipal,aportacion_beneficiarios,aportacion_otros) VALUES (@ID,'".$monto_solicitado."', '".$programa_federal."', '".$aporte_federal."', '".$programa_estatal."', '".$aporte_estatal."', '".$programa_municipal."', '".$aporte_municipal."', '".$aportacion_beneficiarios."', '".$aportacion_otros."')
              COMMIT TRANSACTION _tr
              END TRY
              BEGIN CATCH
                ROLLBACK TRANSACTION _tr
              END CATCH";

  		$exec = odbc_exec($this->conexion, $sql);
          if ($exec) {
            $message = $sql;
            echo "<script type='text/javascript'>alert('$message');</script>";
              return true;

          }
          else
          {
            $message = $sql;
            echo "<script type='text/javascript'>alert('$message');</script>";
              return false;
          }
      }


    }
  ?>
