<?php
require('../modelo/conexion.php');
//crear objeto 
$bd=new SQLBD();

if(isset($_POST["rptEst"])){
	
//muestra los datos generales de las obras
	if($_POST["rptEst"]=="Estimaciones"){
//buscar los datos existentes en la tabla general de estimaciones
		$year=$_POST["anio"];		
    	echo $bd->mostrarRptEstim($year);
	}
//muestra el detalle de una bra en especifico
	if($_POST["rptEst"]=="detailEstim"){
//buscar los datos existentes en la tabla general de estimaciones
		$obra=$_POST["noobra"];
    	echo $bd->mostrarDetalleRptEstim($obra);
	}
}

if (isset($_GET["rptEst"])=="phpexcel") {
		$anio=$_GET["anio"];
    	$bd->hacerExcel($anio);
	}
	
//cerrar  la sesion con la base de datos
$bd->Cerrar();

?>