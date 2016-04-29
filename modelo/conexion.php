<?php
require_once('../recursos/adodb/adodb.inc.php');
/*
************************************
Clase que se conecta al servidor LOCAL de SQL 
*/
class SQLBD{
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
    /*Método que cierra una conexion abierta*/
    public function Cerrar(){
        odbc_close($this->conexion);
    }
    /*Método que recibe como parametros usuario y contraseña y los consulta en la base de datos,
    si existen en ella inicia una sesión.*/

    public function iniciar_sesion($usuario,$password){
        session_start();
        $sql="SELECT * FROM usuarios WHERE usuario = '".$usuario."' and contrasenia='".$password."'";
        $res=odbc_exec($this->conexion, $sql) or die(odbc_errormsg());
        $resultado=odbc_fetch_array($res);
        $existe=odbc_num_rows($res);
        if($existe>0)
        {
            if($resultado['nombre']!=null)
            {
                $r=$resultado['nombre'];
                $chk = $resultado['modulo'];
                $user = $r."_".$chk;
            }
            else
            {
                $chk = $resultado['modulo'];
                $user="Usuario"."_".$chk;
            }
            $_SESSION['usuario']=$resultado['usuario'];
            return $user;
        }
        else{
            return false;
        }
        
    }

    public function todos_usuarios(){
        $sql = "SELECT * FROM usuarios";
        $res = odbc_exec($this->conexion, $sql);
        return $res;
    }

    /*public function ver_modulos($usuario){
        $sql="select nombre from user_alterno u inner join usuario_mod um on u.id_user=um.idusuario inner join Modulos m on m.idmodulo = um.modulo where u.user_name='".$usuario."'";
        $res=odbc_exec($this->conexion, $sql) or die(odbc_errormsg());
        $i=0;
        $modulos=array();
        if($res){
            while ($row=odbc_fetch_array($res)) {
                $modulos[$i]=$row['nombre'];
                $i++;
            }
        }
        return json_encode($modulos);
        
       
    }*/
}
?>