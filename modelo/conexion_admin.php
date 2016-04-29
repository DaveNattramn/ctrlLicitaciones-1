<?php
//require_once('recursos/adodb/adodb.inc.php');
require_once('adodb/adodb.inc.php');

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
    /*Método que cierra una conexion abierta*/



    public function todos_usuarios(){
        $sql = "SELECT * FROM usuarios";
        $res = odbc_exec($this->conexion, $sql);
        return $res;
    }

    public function usuarios_licitaciones()
    {
        $sql ="SELECT * FROM usuarios WHERE modulo = 'Dpto de Licitaciones y Concursos' ";
        $arr = odbc_exec($this->conexion, $sql);
        return $arr;
    }

    public function usuario_normatividad()
    {
        $sql = "SELECT * FROM usuarios WHERE modulo = 'Dpto de Normatividad' ";
        $arre = odbc_exec($this->conexion, $sql);
        return $arre;
    }


    public function usuarios_agua()
    {
        $sql = "SELECT * FROM usuarios WHERE modulo = 'Dpto de Agua' ";
        $arre = odbc_exec($this->conexion, $sql);
        return $arre;
    }

    public function info_usuario($id)
    {

        $sql = "SELECT * FROM usuarios WHERE id ='".$id."'";
        $exec = odbc_exec($this->conexion, $sql);
        return $exec;
    }


    public function modificar_usuario($id, $campo, $dato)
    {
        $sql = "UPDATE usuarios SET ".$campo." = '" .utf8_decode($dato). "' WHERE id = ".$id."";
        $exec = odbc_exec($this->conexion, $sql);
        return $sql;
    }

    public function Cerrar(){
        odbc_close($this->conexion);
    }

    public function agregar_usuario($nombre, $puesto, $t_usuario, $area, $modulo, $tel, $mail, $n_user, $n_pas)
    {
        $sql = "INSERT INTO usuarios(nombre, puesto, area, modulo, usuario, contrasenia, telefono, mail, tipo_usuario) VALUES ('".$nombre."', '".$puesto."', '".$area."', '".$modulo."', '".$n_user."', '".$n_pas."', '".$tel."', '".$mail."', '".$t_usuario."') ";
        $exec = odbc_exec($this->conexion, $sql);
        if ($exec) {
            return true;
            echo $sql;
        }
        else
        {
            echo $sql;
            return false;
        }
    }

    public function elminar_usuario($id)
    {
        $sql = "DELETE FROM usuarios WHERE id = ".$id."";
        $exec = odbc_exec($this->conexion, $sql);
        if ($exec) {
            return true;
        } else {
            return false;
        }
    }
    public function modulo($nombre)
    {
        $sql = "SELECT modulo FROM usuarios WHERE nombre = '".$nombre."' ";
        $exec = odbc_exec($this->conexion, $sql);
        return $exec;   
    }
}
?>