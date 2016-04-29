<?php
	include('../modelo/conexion.php');
	$usuario=$_POST['user'];
	$pass=$_POST['pass'];
	$bd=new SQLBD();
	$existe=$bd->iniciar_sesion($usuario,$pass);
	if($existe){
		$_SESSION['usuario']=$existe;
	}
	$bd->Cerrar();
	echo $existe;
?>